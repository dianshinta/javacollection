<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans'; // Nama tabel di database

    protected $fillable = [
        'nip', 'nama', 'jabatan','tempat_lahir', 'tanggal_lahir',
        'gender', 'toko_id', 'alamat', 'no_telp',
        'bank', 'no_rek', 'kasbon'
    ];

    public function toko() {
        return $this->belongsTo(Toko::class, 'toko_id', 'id');
    }
}
