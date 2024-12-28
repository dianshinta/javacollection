<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chart;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function getChartData(Request $request)
    {
        $toko = $request->query('toko'); // Mendapatkan toko dari query parameter
        $now = Carbon::now();

        // Filter data mingguan untuk barChart
        $weeklyData = Chart::where('idtoko', $toko)
            ->where('created_at', '>=', $now->subDays(7)) // Satu minggu terakhir
            ->orderBy('created_at', 'desc')
            ->get(['day', 'hadir', 'izin', 'terlambat', 'tanpaketerangan', 'created_at']);

        // Filter data bulanan untuk doughnutChart
        $monthlyData = Chart::where('idtoko', $toko)
            ->whereYear('created_at', $now->year)
            ->whereMonth('created_at', $now->month) // Bulan ini
            ->get(['hadir', 'izin', 'terlambat', 'tanpaketerangan', 'created_at']);

        return response()->json([
            'weeklyData' => $weeklyData,
            'monthlyData' => $monthlyData,
        ]);
    }
}