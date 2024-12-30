<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasbon;

class supervisorPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil parameter pencarian 
        $search = $request->input('search');
        
        // Query data pembayaran 
        if (strlen($search)){
            $pembayaran = Kasbon::where('keterangan', 'Pembayaran')
                                ->when($search, function ($query, $search) {
                                    $query->where('nip', 'like', "%{$search}%")
                                        ->orWhere('nama', 'like', "%{$search}%")
                                        ->orWhere('tanggal_pembayaran', 'like', "%{$search}%")
                                        ->orWhere('nominal_dibayar','like',"%{$search}%")
                                        ->orWhere('status_kasbon', 'like', "%{$search}%")
                                        ->orWhere('status_bayar', 'like', "%{$search}%")
                                        ->orWhere('saldo_akhir', 'like', "%{$search}%");
                                })
                                ->orderBy('updated_at', 'desc')
                                ->orderBy('updated_at', 'desc')
                                ->get();
        } else {
            // Ambil data pembayaran dari database dengan filter keterangan
            $pembayaran = Kasbon::where('keterangan', 'Pembayaran') // Filter keterangan "Pembayaran"
                                ->orderBy('updated_at', 'desc') // Urutkan berdasarkan pembaruan terbaru
                                ->orderBy('created_at', 'desc') // Urutkan berdasarkan waktu pembuatan jika sama
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
    public function update(Request $request, $id)
    {   
        // Validasi input
        $request->validate([
            'action' => 'required|in:terima,tolak', 
        ]);

        \Log::info('Proses Pembayaran Kasbon:', [
            'id' => $id,
            'action' => $request->action,
        ]);
    
        // Cari kasbon berdasarkan ID dengan keterangan "Pembayaran"
        $kasbon = Kasbon::where('id', $id)
                        ->where('keterangan', 'Pembayaran')
                        ->firstOrFail();

        // Cek jika status_bayar sudah bukan "Diproses"
        if ($kasbon->status_bayar !== 'Diproses') {
            return response()->json([
                'message' => 'Status sudah pernah disetujui/ditolak',
            ], 403);
        }

        // Ambil saldo kasbon berdasarkan NIP
        $kasbonSaldo = Kasbon::where('nip', $kasbon->nip)
                             ->latest('updated_at')
                             ->first();

        // if (!$kasbonByNIP) {
        //     return response()->json([
        //         'message' => 'Data kasbon tidak ditemukan untuk NIP terkait',
        //     ], 404);
        // }
        
        // Update Database
        if ($request->action === 'terima') {
            // Tambahkan nominal pembayaran ke saldo_akhir
            $kasbonSaldo->saldo_akhir += $kasbon->nominal_dibayar;
            // Perbarui saldo_akhir pada kasbon terbaru
            $kasbon->saldo_akhir = $kasbonSaldo->saldo_akhir;
            // Perbarui status berdasarkan saldo akhir
            $kasbonSaldo->status_kasbon = $kasbonSaldo->saldo_akhir < 2000000 ? 'Belum Lunas' : 'Lunas';
            // Perbarui status bayar menjadi "Disetujui"
            $kasbon->status_bayar = 'Disetujui';
            // Simpan perubahan saldo pada kasbon terkait NIP
            $kasbonSaldo->save();
        } elseif ($request->action === "tolak"){
            // Perbarui status bayar menjadi "Ditolak" tanpa mengubah saldo
            $kasbon->status_bayar = 'Ditolak';
        }
        // Simpan perubahan
        $kasbon->save();
            
        return response()->json([
            'message' => 'Pembayaran berhasil diperbarui!',
            'status_bayar' => $kasbon->status_bayar,
            'status_kasbon' => $kasbonSaldo->status_kasbon,
            'saldo_akhir' => $kasbonSaldo->saldo_akhir,
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