<?php

namespace App\Http\Controllers;

use App\Models\Login; // Change back to Login model
use App\Models\User; // Change back to Login model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Menampilkan form registrasi.
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Handle proses registrasi.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required|string|max:15',
        ]);
        
        
        // Hash password
        $validated['password'] = Hash::make($validated['password']);
        
        // Buat user baru menggunakan model Login
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $validated['password'],
            'phone' => $request-> phone,
        ]);




        Login::create($validated);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()
            ->route('login')
            ->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
