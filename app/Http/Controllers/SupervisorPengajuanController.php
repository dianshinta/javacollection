<?php

namespace App\Http\Controllers;

use App\Models\Kasbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupervisorPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil parameter pencarian 
        $search = $request->input('search');
        
        // Query data pengajuan
        $pengajuan = Kasbon::where('keterangan', 'Pengajuan') // Filter hanya data dengan keterangan "Pengajuan"
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nip', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%");
                });
            })
            ->orderBy('created_at', 'desc') // Urutkan berdasarkan waktu pembuatan terbaru
            ->get();
            
        // Kirim data ke view
        return response()->view('supervisor.pengajuan', [
            "title" => "Pengajuan",
            'pengajuan' => $pengajuan,
        ])->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
}