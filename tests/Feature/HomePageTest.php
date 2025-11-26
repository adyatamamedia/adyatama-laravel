<?php

namespace Tests\Feature;

use Database\Seeders\SchoolSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_displays_content(): void
    {
        $this->seed(SchoolSeeder::class);

        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSee('Membentuk Generasi')
            ->assertSee('Berita');
    }
}
