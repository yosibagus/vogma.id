<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PenyelenggaraModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenyelenggaraController extends Controller
{
    public function index()
    {
        $no = 1;
        $data = PenyelenggaraModel::all();
        return view('admin.penyelenggara.penyelenggara_view', compact('data', 'no'));
    }

    public function create()
    {
        return view('admin.penyelenggara.penyelenggara_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penyelenggara' => 'required|string|max:255',
            'logo_penyelenggara' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'dokumen_ktp' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
            'dokumen_npwp' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'nama_penyelenggara',
            'alamat_penyelenggara',
            'nohp_penyelenggara',
            'email_penyelenggara',
        ]);

        // Simpan logo ke public/upload/logo_penyelenggara
        if ($request->hasFile('logo_penyelenggara')) {
            $logo = $request->file('logo_penyelenggara');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('upload/logo_penyelenggara'), $logoName);
            $data['logo_penyelenggara'] = 'upload/logo_penyelenggara/' . $logoName;
        }

        // Simpan dokumen ke penyimpanan privat
        if ($request->hasFile('dokumen_ktp')) {
            $data['dokumen_ktp'] = $request->file('dokumen_ktp')->store('dokumen/ktp');
        }

        if ($request->hasFile('dokumen_npwp')) {
            $data['dokumen_npwp'] = $request->file('dokumen_npwp')->store('dokumen/npwp');
        }

        PenyelenggaraModel::create($data);

        return redirect()->route('penyelenggara.index')->with('success', 'Penyelenggara berhasil ditambahkan');
    }

    public function edit($id_penyelenggara)
    {
        $data = PenyelenggaraModel::where('id_penyelenggara', $id_penyelenggara)->firstOrFail();
        return view('admin.penyelenggara.penyelenggara_edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $penyelenggara = PenyelenggaraModel::findOrFail($id);

        $request->validate([
            'nama_penyelenggara' => 'required|string|max:255',
            'logo_penyelenggara' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'dokumen_ktp' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
            'dokumen_npwp' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'nama_penyelenggara',
            'alamat_penyelenggara',
            'nohp_penyelenggara',
            'email_penyelenggara',
        ]);

        // Update logo
        if ($request->hasFile('logo_penyelenggara')) {
            // Hapus logo lama jika ada
            if ($penyelenggara->logo_penyelenggara && file_exists(public_path($penyelenggara->logo_penyelenggara))) {
                unlink(public_path($penyelenggara->logo_penyelenggara));
            }

            $logo = $request->file('logo_penyelenggara');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('upload/logo_penyelenggara'), $logoName);
            $data['logo_penyelenggara'] = 'upload/logo_penyelenggara/' . $logoName;
        }

        // Update dokumen KTP
        if ($request->hasFile('dokumen_ktp')) {
            if ($penyelenggara->dokumen_ktp && Storage::exists($penyelenggara->dokumen_ktp)) {
                Storage::delete($penyelenggara->dokumen_ktp);
            }
            $data['dokumen_ktp'] = $request->file('dokumen_ktp')->store('dokumen/ktp');
        }

        // Update dokumen NPWP
        if ($request->hasFile('dokumen_npwp')) {
            if ($penyelenggara->dokumen_npwp && Storage::exists($penyelenggara->dokumen_npwp)) {
                Storage::delete($penyelenggara->dokumen_npwp);
            }
            $data['dokumen_npwp'] = $request->file('dokumen_npwp')->store('dokumen/npwp');
        }

        $penyelenggara->update($data);

        return redirect()->route('penyelenggara.index')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $penyelenggara = PenyelenggaraModel::findOrFail($id);

        // Hapus logo
        if ($penyelenggara->logo_penyelenggara && file_exists(public_path($penyelenggara->logo_penyelenggara))) {
            unlink(public_path($penyelenggara->logo_penyelenggara));
        }

        // Hapus dokumen dari storage
        if ($penyelenggara->dokumen_ktp && Storage::exists($penyelenggara->dokumen_ktp)) {
            Storage::delete($penyelenggara->dokumen_ktp);
        }

        if ($penyelenggara->dokumen_npwp && Storage::exists($penyelenggara->dokumen_npwp)) {
            Storage::delete($penyelenggara->dokumen_npwp);
        }

        $penyelenggara->delete();

        return redirect()->route('penyelenggara.index')->with('success', 'Data berhasil dihapus');
    }

    public function lihatDokumen($id, $tipe)
    {
        $penyelenggara = PenyelenggaraModel::findOrFail($id);

        if (!in_array($tipe, ['ktp', 'npwp'])) {
            abort(404);
        }

        $path = $tipe === 'ktp' ? $penyelenggara->dokumen_ktp : $penyelenggara->dokumen_npwp;

        if (!$path || !Storage::exists($path)) {
            abort(404, 'Dokumen tidak ditemukan');
        }

        return Storage::response($path);
    }
}
