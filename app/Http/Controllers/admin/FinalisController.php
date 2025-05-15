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
            'foto_kandidat' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_kandidat' => 'nullable|string',
            'biografi_kandidat' => 'nullable|string',
            'event_id' => 'required|exists:event,id_event',
        ]);

        if ($request->hasFile('foto_kandidat')) {
            $file = $request->file('foto_kandidat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/kandidat', $fileName, 'public');
            $validatedData['foto_kandidat'] = $filePath;
        }

        try {
            FinalisModel::create($validatedData);
            return redirect()->route('finalis.index')->with('success', 'Kandidat berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan kandidat: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan kandidat.')->withInput();
        }
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
            'foto_kandidat' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_kandidat' => 'nullable|string',
            'biografi_kandidat' => 'nullable|string',
            'event_id' => 'required|exists:event,id_event',
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

        // Hapus foto dari storage jika ada
        if ($finalis->foto_kandidat && Storage::disk('public')->exists($finalis->foto_kandidat)) {
            Storage::disk('public')->delete($finalis->foto_kandidat);
        }

        // Hapus data dari database
        $finalis->delete();

        return redirect()->route('finalis.index')->with('success', 'Kandidat dan foto berhasil dihapus.');
    }
}
