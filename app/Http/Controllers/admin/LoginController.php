<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AksesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        // Cari user berdasarkan name
        $user = AksesModel::where('name', $request->name)->first();

        if (!$user) {
            return redirect('/login')->withErrors(['error' => 'Nama tidak ditemukan'])->withInput();
        }

        // Cek password
        if (!Hash::check($request->password, $user->password)) {
            return redirect('/login')->withErrors(['error' => 'Password salah'])->withInput();
        }

        Auth::login($user);

        return redirect('/home'); // Atau sesuaikan dengan peran (role)
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
