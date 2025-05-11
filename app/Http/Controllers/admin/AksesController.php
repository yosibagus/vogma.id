<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AksesModel;
use Illuminate\Http\Request;

class AksesController extends Controller
{
    public function index()
    {
        $akun = AksesModel::where('id', '!=', 11)->get();
        $no = 1;
        return view('admin.akses_operator.akses_view', compact('akun', 'no'));
    }
    public function create()
    {
        return view('admin.akses_operator.akses_create');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,

        ];
        AksesModel::create($data);
        return redirect('/akses')->with('Data Akses Berhasil Disimpan');
    }


    public function edit($id)
    {
        $akun = AksesModel::where('id', $id)->first();
        return view('admin.akses_operator.akses_edit', compact('akun'));
    }

    public function update($id, Request $request)
{

    $akun = AksesModel::findOrFail($id);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->filled('password') ? bcrypt($request->password) : $akun->password,
        'role' => $request->filled('role') ? $request->role : $akun->role,
    ];

    $akun->update($data);

    return redirect('akses')->with('success', 'Akses berhasil diperbaharui');
}


    public function delete($id)
    {
        AksesModel::where('id', $id)->delete();
        return redirect('akses')->with('success', 'Akses Berhasil di Hapus');
    }
}
