<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perizinan extends Model
{
    use HasFactory;

    protected $table = 'perizinan'; // Nama tabel
    public $timestamps = false; // Tabel tidak memiliki kolom created_at dan updated_at
    protected $primaryKey = 'id'; // Primary key adalah kolom id
    public $incrementing = true; // Primary key tidak auto-increment

    // Field yang dapat diisi massal
    protected $fillable = [
        'nip', 'nama', 'tanggal', 'jenis', 'keterangan', 'status', 'lampiran',
    ];

    // Casting tipe data
    protected $casts = [
        'tanggal' => 'date',
        'jenis' => 'string',
        'keterangan' => 'string',
        'status' => 'string',
    ];
}
