<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SiswaTest extends TestCase
{
    use RefreshDatabase;

    public function test_halaman_siswa_bisa_diakses(): void
    {
        $user = User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this->actingAs($user)->get('/admin/siswa');

        $response->assertStatus(200);
    }

    public function test_bisa_menambah_siswa(): void
    {
        $user = User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this->actingAs($user)->post('/admin/siswa', [
            'nis' => '22001',
            'nama' => 'Aiku'
        ]);

        $response->assertRedirect('/admin/siswa');

        $this->assertDatabaseHas('siswa', [
            'nis' => '22001',
            'nama' => 'Aiku'
        ]);
    }

    public function test_bisa_update_siswa(): void
    {
        $user = User::factory()->create([
            'role' => 'admin'
        ]);

        $siswa = Siswa::factory()->create();

        $response = $this->actingAs($user)->put('/admin/siswa/'.$siswa->id, [
            'nis' => '22002',
            'nama' => 'Aiku Update'
        ]);

        $response->assertRedirect('/admin/siswa');

        $this->assertDatabaseHas('siswa', [
            'nis' => '22002',
            'nama' => 'Aiku Update'
        ]);
    }

    public function test_bisa_hapus_siswa(): void
    {
        $user = User::factory()->create([
            'role' => 'admin'
        ]);

        $siswa = Siswa::factory()->create();

        $response = $this->actingAs($user)->delete('/admin/siswa/'.$siswa->id);

        $response->assertRedirect('/admin/siswa');

        $this->assertDatabaseMissing('siswa', [
            'id' => $siswa->id
        ]);
    }
}