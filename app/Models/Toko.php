<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;
    protected $table = 'toko'; // Nama tabel di database
    protected $fillable = ['name', 'latitude', 'longitude'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function presensi()
    {
        return $this->hasMany(presensi::class, 'toko_id', 'id');
    }
}