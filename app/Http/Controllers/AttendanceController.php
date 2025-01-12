<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Toko;
use App\Models\presensi;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {   
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

        /*$user = $request->user();

        if ($user->role === 'manager') {
            $attendances = presensi::with(['user', 'branch'])->get();
        } elseif ($user->role === 'supervisor') {
            $attendances = presensi::with(['user', 'branch'])
                ->whereIn('branch_id', $user->supervisedBranches->pluck('id'))
                ->get();
        } else {
            $attendances = presensi::with(['user', 'branch'])
                ->where('user_id', $user->id)
                ->get();
        }*/

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
}
