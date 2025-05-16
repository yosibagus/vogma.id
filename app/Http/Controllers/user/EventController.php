<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\EventacaraModel;
use App\Models\PenyelenggaraModel;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index($url)
    {
        $data['detail'] = EventacaraModel::where('url_event', $url)->first();
        $data['penyelenggara'] = PenyelenggaraModel::where('id_penyelenggara', $data['detail']->penyelenggara_id)->first();
        return view('user.event.event_detail', $data);
    }
}
