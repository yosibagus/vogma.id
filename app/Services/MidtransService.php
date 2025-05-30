<?php

namespace App\Services;

use App\Models\EventacaraModel;
use App\Models\VotersDetailModel;
use App\Models\VotersModel;
use Midtrans\Config;
use Midtrans\Transaction;
use Midtrans\CoreApi;

class MidtransService
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function getTransactionStatus($orderId)
    {
        return Transaction::status($orderId);
    }


    public function createBankTransferTransaction($orderId, $amount, $customer, $bank, $items)
    {
        if ($bank == 'bni' || $bank == 'bca' || $bank == 'bri') {
            $transactionDetails = $this->bank_transfer($orderId, $amount, $customer, $bank);
        } else if ($bank == 'qris') {
            $transactionDetails = $this->qris_transfer($orderId, $amount, $customer, $bank, $items);
        }

        return CoreApi::charge($transactionDetails);
    }
    private function bank_transfer($orderId, $amount, $customer, $bank)
    {
        return [
            'payment_type' => 'bank_transfer',
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $amount,
            ],
            'customer_details' => $customer,
            'bank_transfer' => [
                'bank' => strtolower($bank),
            ],
        ];
    }

    private function qris_transfer($orderId, $amount, $customer, $bank, $items)
    {
        $data =  [
            "payment_type" => "qris",
            "transaction_details" => [
                "order_id" => $orderId,
                "gross_amount" => $amount
            ],
            "customer_details" => $customer,
            "item_details" => $items,
            "qris" => [
                "acquirer" => "gopay"
            ]
        ];

        return $data;
    }
}
