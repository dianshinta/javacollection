<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Http\Controllers\EmployerSalaryController;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmployerSalary extends Model
{
    use HasFactory;

    // protected $table = 'blog_posts'; // mendefinisikan kembali tabel
    // protected $primarykey = 'post_id'; // mendefinisikan kembali primary key
    // protected $fillable = ['name']; // nandain kolom mana aja yang bisa diisi secara manual, selain dari kolom dalam array gaboleh 
    // protected $guarded = ['name']; // nandain kolom mana aja yang gabisa diisi secara manual, selain dari kolom dalam array boleh
    protected $guarded = ['id', 'created_at', 'updated_at', 'total_gaji', 'denda', 'absen'];

    // //menghubungkan dengan model user
    // public function karyawan()
    // {
    //     return $this->belongsTo(User::class, 'user_nip', 'nip');
    // }

    //menghubungkan dengan model karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_nip', 'nip');
    }

    //menghubungkan dengan model presensi
    public function kehadiran()
    {
        return $this->belongsTo(presensi::class, 'karyawan_nip', 'nip');
    }

    //menghubungkan dengan model Bulan 
    public function bulans()
    {
        return $this->belongsTo(Bulan::class, 'karyawan_nip', 'bulan_id');
    }
    
    public function perizinan()
    {
        return $this->belongsTo(perizinan::class, 'karyawan_nip', 'nip');
    }
    
    public function kasbon()
    {
        return $this->belongsTo(perizinan::class, 'karyawan_nip', 'nip');
    }
    //Fungsi menghitung total gaji
    public function calculateTotalGaji()
    {
        $totalGaji = $this->gaji_pokok - $this->kasbon - $this->denda;
        return $totalGaji;
    }

    //fungsi untuk menghitung denda
    public function calculateDenda()
    {
        $hariDalamBulan = now()->daysInMonth;
        $denda = $this->absen * 3 * ($this->gaji_pokok / $hariDalamBulan);
        return $denda;
    }

    // Menghitung kehadiran dari tabel kehadiran berdasarkan status 'hadir' dan 'terlambat'
    public static function calculateHadir(string $user_nip, int $bulan_id): int
    {
        return presensi::where('nip', $user_nip)
            ->where('bulan_id', $bulan_id)
            ->whereIn('status', ['Hadir', 'Terlambat'])
            ->count();
    }

    // Menghitung absen dari tabel kehadiran berdasarkan status 'tidak hadir'
    public static function calculateAbsen(string $user_nip, int $bulan_id): int
    {
        return presensi::where('nip', $user_nip)
            ->where('bulan_id', $bulan_id)
            ->where('status', 'Tidak Hadir')
            ->count();
    }
    
    public static function calculateIzin(string $user_nip, int $bulan_id): int
    {
        return perizinan::where('nip', $user_nip)
            ->where('bulan_id', $bulan_id)
            ->where('status', 'Disetujui')
            ->count();
    }

    public static function calculateKasbon(string $user_nip, int $bulan_id): int
    {
        return kasbon::where('nip', $user_nip)
            ->where('bulan_id', $bulan_id)
            ->value('saldo_akhir') ?? 0; // Nilai default 0 jika tidak ditemukan
    }

    protected static function boot()
    {

        parent::boot();

        // Event `saving` akan dipanggil sebelum data disimpan (baik create atau update)
        static::saving(function ($employerSalary) {
            // Hitung kehadiran dan absen berdasarkan user_nip dan bulan_id
            $employerSalary->hadir = self::calculateHadir($employerSalary->karyawan_nip, $employerSalary->bulan_id);
            $employerSalary->absen = self::calculateAbsen($employerSalary->karyawan_nip, $employerSalary->bulan_id);
            $employerSalary->izin = self::calculateIzin($employerSalary->karyawan_nip, $employerSalary->bulan_id);
            $employerSalary->kasbon = self::calculateKasbon($employerSalary->karyawan_nip, $employerSalary->bulan_id);

            // Hitung denda dan total gaji
            $employerSalary->denda = $employerSalary->calculateDenda();
            $employerSalary->total_gaji = $employerSalary->calculateTotalGaji();
        });
    }
}
