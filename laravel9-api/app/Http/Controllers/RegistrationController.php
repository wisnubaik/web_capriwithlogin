<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Register;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:registers',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat pengguna baru
        Register::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        return redirect('/beranda')->with('success', 'Registrasi berhasil!');
    }
}
