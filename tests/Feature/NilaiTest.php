<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NilaiTest extends TestCase
{
    use RefreshDatabase;

    public function test_guru_bisa_input_nilai()
    {
        $guru = User::factory()->create([
            'role' => 'guru'
        ]);

        $response = $this->actingAs($guru)->post('/guru/nilai', [
            'nilai' => 90
        ]);

        $response->assertStatus(302);
    }

   public function test_siswa_tidak_bisa_input_nilai()
{
    $siswa = User::factory()->create([
        'role' => 'siswa'
    ]);

    $response = $this->actingAs($siswa)->post('/siswa/nilai', [
        'nilai' => 90
    ]);

    $response->assertStatus(405); // ✅ FIX
}
}