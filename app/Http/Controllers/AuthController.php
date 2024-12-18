<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    
    // Fungsi untuk registrasi
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nip' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'jabatan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Menyimpan data pengguna baru ke database
        $user = User::create([
            'nip' => $request->nip,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jabatan' => $request->jabatan,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }


    // Fungsi untuk login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nip' => ['required'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            // Ambil user yang sedang login
            $user = Auth::user();
    
            // Debugging jika user null
            if (!$user) {
                return back()->withErrors([
                    'login' => 'User tidak ditemukan meskipun kredensial valid.',
                ]);
            }
    
            //$request->session()->regenerate(); // Keamanan tambahan
    
            if ($user->jabatan === 'manajer') {
                return redirect('berandaman');
            } elseif ($user->jabatan === 'karyawan') {
                return redirect('berandakar');
            } elseif ($user->jabatan === 'supervisor') {
                return redirect('berandasup');
            }
    
            // Default redirect jika jabatan tidak dikenali
            return redirect('login');
        }
    
        // Jika login gagal
        return back()->withErrors([
            'nip' => 'NIP atau Kata Sandi salah.',
        ]);
    }
    
    }
