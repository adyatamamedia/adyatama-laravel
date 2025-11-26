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
                    <li class="font-medium text-slate-900">Galeri</li>
                </ol>
            </nav>

            <h1 class="text-4xl lg:text-5xl font-bold text-slate-900 mb-3">
                <?php if($selectedExtra): ?>
                    Dokumentasi: <?php echo e($extracurriculars->firstWhere('slug', $selectedExtra)?->name); ?>

                <?php else: ?>
                    Dokumentasi Kegiatan
                <?php endif; ?>
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto">
                <?php if($selectedExtra): ?>
                    Kumpulan foto dan dokumentasi kegiatan <?php echo e($extracurriculars->firstWhere('slug', $selectedExtra)?->name); ?>

                <?php else: ?>
                    Kumpulan foto dan dokumentasi kegiatan sekolah dan ekstrakurikuler
                <?php endif; ?>
            </p>
        </div>

        <!-- Filter Bar -->
        <div class="max-w-4xl mx-auto">
                <!-- Search -->
                <form action="<?php echo e(route('galleries.index')); ?>" method="GET" class="mb-4">
                    <?php if($selectedExtra): ?>
                        <input type="hidden" name="extracurricular" value="<?php echo e($selectedExtra); ?>">
                    <?php endif; ?>
                    <div class="relative">
                        <input type="text" 
                               name="q" 
                               value="<?php echo e($search ?? ''); ?>"
                               placeholder="Cari galeri..." 
                               class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 focus:bg-white focus:border-primary-500 focus:ring-2 focus:ring-primary-100 rounded-lg text-sm transition-all">
                        <svg class="w-5 h-5 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </form>

                <!-- Ekstrakurikuler Filter -->
                <div class="flex gap-2 flex-wrap justify-center">
                    <a href="<?php echo e(route('galleries.index')); ?>" 
                       class="px-4 py-2 rounded-full text-sm font-medium transition-colors <?php echo e(!$selectedExtra ? 'bg-primary-600 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'); ?>">
                        Semua
                    </a>
                    <?php $__currentLoopData = $extracurriculars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('galleries.index', ['extracurricular' => $extra->slug])); ?>" 
                           class="px-4 py-2 rounded-full text-sm font-medium transition-colors <?php echo e($selectedExtra == $extra->slug ? 'bg-primary-600 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'); ?>">
                            <?php echo e($extra->name); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Active Filters Info -->
                <?php if($selectedExtra || $search): ?>
                    <div class="text-center mt-4 text-sm text-slate-600">
                        Menampilkan
                        <?php if($search): ?>
                            hasil pencarian "<strong><?php echo e($search); ?></strong>"
                        <?php endif; ?>
                        <?php if($selectedExtra && $search): ?>
                            dalam kategori 
                        <?php endif; ?>
                        <?php if($selectedExtra): ?>
                            <strong><?php echo e($extracurriculars->firstWhere('slug', $selectedExtra)?->name); ?></strong>
                        <?php endif; ?>
                        · 
                        <a href="<?php echo e(route('galleries.index')); ?>" class="text-primary-600 hover:text-primary-700 font-medium">
                            Hapus filter
                        </a>
                    </div>
                <?php endif; ?>
        </div>
    </div>
</section>

<!-- Galleries Grid Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <?php if($galleries->count()): ?>
            <div class="grid md:grid-cols-4 gap-6">
                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="/galleries/<?php echo e($gallery->slug); ?>" class="group bg-white border border-slate-100 rounded-2xl overflow-hidden hover:shadow-xl hover:border-sky-200 transition-all duration-300">
                        <?php ($cover = $gallery->items->first()?->image_url); ?>
                        <div class="relative aspect-[4/3] overflow-hidden bg-slate-100">
                            <?php if($cover): ?>
                                <img src="<?php echo e($cover); ?>" 
                                     alt="<?php echo e($gallery->title); ?>" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center bg-sky-50 text-sky-200">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Gradient overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <!-- Ekstrakurikuler badge -->
                            <?php if($gallery->extracurricular): ?>
                                <div class="absolute top-3 left-3 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-semibold text-slate-700 shadow-sm">
                                    <?php echo e($gallery->extracurricular->name); ?>

                                </div>
                            <?php endif; ?>

                            <!-- Items count -->
                            <?php if($gallery->items->count() > 0): ?>
                                <div class="absolute top-3 right-3 bg-black/70 backdrop-blur px-3 py-1 rounded-full text-xs font-semibold text-white shadow-sm flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                    </svg>
                                    <?php echo e($gallery->items->count()); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="p-5">
                            <h3 class="font-bold text-slate-900 mb-1 group-hover:text-sky-600 transition-colors line-clamp-2">
                                <?php echo e($gallery->title); ?>

                            </h3>
                            <?php if($gallery->description): ?>
                                <p class="text-sm text-slate-500 line-clamp-2"><?php echo e($gallery->description); ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                <?php echo e($galleries->links()); ?>

            </div>
        <?php else: ?>
            <div class="text-center py-16">
                <svg class="w-20 h-20 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Galeri tidak ditemukan</h3>
                <p class="text-slate-600 mb-6">
                    <?php if($search || $selectedExtra): ?>
                        Tidak ada galeri yang sesuai dengan filter yang dipilih.
                    <?php else: ?>
                        Belum ada galeri yang tersedia.
                    <?php endif; ?>
                </p>
                <?php if($search || $selectedExtra): ?>
                    <a href="<?php echo e(route('galleries.index')); ?>" class="inline-flex items-center gap-2 px-6 py-3 bg-primary-600 text-white rounded-full font-semibold hover:bg-primary-700 transition-colors">
                        Lihat Semua Galeri
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', ['title' => $selectedExtra ? 'Galeri - ' . ($extracurriculars->firstWhere('slug', $selectedExtra)?->name ?? 'Galeri') : 'Galeri'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\adyatama-school2\resources\views/galleries/index.blade.php ENDPATH**/ ?>