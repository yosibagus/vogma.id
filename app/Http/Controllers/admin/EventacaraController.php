<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventacaraModel;
use App\Models\PenyelenggaraModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventacaraController extends Controller
{
    public function index()
    {
        $no = 1;
        $data = EventacaraModel::with('penyelenggara')->get();
        return view('admin.event.event_acara.event_view', compact('data', 'no'));
    }

    public function create()
    {
        $penyelenggaras = PenyelenggaraModel::all();
        return view('admin.event.event_acara.event_create', compact('penyelenggaras'));
    }

    public function store(Request $request)
    {
        // Generate slug dari nama_event
        $request->merge([
            'url_event' => Str::slug($request->nama_event),
        ]);

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
            'penyelenggara_id' => 'required|exists:penyelenggara,id_penyelenggara',
        ]);

        // Upload file banner jika ada
        if ($request->hasFile('benner_event')) {
            $file = $request->file('benner_event');
            $fileName = time() . '_' . $file->getClientOriginalName();
            // simpan ke storage/app/public/uploads/
            $filePath = $file->storeAs('uploads/banner', $fileName, 'public');
            $validatedData['benner_event'] = $filePath;
        }

        try {
            EventacaraModel::create($validatedData);
            return redirect()->route('event.index')->with('success', 'Event berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan event: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan event.');
        }
    }

    public function edit($id_event)
    {
        $event = EventacaraModel::findOrFail($id_event);
        $penyelenggaras = PenyelenggaraModel::all();
        return view('admin.event.event_acara.event_edit', compact('event', 'penyelenggaras'));
    }

    public function update(Request $request, $id_event)
    {
        $request->merge([
            'url_event' => Str::slug($request->nama_event),
        ]);

        $event = EventacaraModel::findOrFail($id_event);

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
            'penyelenggara_id' => 'required|exists:penyelenggara,id_penyelenggara',
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
            'penyelenggara_id',
        ]);

        // Update banner jika diupload ulang
        if ($request->hasFile('benner_event')) {
            // Hapus banner lama jika ada
            if ($event->benner_event) {
                Storage::disk('public')->delete($event->benner_event);
            }

            $file = $request->file('benner_event');
            $fileName = time() . '_' . $file->getClientOriginalName();
            // simpan ke storage/app/public/uploads/
            $filePath = $file->storeAs('uploads/banner', $fileName, 'public');
            $data['benner_event'] = $filePath;
        } else {
            $data['benner_event'] = $event->benner_event;
        }

        $event->update($data);

        return redirect()->route('event.index')->with('success', 'Event berhasil diperbarui.');
    }

    public function delete($id_event)
    {
        $event = EventacaraModel::findOrFail($id_event);

        // Hapus file banner dari storage jika ada
        if ($event->benner_event) {
            Storage::disk('public')->delete($event->benner_event);
        }

        $event->delete();

        return redirect()->route('event.index')->with('success', 'Event berhasil dihapus.');
    }
}
