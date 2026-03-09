<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Jadwal;
use App\Models\Nilai;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Buat Admin
        $admin = User::create([
            'email' => 'admin@siamu.ac.id',
            'password' => Hash::make('password'),
            'role' => 'Admin'
        ]);

        // Buat Kelas
        $kelasData = [
            ['nama_kelas' => 'X IPA 1', 'tahun_ajaran' => '2024/2025'],
            ['nama_kelas' => 'X IPA 2', 'tahun_ajaran' => '2024/2025'],
            ['nama_kelas' => 'XI IPA 1', 'tahun_ajaran' => '2024/2025'],
            ['nama_kelas' => 'XI IPA 2', 'tahun_ajaran' => '2024/2025'],
            ['nama_kelas' => 'XII IPA 1', 'tahun_ajaran' => '2024/2025'],
            ['nama_kelas' => 'XII IPA 2', 'tahun_ajaran' => '2024/2025'],
        ];

        foreach ($kelasData as $k) {
            Kelas::create($k);
        }

        // Buat Guru
        $guruList = [];
        $guruData = [
            ['nip' => '197501012005011001', 'nama' => 'Dr. Ahmad Sudrajat, M.Pd', 'email' => 'ahmad.sudrajat@siamu.ac.id'],
            ['nip' => '197802102006042002', 'nama' => 'Dra. Siti Nurjanah', 'email' => 'siti.nurjanah@siamu.ac.id'],
            ['nip' => '198003152008011003', 'nama' => 'Drs. Bambang Wijaya', 'email' => 'bambang.wijaya@siamu.ac.id'],
        ];

        foreach ($guruData as $g) {
            $user = User::create([
                'email' => $g['email'],
                'password' => Hash::make('password'),
                'role' => 'Guru'
            ]);

            $guruList[] = Guru::create([
                'nip' => $g['nip'],
                'nama' => $g['nama'],
                'alamat' => 'Jl. Pendidikan No. ' . rand(1, 100),
                'no_tlpn' => '0812' . rand(10000000, 99999999),
                'user_id' => $user->id
            ]);
        }

        // Buat Mapel
        $mapelData = [
            ['nama_mapel' => 'Matematika', 'kkm' => 75, 'guru' => $guruList[0]],
            ['nama_mapel' => 'Bahasa Indonesia', 'kkm' => 75, 'guru' => $guruList[1]],
            ['nama_mapel' => 'Bahasa Inggris', 'kkm' => 75, 'guru' => $guruList[2]],
            ['nama_mapel' => 'Fisika', 'kkm' => 75, 'guru' => $guruList[0]],
            ['nama_mapel' => 'Kimia', 'kkm' => 75, 'guru' => $guruList[1]],
        ];

        $mapelList = [];
        foreach ($mapelData as $m) {
            $mapelList[] = Mapel::create([
                'nama_mapel' => $m['nama_mapel'],
                'kkm' => $m['kkm'],
                'id_guru' => $m['guru']->id_guru
            ]);
        }

        // Buat Siswa
        $kelasIds = Kelas::pluck('id_kelas')->toArray();
        $siswaList = [];
        
        for ($i = 1; $i <= 20; $i++) {
            $user = User::create([
                'email' => 'siswa' . $i . '@siamu.ac.id',
                'password' => Hash::make('password'),
                'role' => 'Siswa'
            ]);

            $siswaList[] = Siswa::create([
                'nis' => '2024' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'nama' => 'Siswa ' . $i,
                'alamat' => 'Jl. Pelajar No. ' . $i,
                'no_tlpn' => '0857' . rand(10000000, 99999999),
                'id_kelas' => $kelasIds[array_rand($kelasIds)],
                'user_id' => $user->id
            ]);
        }

        // Buat Jadwal
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        foreach ($kelasIds as $kelasId) {
            foreach ($hari as $h) {
                foreach ($mapelList as $index => $mapel) {
                    if ($index < 3) { // 3 jadwal per hari
                        Jadwal::create([
                            'id_kelas' => $kelasId,
                            'id_mapel' => $mapel->id_mapel,
                            'id_guru' => $mapel->id_guru,
                            'hari' => $h,
                            'jam' => ($index + 7) . ':00:00'
                        ]);
                    }
                }
            }
        }

        // Buat Nilai
        foreach ($siswaList as $siswa) {
            foreach ($mapelList as $mapel) {
                Nilai::create([
                    'id_siswa' => $siswa->id_siswa,
                    'id_mapel' => $mapel->id_mapel,
                    'id_guru' => $mapel->id_guru,
                    'nilai_tugas' => rand(70, 100),
                    'nilai_uts' => rand(70, 100),
                    'nilai_uas' => rand(70, 100)
                ]);
            }
        }
    }
}