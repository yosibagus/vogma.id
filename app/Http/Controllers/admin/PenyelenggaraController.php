<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AksesModel;
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

        // Simpan logo ke folder public
        if ($request->hasFile('logo_penyelenggara')) {
            $data['logo_penyelenggara'] = $request->file('logo_penyelenggara')->store('uploads/logo_penyelenggara', 'public');
        }

        // Simpan dokumen ke folder private
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

        // Logo (public)
        if ($request->hasFile('logo_penyelenggara')) {
            if ($penyelenggara->logo_penyelenggara) {
                Storage::disk('public/upload')->delete($penyelenggara->logo_penyelenggara);
            }
            $data['logo_penyelenggara'] = $request->file('logo_penyelenggara')->store('logo_penyelenggara', 'public');
        }

        // Dokumen KTP (private)
        if ($request->hasFile('dokumen_ktp')) {
            if ($penyelenggara->dokumen_ktp) {
                Storage::delete($penyelenggara->dokumen_ktp); // disk default (private)
            }
            $data['dokumen_ktp'] = $request->file('dokumen_ktp')->store('dokumen/ktp');
        }

        // Dokumen NPWP (private)
        if ($request->hasFile('dokumen_npwp')) {
            if ($penyelenggara->dokumen_npwp) {
                Storage::delete($penyelenggara->dokumen_npwp); // disk default (private)
            }
            $data['dokumen_npwp'] = $request->file('dokumen_npwp')->store('dokumen/npwp');
        }

        $penyelenggara->update($data);

        return redirect()->route('penyelenggara.index')->with('success', 'Data berhasil diperbarui');
    }


    public function delete($id)
    {
        $penyelenggara = PenyelenggaraModel::findOrFail($id);

        if ($penyelenggara->logo_penyelenggara) {
            Storage::disk('public')->delete($penyelenggara->logo_penyelenggara);
        }

        if ($penyelenggara->dokumen_ktp) {
            Storage::disk('public')->delete($penyelenggara->dokumen_ktp);
        }

        if ($penyelenggara->dokumen_npwp) {
            Storage::disk('public')->delete($penyelenggara->dokumen_npwp);
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

        return Storage::response($path); // Atau: return Storage::response($path); untuk tampil di browser
    }
}
