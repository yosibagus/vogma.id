<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventacaraModel;
use App\Models\FinalisModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FinalisController extends Controller
{
    public function index()
    {
        $no = 1;
        $user = Auth::user();

        if ($user->role === 'admin') {
            $data = FinalisModel::with('event')->get();
        } else {
            $data = FinalisModel::whereHas('event', function ($query) use ($user) {
                $query->where('penyelenggara_id', $user->id);
            })->with('event')->get();
        }

        return view('admin.event.finalis.finalis_view', compact('data', 'no'));
    }


    public function create()
    {
        $events = EventacaraModel::all();
        return view('admin.event.finalis.finalis_create', compact('events'));
    }

    // public function store(Request $request)
    // {
    //     $user = Auth::user();

    //     // Cari event milik user (misalnya hanya satu event aktif)
    //     $event = \App\Models\EventacaraModel::where('penyelenggara_id', $user->id)->latest()->first();

    //     if (!$event) {
    //         return redirect()->back()->withErrors(['event_id' => 'Anda belum memiliki event untuk ditambahkan kandidat.'])->withInput();
    //     }

    //     // Validasi input TANPA event_id
    //     $validatedData = $request->validate([
    //         'no_kandidat' => 'required|string|max:255',
    //         'foto_kandidat' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'deskripsi_kandidat' => 'nullable|string',
    //         'biografi_kandidat' => 'nullable|string',
    //     ]);

    //     // Tetapkan event_id otomatis
    //     $validatedData['event_id'] = $event->id_event;

    //     // Upload foto jika ada
    //     if ($request->hasFile('foto_kandidat')) {
    //         $file = $request->file('foto_kandidat');
    //         $fileName = time() . '_' . $file->getClientOriginalName();
    //         $filePath = $file->storeAs('uploads/kandidat', $fileName, 'public');
    //         $validatedData['foto_kandidat'] = $filePath;
    //     }

    //     // Simpan data kandidat
    //     FinalisModel::create($validatedData);

    //     return redirect()->route('finalis.index')->with('success', 'Kandidat berhasil ditambahkan.');
    // }


    public function store(Request $request)
{
    $user = Auth::user();

    $validatedData = $request->validate([
        'no_kandidat' => 'required|string|max:255',
        'foto_kandidat' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'deskripsi_kandidat' => 'nullable|string',
        'biografi_kandidat' => 'nullable|string',
    ]);

    if ($user->role === 'penyelenggara') {

        $event = \App\Models\EventacaraModel::where('penyelenggara_id', $user->id)->latest()->first();

        if (!$event) {
            return redirect()->back()->withErrors(['event_id' => 'Anda belum memiliki event untuk ditambahkan kandidat.'])->withInput();
        }

        $validatedData['event_id'] = $event->id_event;
    } elseif ($user->role === 'admin') {

        $request->validate([
            'event_id' => 'required|exists:event,id_event',
        ]);

        $validatedData['event_id'] = $request->input('event_id');
    }

    if ($request->hasFile('foto_kandidat')) {
        $file = $request->file('foto_kandidat');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads/kandidat', $fileName, 'public');
        $validatedData['foto_kandidat'] = $filePath;
    }

    try {
        \App\Models\FinalisModel::create($validatedData);
        return redirect()->route('finalis.index')->with('success', 'Kandidat berhasil ditambahkan.');
    } catch (\Exception $e) {
        Log::error('Gagal menyimpan kandidat: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan kandidat.')->withInput();
    }
}


    public function edit($id_kandidat)
    {
        $finalis = FinalisModel::findOrFail($id_kandidat);
        $events = EventacaraModel::all();
        return view('admin.finalis.finalis_edit', compact('finalis', 'events'));
    }

    public function update(Request $request, $id_kandidat)
    {
        $data = FinalisModel::findOrFail($id_kandidat);

        $validatedData = $request->validate([
            'no_kandidat' => 'required|string|max:255',
            'foto_kandidat' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_kandidat' => 'nullable|string',
            'biografi_kandidat' => 'nullable|string',
        ]);

        if ($request->hasFile('foto_kandidat')) {
            $file = $request->file('foto_kandidat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/kandidat', $fileName, 'public');
            $validatedData['foto_kandidat'] = $filePath;
        }

        $data->update($validatedData);

        return redirect()->route('finalis.index')->with('success', 'Kandidat berhasil diperbarui.');
    }

    public function delete($id_kandidat)
    {
        $finalis = FinalisModel::findOrFail($id_kandidat);
        $finalis->delete();

        return redirect()->route('finalis.index')->with('success', 'Kandidat berhasil dihapus.');
    }

}
