<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmployerSalary;
use Carbon\Carbon;

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

        // Tambahkan data baru dengan bulan_tahun dalam format "Januari 2025"
        return self::firstOrCreate(
            ['bulan' => $bulan, 'tahun' => $tahun],
            ['bulan_tahun' => $date->translatedFormat('F Y')] // Format nama bulan dan tahun
        );
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

     // Accessor untuk mengecek apakah bulan ini adalah bulan aktif
     public function getIsCurrentMonthAttribute(): bool
     {
         $currentMonth = Carbon::now()->month;
         $currentYear = Carbon::now()->year;
 
         return $this->bulan == $currentMonth && $this->tahun == $currentYear;
     }

    // Event saving untuk memastikan bulan_tahun terisi dalam format yang benar
    protected static function booted()
    {
        static::saving(function ($bulan) {
            $bulan->bulan_tahun = Carbon::createFromDate($bulan->tahun, $bulan->bulan, 1)->translatedFormat('F Y');
        });
    }
}
