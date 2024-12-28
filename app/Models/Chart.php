<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;
    protected $table = 'chart'; // Nama tabel di database
    protected $fillable = ['day', 'idtoko', 'hadir', 'izin', 'terlambat', 'tanpaketerangan'];
}