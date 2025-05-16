<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\EventacaraModel;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $data['event'] = EventacaraModel::all();
        return view('user.beranda.beranda_view', $data);
    }
}
