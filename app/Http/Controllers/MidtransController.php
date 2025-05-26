<?php

namespace App\Http\Controllers;

use App\Models\VotersDetailModel;
use App\Models\VotersModel;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function handleNotification(Request $request)
    {
        // Konfigurasi Midtrans
        // Config::$serverKey = config('midtrans.server_key');
        // Config::$isProduction = config('midtrans.environment') === 'production';

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        // Config::$isSanitized = config('midtrans.is_sanitized');
        // Config::$is3ds = config('midtrans.is_3ds');

        // Ambil notifikasi dari Midtrans
        $notification = new Notification();

        $transaction = $notification->transaction_status;
        $order_id = $notification->order_id;
        $payment_type = $notification->payment_type;
        $fraud = $notification->fraud_status;

        // Contoh: Update status pesanan di database
        $order = VotersDetailModel::where('token_vote', $order_id)->first();

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        if ($transaction == 'settlement') {
            $status_pembayaran = 'success';
            if (config('midtrans.free') == 'tidak') {
                VotersModel::where('token_vote', $order_id)->update(['status_vote' => 'ok']);
            } else {
                VotersModel::where('token_vote', $order_id)->update(['status_vote' => 'free-ok']);
            }
        } elseif ($transaction == 'pending') {
            $status_pembayaran = 'pending';
        } elseif ($transaction == 'deny' || $transaction == 'expire' || $transaction == 'cancel') {
            $status_pembayaran = 'failed';
        }

        VotersDetailModel::where('token_vote', $order_id)->update(['status_pembayaran' => $status_pembayaran]);

        return response()->json(['message' => 'Notification handled']);
    }
}
