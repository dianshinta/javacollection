<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\perizinan;

class PerizinanController extends Controller
{
    //
    public function store(Request $request)
    {
        $nip = Auth::user()->nip;
        $nama = Auth::user()->name;

        // Validasi data
        $request->validate([
            'nip' => 'required|string',
            'nama' => 'required|string',
            'tanggal' => 'required|date',
            'jenis' => 'required|string',
            'keterangan' => 'required|string',
            'lampiran' => 'nullable|file|max:2000'
        ]);        

        // Cek apakah ada perizinan dengan tanggal yang sama
        $existingPerizinan = perizinan::where('nip', $nip)
                            ->whereDate('tanggal', $request->input('tanggal'))
                            ->exists();

        if ($existingPerizinan) {
            return back()->withErrors(['error' => 'Anda sudah mengajukan izin pada tanggal tersebut.']);
        }

        // Menyimpan data perizinan
        $perizinan = new Perizinan();
        $perizinan->nip = $nip;
        $perizinan->nama = $nama;
        $perizinan->tanggal = $request->input('tanggal');
        $perizinan->jenis = $request->input('jenis');
        $perizinan->keterangan = $request->input('keterangan');
        
        // Jika ada file bukti, proses upload file
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Nama asli file
            $filePath = $file->storeAs('bukti_izin', $fileName, 'public');            
            $perizinan->lampiran = $filePath;
        }

        // Simpan ke database
        $perizinan->save();
        return back()->with('success', 'Data perizinan berhasil disimpan.');
    }

    public function update(Request $request)
    {
        $nip = Auth::user()->nip;

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
            if ($perizinan->lampiran) {
                Storage::disk('public')->delete($perizinan->lampiran);
            }

            // Simpan file lampiran baru
            $file = $request->file('lampiran');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Nama file unik
            $filePath = $file->storeAs('bukti_izin', $fileName, 'public');
            // $file->move(public_path('bukti_izin'), $fileName); // Pindahkan file ke direktori public

            $perizinan->lampiran = $filePath;
        }

        // Simpan perubahan ke database
        $perizinan->save();

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
    }


    public function index(Request $request)
    {
        $nip = Auth::user()->nip;
        $today = date('Y-m-d');

        // Ambil tanggal-tanggal izin yang sudah diajukan
        $existingDates = perizinan::where('nip', $nip)
                        ->pluck('tanggal')  // Ambil hanya kolom tanggal
                        ->toArray();

        // Tanggal-tanggal yang sudah diambil untuk izin (dalam format 'YYYY-MM-DD')
        $existingDates = array_map(function($date) {
            return \Carbon\Carbon::parse($date)->format('Y-m-d');
        }, $existingDates);        
        
        // Mendapatkan tanggal sekarang dan menghitung jumlah izin dalam sebulan
        $currentMonth = \Carbon\Carbon::today()->month;
        $currentYear = \Carbon\Carbon::today()->year;

        $izinTaken = perizinan::where('nip', $nip)
                    ->whereMonth('tanggal', $currentMonth)
                    ->whereYear('tanggal', $currentYear)
                    ->where('jenis', 'Cuti')
                    ->count();

        // Mengambil data perizinan dari database (opsional, tambahkan jika diperlukan)
        $perizinans = perizinan::where('nip', $nip)->orderBy('updated_at', 'desc')
                                ->get();


        $hasPresensiToday = DB::table('kehadiran')
                            ->where('nip', $nip)
                            ->whereDate('tanggal', $today)
                            ->exists(); // Mengecek apakah ada data perizinan untuk tanggal hari ini

        // Tampilkan halaman dengan data perizinan (gunakan view yang sesuai)
        return view('karyawan.perizinan', compact('perizinans', 'izinTaken', 'existingDates', 'hasPresensiToday'))->with('title', 'Perizinan');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');

        $perizinan = perizinan::find($id);

        if ($perizinan) {
            // Hapus file lampiran jika ada
            if ($perizinan->lampiran) {
                Storage::disk('public')->delete($perizinan->lampiran);
            }

            // Hapus data dari database
            $perizinan->delete();

            return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
        }

        return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
    }

}
