<?php

namespace Tests\Feature;

use App\Models\StudentApplication;
use Database\Seeders\SchoolSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class StudentRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_can_submit_registration_form(): void
    {
        $this->seed(SchoolSeeder::class);
        Storage::fake('public');

        $response = $this->withSession(['_token' => 'testing-token'])->post('/daftar-online', [
            '_token' => 'testing-token',
            'nama_lengkap' => 'Siswa Test',
            'nisn' => '1234567890',
            'jenis_kelamin' => 'L',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '2016-01-01',
            'alamat' => 'Jl. Contoh No. 1',
            'nama_ortu' => 'Bapak Test',
            'no_hp' => '081234567890',
            'email' => 'ortu@example.com',
            'asal_sekolah' => 'TK Islam',
            'dokumen_kk' => UploadedFile::fake()->create('kk.pdf', 100, 'application/pdf'),
            'dokumen_akte' => UploadedFile::fake()->create('akte.pdf', 100, 'application/pdf'),
        ]);

        $response->assertRedirect('/daftar-online');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('student_applications', [
            'nama_lengkap' => 'Siswa Test',
            'status' => 'pending',
        ]);

        $application = StudentApplication::first();
        Storage::disk('public')->assertExists($application->dokumen_kk);
        Storage::disk('public')->assertExists($application->dokumen_akte);
    }
}
