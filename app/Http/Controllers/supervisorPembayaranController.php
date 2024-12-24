<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kasbon;

class supervisorPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil parameter pencarian 
        $search = $request->input('search');
        
        // Query data pembayaran dengan filter pencarian
        if (strlen($search)){
            $pembayaran = Kasbon::when($search, function ($query, $search){
                $query -> where('nip', 'like',"%{$search}%")
                       -> orWhere('nama','like',"%{$search}%")
                       -> orWhere('tanggal_pembayaran','like',"%{$search}%")
                       -> orWhere('nominal_dibayar','like',"%{$search}%")
                       -> orWhere('status_kasbon','like',"%{$search}%")
                       -> orWhere('status_bayar','like',"%{$search}%");
            })
            ->orderBy('updated_at', 'desc') // Urutkan berdasarkan waktu pembaruan terbaru
            ->orderBy('created_at', 'desc') // Jika waktu pembaruan sama, urutkan berdasarkan waktu pembuatan
            ->get();
        } else {
            // Ambil data pembayaran dari database
            $pembayaran = Kasbon::orderBy('created_at', 'desc') // Urutkan berdasarkan waktu pembaruan terbaru
                -> orderBy('updated_at', 'desc') // Jika waktu pembaruan sama, urutkan berdasarkan waktu pembuatan
                ->get();
        }
            
        // Kirim data ke view
        return response()->view('supervisor.pembayaran', [
            "title" => "Pembayaran",
            'pembayaran' => $pembayaran,
        ])->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        
        // return view('supervisor.pembayaran', [
        //     "title" => "Pembayaran",
        //     'pembayaran' => $pembayaran,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nip)
    {   
        // Validasi input
        $request->validate([
            'action' => 'required|in:terima,tolak', // Action bisa 'accept' atau 'reject'
        ]);
    
        // Cari kasbon berdasarkan NIP
        $kasbon = Kasbon::where('nip', $nip)->firstOrFail();
        // if (!$kasbon){
        //     return response()->json(['message' => 'A Data pembayaran tidak ditemukan'], 404);
        // }

        // Cek jika status_bayar sudah bukan "Diproses"
        if ($kasbon->status_bayar !== 'Diproses') {
            return response()->json([
                'message' => 'Status sudah pernah disetujui/ditolak',
            ], 403);
        }
        
        
        // Update Database
        if ($request->action === 'terima') {
            // Kurangi saldo akhir dengan nominal pembayaran
            $kasbon->saldo_akhir -= $kasbon->nominal_dibayar;
            // Perbarui status berdasarkan saldo akhir
            $kasbon->status_kasbon = $kasbon->saldo_akhir <= 0 ? 'Lunas' : 'Belum Lunas';
            // Perbarui status bayar menjadi "Diterima"
            $kasbon->status_bayar = 'Diterima';
        } elseif ($request->action === "tolak"){
            // Tidak ada perubahan pada saldo akhir atau status kasbon
            $kasbon->status_bayar = 'Ditolak';
        }
        // Simpan perubahan
        $kasbon->save();
            
        return response()->json([
            'message' => 'A Pembayaran berhasil diperbarui!',
            'status_bayar' => $kasbon->status_bayar,
            'status_kasbon' => $kasbon->status_kasbon,
            'saldo_akhir' => $kasbon->saldo_akhir,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}