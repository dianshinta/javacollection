<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presensi extends Model
{
    use HasFactory;
    
    protected $table = 'kehadiran';
    public $timestamps = false;
    protected $primaryKey = 'id'; // Kolom primary key (id)
    public $incrementing = true; // Pastikan auto-increment diaktifkan
    protected $keyType = 'int'; // Pastikan tipe data id adalah integer    
    protected $fillable = ['status', 'tanggal', 'waktu', 'toko', 'nip'];

    // use HasFactory;
}
