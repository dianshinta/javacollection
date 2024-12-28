<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perizinan extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'perizinan'; // Nama tabel
    
    public $timestamps = false; // Tabel tidak memiliki kolom created_at dan updated_at
    
    // Primary key
    protected $primaryKey = 'id'; // Primary key adalah kolom id
    // Non-incrementing primary key
    public $incrementing = true; // Primary key tidak auto-increment

    // Tipe data primary key
    protected $keyType = 'string';

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
}