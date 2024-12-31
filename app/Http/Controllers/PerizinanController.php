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
            'jenis' => 'required|string',
            'keterangan' => 'required|string',
            'lampiran' => 'nullable|file|max:2000'
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
        return back()->with('success', 'Data perizinan berhasil disimpan.');
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
        
        // Perbarui data
        $perizinan->tanggal = $validated['tanggal'];
        $perizinan->jenis = $validated['jenis'];
        $perizinan->keterangan = $validated['keterangan'];

        // Jika ada file lampiran baru
        if ($request->hasFile('lampiran')) {
            // Hapus file lama jika ada
            if ($perizinan->lampiran && file_exists(public_path('bukti_izin/' . $perizinan->lampiran))) {
                unlink(public_path('bukti_izin/' . $perizinan->lampiran));
            }

            // Simpan file lampiran baru
            $file = $request->file('lampiran');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Nama file unik
            $filePath = $file->storeAs('bukti_izin', $fileName, 'public');
            $file->move(public_path('bukti_izin'), $fileName); // Pindahkan file ke direktori public

            $perizinan->lampiran = $filePath;
        }

        // Simpan perubahan ke database
        $perizinan->save();

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
    }


    public function index()
    {
        // Mengambil data perizinan dari database (opsional, tambahkan jika diperlukan)
        $perizinans = perizinan::all(); // Ambil semua data perizinan

        $perizinans = perizinan::orderBy('updated_at', 'desc')
                                ->get();
        // Tampilkan halaman dengan data perizinan (gunakan view yang sesuai)
        return view('karyawan.perizinan', compact('perizinans'));
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');

        $perizinan = perizinan::find($id);

        if ($perizinan) {
            // Hapus file lampiran jika ada
            if ($perizinan->lampiran && file_exists(public_path('storage/' . $perizinan->lampiran))) {
                unlink(public_path('bukti_izin/' . $perizinan->lampiran));
            }

            // Hapus data dari database
            $perizinan->delete();

            return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
        }

        return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
    }

}
