<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;
use App\Models\Bulan;

class Presensi extends Model
{
    use HasFactory;

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nip', 'nip');
    }

    public function karyawans(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'nip', 'nip');
    }

    public function Toko()
    {
        return $this->belongsTo(Toko::class, 'toko_id', 'id');
    }

    public function bulan(): BelongsTo
    {
        return $this->belongsTo(Bulan::class, 'bulan_id');
    }

    protected $table = 'kehadiran';
    public $timestamps = false;
    protected $primaryKey = 'id'; // Kolom primary key (id)
    public $incrementing = true; // Pastikan auto-increment diaktifkan
    protected $keyType = 'int'; // Pastikan tipe data id adalah integer    
    protected $fillable = ['status', 'tanggal', 'waktu', 'toko_id', 'nip'];
    
    //fungsi save ke database
    protected static function boot()
    {
        parent::boot();

        //save kolom bulan_id
        static::saving(function ($presensi) {
            //jika kolom tanggal sudah ada sebelum menjalankan logika tambahBulanBaru:
            if ($presensi->tanggal) {
                $bulan = Bulan::tambahBulanBaru($presensi->tanggal);
                $presensi->bulan_id = $bulan->id;
            }
        });
    }
}
