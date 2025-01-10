<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kasbon extends Model
{
    use HasFactory;
    protected $table = 'kasbon'; // Nama tabel
    public $timestamps = true; // Karena tabel memiliki kolom updated_at
    protected $primaryKey = 'id'; // Kolom nip sebagai primary key

    // Kolom yang dapat diisi untuk proses update
    protected $fillable = [
        'nama',
        'nip',
        'status_kasbon',
        'status_bayar',
        'alasan',
        'tanggal_pengajuan',
        'tanggal_pembayaran',
        'nominal_diajukan',
        'nominal_dibayar',
        'saldo_akhir',
        'lampiran',
    ];

    // Casting atribut tertentu
    protected $casts = [
        // 'tanggal_pembayaran' => 'date',
        'status_kasbon' => 'string',
        'status_bayar' => 'string',
    ];

    //fungsi save ke database
    protected static function boot()
    {
        parent::boot();

        //save kolom bulan_id
        static::saving(function ($kasbon) {
            //jika kolom tanggal_pengajuan sudah ada sebelum menjalankan logika tambahBulanBaru:
            if ($kasbon->tanggal_pengajuan) {
                $bulan = Bulan::tambahBulanBaru($kasbon->tanggal_pengajuan);
                $kasbon->bulan_id = $bulan->id;
            }
        });
    }
}
