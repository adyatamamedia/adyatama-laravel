<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $breakingNews = Post::published()
                ->where('post_type', 'announcement')
                ->latest('published_at')
                ->take(5)
                ->get();
            
            $view->with('breakingNews', $breakingNews);
        });
    }
}
