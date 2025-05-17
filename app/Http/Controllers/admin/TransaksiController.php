<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function detail()
    {
        $transaksis = TransaksiModel::with('event')->get();
        return view('admin.transaksi.transaksi_event', compact('transaksis'));
    }


    public function all_transaksi()
    {
        $transaksis = TransaksiModel::with('event')->get();
        return view('admin.transaksi.all_transaksi', compact('transaksis'));
    }
}
