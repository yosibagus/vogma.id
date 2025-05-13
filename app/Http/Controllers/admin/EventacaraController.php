<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventacaraModel;
use App\Models\PenyelenggaraModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventacaraController extends Controller
{
    public function index()
    {
        $no = 1;
        $user = Auth::user();

        if ($user->role === 'admin') {
            $data = EventacaraModel::all();
        } else {
            $data = EventacaraModel::where('penyelenggara_id', $user->id)->get();
        }

        return view('admin.event_acara.event_view', compact('data', 'no'));
    }

    public function create()
    {
        $penyelenggaras = PenyelenggaraModel::all();
        return view('admin.event_acara.event_create', compact('penyelenggaras'));
    }

    public function store(Request $request)
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Validasi input TANPA penyelenggara_id
        $validatedData = $request->validate([
            'nama_event' => 'required|string|max:255',
            'url_event' => 'required|string|max:255|unique:event,url_event',
            'tgl_start_event' => 'required|date',
            'tgl_end_event' => 'required|date|after_or_equal:tgl_start_event',
            'lokasi_event' => 'nullable|string|max:255',
            'harga_event' => 'nullable|numeric|min:0',
            'deskripsi_event' => 'nullable|string',
            'max_vote' => 'nullable|integer|min:1',
            'benner_event' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Tambahkan penyelenggara_id dari user yang login
        $validatedData['penyelenggara_id'] = $user->id;

        // Handle upload file jika ada
        if ($request->hasFile('benner_event')) {
            $file = $request->file('benner_event');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('banners', $fileName, 'public');
            $validatedData['benner_event'] = $filePath;
        }

        // Simpan data ke database
        EventacaraModel::create($validatedData);

        return redirect()->route('event.index')->with('success', 'Event berhasil ditambahkan.');
    }

    public function edit($id_event)
    {
        $event = EventacaraModel::findOrFail($id_event);
        $penyelenggaras = PenyelenggaraModel::all();
        return view('admin.event_acara.event_edit', compact('event', 'penyelenggaras'));
    }

    public function update(Request $request, $id_event)
    {
        // Ambil data event berdasarkan ID
        $event = EventacaraModel::findOrFail($id_event);

        // Validasi input
        $validatedData = $request->validate([
            'nama_event' => 'required|string|max:255',
            'url_event' => 'required|string|max:255|unique:event,url_event,' . $event->id_event . ',id_event',
            'tgl_start_event' => 'required|date',
            'tgl_end_event' => 'required|date|after_or_equal:tgl_start_event',
            'lokasi_event' => 'nullable|string|max:255',
            'harga_event' => 'nullable|numeric|min:0',
            'deskripsi_event' => 'nullable|string',
            'max_vote' => 'nullable|integer|min:1',
            'benner_event' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only([
            'nama_event',
            'url_event',
            'tgl_start_event',
            'tgl_end_event',
            'lokasi_event',
            'harga_event',
            'deskripsi_event',
            'max_vote',
        ]);

        // Jika ada banner baru
        if ($request->hasFile('benner_event')) {
            // Hapus banner lama jika ada
            if ($event->benner_event) {
                Storage::disk('public')->delete($event->benner_event);
            }

            // Simpan file baru
            $file = $request->file('benner_event');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('banners', $fileName, 'public');
            $data['benner_event'] = $filePath;
        } else {
            // Tetap gunakan banner lama jika tidak ada file baru
            $data['benner_event'] = $event->benner_event;
        }

        // Update data event
        $event->update($data);

        return redirect()->route('event.index')->with('success', 'Event berhasil diperbarui.');
    }

    public function delete($id_event)
    {
        $event = EventacaraModel::findOrFail($id_event);

        // Hapus banner jika ada
        if ($event->benner_event) {
            Storage::disk('public')->delete($event->benner_event);
        }

        // Hapus data event
        $event->delete();

        return redirect()->route('event.index')->with('success', 'Event berhasil dihapus.');
    }
}
