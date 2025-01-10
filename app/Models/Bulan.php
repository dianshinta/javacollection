<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmployerSalary;

class Bulan extends Model
{
    use HasFactory;

    protected $table = 'bulans';

    protected $fillable = ['bulan', 'tahun'];

    //menghubungkan dengan model Employer Salaries melalui tabel pivot
    public function employerSalaries()
    {
        return $this->belongsTo(EmployerSalary::class, 'user_nip', 'bulan_id');
    }

    public function kehadiran()
    {
        return $this->hasMany(Presensi::class, 'bulan_id');
    }

    public function kasbon()
    {
        return $this->hasMany(Kasbon::class, 'bulan_id');
    }

    public function perizinan()
    {
        return $this->hasMany(Perizinan::class, 'bulan_id');
    }

    // Fungsi Menambahkan Bulan Baru Menggunakan Parameter $tanggal
    public static function tambahBulanBaru($tanggal): Bulan
    {
        $date = \Carbon\Carbon::parse($tanggal); // Ubah tanggal menjadi objek Carbon
        $bulan = $date->month;
        $tahun = $date->year;

        // Cek apakah bulan dan tahun sudah ada
        return self::firstOrCreate(['bulan' => $bulan, 'tahun' => $tahun]);
    }

    //Fungsi Membaca dan Menambahkan Bulan dari Tabel Lain Secara Otomatis
    public static function sinkronisasiBulan(): void
    {
        $tables = [
            'Presensi' => Presensi::class,
            'Kasbon' => Kasbon::class,
            'Perizinan' => Perizinan::class,
            'EmployerSalary' => EmployerSalary::class,
        ];

        foreach ($tables as $modelName => $modelClass) {
            $dates = $modelClass::selectRaw('DATE_FORMAT(tanggal, "%Y-%m-01") as bulan_tahun')
                ->groupBy('bulan_tahun')
                ->get()
                ->pluck('bulan_tahun');

            foreach ($dates as $date) {
                self::tambahBulanBaru($date);
            }
        }
    }
}
