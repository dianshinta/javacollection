<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class perizinan extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'perizinan'; // Nama tabel
    
    // Timestamps
    public $timestamps = true; // Tabel memiliki kolom created_at dan updated_at
    
    // Primary key
    protected $primaryKey = 'id'; // Primary key adalah kolom id


    // Field yang dapat diisi massal
    protected $fillable = [
        'nip', 
        'nama', 
        'tanggal', 
        'jenis',
        'keterangan', 
        'status', 
        'lampiran',
    ];

    // Casting tipe data
    protected $casts = [
        'tanggal' => 'date',
        'jenis' => 'string',
        'keterangan' => 'string',
        'status' => 'string',
    ];

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'nip', 'nip');
    }

    //fungsi save ke database
    protected static function boot()
    {
        parent::boot();

        //save kolom bulan_id
        static::saving(function ($perizinan) {
            //jika kolom tanggal sudah ada sebelum menjalankan logika tambahBulanBaru:
            if ($perizinan->tanggal) {
                $bulan = Bulan::tambahBulanBaru($perizinan->tanggal);
                $perizinan->bulan_id = $bulan->id;
            }
        });
    }
}