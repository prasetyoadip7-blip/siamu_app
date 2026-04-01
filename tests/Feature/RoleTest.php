<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_redirect_ke_dashboard_admin()
    {
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this->actingAs($admin)->get('/dashboard');

        $response->assertRedirect('/admin/dashboard');
    }

    public function test_guru_redirect_ke_dashboard_guru()
    {
        $guru = User::factory()->create([
            'role' => 'guru'
        ]);

        $response = $this->actingAs($guru)->get('/dashboard');

        $response->assertRedirect('/guru/dashboard');
    }

    public function test_siswa_redirect_ke_dashboard_siswa()
    {
        $siswa = User::factory()->create([
            'role' => 'siswa'
        ]);

        $response = $this->actingAs($siswa)->get('/dashboard');

        $response->assertRedirect('/siswa/dashboard');
    }
}