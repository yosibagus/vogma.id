<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VotersModel;
use Illuminate\Http\Request;

class VotersController extends Controller
{

    public function index()
    {

        $data = VotersModel::with(['event', 'kandidat'])->get();


        return view('admin.event.event_votes.votes_view', compact('data'));
    }

    public function show($id)
    {
        $vote = VotersModel::with(['event', 'kandidat'])->findOrFail($id);
        return response()->json($vote);
    }
    
}
