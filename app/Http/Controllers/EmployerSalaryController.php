<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployerSalary;
use App\Models\Karyawan;
use App\Models\Presensi;
use App\Models\Kasbon;
use App\Models\Bulan;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployerSalaryExport;


class EmployerSalaryController extends Controller
{
    /**
     * Menampilkan daftar gaji.
     */
    public function index(Request $request)
    {
        // Ambil data bulan dari tabel Bulan, diurutkan terbaru ke terlama
        $bulans = Bulan::orderBy('tahun', 'desc')
            ->orderBy('bulan', 'desc')
            ->get();

        // Ambil bulan ID dari dropdown atau default ke bulan saat ini
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $selectedBulan = $request->get('bulan_id', Bulan::where('bulan', $currentMonth)->where('tahun', $currentYear)->value('id'));

        // Inisialisasi query untuk EmployerSalary
        $query = EmployerSalary::with(['karyawan', 'bulans'])
            ->where('bulan_id', $selectedBulan);

        // Tambahkan filter pencarian jika input `search` tersedia
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->whereHas('karyawan', function ($q) use ($searchTerm) {
                $q->where('nama', 'like', '%' . $searchTerm . '%');
            });
        }

        // Ambil data dengan paginasi
        $datas = $query->paginate(20);

        // Kirim data ke view
        return view('/manajer/gajiKaryawan', [
            "title" => "Gaji",
            "datas" => $datas,
            "bulans" => $bulans,
            "selectedBulan" => $selectedBulan,
            "search" => $request->search, // Untuk mempertahankan nilai input pencarian di view
        ]);
    }

    /**
     * Generate automatic EmployerSalary records.
     */
    public static function generateSalaries()
    {
        // Ambil semua nip dari tabel users
        $karyawans = Karyawan::select('nip')->get();

        // Ambil semua id dari tabel bulans
        $bulans = Bulan::select('id')->get();

        $newEntries = [];
        $currentTimestamp = now();

        foreach ($karyawans as $karyawan) {
            foreach ($bulans as $bulan) {
                // Cek apakah data sudah ada
                $exists = EmployerSalary::where('karyawan_nip', $karyawan->nip)
                    ->where('bulan_id', $bulan->id)
                    ->exists();

                if (!$exists) {
                    $newEntries[] = [
                        'karyawan_nip' => $karyawan->nip,
                        'bulan_id' => $bulan->id,
                        'created_at' => $currentTimestamp,
                        'updated_at' => $currentTimestamp,
                    ];
                }
            }
        }

        // Masukkan data baru ke tabel employer_salaries
        if (!empty($newEntries)) {
            EmployerSalary::insert($newEntries);
        }
    }

    //update nama dalam tabel employer salaries
    public function updateInEmployerSalaries()
    {
        // Ambil semua data employer_salaries
        $employerSalaries = EmployerSalary::all();

        foreach ($employerSalaries as $employerSalary) {
            // Cari user berdasarkan user_nip
            $karyawan = Karyawan::where('nip', $employerSalary->karyawan_nip)->first();

            if ($karyawan) {
                // Perbarui kolom nama
                $employerSalary->nama = $karyawan->nama;
                $employerSalary->gaji_pokok = $karyawan->gaji_pokok;
                $employerSalary->save();
            }
        }

        return response()->json(['message' => 'Kolom nama berhasil diperbarui untuk semua data']);
    }

    //MEMPERBARUI STATUS KIRIM GAJI
    public function updateStatus($karyawan_nip, Request $request)
    {
        $bulan_id = $request->input('bulan_id'); // Ambil bulan_id dari request

        Log::info("NIP yang diterima: $karyawan_nip, Bulan ID: $bulan_id");

        // Temukan entitas berdasarkan NIP dan bulan_id
        $employerSalary = EmployerSalary::where('karyawan_nip', $karyawan_nip)
            ->where('bulan_id', $bulan_id)
            ->first();

        if ($employerSalary) {
            Log::info("Data ditemukan: " . json_encode($employerSalary));
            // Perbarui status menjadi "Telah Dikirim"
            $employerSalary->status = 'Telah Dikirim';
            $employerSalary->save();

            return response()->json(['message' => 'Status berhasil diperbarui'], 200);
        }

        Log::warning("Data tidak ditemukan untuk NIP: $karyawan_nip dan Bulan ID: $bulan_id");
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }

    public function getStatus(Request $request)
    {
        $rowId = $request->input('row_id'); // Ambil ID baris dari permintaan
        $status = EmployerSalary::find($rowId)->status; // Ambil status dari database
        return response()->json(['status' => $status]);
    }

    public function exportExcel(Request $request)
    {
        // Ambil bulan_id dari request
        $bulan_id = $request->get('bulan_id');

        // Validasi bulan_id
        if (!$bulan_id || !Bulan::find($bulan_id)) {
            return redirect()->route('manajer.gaji')->withErrors('Bulan tidak valid.');
        }

        // Ekspor file Excel
        return Excel::download(new EmployerSalaryExport($bulan_id), 'employer_salaries.xlsx');
    }
}
