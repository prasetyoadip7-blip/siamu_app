<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GuruTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_bisa_tambah_guru()
    {
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this->actingAs($admin)->post('/admin/guru', [
            'nama' => 'Guru Baru',
            'email' => 'guru@test.com',
            'password' => bcrypt('password')
        ]);

        $response->assertStatus(302);
    }
}