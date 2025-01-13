<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabangSupervisor extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cabang_supervisor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nip',
        'toko_id',
    ];

    /**
     * Get the user associated with the supervisor.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'nip', 'nip');
    }

    /**
     * Get the store associated with the supervisor.
     */
    public function toko()
    {
        return $this->belongsTo(Toko::class, 'toko_id', 'id');
    }
}
