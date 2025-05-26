<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventacaraModel;
use App\Models\TransaksiModel;
use App\Models\VotersModel;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $event = EventacaraModel::getDataEvent()->get();
        return view('admin.transaksi.event_transaksi', compact('event'));
    }

    public function detail($id)
    {
        $event = EventacaraModel::where('id_event', $id)->first();
        $transaksis = TransaksiModel::getDataTransaksiById($id)->get();
        $total = TransaksiModel::getDataTransaksiById($id)->get()->where('status_pembayaran', 'success')->sum('total_harga');
        $total_voters = TransaksiModel::getDataTransaksiById($id)->get()->where('status_pembayaran', 'success')->count('id_detail');
        $total_vote = VotersModel::where('event_id', $id)->where('status_vote', 'ok')->sum('kuantitas_vote');
        // dd($total_vote);
        return view('admin.transaksi.transaksi_event', compact('transaksis', 'event', 'total', 'total_voters', 'total_vote'));
    }


    public function all_transaksi()
    {
        $transaksis = TransaksiModel::with('event')->where('free', 'false')->get();
        return view('admin.transaksi.all_transaksi', compact('transaksis'));
    }
}
