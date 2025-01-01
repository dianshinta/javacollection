<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Http\Controllers\EmployerSalaryController;

class EmployerSalary extends Model
{
    use HasFactory;

    // protected $table = 'blog_posts'; // mendefinisikan kembali tabel
    // protected $primarykey = 'post_id'; // mendefinisikan kembali primary key
    // protected $fillable = ['name']; // nandain kolom mana aja yang bisa diisi secara manual, selain dari kolom dalam array gaboleh 
    // protected $guarded = ['name']; // nandain kolom mana aja yang gabisa diisi secara manual, selain dari kolom dalam array boleh
    protected $guarded = ['id', 'created_at', 'updated_at', 'total_gaji', 'denda'];

    //Fungsi menghitung total gaji
    public function calculateTotalGaji()
    {
        $totalGaji = $this->gaji_pokok - $this->kasbon - $this->denda;
        return $totalGaji;
    }
    public function calculateDenda()
    {
        // $hariDalamBulan = now()->daysInMonth;
        // $denda = ($hariDalamBulan - $kehadiran - $izin) * 3 * $user->gajiPokok;
        $hariDalamBulan = now()->daysInMonth;
        $denda = ($hariDalamBulan - $this->kehadiran - $this->izin) * 3 * $this->gaji_pokok;
        return $denda;
    }


    protected static function boot()
    {
        parent::boot();

        // Event `saving` akan dipanggil sebelum data disimpan (baik create atau update)
        static::saving(function ($employerSalary) {
            // Hitung total gaji
            $employerSalary->denda = $employerSalary->calculateDenda();
            $employerSalary->total_gaji = $employerSalary->calculateTotalGaji();
        });
    }

    // /**
    //  * Relasi ke tabel User (One-to-One).
    //  */
    // public function user(): HasOne
    // {
    //     return $this->hasOne(User::class, 'nip');
    // }

    // /**
    //  * Relasi ke tabel Kasbon (One-to-One).
    //  */
    // public function kasbon(): HasOne
    // {
    //     return $this->hasOne(kasbon::class, 'id');
    // }

    // /**
    //  * Relasi ke tabel Presensi (One-to-Many).
    //  */
    // public function presensi()
    // {
    //     return $this->hasOne(presensi::class);
    // }
}
