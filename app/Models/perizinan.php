<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perizinan extends Model
{
    use HasFactory;
    protected $table = 'perizinan'; // Nama tabel
    public $timestamps = true; // Karena tabel memiliki kolom updated_at
    protected $primaryKey = 'nip'; // Kolom nip sebagai primary key
    protected $keyType = 'string'; // Primary key bertipe string
    public $incrementing = false; // Karena primary key tidak auto-increment
    protected $casts = [
        'tanggal' => 'date',
        'jenis' => 'string',
        'status' => 'string',
    ];
}