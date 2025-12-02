<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
    <!-- Static Pages -->
    <url>
        <loc><?php echo e(url('/')); ?></loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?php echo e(url('/posts')); ?></loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?php echo e(url('/galleries')); ?></loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?php echo e(url('/ekstrakurikuler')); ?></loc>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc><?php echo e(url('/kontak')); ?></loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo e(url('/daftar-online')); ?></loc>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc><?php echo e(url('/guru-staff')); ?></loc>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc><?php echo e(url('/authors')); ?></loc>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>

    <!-- Dynamic Pages: Pages -->
    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(url("/page/{$page->slug}")); ?></loc>
            <lastmod><?php echo e($page->updated_at->tz('UTC')->toAtomString()); ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.7</priority>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- Dynamic Pages: Guru & Staff -->
    <?php $__currentLoopData = $guruStaff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(url("/guru-staff/{$person->id}")); ?></loc>
            <lastmod><?php echo e($person->updated_at->tz('UTC')->toAtomString()); ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.6</priority>
            <?php if($person->photo_url): ?>
                <image:image>
                    <image:loc><?php echo e($person->photo_url); ?></image:loc>
                    <image:title><?php echo e($person->nama_lengkap); ?> - <?php echo e($person->jabatan); ?></image:title>
                </image:image>
            <?php endif; ?>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- Dynamic Pages: Authors -->
    <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(url("/authors/{$author->username}")); ?></loc>
            <lastmod><?php echo e($author->updated_at->tz('UTC')->toAtomString()); ?></lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.7</priority>
            <?php if($author->photo_url): ?>
                <image:image>
                    <image:loc><?php echo e($author->photo_url); ?></image:loc>
                    <image:title><?php echo e($author->fullname); ?></image:title>
                </image:image>
            <?php endif; ?>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- Dynamic Pages: Posts -->
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(url("/posts/{$post->slug}")); ?></loc>
            <lastmod><?php echo e($post->updated_at->tz('UTC')->toAtomString()); ?></lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
            <?php if($post->featured_image_url): ?>
                <image:image>
                    <image:loc><?php echo e($post->featured_image_url); ?></image:loc>
                    <image:title><?php echo e($post->title); ?></image:title>
                </image:image>
            <?php endif; ?>
            <?php if($post->post_type === 'video' && $post->video_url): ?>
                <video:video>
                    <video:thumbnail_loc><?php echo e($post->featured_image_url); ?></video:thumbnail_loc>
                    <video:title><?php echo e($post->title); ?></video:title>
                    <video:description><?php echo e(\Illuminate\Support\Str::limit(strip_tags($post->excerpt ?? $post->content), 200)); ?></video:description>
                    <video:player_loc autoplay="autoplay"><?php echo e($post->video_url); ?></video:player_loc>
                    <video:publication_date><?php echo e($post->published_at->toAtomString()); ?></video:publication_date>
                </video:video>
            <?php endif; ?>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- Dynamic Pages: Galleries -->
    <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(url("/galleries/{$gallery->slug}")); ?></loc>
            <lastmod><?php echo e($gallery->updated_at->tz('UTC')->toAtomString()); ?></lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
            <?php $__currentLoopData = $gallery->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <image:image>
                    <image:loc><?php echo e($item->image_url); ?></image:loc>
                    <image:caption><?php echo e($item->caption ?? $gallery->title); ?></image:caption>
                </image:image>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</urlset>
<?php /**PATH C:\xampp\htdocs\adyatama-school2\resources\views/sitemap/index.blade.php ENDPATH**/ ?>