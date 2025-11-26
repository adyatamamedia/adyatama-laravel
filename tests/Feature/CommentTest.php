<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Workaround for missing sessions table in test env
        if (!\Illuminate\Support\Facades\Schema::hasTable('sessions')) {
            \Illuminate\Support\Facades\Schema::create('sessions', function ($table) {
                $table->string('id')->primary();
                $table->foreignId('user_id')->nullable()->index();
                $table->string('ip_address', 45)->nullable();
                $table->text('user_agent')->nullable();
                $table->longText('payload');
                $table->integer('last_activity')->index();
            });
        }
    }

    public function test_user_can_post_comment()
    {
        $user = User::factory()->create();
        $category = Category::create(['name' => 'News', 'slug' => 'news']);
        $post = Post::create([
            'title' => 'Test Post',
            'slug' => 'test-post',
            'content' => 'Content',
            'status' => 'published',
            'published_at' => now(),
            'author_id' => $user->id,
            'category_id' => $category->id,
        ]);

        $response = $this->withSession(['_token' => 'testing-token'])->post("/posts/{$post->slug}/comments", [
            '_token' => 'testing-token',
            'author_name' => 'John Doe',
            'author_email' => 'john@example.com',
            'content' => 'This is a great post!',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('comments', [
            'post_id' => $post->id,
            'author_name' => 'John Doe',
            'content' => 'This is a great post!',
        ]);
    }
}
