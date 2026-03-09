<?php
// app/Models/Guru.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $primaryKey = 'id_guru';

    protected $fillable = [
        'nip',
        'nama',
        'alamat',
        'no_tlpn',
        'user_id'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Mapel (Guru mengajar banyak Mapel)
    public function mapel()
    {
        return $this->hasMany(Mapel::class, 'id_guru');
    }

    // Relasi ke Nilai (Guru memberikan banyak Nilai)
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_guru');
    }

    // Relasi ke Jadwal (Guru memiliki banyak Jadwal)
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_guru');
    }
}