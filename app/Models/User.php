<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Controllers\EmployerSalaryController;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'nip';
    public $incrementing = false; // Jika nip bukan auto-increment
    protected $keyType = 'string'; // Jika nip berbentuk string

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nip',
        'name',
        'email',
        'password',
        'jabatan',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function attendances()
    {
        return $this->hasMany(presensi::class);
    }

    public function supervisedBranches()
    {
        return $this->belongsToMany(Toko::class, 'cabang_supervisor');
    }
}