<?php

namespace App\Http\Controllers;

use App\Models\kasbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupervisorPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil user yang sedang login
        $user = auth()->user();
    
        // Ambil cabang yang diawasi oleh supervisor
        $supervisedBranches = $user->supervisedBranches->pluck('id')->toArray();

        // Ambil parameter pencarian 
        $search = $request->input('search');
        
        // Query data pengajuan kasbon
        if (strlen($search)){
            $pengajuan = kasbon::whereHas('karyawan', function ($query) use ($supervisedBranches){
                // Filter berdasarkan cabang yang diawasi
                $query->whereIn('toko_id', $supervisedBranches);
            })
            ->where('keterangan', 'Pengajuan') // Filter hanya data dengan keterangan "Pengajuan"
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nip', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%")
                    ->orWhere('tanggal_pengajuan', 'like', "%{$search}%");
                });
            })
            ->orderBy('updated_at', 'desc') 
            ->orderBy('created_at', 'desc')
            ->paginate(20); 
        } else {
            // Jika tidak ada input pencarian, ambil semua data dengan filter keterangan "Pembayaran"
            $pengajuan = kasbon::whereHas('karyawan', function ($query) use ($supervisedBranches){
                // Filter berdasarkan cabang yang diawasi
                $query->whereIn('toko_id', $supervisedBranches);
            })
            ->where('keterangan', 'Pengajuan') 
            ->orderBy('updated_at', 'desc') 
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        }

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