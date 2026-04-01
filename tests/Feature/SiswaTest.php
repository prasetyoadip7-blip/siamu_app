<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SiswaTest extends TestCase
{
    use RefreshDatabase;

    public function test_siswa_hanya_bisa_melihat_nilai()
    {
        $siswa = User::factory()->create([
            'role' => 'siswa'
        ]);

        // boleh akses (GET)
        $response = $this->actingAs($siswa)->get('/siswa/nilai');
        $response->assertStatus(200);

        // tidak boleh POST (karena route tidak ada)
        $response = $this->actingAs($siswa)->post('/siswa/nilai', [
            'nilai' => 90
        ]);

        $response->assertStatus(405); // ✅ penting!
    }
}