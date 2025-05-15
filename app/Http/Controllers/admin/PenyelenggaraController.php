<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AksesModel;
use App\Models\PenyelenggaraModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PenyelenggaraController extends Controller
{
    public function index()
    {
        $no = 1;
        $user = Auth::user();

        if ($user->role === 'admin') {
            $data = PenyelenggaraModel::all();
        } else {
            $data = PenyelenggaraModel::where('id_penyelenggara', $user->id)->get();
        }

        return view('admin.penyelenggara.penyelenggara_view', compact('data', 'no'));
    }

    public function create()
    {
        // Ambil semua id user yang sudah digunakan sebagai penyelenggara
        $sudahDipakai = PenyelenggaraModel::pluck('id_penyelenggara')->toArray();

        // Ambil user dari AksesModel yang belum menjadi penyelenggara
        $users = AksesModel::whereNotIn('id', $sudahDipakai)->get();

        return view('admin.penyelenggara.penyelenggara_create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
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

        $data['id_penyelenggara'] = $request->user_id;

        if ($request->hasFile('logo_penyelenggara')) {
            $data['logo_penyelenggara'] = $request->file('logo_penyelenggara')->store('data_penyelenggara', 'public');
        }

        if ($request->hasFile('dokumen_ktp')) {
            $data['dokumen_ktp'] = $request->file('dokumen_ktp')->store('data_penyelenggara', 'public');
        }

        if ($request->hasFile('dokumen_npwp')) {
            $data['dokumen_npwp'] = $request->file('dokumen_npwp')->store('data_penyelenggara', 'public');
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
            'dokumen_ktp' => 'nullable|mimes:pdf,file,word,jpg,jpeg,png|max:2048',
            'dokumen_npwp' => 'nullable|mimes:pdf,file.word,jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'nama_penyelenggara',
            'alamat_penyelenggara',
            'nohp_penyelenggara',
            'email_penyelenggara',
        ]);

        if ($request->hasFile('logo_penyelenggara')) {
            if ($penyelenggara->logo_penyelenggara) {
                Storage::disk('public')->delete($penyelenggara->logo_penyelenggara);
            }
            $data['logo_penyelenggara'] = $request->file('logo_penyelenggara')->store('data_penyelenggara', 'public');
        } else {
            $data['logo_penyelenggara'] = $penyelenggara->logo_penyelenggara;
        }

        if ($request->hasFile('dokumen_ktp')) {
            if ($penyelenggara->dokumen_ktp) {
                Storage::disk('public')->delete($penyelenggara->dokumen_ktp);
            }
            $data['dokumen_ktp'] = $request->file('dokumen_ktp')->store('data_penyelenggara', 'public');
        } else {
            $data['dokumen_ktp'] = $penyelenggara->dokumen_ktp;
        }

        if ($request->hasFile('dokumen_npwp')) {
            if ($penyelenggara->dokumen_npwp) {
                Storage::disk('public')->delete($penyelenggara->dokumen_npwp);
            }
            $data['dokumen_npwp'] = $request->file('dokumen_npwp')->store('data_penyelenggara', 'public');
        } else {
            $data['dokumen_npwp'] = $penyelenggara->dokumen_npwp;
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
}
