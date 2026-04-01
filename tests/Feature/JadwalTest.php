<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JadwalTest extends TestCase
{
    use RefreshDatabase;

    public function test_guru_bisa_lihat_jadwal()
    {
        $guru = User::factory()->create([
            'role' => 'guru'
        ]);

        $response = $this->actingAs($guru)->get('/guru/jadwal');

        $response->assertStatus(200);
    }

    public function test_siswa_hanya_bisa_lihat_jadwal()
    {
        $siswa = User::factory()->create([
            'role' => 'siswa'
        ]);

        $response = $this->actingAs($siswa)->get('/siswa/jadwal');
        $response->assertStatus(200);

        $response = $this->actingAs($siswa)->post('/siswa/jadwal', []);
        $response->assertStatus(405);
    }
}