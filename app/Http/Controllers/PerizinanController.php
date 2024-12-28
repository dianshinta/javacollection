<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\perizinan;

class PerizinanController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nip' => 'required|string',
            'nama' => 'required|string',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
        ]);        

        // Menyimpan data perizinan
        $perizinan = new Perizinan();
        $perizinan->nip = $request->input('nip');
        $perizinan->nama = $request->input('nama');
        $perizinan->tanggal = $request->input('tanggal');
        $perizinan->jenis = $request->input('jenis');
        $perizinan->keterangan = $request->input('keterangan');
        
        // Jika ada file bukti, proses upload file
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filePath = $file->store('bukti_izin', 'public');
            $perizinan->lampiran = $filePath;
        }

        // Simpan ke database
        $perizinan->save();
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:perizinan,id',
            'tanggal' => 'required|date',
            'jenis' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        $perizinan = perizinan::find($validated['id']);
        $perizinan->update($validated);

        return response()->json(['success' => true]);
    }


    public function index()
    {
        // Mengambil data perizinan dari database (opsional, tambahkan jika diperlukan)
        $perizinans = perizinan::all(); // Ambil semua data perizinan

        // Tampilkan halaman dengan data perizinan (gunakan view yang sesuai)
        return view('karyawan.perizinan', compact('perizinans'));
    }
}
