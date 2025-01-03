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

    //menghubungkan dengan model user
    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_nip', 'nip');
    }

    //menghubungkan dengan model presensi
    public function kehadiran()
    {
        return $this->hasMany(Presensi::class, 'nip', 'user_nip');
    }

    //menghubungkan dengan model Bulan
    public function bulan(): BelongsTo
    {
        return $this->belongsTo(Bulan::class, 'bulan_id', 'id');
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

    //fungsi untuk menentukan bulan_id.
    public static function tentukanBulanId(string $userNip): int
    {
        // Ambil data bulan dari tabel `Presensi` yang relevan dengan `user_nip`
        $bulanTerbaru = Presensi::where('nip', $userNip)
            ->orderBy('tanggal', 'desc') // Urutkan berdasarkan tanggal terbaru
            ->selectRaw('MONTH(tanggal) as bulan, YEAR(tanggal) as tahun')
            ->first();

        // Jika tidak ada data presensi, gunakan bulan saat ini
        if (!$bulanTerbaru) {
            $currentDate = now();
            $bulan = $currentDate->month;
            $tahun = $currentDate->year;
        } else {
            $bulan = $bulanTerbaru->bulan;
            $tahun = $bulanTerbaru->tahun;
        }

        // Tambahkan atau gunakan bulan yang sudah ada di tabel `bulans`
        $bulanObj = Bulan::tambahBulanBaru("$tahun-$bulan-01");

        return $bulanObj->id;
    }

    protected static function boot()
    {
        parent::boot();

        // Event `saving` akan dipanggil sebelum data disimpan (baik create atau update)
        static::saving(function ($employerSalary) {
            $employerSalary->nama = $employerSalary->karyawan->name; //mendefinisikan nama dari tabel user menggunakan fungsi karyawan
            $employerSalary->jabatan = $employerSalary->karyawan->jabatan;  //mendefinisikan jabatan dari tabel user menggunakan fungsi karyawan
            $employerSalary->gaji_pokok = $employerSalary->karyawan->gaji_pokok;  //mendefinisikan gaji pokok dari tabel user menggunakan fungsi karyawan


            // Tentukan bulan_id berdasarkan data presensi atau bulan terbaru
            $employerSalary->bulan_id = self::tentukanBulanId($employerSalary->user_nip); //sepertinya ini hubungan many to many jadi butuh tabel pivot

            // Hitung kehadiran dan absen untuk bulan_id
            $employerSalary->hadir = Presensi::hadir($employerSalary->user_nip, $employerSalary->bulan_id);
            $employerSalary->absen = Presensi::absen($employerSalary->user_nip, $employerSalary->bulan_id);



            $employerSalary->denda = $employerSalary->calculateDenda();
            $employerSalary->total_gaji = $employerSalary->calculateTotalGaji();;
        });
    }
}
