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
                    <li class="font-medium text-slate-900">Pengumuman</li>
                </ol>
            </nav>

            <h1 class="text-4xl lg:text-5xl font-bold text-slate-900 mb-3">Pengumuman Sekolah</h1>
            <p class="text-slate-600 max-w-2xl mx-auto">Informasi penting dan pengumuman resmi dari sekolah</p>
        </div>
    </div>
</section>

<!-- Announcements Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <?php if($posts->count()): ?>
            <div class="max-w-[700px] mx-auto space-y-6">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="group bg-white border border-slate-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:border-sky-200 transition-all duration-300">
                        <?php if($post->featured_image_url): ?>
                            <a href="/posts/<?php echo e($post->slug); ?>" class="block relative aspect-video overflow-hidden bg-slate-100">
                                <img src="<?php echo e($post->featured_image_url); ?>" 
                                     alt="<?php echo e($post->title); ?>" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <!-- Gradient overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </a>
                        <?php endif; ?>
                        
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-2 text-xs text-slate-500">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <?php echo e($post->published_at?->format('d M Y')); ?>

                                </div>
                                <span class="px-3 py-1 rounded-full bg-amber-50 text-amber-700 text-xs font-semibold uppercase">
                                    Pengumuman
                                </span>
                            </div>
                            
                            <h2 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-sky-600 transition-colors">
                                <a href="/posts/<?php echo e($post->slug); ?>"><?php echo e($post->title); ?></a>
                            </h2>
                            
                            <?php if($post->excerpt): ?>
                                <p class="text-slate-600 mb-4 leading-relaxed"><?php echo e(Str::limit($post->excerpt, 150, '...')); ?></p>
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                </svg>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Belum ada pengumuman</h3>
                <p class="text-slate-600">Pengumuman akan muncul di sini ketika tersedia</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', ['title' => 'Pengumuman'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\adyatama-school2\resources\views/posts/announcements.blade.php ENDPATH**/ ?>