<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\EventacaraModel;
use App\Models\FinalisModel;
use App\Models\PenyelenggaraModel;
use App\Models\VotersDetailModel;
use App\Models\VotersModel;
use App\Services\MidtransService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    protected $midtrans;

    public function __construct(MidtransService $midtrans)
    {
        $this->midtrans = $midtrans;
    }


    public function index($url)
    {
        $data['detail'] = EventacaraModel::where('url_event', $url)->first();
        $data['penyelenggara'] = PenyelenggaraModel::where('id_penyelenggara', $data['detail']->penyelenggara_id)->first();
        $data['finalis'] = $this->_getDataFinalis($data['detail']->id_event);
        return view('user.event.event_detail', $data);
    }

    private function _getDataFinalis($idEvent)
    {
        $finalis = FinalisModel::where('event_id', $idEvent)->get();
        return $finalis;
    }

    public function checkout(Request $request)
    {
        $token_vote = uniqid();
        $items = $request->input('items');
        $total_harga_vote = $request->total_harga_vote;
        $biaya_layanan = $request->biaya_layanan;
        $total_bayar = $request->total_bayar;
        $metode_pembayaran = $request->metode_pembayaran;
        $nama = $request->nama;
        $no_hp = $request->no_hp;
        $email = $request->email;

        $votes = [];
        foreach ($items as $item) {
            $votes[] = [
                'token_vote' => $token_vote,
                'kandidat_id' => $item['id'],
                'event_id' => $request->event_id,
                'kuantitas_vote' => $item['qty'],
                'total_harga_vote' => $item['subtotal'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        $customer = [
            'first_name' => $nama,
            'email' => $email,
            'phone' => $no_hp,
        ];

        try {
            DB::beginTransaction();

            VotersModel::insert($votes);

            $transaction = $this->midtrans->createBankTransferTransaction($token_vote, $total_bayar, $customer, $metode_pembayaran);
            $qr_url = collect($transaction->actions)->firstWhere('name', 'generate-qr-code')->url ?? null;
            $expiry_time = $transaction->expiry_time ?? null;

            $vote_detail = [
                'token_vote' => $token_vote,
                'event_id' => $request->event_id,
                'nama_voters' => $nama,
                'nohp_voters' => $no_hp,
                'email_voters' => $email,
                'metode_pembayaran' => $metode_pembayaran,
                'total_harga' => $total_harga_vote,
                'biaya_layanan' => $biaya_layanan,
                'total_pembayaran' => $total_bayar,
                'kode_pembayaran' => $qr_url,
                'kardaluarsa_pembayaran' => $expiry_time
            ];

            VotersDetailModel::create($vote_detail);

            DB::commit();

            return response()->json([
                'success' => true,
                'data' => $vote_detail,
                'transaction' => $transaction,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Checkout failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function checkoutDetail($id)
    {
        $detail = VotersDetailModel::where('token_vote', $id)->first();
        $event = EventacaraModel::where('id_event', $detail->event_id)->first();

        return view('user.event.event_checkout', compact('detail', 'event'));
    }

    public function statusPesanan(Request $request)
    {
        $id = $request->input('id');

        try {
            $status = $this->midtrans->getTransactionStatus($id);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Gagal mengambil status transaksi',
                'message' => $e->getMessage()
            ], 400);
        }
        return view('user.event.include.status_pesanan', compact('status'));
    }
}
