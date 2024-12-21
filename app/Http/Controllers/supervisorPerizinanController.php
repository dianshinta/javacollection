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
                       -> orWhere('status','like',"%{$search}%");
            })
            ->orderBy('updated_at', 'desc') // Urutkan berdasarkan waktu pembaruan terbaru
            ->orderBy('created_at', 'desc') // Jika waktu pembaruan sama, urutkan berdasarkan waktu pembuatan
            ->get();
        } else {
            // Ambil data perizinan dari database
            $perizinan = Perizinan::orderBy('updated_at', 'desc') // Urutkan berdasarkan waktu pembaruan terbaru
            -> orderBy('created_at', 'desc') // Jika waktu pembaruan sama, urutkan berdasarkan waktu pembuatan
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
        // Validasi data yang diterima
        $request->validate([
            'nip' => 'required|string',
            'status' => 'required|in:Disetujui,Ditolak',
        ]);

        // Cari data perizinan berdasarkan NIP
        $perizinan = Perizinan::where('nip', $request->nip)->first();
        if (!$perizinan){
            return response()->json(['message' => 'Data perizinan tidak ditemukan'], 404);
        }

        // Cek apakah status saat ini "Diproses"
        if ($perizinan->status !== 'Diproses') {
            return response()->json(['message' => 'Perubahan status hanya bisa dilakukan jika status saat ini adalah "Diproses".'], 403);
        }

        // Update status
        $perizinan->status = $request->status;
        $perizinan->save();
        return response()->json(['message' => 'Status berhasil diperbarui']);
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
        $request->validate([
            'nip' => 'required|string',
            'nama' => 'required|string',
            'tanggal' => 'required|date',
            'jenis' => 'required|string',
            'keterangan' => 'required|string',
            'status' => 'required|string',
            'lampiran' => 'required|file|mimes:png|max:2048', // Validasi PNG
        ]);

        // Simpan file lampiran
        $filePath = $request->file('lampiran')->store('lampiran', 'public');
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