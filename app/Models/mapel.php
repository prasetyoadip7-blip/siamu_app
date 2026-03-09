<?php
// app/Models/Mapel.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel';
    protected $primaryKey = 'id_mapel';

    protected $fillable = [
        'nama_mapel',
        'kkm',
        'id_guru'
    ];

    // Relasi ke Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    // Relasi ke Nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_mapel');
    }

    // Relasi ke Jadwal
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_mapel');
    }
}