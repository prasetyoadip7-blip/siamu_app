<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'email',
        'password',
        'name',
        'role', // Admin, Guru, Siswa
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi ke Guru
    public function guru()
    {
        return $this->hasOne(Guru::class, 'user_id');
    }

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'user_id');
    }

    // Cek role
    public function isAdmin()
    {
        return $this->role === 'Admin';
    }

    public function isGuru()
    {
        return $this->role === 'Guru';
    }

    public function isSiswa()
    {
        return $this->role === 'Siswa';
    }
}