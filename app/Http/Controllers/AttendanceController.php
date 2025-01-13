<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Toko;
use App\Models\presensi;
use App\Models\CabangSupervisor;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        // Pastikan $result diinisialisasi
        $result = [];

        if ($user->jabatan === 'manajer') {
            $attendances = presensi::with(['toko:id,name'])
                ->get(['toko_id'])
                ->unique('toko_id')
                ->values(); // Untuk mereset indeks setelah penghapusan duplikasi

            $result = $attendances->map(function ($attendance) {
                return [
                    'toko_id' => $attendance->toko_id,
                    'nama' => $attendance->toko->name, // Ambil nama toko
                ];
            });
        } elseif ($user->jabatan === 'supervisor') {
            $attendances = CabangSupervisor::where('nip', $user->nip)
                ->with('toko') // Memuat relasi toko
                ->get();

            // Transformasi data untuk memasukkan nama cabang
            $result = $attendances->map(function ($attendance) {
                return [
                    'toko_id' => $attendance->toko_id,
                    'nama' => $attendance->toko ? $attendance->toko->name : null, // Nama cabang dari tabel `Toko`
                ];
            });
        } elseif ($user->jabatan === 'karyawan') {
            $attendances = presensi::where('nip', $user->nip)->get();

            $result = $attendances->map(function ($attendance) {
                return [
                    'tanggal' => $attendance->tanggal,
                    'status' => $attendance->status,
                ];
            });
        }

        // Return JSON response
        return response()->json($result);
    }

    public function getChartData(Request $request){
        $namaCabang = $request->query('toko'); // Nama cabang dari query parameter
        $now = Carbon::now();

        // Cari toko_id berdasarkan nama cabang
        $toko = Toko::where('name', $namaCabang)->value('id');

        if (!$toko) {
            return response()->json([
                'message' => 'Cabang tidak ditemukan.',
            ], 404);
        }

        // Filter data mingguan untuk barChart
        $weeklyData = Presensi::where('toko_id', $toko)
            ->whereDate('tanggal', '>=', $now->subDays(7)->toDateString()) // Tanggal minimal
            ->whereDate('tanggal', '<=', Carbon::now()->toDateString()) // Tanggal maksimal
            ->orderBy('tanggal', 'asc')
            ->get(['nip', 'toko_id', 'status', 'tanggal']);

        // Filter data bulanan untuk doughnutChart
        $monthlyData = Presensi::where('toko_id', $toko)
            ->whereYear('tanggal', $now->year)
            ->whereMonth('tanggal', $now->month) // Bulan ini
            ->get(['nip', 'toko_id', 'status', 'tanggal']);

        // Output JSON sesuai format yang diinginkan
        return response()->json([
            'weeklyData' => $weeklyData->map(function ($item) {
                return [
                    'nip' => $item->nip,
                    'toko_id' => $item->toko_id,
                    'status' => $item->status,
                    'tanggal' => $item->tanggal, // Format tanggal
                ];
            }),
            'monthlyData' => $monthlyData->map(function ($item) {
                return [
                    'nip' => $item->nip,
                    'toko_id' => $item->toko_id,
                    'status' => $item->status,
                    'tanggal' => $item->tanggal, // Format tanggal
                ];
            }),
        ]);
    }

    public function getRiwayatData(Request $request)
    {
        $namaCabang = $request->query('toko'); // Nama cabang dari query parameter
        $startOfDay = Carbon::now()->startOfDay(); // Mendapatkan waktu pukul 00:00:00 hari ini
        $now = Carbon::now();

        // Cari toko_id berdasarkan nama cabang
        $toko = Toko::where('name', $namaCabang)->value('id');

        if (!$toko) {
            return response()->json([
                'message' => 'Cabang tidak ditemukan.',
            ], 404);
        }

        // Filter data mingguan untuk barChart
        $riwayatData = Presensi::with('karyawans:nip,nama') // Pastikan relasi 'karyawans' benar
            ->where('toko_id', $toko)
            ->whereBetween('waktu', [$startOfDay, $now]) // Filter waktu dari 00:00:00 hingga saat ini
            ->orderBy('waktu', 'asc')
            ->get(['nip', 'status', 'waktu']); // Pastikan atribut sesuai tabel

        // Output JSON sesuai format yang diinginkan
        return response()->json([
            $riwayatData->map(function ($item) {
                return [
                    'nama' => $item->karyawans->nama ?? '-', // Mengambil nama dari relasi
                    'status' => $item->status,
                    'waktu' => $item->waktu, // Format waktu jika diperlukan
                ];
            }),
        ]);
    }
}
