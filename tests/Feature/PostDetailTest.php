<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\ReactionType;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostDetailTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_post_detail_page_loads_with_sidebar_data()
    {
        // Seed required data
        $user = User::factory()->create();
        $category = Category::create(['name' => 'News', 'slug' => 'news']);
        $reaction = ReactionType::create(['code' => 'like', 'emoji' => '👍', 'label' => 'Like']);

        // Create main post
        $post = Post::create([
            'title' => 'Main Post',
            'slug' => 'main-post',
            'content' => 'Content here',
            'status' => 'published',
            'published_at' => now(),
            'author_id' => $user->id,
            'category_id' => $category->id,
        ]);

        // Create tag
        $tag = Tag::create(['name' => 'Important', 'slug' => 'important', 'post_id' => $post->id]);

        // Create recent posts (5 posts)
        for ($i = 0; $i < 5; $i++) {
            Post::create([
                'title' => "Recent Post $i",
                'slug' => "recent-post-$i",
                'content' => 'Content here',
                'status' => 'published',
                'published_at' => now()->subDays($i + 1),
                'author_id' => $user->id,
                'category_id' => $category->id,
            ]);
        }

        $response = $this->get("/posts/{$post->slug}");

        $response->assertStatus(200);
        
        // Check for sidebar elements
        $response->assertSee('Artikel Terbaru');
        $response->assertSee('Kategori');
        $response->assertSee('Tags Populer');
        
        // Check if recent posts title is visible (one of them)
        $recentPost = Post::where('id', '!=', $post->id)->first();
        $response->assertSee($recentPost->title);
        
        // Check category name
        $response->assertSee($category->name);
        
        // Check tag name
        $response->assertSee('#'.$tag->name);
    }
}
