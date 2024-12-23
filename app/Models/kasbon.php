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
    protected $fillable = [
        'status',
        'tanggal_pengajuan',
        'alasan',
        'nominal_diajukan',
        'nominal_dibayar',
        'nip',
    ];
    protected $casts = [
        'tanggal_pengajuan' => 'date',
        'tanggal_pembayaran' => 'date',
        'status' => 'string',
    ];
}