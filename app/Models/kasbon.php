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
        'status_kasbon',
        'status_bayar',
        'tanggal_pengajuan',
        'tanggal_pembayaran',
        'nominal_diajukan',
        'nominal_dibayar',
        'saldo_akhir',
        'alasan',
        'lampiran',
        'nip',
    ];

    // Casting atribut tertentu
    protected $casts = [
        'tanggal_pembayaran' => 'date',
        'status_kasbon' => 'string',
        'status_bayar' => 'string',
    ];
}