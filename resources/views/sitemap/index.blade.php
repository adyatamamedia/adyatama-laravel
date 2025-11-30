<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
    <!-- Static Pages -->
    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ url('/posts') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/galleries') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/ekstrakurikuler') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ url('/kontak') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{ url('/daftar-online') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ url('/guru-staff') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>

    <!-- Dynamic Pages: Pages -->
    @foreach ($pages as $page)
        <url>
            <loc>{{ url("/page/{$page->slug}") }}</loc>
            <lastmod>{{ $page->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach

    <!-- Dynamic Pages: Guru & Staff -->
    @foreach ($guruStaff as $person)
        <url>
            <loc>{{ url("/guru-staff/{$person->id}") }}</loc>
            <lastmod>{{ $person->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.6</priority>
            @if($person->photo_url)
                <image:image>
                    <image:loc>{{ $person->photo_url }}</image:loc>
                    <image:title>{{ $person->nama_lengkap }} - {{ $person->jabatan }}</image:title>
                </image:image>
            @endif
        </url>
    @endforeach

    <!-- Dynamic Pages: Posts -->
    @foreach ($posts as $post)
        <url>
            <loc>{{ url("/posts/{$post->slug}") }}</loc>
            <lastmod>{{ $post->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
            @if($post->featured_image_url)
                <image:image>
                    <image:loc>{{ $post->featured_image_url }}</image:loc>
                    <image:title>{{ $post->title }}</image:title>
                </image:image>
            @endif
            @if($post->post_type === 'video' && $post->video_url)
                <video:video>
                    <video:thumbnail_loc>{{ $post->featured_image_url }}</video:thumbnail_loc>
                    <video:title>{{ $post->title }}</video:title>
                    <video:description>{{ \Illuminate\Support\Str::limit(strip_tags($post->excerpt ?? $post->content), 200) }}</video:description>
                    <video:player_loc autoplay="autoplay">{{ $post->video_url }}</video:player_loc>
                    <video:publication_date>{{ $post->published_at->toAtomString() }}</video:publication_date>
                </video:video>
            @endif
        </url>
    @endforeach

    <!-- Dynamic Pages: Galleries -->
    @foreach ($galleries as $gallery)
        <url>
            <loc>{{ url("/galleries/{$gallery->slug}") }}</loc>
            <lastmod>{{ $gallery->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
            @foreach($gallery->items as $item)
                <image:image>
                    <image:loc>{{ $item->image_url }}</image:loc>
                    <image:caption>{{ $item->caption ?? $gallery->title }}</image:caption>
                </image:image>
            @endforeach
        </url>
    @endforeach
</urlset>
