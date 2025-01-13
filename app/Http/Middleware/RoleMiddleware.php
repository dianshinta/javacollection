<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): mixed
    {
        // Periksa apakah user sudah login
        if (!Auth::check()) {
            return redirect('/login'); // Redirect ke halaman login jika belum login
        }

        // Periksa apakah user memiliki peran yang sesuai
        if (Auth::user()->jabatan !== $role) {
            return redirect('/login'); // Redirect ke login jika role tidak sesuai
        }

        return $next($request); // Lanjutkan request jika role sesuai
        
        // // Periksa apakah user login dan memiliki peran yang sesuai
        // if (Auth::check() && Auth::user()->jabatan === $role) {
        //     return $next($request);
        // }

        // // Redirect ke halaman yang sesuai dengan jabatan user
        // if (Auth::check()) {
        //     $jabatan = Auth::user()->jabatan;

        //     switch ($jabatan) {
        //         case 'manajer':
        //             return redirect()->route('manajer.beranda');
        //         case 'karyawan':
        //             return redirect()->route('karyawan.beranda');
        //         case 'supervisor':
        //             return redirect()->route('supervisor.beranda');
        //         default:
        //             return redirect('/login');
        //     }
        // }

        // // Jika user belum login, redirect ke halaman login
        // return redirect('/login');
    }
}