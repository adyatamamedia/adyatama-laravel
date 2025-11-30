<?php $__env->startSection('content'); ?>
<!-- Header Section -->
<section class="py-12 bg-gradient-to-br from-sky-50 via-white to-blue-50 border-b border-slate-100">
    <div class="container mx-auto px-4">
        <!-- Title with Breadcrumb -->
        <div class="text-center mb-8">
            <!-- Breadcrumb -->
            <nav class="mb-4 flex justify-center">
                <ol class="flex items-center gap-2 text-sm text-slate-600">
                    <li>
                        <a href="/" class="hover:text-primary-600 transition-colors">Beranda</a>
                    </li>
                    <li>
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </li>
                    <li class="font-medium text-slate-900">Berita</li>
                </ol>
            </nav>

            <h1 class="text-4xl lg:text-5xl font-bold text-slate-900 mb-3">
                <?php if($selectedTag): ?>
                    Berita Tag: <span class="text-primary-600">#<?php echo e($selectedTag); ?></span>
                <?php elseif($selectedCategory): ?>
                    Berita: <?php echo e($categories->firstWhere('slug', $selectedCategory)?->name); ?>

                <?php else: ?>
                    Berita Terbaru
                <?php endif; ?>
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto">
                <?php if($selectedTag): ?>
                    Artikel dengan tag <strong>#<?php echo e($selectedTag); ?></strong>
                <?php elseif($selectedCategory): ?>
                    Artikel dan informasi terbaru seputar <?php echo e(strtolower($categories->firstWhere('slug', $selectedCategory)?->name)); ?>

                <?php else: ?>
                    Kumpulan artikel dan informasi terbaru dari sekolah
                <?php endif; ?>
            </p>
        </div>

        <!-- Filter Bar -->
        <div class="max-w-4xl mx-auto">
            <!-- Category Filter -->
            <div class="flex gap-2 flex-wrap justify-center mb-4">
                <a href="<?php echo e(route('posts.index')); ?>" 
                   class="px-4 py-2 rounded-full text-sm font-medium transition-colors <?php echo e(!$selectedCategory ? 'bg-primary-600 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'); ?>">
                    Semua
                </a>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('posts.index', ['category' => $category->slug])); ?>" 
                       class="px-4 py-2 rounded-full text-sm font-medium transition-colors <?php echo e($selectedCategory == $category->slug ? 'bg-primary-600 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'); ?>">
                        <?php echo e($category->name); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Search -->
            <form action="<?php echo e(route('posts.index')); ?>" method="GET" class="mb-4">
                <?php if($selectedCategory): ?>
                    <input type="hidden" name="category" value="<?php echo e($selectedCategory); ?>">
                <?php endif; ?>
                <?php if($selectedTag): ?>
                    <input type="hidden" name="tag" value="<?php echo e($selectedTag); ?>">
                <?php endif; ?>
                <div class="relative">
                    <input type="text" 
                           name="search" 
                           value="<?php echo e($search ?? ''); ?>"
                           placeholder="Cari berita..." 
                           class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 focus:bg-white focus:border-primary-500 focus:ring-2 focus:ring-primary-100 rounded-lg text-sm transition-all">
                    <svg class="w-5 h-5 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </form>

            <!-- Popular Tags -->
            <?php if(!empty($popularTags)): ?>
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-4">
                <div class="flex items-center gap-2 mb-3">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    <span class="text-sm font-semibold text-slate-700">Tag Populer:</span>
                </div>
                <div class="flex gap-2 flex-wrap">
                    <?php $__currentLoopData = $popularTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('posts.index', ['tag' => $tag])); ?>" 
                           class="px-3 py-1 text-xs font-medium rounded-full transition-all <?php echo e($selectedTag == $tag ? 'bg-primary-100 text-primary-700 ring-2 ring-primary-200' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'); ?>">
                            #<?php echo e($tag); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Active Filters Info -->
            <?php if($selectedCategory || $selectedTag || $search): ?>
                <div class="text-center mt-4 text-sm text-slate-600">
                    Menampilkan
                    <?php if($search): ?>
                        hasil pencarian "<strong><?php echo e($search); ?></strong>"
                    <?php endif; ?>
                    <?php if($selectedCategory && $search): ?>
                        dalam kategori 
                    <?php endif; ?>
                    <?php if($selectedCategory): ?>
                        <strong><?php echo e($categories->firstWhere('slug', $selectedCategory)?->name); ?></strong>
                    <?php endif; ?>
                    <?php if(($selectedCategory || $search) && $selectedTag): ?>
                        dengan
                    <?php endif; ?>
                    <?php if($selectedTag): ?>
                        tag <strong class="text-primary-600">#<?php echo e($selectedTag); ?></strong>
                    <?php endif; ?>
                    · 
                    <a href="<?php echo e(route('posts.index')); ?>" class="text-primary-600 hover:text-primary-700 font-medium">
                        Hapus filter
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Posts Grid Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <?php if($posts->count()): ?>
            <div class="grid md:grid-cols-4 gap-6">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="group bg-white border border-slate-100 rounded-2xl overflow-hidden hover:shadow-xl hover:border-sky-200 transition-all duration-300">
                        <!-- Featured Image -->
                        <a href="/posts/<?php echo e($post->slug); ?>" class="block relative aspect-[4/3] overflow-hidden bg-slate-100">
                            <?php if($post->featured_image_url): ?>
                                <img src="<?php echo e($post->featured_image_url); ?>" 
                                     alt="<?php echo e($post->title); ?>" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center bg-linear-to-br from-sky-50 to-sky-100 text-sky-200">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Gradient overlay -->
                            <div class="absolute inset-0 bg-linear-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <!-- Video Badge -->
                            <?php if($post->post_type === 'video' && $post->video_url): ?>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="bg-red-600 rounded-full p-4 shadow-2xl transform group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Category badge -->
                            <?php if($post->category): ?>
                                <div class="absolute top-3 left-3 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-semibold text-slate-700 shadow-sm">
                                    <?php echo e($post->category->name); ?>

                                </div>
                            <?php endif; ?>
                        </a>
                        
                        <!-- Content -->
                        <div class="p-5">
                            <div class="flex items-center gap-2 text-xs text-slate-500 mb-3">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <?php echo e($post->published_at?->format('d M Y')); ?>

                            </div>
                            
                            <h2 class="font-bold text-slate-900 mb-2 group-hover:text-sky-600 transition-colors line-clamp-2">
                                <a href="/posts/<?php echo e($post->slug); ?>"><?php echo e($post->title); ?></a>
                            </h2>
                            
                            <?php if($post->excerpt): ?>
                                <p class="text-sm text-slate-600 line-clamp-3 mb-4"><?php echo e($post->excerpt); ?></p>
                            <?php endif; ?>
                            
                            <a href="/posts/<?php echo e($post->slug); ?>" class="inline-flex items-center gap-1 text-sm font-semibold text-primary-600 hover:text-primary-700 transition-colors">
                                Baca selengkapnya
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                <?php echo e($posts->links()); ?>

            </div>
        <?php else: ?>
            <div class="text-center py-16">
                <svg class="w-20 h-20 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Berita tidak ditemukan</h3>
                <p class="text-slate-600 mb-6">
                    <?php if($search || $selectedCategory): ?>
                        Tidak ada berita yang sesuai dengan filter yang dipilih.
                    <?php else: ?>
                        Belum ada berita yang tersedia.
                    <?php endif; ?>
                </p>
                <?php if($search || $selectedCategory): ?>
                    <a href="<?php echo e(route('posts.index')); ?>" class="inline-flex items-center gap-2 px-6 py-3 bg-primary-600 text-white rounded-full font-semibold hover:bg-primary-700 transition-colors">
                        Lihat Semua Berita
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', [
    'title' => $selectedTag ? 'Berita Tag: ' . $selectedTag : ($selectedCategory ? 'Berita - ' . ($categories->firstWhere('slug', $selectedCategory)?->name ?? 'Berita') : 'Berita'),
    'description' => $selectedTag ? 'Artikel dengan tag ' . $selectedTag : ($selectedCategory ? 'Artikel dan informasi terbaru seputar ' . strtolower($categories->firstWhere('slug', $selectedCategory)?->name) : 'Kumpulan artikel dan informasi terbaru dari sekolah')
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\adyatama-school2\resources\views/posts/index.blade.php ENDPATH**/ ?>