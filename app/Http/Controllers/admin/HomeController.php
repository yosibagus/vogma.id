<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\EventacaraModel;
use App\Models\FinalisModel;
use App\Models\PenyelenggaraModel;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $total_penyelenggara = PenyelenggaraModel::count();
        $total_event = EventacaraModel::count();
        $total_kandidat = FinalisModel::count();
        $total_pembayaran = TransaksiModel::count();
        $total_pembayaran = TransaksiModel::sum('total_pembayaran');


        $target_pendapatan = 1000000000;
        $max_target = 100;

        $persentase_penyelenggara = $max_target > 0 ? round(($total_penyelenggara / $max_target) * 100, 2) : 0;
        $persentase_event = $max_target > 0 ? round(($total_event / $max_target) * 100, 2) : 0;
        $persentase_kandiat = $max_target > 0 ? round(($total_kandidat / $max_target) * 100, 2) : 0;

        $target_pendapatan = $target_pendapatan > 0
            ? min(100, ($total_pembayaran / $target_pendapatan) * 100)
            : 0;


        $eventKandidat = FinalisModel::with('event')->get();
        $event_terbaru = EventacaraModel::with('penyelenggara')->latest()->take(5)->get();

        $data = [
            'total_penyelenggara' => PenyelenggaraModel::count(),
            'persentase_penyelenggara' => $persentase_penyelenggara,
            'total_event' => EventacaraModel::count(),
            'persentase_event' => $persentase_event,
            'total_kandidat' => FinalisModel::count(),
            'persentase_kandidat' => $persentase_kandiat,
            'total_pembayaran' => $total_pembayaran,
            'persentase_pendapatan' => $target_pendapatan,
            'event_kandidat' => $eventKandidat,
            'event_terbaru' => $event_terbaru,
        ];

        return view('admin.home.home_view', $data);
    }
}
