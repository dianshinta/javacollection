<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Events\UserCreated;


class AuthController extends Controller
{
    // Fungsi untuk registrasi
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nip' => 'required|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'jabatan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                         ->withErrors($validator)
                         ->withInput();
        }

        // Menyimpan data pengguna baru ke database
        $user = User::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jabatan' => $request->jabatan,
        ]);

        // Jika jabatan adalah karyawan, tambahkan data ke tabel karyawans
        if ($user->jabatan === 'karyawan') {
            if (!Karyawan::where('nip', $user->nip)->exists()) {
                Karyawan::create([
                    'nip' => $user->nip,
                    'nama' => $user->name,
                    'jabatan' => $user->jabatan,
                    'tempat_lahir' => null,
                    'tanggal_lahir' => null,
                    'gender' => null,
                    'toko_id' => null,
                    'alamat' => null,
                    'no_telp' => null,
                    'bank' => null,
                    'no_rek' => null,
                    'gaji_pokok' => null,
                ]);
            }
        }

        


        // Dispatch event jika diperlukan
        UserCreated::dispatch($user);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
    
public function showRegisterForm()
{
    return view('auth.register'); // Pastikan path view sesuai
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

            // Regenerasi session untuk keamanan tambahan
            $request->session()->regenerate();

            // Simpan data user ke session
            $request->session()->put('id', $user->id);
            $request->session()->put('jabatan', $user->jabatan);

            // Redirect berdasarkan jabatan
            if ($user->jabatan === 'manajer') {
                return redirect('manajer/beranda');
            } elseif ($user->jabatan === 'karyawan') {
                return redirect('karyawan/beranda');
            } elseif ($user->jabatan === 'supervisor') {
                return redirect('supervisor/beranda');
            }

            // Default redirect jika jabatan tidak dikenali
            return redirect('login');
        }

        // Jika login gagal
        return back()->withErrors([
            'nip' => 'NIP atau Kata Sandi salah.',
        ]);
    }

    //logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda berhasil logout.');
    }
}
