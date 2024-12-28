<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\perizinan;

class supervisorPerizinanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil parameter pencarian 
        $search = $request->input('search');
        
        // Query data perizinan dengan filter pencarian
        if (strlen($search)){
            $perizinan = Perizinan::when($search, function ($query, $search){
                $query -> where('nama', 'like',"%{$search}%")
                       -> orWhere('nip','like',"%{$search}%")
                       -> orWhere('tanggal','like',"%{$search}%")
                       -> orWhere('status','like',"%{$search}%");
            })
            ->orderBy('updated_at', 'desc') // Urutkan berdasarkan waktu pembaruan terbaru
            ->orderBy('created_at', 'desc') // Jika waktu pembaruan sama, urutkan berdasarkan waktu pembuatan
            ->get();
        } else {
            // Ambil data perizinan dari database
            $perizinan = Perizinan::orderBy('created_at', 'desc') // Urutkan berdasarkan waktu pembaruan terbaru
            -> orderBy('updated_at', 'desc') // Jika waktu pembaruan sama, urutkan berdasarkan waktu pembuatan
            ->get();
        }
        
        // Kirim data ke view
        return view('supervisor.perizinan', [
            "title" => "Perizinan",
            'perizinan' => $perizinan,
        ]);
    }

    public function updateStatus(Request $request)
    {
        //Tambahkan
        \Log::info($request->all()); // Tambahkan ini untuk memeriksa data yang diterima
        
        // Validasi data yang diterima
        $request->validate([
            'id' => 'required|string',
            'status' => 'required|in:Disetujui,Ditolak',
        ]);

        // Cek apakah data valid //Tambahkan
        \Log::info("Validasi berhasil.");
        
        // Cari data perizinan berdasarkan id
        $perizinan = Perizinan::find($request->id);
        if (!$perizinan){
            \Log::error("Perizinan tidak ditemukan untuk id: " . $request->id);
            return response()->json(['message' => 'Data perizinan tidak ditemukan'], 404);
        }

        \Log::info("Perizinan ditemukan: " . json_encode($perizinan)); // Log data perizinan sebelum update
        //tambahkan 
        \Log::info("Data sebelum disimpan: " . json_encode($perizinan));

        // Cek apakah status saat ini "Diproses"
        if ($perizinan->status !== 'Diproses') {
            \Log::warning("Perubahan status hanya bisa dilakukan jika status saat ini adalah 'Diproses'. Status saat ini: " . $perizinan->status); // Log jika status bukan "Diproses"
            return response()->json(['message' => 'Status sudah pernah disetujui/ditolak'], 403);
        }

        // Update status
        $perizinan->status = $request->status;
        // $perizinan->save();
        // return response()->json(['message' => 'Status berhasil diperbarui']);
        
        //Tambahkan
        try {
            $perizinan->save(); // Simpan data
            \Log::info("Data setelah disimpan: " . json_encode($perizinan));
            \Log::info("Status berhasil diperbarui untuk id: {$request->id}"); // Log jika berhasil menyimpan
            return response()->json(['message' => 'Status berhasil diperbarui']);
        } catch (\Exception $e) {
            \Log::error("Gagal menyimpan status untuk ID: {$request->id}. Error: " . $e->getMessage()); // Log error jika save gagal
            return response()->json(['message' => 'Gagal memperbarui status'], 500);
        }

        // Tambahkan 
        \Log::info("Data setelah disimpan: " . json_encode($perizinan));

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}