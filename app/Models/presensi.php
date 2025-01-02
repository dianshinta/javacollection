<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Presensi extends Model
{
    use HasFactory;

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nip', 'nip');
    }

    protected $table = 'kehadiran';
    public $timestamps = false;
    protected $primaryKey = 'id'; // Kolom primary key (id)
    public $incrementing = true; // Pastikan auto-increment diaktifkan
    protected $keyType = 'int'; // Pastikan tipe data id adalah integer    
    protected $fillable = ['status', 'tanggal', 'waktu', 'toko', 'nip'];

    // use HasFactory;
}
