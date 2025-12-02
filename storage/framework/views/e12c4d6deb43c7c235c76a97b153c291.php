<?php
    // Get featured image URL using accessor (falls back to first gallery item)
    $featuredImageUrl = $gallery->featured_image_url 
        ?: ($gallery->items->isNotEmpty() ? $gallery->items->first()->image_url : null);
?>



<?php $__env->startSection('content'); ?>
<!-- Header Section with Background Image -->
<section class="relative py-20 lg:py-28 border-b border-slate-100 overflow-hidden">
    <!-- Background Image with Overlay -->
    <?php if($featuredImageUrl): ?>
    <div class="absolute inset-0 z-0">
        <img src="<?php echo e($featuredImageUrl); ?>" alt="<?php echo e($gallery->title); ?>" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/70"></div>
    </div>
    <?php else: ?>
    <div class="absolute inset-0 z-0 bg-gradient-to-br from-sky-900 via-slate-800 to-blue-900">
        <div class="absolute inset-0 bg-black/30"></div>
    </div>
    <?php endif; ?>
    
    <!-- Content -->
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-5xl mx-auto">
            <!-- Breadcrumb -->
            <nav class="mb-8 flex justify-center">
                <ol class="flex items-center gap-2 text-sm text-white/80">
                    <li class="hidden sm:block">
                        <a href="/" class="hover:text-white transition-colors">Beranda</a>
                    </li>
                    <li class="hidden sm:block">
                        <svg class="w-4 h-4 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </li>
                    <li>
                        <a href="<?php echo e(route('galleries.index')); ?>" class="hover:text-white transition-colors">Galeri</a>
                    </li>
                    <li>
                        <svg class="w-4 h-4 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </li>
                    <li class="font-medium text-white truncate max-w-[200px] sm:max-w-none"><?php echo e(Str::limit($gallery->title, 40)); ?></li>
                </ol>
            </nav>

            <!-- Title -->
            <div class="text-center mb-8">
                <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6 leading-tight drop-shadow-2xl"><?php echo e($gallery->title); ?></h1>
            </div>

            <!-- Meta Info - Compact & Consistent -->
            <div class="flex items-center justify-center gap-3 flex-wrap text-sm text-white/90 max-w-4xl mx-auto">
                <!-- Author -->
                <div class="flex items-center gap-2 bg-white/10 backdrop-blur-sm pl-1 pr-3 py-1.5 rounded-full min-w-0">
                    <?php if($gallery->author?->photo_url): ?>
                        <img src="<?php echo e($gallery->author->photo_url); ?>" 
                             alt="<?php echo e($gallery->author->fullname); ?>" 
                             class="w-6 h-6 rounded-full object-cover shrink-0">
                    <?php else: ?>
                        <div class="w-6 h-6 rounded-full bg-white/30 flex items-center justify-center text-white font-bold text-xs shrink-0">
                            <?php echo e(strtoupper(substr($gallery->author?->fullname ?? 'A', 0, 1))); ?>

                        </div>
                    <?php endif; ?>
                    <span class="font-medium truncate"><?php echo e($gallery->author?->fullname ?? 'Admin'); ?></span>
                </div>
                
                <!-- Extracurricular -->
                <?php if($gallery->extracurricular?->name): ?>
                <div class="flex items-center gap-2 bg-white/10 backdrop-blur-sm px-3 py-1.5 rounded-full min-w-0">
                    <svg class="w-4 h-4 text-white/70 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    <span class="truncate"><?php echo e($gallery->extracurricular->name); ?></span>
                </div>
                <?php endif; ?>
                
                <!-- Date -->
                <div class="flex items-center gap-2 bg-white/10 backdrop-blur-sm px-3 py-1.5 rounded-full">
                    <svg class="w-4 h-4 text-white/70 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="whitespace-nowrap"><?php echo e($gallery->created_at?->format('d M Y')); ?></span>
                </div>
                
                <!-- Views -->
                <div class="flex items-center gap-2 bg-white/10 backdrop-blur-sm px-3 py-1.5 rounded-full">
                    <svg class="w-4 h-4 text-white/70 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    <span class="font-semibold whitespace-nowrap"><?php echo e(number_format($gallery->view_count ?? 0)); ?></span>
                </div>
            </div>

            <!-- Header Share Buttons -->
            <div class="flex justify-center gap-2 mt-6">
                <!-- Facebook -->
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(request()->fullUrl())); ?>" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white backdrop-blur-sm transition-all hover:scale-110"
                   title="Bagikan ke Facebook">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>

                <!-- Twitter -->
                <a href="https://twitter.com/intent/tweet?text=<?php echo e(urlencode($gallery->title)); ?>&url=<?php echo e(urlencode(request()->fullUrl())); ?>" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white backdrop-blur-sm transition-all hover:scale-110"
                   title="Bagikan ke Twitter">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                </a>

                <!-- WhatsApp -->
                <a href="https://wa.me/?text=<?php echo e(urlencode($gallery->title . ' ' . request()->fullUrl())); ?>" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white backdrop-blur-sm transition-all hover:scale-110"
                   title="Bagikan ke WhatsApp">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.232-.298.33-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                </a>

                <!-- Copy Link -->
                <button onclick="navigator.clipboard.writeText(window.location.href); this.classList.add('bg-white/30'); setTimeout(() => this.classList.remove('bg-white/30'), 200)" 
                        class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white backdrop-blur-sm transition-all hover:scale-110"
                        title="Salin Link">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Content Section -->
<section class="py-12 lg:py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">

            <!-- Gallery Masonry Layout -->
            <div class="masonry-grid">
                <?php $__currentLoopData = $gallery->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->image_url): ?>
                        <div class="masonry-item group relative rounded-lg overflow-hidden cursor-pointer aspect-square" onclick="openGalleryLightbox(<?php echo e($index); ?>)">
                            <div class="relative w-full h-full bg-slate-100">
                                <img 
                                    src="<?php echo e($item->image_url); ?>" 
                                    alt="<?php echo e($item->caption ?? $gallery->title); ?>" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    loading="lazy">
                                
                                <!-- Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center">
                                    <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                        <div class="w-16 h-16 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center border-2 border-white/60 shadow-lg">
                                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php if($gallery->items->isEmpty()): ?>
                <div class="text-center py-16">
                    <svg class="w-20 h-20 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p class="text-slate-500">Belum ada foto di galeri ini</p>
                </div>
            <?php endif; ?>

            <!-- Description & Share Section -->
            <?php if($gallery->description): ?>
            <div class="mt-12 pt-8 border-t border-slate-200">
                <div class="content-body">
                    <?php echo $gallery->description; ?>

                </div>
            </div>
            <?php endif; ?>

            <!-- Share Buttons -->
            <div class="mt-8 pt-8 border-t border-slate-200">
                <p class="text-sm font-semibold text-slate-700 mb-4">Bagikan galeri ini:</p>
                <div class="flex flex-wrap gap-3">
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(request()->fullUrl())); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 px-4 py-2 bg-[#1877F2] text-white rounded-lg text-sm font-medium hover:bg-[#0C63D4] transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        <span>Facebook</span>
                    </a>

                    <!-- Twitter -->
                    <a href="https://twitter.com/intent/tweet?text=<?php echo e(urlencode($gallery->title)); ?>&url=<?php echo e(urlencode(request()->fullUrl())); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 px-4 py-2 bg-slate-900 text-white rounded-lg text-sm font-medium hover:bg-slate-800 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                        <span>Twitter</span>
                    </a>

                    <!-- WhatsApp -->
                    <a href="https://wa.me/?text=<?php echo e(urlencode($gallery->title . ' ' . request()->fullUrl())); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 px-4 py-2 bg-[#25D366] text-white rounded-lg text-sm font-medium hover:bg-[#1DA851] transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.232-.298.33-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        <span>WhatsApp</span>
                    </a>

                    <!-- Copy Link -->
                    <button 
                        onclick="navigator.clipboard.writeText(window.location.href); this.querySelector('span').textContent = 'Tersalin!'; setTimeout(() => this.querySelector('span').textContent = 'Salin Link', 2000)"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-slate-100 text-slate-700 rounded-lg text-sm font-medium hover:bg-slate-200 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                        <span>Salin Link</span>
                    </button>
                </div>
            </div>

                <!-- Comments Section -->
                <div class="mt-12">
                    <h3 class="text-2xl font-bold text-slate-900 mb-6">Komentar (<?php echo e($gallery->comments_count ?? 0); ?>)</h3>

                    <?php if(session('success')): ?>
                        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700 text-sm">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <!-- Comment Form -->
                    <form action="<?php echo e(route('gallery.comments.store', $gallery->slug)); ?>" method="POST" class="mb-8 bg-slate-50 p-6 rounded-xl">
                        <?php echo csrf_field(); ?>
                        <p class="font-semibold text-slate-800 mb-4">Tulis Komentar</p>
                        <div class="grid sm:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-2">Nama Lengkap</label>
                                <input type="text" name="author_name" value="<?php echo e(old('author_name')); ?>" class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-primary-500 focus:ring-2 focus:ring-primary-100 text-sm transition-all <?php $__errorArgs = ['author_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <?php $__errorArgs = ['author_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-2">Email</label>
                                <input type="email" name="author_email" value="<?php echo e(old('author_email')); ?>" class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-primary-500 focus:ring-2 focus:ring-primary-100 text-sm transition-all <?php $__errorArgs = ['author_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <?php $__errorArgs = ['author_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-xs font-medium text-slate-600 mb-2">Komentar</label>
                            <textarea name="content" rows="4" class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-primary-500 focus:ring-2 focus:ring-primary-100 text-sm transition-all <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('content')); ?></textarea>
                            <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <button type="submit" class="px-6 py-3 bg-slate-900 text-white text-sm font-semibold rounded-lg hover:bg-slate-800 hover:shadow-lg transition-all">
                            Kirim Komentar
                        </button>
                    </form>

                    <!-- Comments List -->
                    <div class="space-y-6">
                        <?php $__empty_1 = true; $__currentLoopData = $gallery->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="flex gap-4 p-4 rounded-xl hover:bg-slate-50 transition-colors">
                                <div class="shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center text-white font-bold text-sm shadow-sm">
                                    <?php echo e(strtoupper(substr($comment->author_name, 0, 2))); ?>

                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-3 mb-2">
                                        <h4 class="font-bold text-slate-900"><?php echo e($comment->author_name); ?></h4>
                                        <span class="text-xs text-slate-400"><?php echo e($comment->created_at->diffForHumans()); ?></span>
                                    </div>
                                    <p class="text-slate-600 leading-relaxed"><?php echo e($comment->content); ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="text-center py-12">
                                <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                <p class="text-slate-500">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
        </div>
    </div>
</section>

<!-- Gallery Lightbox Modal -->
<div id="gallery-lightbox" class="fixed inset-0 z-50 hidden bg-black/95 backdrop-blur-sm" onclick="closeGalleryLightbox()">
    <div class="h-screen flex flex-col">
        <!-- Header -->
        <div class="flex items-center justify-between p-4 lg:p-6 shrink-0">
            <div class="text-white">
                <p class="text-sm opacity-75"><?php echo e($gallery->title); ?></p>
                <p id="lightbox-caption" class="text-lg font-semibold"></p>
            </div>
            <button onclick="closeGalleryLightbox()" class="text-white hover:text-gray-300 transition-colors">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Main Image -->
        <div class="flex-1 flex items-center justify-center px-4 lg:px-16 relative overflow-hidden" onclick="event.stopPropagation()">
            <!-- Previous Button -->
            <button onclick="previousImage()" class="absolute left-4 lg:left-8 w-12 h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white transition-all backdrop-blur-sm z-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>

            <!-- Image Container -->
            <div class="w-full h-full flex items-center justify-center">
                <img id="lightbox-main-img" src="" alt="" class="max-w-full max-h-full w-auto h-auto object-contain rounded-lg shadow-2xl">
            </div>

            <!-- Next Button -->
            <button onclick="nextImage()" class="absolute right-4 lg:right-8 w-12 h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white transition-all backdrop-blur-sm z-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>

        <!-- Thumbnails Preview -->
        <div class="p-4 pb-20 lg:pb-6 shrink-0" onclick="event.stopPropagation()">
            <div id="lightbox-thumbnails" class="flex gap-2 overflow-x-auto pb-2 scrollbar-thin scrollbar-thumb-white/20 scrollbar-track-transparent">
                <!-- Thumbnails will be injected here -->
            </div>
        </div>
    </div>
</div>

<script>
    const galleryImages = <?php echo json_encode($gallery->items->filter(fn($item) => $item->image_url)->values()->map(fn($item) => [
        'url' => $item->image_url, 'caption' => $item->caption ?? ''
    ]), 512) ?>;
    
    let currentImageIndex = 0;

    function openGalleryLightbox(index) {
        currentImageIndex = index;
        updateLightboxImage();
        document.getElementById('gallery-lightbox').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        generateThumbnails();
    }

    function closeGalleryLightbox() {
        document.getElementById('gallery-lightbox').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    function updateLightboxImage() {
        const image = galleryImages[currentImageIndex];
        document.getElementById('lightbox-main-img').src = image.url;
        document.getElementById('lightbox-caption').textContent = image.caption || 'Foto ' + (currentImageIndex + 1);
        updateActiveThumbnail();
    }

    function previousImage() {
        currentImageIndex = (currentImageIndex - 1 + galleryImages.length) % galleryImages.length;
        updateLightboxImage();
    }

    function nextImage() {
        currentImageIndex = (currentImageIndex + 1) % galleryImages.length;
        updateLightboxImage();
    }

    function jumpToImage(index) {
        currentImageIndex = index;
        updateLightboxImage();
    }

    function generateThumbnails() {
        const container = document.getElementById('lightbox-thumbnails');
        container.innerHTML = '';
        
        galleryImages.forEach((image, index) => {
            const thumb = document.createElement('div');
            thumb.className = 'shrink-0 w-20 h-20 rounded-lg overflow-hidden border-2 cursor-pointer transition-all hover:opacity-100 ' + 
                (index === currentImageIndex ? 'border-white opacity-100' : 'border-white/30 opacity-60');
            thumb.onclick = () => jumpToImage(index);
            thumb.innerHTML = `<img src="${image.url}" alt="" class="w-full h-full object-cover">`;
            thumb.dataset.index = index;
            container.appendChild(thumb);
        });
    }

    function updateActiveThumbnail() {
        const thumbnails = document.querySelectorAll('#lightbox-thumbnails > div');
        thumbnails.forEach((thumb, index) => {
            if (index === currentImageIndex) {
                thumb.className = 'shrink-0 w-20 h-20 rounded-lg overflow-hidden border-2 cursor-pointer transition-all opacity-100 border-white';
                thumb.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
            } else {
                thumb.className = 'shrink-0 w-20 h-20 rounded-lg overflow-hidden border-2 cursor-pointer transition-all hover:opacity-100 border-white/30 opacity-60';
            }
        });
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        const lightbox = document.getElementById('gallery-lightbox');
        if (!lightbox.classList.contains('hidden')) {
            if (e.key === 'Escape') {
                closeGalleryLightbox();
            } else if (e.key === 'ArrowLeft') {
                previousImage();
            } else if (e.key === 'ArrowRight') {
                nextImage();
            }
        }
    });
</script>

<style>
    /* Masonry Grid Layout - Square (1:1) ratio */
    .masonry-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.5rem;
    }

    @media (min-width: 640px) {
        .masonry-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }
    }

    @media (min-width: 1024px) {
        .masonry-grid {
            grid-template-columns: repeat(4, 1fr);
            gap: 1.25rem;
        }
    }

    .masonry-item {
        /* Aspect-square handled by Tailwind class */
    }

    /* Images crop to square */
    .masonry-item img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    /* Remove any extra spacing */
    .masonry-item > div {
        display: block;
        width: 100%;
        height: 100%;
    }
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', [
    'title' => $gallery->title,
    'description' => $gallery->description ? strip_tags($gallery->description) : 'Galeri Foto ' . $gallery->title,
    'image' => $featuredImageUrl ?? asset('images/default-og.jpg'),
    'type' => 'article'
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\adyatama-school2\resources\views/galleries/show.blade.php ENDPATH**/ ?>