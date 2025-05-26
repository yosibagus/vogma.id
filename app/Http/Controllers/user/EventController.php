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
use Midtrans\Config;
use Midtrans\Snap;

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
        $data['toptiga'] = $this->_getTop3Finalis($data['detail']->id_event);
        return view('user.event.event_detail', $data);
    }

    public function kandidatDetail($url, $id)
    {
        $detail = FinalisModel::where('id_kandidat', $id)->first();
        return view('user.event.event_kandidat', compact('detail'));
    }

    private function _getDataFinalis($idEvent)
    {
        $finalis = DB::table('event_kandidat')
            ->where('event_id', $idEvent)
            ->get();

        $totalVotes = DB::table('event_votes')
            ->join('event_kandidat', 'event_votes.kandidat_id', '=', 'event_kandidat.id_kandidat')
            ->where('event_kandidat.event_id', $idEvent)
            ->where('event_votes.status_vote', 'ok')
            ->sum('event_votes.kuantitas_vote');

        $result = [];

        foreach ($finalis as $f) {
            $jumlahVote = DB::table('event_votes')
                ->where('kandidat_id', $f->id_kandidat)
                ->where('status_vote', 'ok')
                ->sum('kuantitas_vote');

            $persentase = $totalVotes > 0 ? round(($jumlahVote / $totalVotes) * 100, 2) : 0;

            $f->jumlah_vote = $jumlahVote;
            $f->persentase_vote = $persentase;

            $result[] = $f;
        }

        // Urutkan berdasarkan persentase_vote descending
        return collect($result)->sortByDesc('persentase_vote')->values();
    }

    private function _getTop3Finalis($idEvent)
    {
        $finalis = DB::table('event_kandidat')
            ->where('event_id', $idEvent)
            ->get();

        $totalVotes = DB::table('event_votes')
            ->join('event_kandidat', 'event_votes.kandidat_id', '=', 'event_kandidat.id_kandidat')
            ->where('event_kandidat.event_id', $idEvent)
            ->where('event_votes.status_vote', 'ok')
            ->sum('event_votes.kuantitas_vote');

        $result = [];

        foreach ($finalis as $f) {
            $jumlahVote = DB::table('event_votes')
                ->where('kandidat_id', $f->id_kandidat)
                ->where('status_vote', 'ok')
                ->sum('kuantitas_vote');

            $persentase = $totalVotes > 0 ? round(($jumlahVote / $totalVotes) * 100, 2) : 0;

            $f->jumlah_vote = $jumlahVote;
            $f->persentase_vote = $persentase;

            $result[] = $f;
        }

        // Ambil hanya 3 tertinggi berdasarkan persentase_vote
        return collect($result)->sortByDesc('persentase_vote')->take(3)->values();
    }


    public function checkout(Request $request)
    {
        $token_vote = 'test' . uniqid();
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
                'status_vote' => config('midtrans.free') == 'tidak' ? 'no' : 'free-no',
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

            $qr_url = '';

            if ($metode_pembayaran != 'qris') {
                $vaObject = collect($transaction->va_numbers)->firstWhere('bank', strtolower($metode_pembayaran));
                $qr_url = $vaObject->va_number ?? null;
            } else {
                $qr_url = collect($transaction->actions)->firstWhere('name', 'generate-qr-code')->url ?? null;
            }
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
                'kardaluarsa_pembayaran' => $expiry_time,
                'free' => config('midtrans.free') == 'tidak' ? 'false' : 'true'
            ];

            VotersDetailModel::create($vote_detail);

            DB::commit();

            return response()->json([
                'success' => true,
                'data' => $vote_detail
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

        // return response()->json($status);

        return view('user.event.include.status_pesanan', compact('status'));
    }

    public function getSnapToken(Request $request)
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $orderId = $request->order_id;

        $transaksi = VotersDetailModel::where('token_vote', $orderId)->first();
        $event = EventacaraModel::where('id_event', $transaksi->event_id)->first();
        if ($transaksi->snap_token != null) {
            $snapToken = $transaksi->snap_token;
        } else {
            $items = [];
            $vote = VotersModel::getDataVotes($orderId)->get();
            foreach ($vote as $get) {
                $items[] = [
                    'id' => $get->no_kandidat,
                    'price' => $event->harga_event,
                    'quantity' => $get->kuantitas_vote,
                    'name' => $get->nama_kandidat,
                ];
            }
            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => $transaksi->total_pembayaran,
                ],
                'customer_details' => [
                    'first_name' => $transaksi->nama_voters,
                    'email' => $transaksi->email_voters,
                    'phone' => $transaksi->nohp_voters,
                ],
                'item_details' => $items,
                'enabled_payments' => ['other_qris']
            ];

            $snapToken = Snap::getSnapToken($params);

            VotersDetailModel::where('token_vote', $orderId)->update(
                [
                    'snap_token' => $snapToken,
                ]
            );
        }

        return response()->json(['snap_token' => $snapToken, 'status' => 'ok']);
    }

    public function status(Request $request)
    {
        $id = $request->input('id');

        try {
            $status = $this->midtrans->getTransactionStatus($id);
            $vote = VotersDetailModel::where('token_vote', $id)->first();
            $detail = EventacaraModel::where('id_event', $vote->event_id)->first();
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Gagal mengambil status transaksi',
                'message' => $e->getMessage()
            ], 400);
        }

        return view('user.event.include.kode_pembayaran', compact('status', 'detail', 'vote'));
    }

    public function statusExpire(Request $request)
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

        return response()->json($status);
    }
}
