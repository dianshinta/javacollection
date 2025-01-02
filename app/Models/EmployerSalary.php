<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Http\Controllers\EmployerSalaryController;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployerSalary extends Model
{
    use HasFactory;

    // protected $table = 'blog_posts'; // mendefinisikan kembali tabel
    // protected $primarykey = 'post_id'; // mendefinisikan kembali primary key
    // protected $fillable = ['name']; // nandain kolom mana aja yang bisa diisi secara manual, selain dari kolom dalam array gaboleh 
    // protected $guarded = ['name']; // nandain kolom mana aja yang gabisa diisi secara manual, selain dari kolom dalam array boleh
    protected $guarded = ['id', 'created_at', 'updated_at', 'total_gaji', 'denda', 'absen'];

    //menghubungkan dengan tabel user
    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_nip', 'nip');
    }

    //Fungsi menghitung total gaji
    public function calculateTotalGaji()
    {
        $totalGaji = $this->gaji_pokok - $this->kasbon - $this->denda;
        return $totalGaji;
    }
    public function calculateDenda()
    {
        $hariDalamBulan = now()->daysInMonth;
        $denda = $this->absen() * 3 * ($this->gaji_pokok / $hariDalamBulan);
        return $denda;
    }
    public function absen()
    {
        $hariDalamBulan = now()->daysInMonth;
        $absen = $hariDalamBulan - $this->kehadiran - $this->izin;
        return $absen;
    }


    protected static function boot()
    {
        parent::boot();

        // Event `saving` akan dipanggil sebelum data disimpan (baik create atau update)
        static::saving(function ($employerSalary) {
            $employerSalary->nama = $employerSalary->karyawan->name; //mendefinisikan nama dari tabel user menggunakan fungsi karyawan
            $employerSalary->jabatan = $employerSalary->karyawan->jabatan;  //mendefinisikan jabatan dari tabel user menggunakan fungsi karyawan
            $employerSalary->gaji_pokok = $employerSalary->karyawan->gaji_pokok;  //mendefinisikan gaji pokok dari tabel user menggunakan fungsi karyawan
            $employerSalary->absen = $employerSalary->absen();
            // $employerSalary->denda = $employerSalary->absen * 3 * $employerSalary->gaji_pokok;
            $employerSalary->denda = $employerSalary->calculateDenda();
            $employerSalary->total_gaji = $employerSalary->calculateTotalGaji();
        });
    }
}
