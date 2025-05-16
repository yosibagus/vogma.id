<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventacaraModel;
use App\Models\FinalisModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FinalisController extends Controller
{
    public function index()
    {
        $no = 1;
        $data = FinalisModel::with('event')->get();
        return view('admin.event.finalis.finalis_view', compact('data', 'no'));
    }

    public function create()
    {
        $events = EventacaraModel::all(); // Ambil semua event
        return view('admin.event.finalis.finalis_create', compact('events'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_kandidat' => 'required|string|max:255',
            'nama_kandidat' => 'required|string|max:255',
            'foto_kandidat' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_kandidat' => 'nullable|string',
            'biografi_kandidat' => 'nullable|string',
            'event_id' => 'required|exists:event,id_event',
        ]);

        if ($request->hasFile('foto_kandidat')) {
            $file = $request->file('foto_kandidat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/foto kandidat'), $fileName);
            $validatedData['foto_kandidat'] = 'upload/foto kandidat/' . $fileName;
        }

        FinalisModel::create($validatedData);
        return redirect()->route('finalis.index')->with('success', 'Kandidat berhasil ditambahkan.');
    }


    public function edit($id_kandidat)
    {
        $finalis = FinalisModel::findOrFail($id_kandidat);
        $events = EventacaraModel::all(); // Untuk dropdown event jika perlu ubah
        return view('admin.event.finalis.finalis_edit', compact('finalis', 'events'));
    }

    public function update(Request $request, $id_kandidat)
    {
        $data = FinalisModel::findOrFail($id_kandidat);

        $validatedData = $request->validate([
            'no_kandidat' => 'required|string|max:255',
            'nama_kandidat' => 'required|string|max:255',
            'foto_kandidat' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_kandidat' => 'nullable|string',
            'biografi_kandidat' => 'nullable|string',
            'event_id' => 'required|exists:event,id_event',
        ]);

        // Hapus foto lama jika ada dan file baru diupload
        if ($request->hasFile('foto_kandidat')) {
            if ($data->foto_kandidat && file_exists(public_path($data->foto_kandidat))) {
                unlink(public_path($data->foto_kandidat));
            }

            $file = $request->file('foto_kandidat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/foto kandidat'), $fileName);
            $validatedData['foto_kandidat'] = 'upload/foto kandidat/' . $fileName;
        }

        $data->update($validatedData);

        return redirect()->route('finalis.index')->with('success', 'Kandidat berhasil diperbarui.');
    }


    public function delete($id_kandidat)
    {
        $finalis = FinalisModel::findOrFail($id_kandidat);

        // Hapus foto dari folder public jika ada
        if ($finalis->foto_kandidat && file_exists(public_path($finalis->foto_kandidat))) {
            unlink(public_path($finalis->foto_kandidat));
        }

        $finalis->delete();

        return redirect()->route('finalis.index')->with('success', 'Kandidat dan foto berhasil dihapus.');
    }
}
