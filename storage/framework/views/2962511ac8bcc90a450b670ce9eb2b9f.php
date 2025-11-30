<?php $__env->startSection('content'); ?>
<!-- Author Header Section -->
<section class="py-12 bg-gradient-to-br from-sky-50 via-white to-blue-50 border-b border-slate-100">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <!-- Breadcrumb -->
            <nav class="mb-6 flex justify-center">
                <ol class="flex items-center gap-2 text-sm text-slate-600">
                    <li>
                        <a href="/" class="hover:text-primary-600 transition-colors">Beranda</a>
                    </li>
                    <li>
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </li>
                    <li>
                        <a href="<?php echo e(route('authors.index')); ?>" class="hover:text-primary-600 transition-colors">Penulis</a>
                    </li>
                    <li>
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </li>
                    <li class="font-medium text-slate-900"><?php echo e($author->fullname); ?></li>
                </ol>
            </nav>

            <!-- Author Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-slate-200 p-8">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                    <!-- Avatar -->
                    <div class="flex-shrink-0">
                        <?php if($author->photo_url): ?>
                            <img src="<?php echo e($author->photo_url); ?>" 
                                 alt="<?php echo e($author->fullname); ?>" 
                                 class="w-32 h-32 rounded-full object-cover border-4 border-primary-100">
                        <?php else: ?>
                            <div class="w-32 h-32 rounded-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center text-white text-5xl font-bold border-4 border-primary-100">
                                <?php echo e(strtoupper(substr($author->fullname, 0, 1))); ?>

                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Author Info -->
                    <div class="flex-1 text-center md:text-left">
                        <h1 class="text-3xl font-bold text-slate-900 mb-2"><?php echo e($author->fullname); ?></h1>
                        
                        <?php if($author->username): ?>
                            <p class="text-slate-600 mb-4"><?php echo e('@' . $author->username); ?></p>
                        <?php endif; ?>

                        <?php if($author->email): ?>
                            <a href="mailto:<?php echo e($author->email); ?>" class="inline-flex items-center gap-2 text-sm text-slate-600 hover:text-primary-600 transition-colors mb-4">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <?php echo e($author->email); ?>

                            </a>
                        <?php endif; ?>

                        <!-- Stats -->
                        <div class="flex items-center gap-6 justify-center md:justify-start mt-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-primary-600"><?php echo e(number_format($posts->total())); ?></div>
                                <div class="text-sm text-slate-600">Artikel</div>
                            </div>
                            <div class="w-px h-10 bg-slate-200"></div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-primary-600"><?php echo e(number_format($announcements->total())); ?></div>
                                <div class="text-sm text-slate-600">Pengumuman</div>
                            </div>
                            <div class="w-px h-10 bg-slate-200"></div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-primary-600"><?php echo e(number_format($galleries->total())); ?></div>
                                <div class="text-sm text-slate-600">Galeri</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content Tabs Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Tabs -->
            <div class="mb-8 border-b border-slate-200">
                <div class="flex gap-4 overflow-x-auto">
                    <button onclick="switchTab('posts')" id="tab-posts" class="tab-button px-6 py-3 font-semibold text-primary-600 border-b-2 border-primary-600 whitespace-nowrap">
                        Artikel (<?php echo e($posts->total()); ?>)
                    </button>
                    <button onclick="switchTab('announcements')" id="tab-announcements" class="tab-button px-6 py-3 font-semibold text-slate-600 hover:text-slate-900 border-b-2 border-transparent whitespace-nowrap">
                        Pengumuman (<?php echo e($announcements->total()); ?>)
                    </button>
                    <button onclick="switchTab('galleries')" id="tab-galleries" class="tab-button px-6 py-3 font-semibold text-slate-600 hover:text-slate-900 border-b-2 border-transparent whitespace-nowrap">
                        Galeri (<?php echo e($galleries->total()); ?>)
                    </button>
                </div>
            </div>

            <!-- Posts Tab Content -->
            <div id="content-posts" class="tab-content">
                <?php if($posts->count() > 0): ?>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <article class="group bg-white border border-slate-200 rounded-xl overflow-hidden hover:shadow-xl hover:border-primary-300 transition-all duration-300">
                                <?php if($post->featured_image_url): ?>
                                    <a href="<?php echo e(route('posts.show', $post->slug)); ?>" class="block relative h-48 overflow-hidden bg-slate-100">
                                        <img src="<?php echo e($post->featured_image_url); ?>" 
                                             alt="<?php echo e($post->title); ?>" 
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    </a>
                                <?php endif; ?>

                                <div class="p-5">
                                    <!-- Category & Date -->
                                    <div class="flex items-center gap-3 text-xs text-slate-500 mb-3">
                                        <?php if($post->category): ?>
                                            <span class="px-2 py-1 bg-primary-50 text-primary-700 rounded-full font-semibold">
                                                <?php echo e($post->category->name); ?>

                                            </span>
                                        <?php endif; ?>
                                        <span><?php echo e($post->published_at?->format('d M Y')); ?></span>
                                    </div>

                                    <!-- Title -->
                                    <h3 class="font-bold text-lg text-slate-900 mb-2 line-clamp-2 group-hover:text-primary-600 transition-colors">
                                        <a href="<?php echo e(route('posts.show', $post->slug)); ?>">
                                            <?php echo e($post->title); ?>

                                        </a>
                                    </h3>

                                    <!-- Excerpt -->
                                    <?php if($post->excerpt): ?>
                                        <p class="text-slate-600 text-sm line-clamp-2 mb-4">
                                            <?php echo e($post->excerpt); ?>

                                        </p>
                                    <?php endif; ?>

                                    <!-- Read More -->
                                    <a href="<?php echo e(route('posts.show', $post->slug)); ?>" class="inline-flex items-center gap-1 text-sm text-primary-600 font-medium hover:gap-2 transition-all">
                                        Baca Selengkapnya
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- Pagination -->
                    <?php echo e($posts->links()); ?>

                <?php else: ?>
                    <!-- Empty State -->
                    <div class="text-center py-16">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-100 rounded-full mb-4">
                            <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Belum Ada Artikel</h3>
                        <p class="text-slate-600">Penulis ini belum memiliki artikel yang dipublikasikan.</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Announcements Tab Content -->
            <div id="content-announcements" class="tab-content hidden">
                <?php if($announcements->count() > 0): ?>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <article class="group bg-white border border-slate-200 rounded-xl overflow-hidden hover:shadow-xl hover:border-primary-300 transition-all duration-300">
                                <?php if($announcement->featured_image_url): ?>
                                    <a href="<?php echo e(route('posts.show', $announcement->slug)); ?>" class="block relative h-48 overflow-hidden bg-slate-100">
                                        <img src="<?php echo e($announcement->featured_image_url); ?>" 
                                             alt="<?php echo e($announcement->title); ?>" 
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    </a>
                                <?php endif; ?>

                                <div class="p-5">
                                    <!-- Badge & Date -->
                                    <div class="flex items-center gap-3 text-xs text-slate-500 mb-3">
                                        <span class="px-2 py-1 bg-amber-50 text-amber-700 rounded-full font-semibold">
                                            Pengumuman
                                        </span>
                                        <span><?php echo e($announcement->published_at?->format('d M Y')); ?></span>
                                    </div>

                                    <!-- Title -->
                                    <h3 class="font-bold text-lg text-slate-900 mb-2 line-clamp-2 group-hover:text-primary-600 transition-colors">
                                        <a href="<?php echo e(route('posts.show', $announcement->slug)); ?>">
                                            <?php echo e($announcement->title); ?>

                                        </a>
                                    </h3>

                                    <!-- Excerpt -->
                                    <?php if($announcement->excerpt): ?>
                                        <p class="text-slate-600 text-sm line-clamp-2 mb-4">
                                            <?php echo e($announcement->excerpt); ?>

                                        </p>
                                    <?php endif; ?>

                                    <!-- Read More -->
                                    <a href="<?php echo e(route('posts.show', $announcement->slug)); ?>" class="inline-flex items-center gap-1 text-sm text-primary-600 font-medium hover:gap-2 transition-all">
                                        Baca Selengkapnya
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- Pagination -->
                    <?php echo e($announcements->links()); ?>

                <?php else: ?>
                    <!-- Empty State -->
                    <div class="text-center py-16">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-100 rounded-full mb-4">
                            <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Belum Ada Pengumuman</h3>
                        <p class="text-slate-600">Penulis ini belum memiliki pengumuman yang dipublikasikan.</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Galleries Tab Content -->
            <div id="content-galleries" class="tab-content hidden">
                <?php if($galleries->count() > 0): ?>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('galleries.show', $gallery->slug)); ?>" class="group block bg-white border border-slate-200 rounded-xl overflow-hidden hover:shadow-xl hover:border-primary-300 transition-all duration-300">
                                <!-- Gallery Cover -->
                                <div class="relative h-48 overflow-hidden bg-slate-100">
                                    <?php if($gallery->items->count() > 0 && $gallery->items->first()->image_url): ?>
                                        <img src="<?php echo e($gallery->items->first()->image_url); ?>" 
                                             alt="<?php echo e($gallery->title); ?>" 
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    <?php else: ?>
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="w-16 h-16 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <!-- Items Count Badge -->
                                    <div class="absolute top-3 right-3 px-3 py-1 bg-black/70 backdrop-blur-sm rounded-full text-white text-sm font-semibold flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <?php echo e($gallery->items->count()); ?>

                                    </div>
                                </div>

                                <!-- Gallery Info -->
                                <div class="p-5">
                                    <h3 class="font-bold text-lg text-slate-900 mb-2 line-clamp-2 group-hover:text-primary-600 transition-colors">
                                        <?php echo e($gallery->title); ?>

                                    </h3>
                                    
                                    <?php if($gallery->description): ?>
                                        <p class="text-slate-600 text-sm line-clamp-2 mb-3">
                                            <?php echo e(strip_tags($gallery->description)); ?>

                                        </p>
                                    <?php endif; ?>

                                    <!-- Meta -->
                                    <div class="flex items-center gap-3 text-xs text-slate-500">
                                        <span class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            <?php echo e(number_format($gallery->view_count ?? 0)); ?>

                                        </span>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- Pagination -->
                    <?php echo e($galleries->links()); ?>

                <?php else: ?>
                    <!-- Empty State -->
                    <div class="text-center py-16">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-100 rounded-full mb-4">
                            <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Belum Ada Galeri</h3>
                        <p class="text-slate-600">Penulis ini belum memiliki galeri yang dipublikasikan.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<script>
function switchTab(tab) {
    // Hide all tabs
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.add('hidden');
    });
    
    // Reset all tab buttons
    document.querySelectorAll('.tab-button').forEach(button => {
        button.classList.remove('text-primary-600', 'border-primary-600');
        button.classList.add('text-slate-600', 'border-transparent');
    });
    
    // Show selected tab
    document.getElementById('content-' + tab).classList.remove('hidden');
    
    // Activate selected button
    const activeButton = document.getElementById('tab-' + tab);
    activeButton.classList.remove('text-slate-600', 'border-transparent');
    activeButton.classList.add('text-primary-600', 'border-primary-600');
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', [
    'title' => 'Penulis: ' . $author->fullname,
    'description' => 'Artikel dan galeri dari ' . $author->fullname
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\adyatama-school2\resources\views/authors/show.blade.php ENDPATH**/ ?>