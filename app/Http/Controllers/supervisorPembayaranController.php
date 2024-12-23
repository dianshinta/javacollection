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
                       -> orWhere('saldo_akhir','like',"%{$search}%")
                       -> orWhere('status','like',"%{$search}%");
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
        return view('supervisor.pembayaran', [
            "title" => "Pembayaran",
            'pembayaran' => $pembayaran,
        ]);
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