<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KelasTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_bisa_tambah_kelas()
    {
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this->actingAs($admin)->post('/admin/kelas', [
            'nama_kelas' => 'X RPL 1'
        ]);

        $response->assertStatus(302);
    }

    public function test_siswa_tidak_bisa_CRUD_kelas()
    {
        $siswa = User::factory()->create([
            'role' => 'siswa'
        ]);

        $response = $this->actingAs($siswa)->get('/admin/kelas');

        $response->assertStatus(403);
    }
}