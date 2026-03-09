<?php
// app/Models/Jadwal.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';

    protected $fillable = [
        'id_kelas',
        'id_mapel',
        'id_guru',
        'hari',
        'jam_mulai',
        'jam_selesai'
    ];

    // Relasi ke Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    // Relasi ke Mapel
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    // Relasi ke Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    // Accessor untuk format jam
    public function getJamFormatAttribute()
    {
        return date('H:i', strtotime($this->jam_mulai)) . ' - ' .
               date('H:i', strtotime($this->jam_selesai));
    }
}