<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function proses(Request $request) {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:50',
            'email' => 'required|email|max:30|unique:identities,email',
            'pw' => 'required',
            'pw2' => 'required|same:pw',
        ]);

        try {
            // Simpan data login ke dalam database
            $identity = new Identity();
            $identity->name = $request->nama;
            $identity->email = $request->email;
            $identity->password = Hash::make($request->pw);
            $identity->save();
        
            // Redirect ke halaman beranda setelah pendaftaran berhasil
            return redirect()->route("beranda");
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan. Mohon coba lagi.']);
        }
        
    }
}