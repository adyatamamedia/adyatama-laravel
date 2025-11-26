<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(($title ?? $settings['site_name'] ?? 'ADYATAMA SCHOOL') . ' | ADYATAMA SCHOOL'); ?></title>
    <meta name="description" content="<?php echo e($settings['site_description'] ?? 'Website resmi ADYATAMA SCHOOL'); ?>">
    <?php ($favicon = media_url($settings['favicon'] ?? null)); ?>
    <?php if($favicon): ?>
        <link rel="icon" href="<?php echo e($favicon); ?>">
    <?php endif; ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="font-sans antialiased bg-slate-50 text-slate-900">
    <div class="min-h-screen flex flex-col">
        <header class="bg-white/90 backdrop-blur border-b border-slate-100 sticky top-0 z-30">
            <div class="container mx-auto px-4 py-4 flex items-center justify-between">
                <a href="/" class="flex items-center gap-3">
                    <?php ($siteLogo = media_url($settings['site_logo'] ?? null)); ?>
                    <?php if($siteLogo): ?>
                        <img src="<?php echo e($siteLogo); ?>" alt="<?php echo e($settings['site_name'] ?? 'ADYATAMA SCHOOL'); ?>" class="h-12 w-auto">
                    <?php endif; ?>
                </a>


                <nav class="hidden md:flex items-center gap-6" aria-label="Main navigation">
                    <!-- Tentang Kami Dropdown -->
                    <div class="relative group">
                        <button class="<?php echo e(request()->is('page*') ? 'text-sky-600 font-semibold bg-sky-50' : 'text-slate-600 hover:text-sky-600 hover:bg-slate-100'); ?> text-sm flex items-center gap-2 px-3 py-2 rounded-md transition-all duration-200" aria-haspopup="true" aria-expanded="false">
                            Tentang Kami
                            <svg class="w-4 h-4 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-64 bg-white rounded-xl shadow-2xl border border-slate-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50" role="menu">
                            <div class="py-2">
                                <?php $__currentLoopData = $navigation ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="/page/<?php echo e($nav['slug']); ?>" class="block px-4 py-3 text-sm text-slate-700 hover:bg-sky-50 hover:text-sky-600 transition-colors border-b border-slate-100 last:border-b-0 <?php echo e(request()->is('page/'.$nav['slug']) ? 'bg-sky-50 text-sky-600' : ''); ?>" role="menuitem">
                                        <?php echo e($nav['title']); ?>

                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Berita Menu Button -->
                    <button id="beritaMenuBtn" class="<?php echo e(request()->is('posts*') ? 'text-sky-600 font-semibold bg-sky-50' : 'text-slate-600 hover:text-sky-600 hover:bg-slate-100'); ?> text-sm flex items-center gap-2 px-3 py-2 rounded-md transition-all duration-200" aria-haspopup="true" aria-expanded="false">
                        Berita
                        <svg class="w-4 h-4 ml-1 transition-transform duration-200" id="beritaMenuIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Ekstrakurikuler Menu Button -->
                    <button id="ekstraMenuBtn" class="<?php echo e(request()->is('ekstrakurikuler*') ? 'text-sky-600 font-semibold bg-sky-50' : 'text-slate-600 hover:text-sky-600 hover:bg-slate-100'); ?> text-sm flex items-center gap-2 px-3 py-2 rounded-md transition-all duration-200" aria-haspopup="true" aria-expanded="false">
                        Ekstrakurikuler
                        <svg class="w-4 h-4 ml-1 transition-transform duration-200" id="ekstraMenuIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Simple Menu Items -->
                    <a href="/pengumuman" class="<?php echo e(request()->is('pengumuman*') ? 'text-sky-600 font-semibold' : 'text-slate-600 hover:text-sky-600'); ?> text-sm transition-colors">Pengumuman</a>
                    <a href="/galleries" class="<?php echo e(request()->is('galleries*') ? 'text-sky-600 font-semibold' : 'text-slate-600 hover:text-sky-600'); ?> text-sm transition-colors">Galeri</a>
                    <a href="/kontak" class="<?php echo e(request()->is('kontak*') ? 'text-sky-600 font-semibold' : 'text-slate-600 hover:text-sky-600'); ?> text-sm transition-colors">Kontak Kami</a>
                </nav>
                <a href="/daftar-online"
                   class="hidden md:inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-semibold bg-sky-600 text-white hover:bg-sky-700 transition-all">
                    Daftar Sekarang
                </a>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="md:hidden ml-auto p-2 text-slate-600 hover:bg-slate-100 rounded-lg" aria-label="Toggle mobile menu" aria-expanded="false">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </header>

        <!-- Mobile Menu Overlay -->
        <div id="mobileMenuOverlay" class="fixed inset-0 bg-black/50 z-40 hidden opacity-0 transition-opacity duration-300 md:hidden"></div>
        
        <!-- Mobile Menu Sidebar -->
        <div id="mobileMenuSidebar" class="fixed inset-y-0 right-0 w-64 bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 overflow-y-auto md:hidden" role="navigation" aria-label="Mobile menu">
            <div class="p-4 border-b border-slate-100 flex items-center justify-between">
                <span class="font-bold text-slate-900">Menu</span>
                <button id="closeMobileMenuBtn" class="p-2 text-slate-500 hover:bg-slate-100 rounded-lg" aria-label="Close menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-4 flex flex-col gap-2">
                <div class="mb-2">
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2 px-3">Tentang Kami</p>
                    <?php $__currentLoopData = $navigation ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="/page/<?php echo e($nav['slug']); ?>" class="block px-3 py-2 text-sm rounded-md <?php echo e(request()->is('page/'.$nav['slug']) ? 'bg-sky-50 text-sky-600 font-medium' : 'text-slate-600 hover:bg-slate-50'); ?>">
                            <?php echo e($nav['title']); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
                <div class="border-t border-slate-100 my-2"></div>
                
                <a href="/posts" class="block px-3 py-2 text-sm rounded-md <?php echo e(request()->is('posts*') ? 'bg-sky-50 text-sky-600 font-medium' : 'text-slate-600 hover:bg-slate-50'); ?>">Berita</a>
                <a href="/pengumuman" class="block px-3 py-2 text-sm rounded-md <?php echo e(request()->is('pengumuman*') ? 'bg-sky-50 text-sky-600 font-medium' : 'text-slate-600 hover:bg-slate-50'); ?>">Pengumuman</a>
                <a href="/ekstrakurikuler" class="block px-3 py-2 text-sm rounded-md <?php echo e(request()->is('ekstrakurikuler*') ? 'bg-sky-50 text-sky-600 font-medium' : 'text-slate-600 hover:bg-slate-50'); ?>">Ekstrakurikuler</a>
                <a href="/galleries" class="block px-3 py-2 text-sm rounded-md <?php echo e(request()->is('galleries*') ? 'bg-sky-50 text-sky-600 font-medium' : 'text-slate-600 hover:bg-slate-50'); ?>">Galeri</a>
                <a href="/kontak" class="block px-3 py-2 text-sm rounded-md <?php echo e(request()->is('kontak*') ? 'bg-sky-50 text-sky-600 font-medium' : 'text-slate-600 hover:bg-slate-50'); ?>">Kontak Kami</a>
                
                <div class="mt-4">
                    <a href="/daftar-online" class="block w-full text-center bg-sky-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-sky-700 transition-colors">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>

        <!-- Berita Mega Menu Modal -->
        <div id="beritaMegaMenu" class="fixed w-[1000px] max-w-[calc(100vw-2rem)] bg-white rounded-xl shadow-2xl border border-slate-200 opacity-0 invisible transition-all duration-300 z-50 pointer-events-none" role="menu">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-slate-900">Berita Terbaru</h3>
                    <a href="/posts" class="text-sm text-sky-600 hover:text-sky-700 font-medium flex items-center gap-1">
                        Lihat Semua
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                
                
                <?php if(isset($recentPosts) && is_countable($recentPosts) && count($recentPosts) > 0): ?>
                    <div class="overflow-x-auto scrollbar-thin scrollbar-thumb-slate-300 scrollbar-track-slate-100 pb-2">
                        <div class="flex gap-4" style="width: max-content;">
                            <?php $__currentLoopData = $recentPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="/posts/<?php echo e($post->slug); ?>" class="block w-64 bg-white border border-slate-100 rounded-lg overflow-hidden hover:border-sky-300 hover:shadow-lg transition-all duration-200 shrink-0 group/card">
                                    <?php if($post->featured_image_url): ?>
                                        <div class="relative h-40 overflow-hidden bg-slate-100">
                                            <img src="<?php echo e($post->featured_image_url); ?>" 
                                                 alt="<?php echo e($post->title); ?>" 
                                                 class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-300">
                                            <div class="absolute inset-0 bg-linear-to-t from-black/50 to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-300"></div>
                                        </div>
                                    <?php else: ?>
                                        <div class="h-40 bg-linear-to-br from-sky-100 to-sky-200 flex items-center justify-center">
                                            <svg class="w-16 h-16 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                    <div class="p-4">
                                        <h4 class="text-sm font-semibold text-slate-900 line-clamp-2 mb-2 group-hover/card:text-sky-600 transition-colors">
                                            <?php echo e($post->title); ?>

                                        </h4>
                                        <div class="flex items-center text-xs text-slate-500">
                                            <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <?php echo e($post->created_at->format('d M Y')); ?>

                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="text-center py-12 text-slate-500">
                        <svg class="w-16 h-16 mx-auto mb-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        <p class="text-sm mb-3">Belum ada berita tersedia</p>
                        <a href="/posts" class="inline-flex items-center text-sky-600 hover:text-sky-700 font-medium text-sm">
                            Lihat Semua Berita
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Ekstrakurikuler Mega Menu Modal -->
        <div id="ekstraMegaMenu" class="fixed w-[1000px] max-w-[calc(100vw-2rem)] bg-white rounded-xl shadow-2xl border border-slate-200 opacity-0 invisible transition-all duration-300 z-50 pointer-events-none" role="menu">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-slate-900">Ekstrakurikuler</h3>
                    <a href="/ekstrakurikuler" class="text-sm text-sky-600 hover:text-sky-700 font-medium flex items-center gap-1">
                        Lihat Semua
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                
                
                <?php if(isset($extracurriculars) && is_countable($extracurriculars) && count($extracurriculars) > 0): ?>
                    <div class="overflow-x-auto scrollbar-thin scrollbar-thumb-slate-300 scrollbar-track-slate-100 pb-2">
                        <div class="flex gap-4" style="width: max-content;">
                            <?php $__currentLoopData = $extracurriculars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ekstra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php ($firstGallery = $ekstra->galleries->first()); ?>
                                <?php ($firstItem = $firstGallery ? $firstGallery->items->first() : null); ?>
                                <?php ($thumbnail = $firstItem ? $firstItem->image_url : null); ?>
                                
                                <a href="<?php echo e(route('galleries.index', ['extracurricular' => $ekstra->slug])); ?>" class="block w-64 bg-white border border-slate-100 rounded-lg overflow-hidden hover:border-sky-300 hover:shadow-lg transition-all duration-200 shrink-0 group/card">
                                    <?php if($thumbnail): ?>
                                        <div class="relative h-40 overflow-hidden bg-slate-100">
                                            <img src="<?php echo e($thumbnail); ?>" 
                                                 alt="<?php echo e($ekstra->name); ?>" 
                                                 class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-300">
                                            <div class="absolute inset-0 bg-linear-to-t from-black/50 to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-300"></div>
                                        </div>
                                    <?php else: ?>
                                        <div class="h-40 bg-linear-to-br from-sky-100 to-sky-200 flex items-center justify-center">
                                            <svg class="w-16 h-16 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                    <div class="p-4">
                                        <h4 class="text-sm font-semibold text-slate-900 line-clamp-2 mb-2 group-hover/card:text-sky-600 transition-colors">
                                            <?php echo e($ekstra->name); ?>

                                        </h4>
                                        <?php if($ekstra->galleries->count() > 0): ?>
                                            <div class="flex items-center text-xs text-slate-500">
                                                <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <?php echo e($ekstra->galleries->count()); ?> Galeri
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="text-center py-12 text-slate-500">
                        <svg class="w-16 h-16 mx-auto mb-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <p class="text-sm mb-3">Belum ada ekstrakurikuler tersedia</p>
                        <a href="/ekstrakurikuler" class="inline-flex items-center text-sky-600 hover:text-sky-700 font-medium text-sm">
                            Lihat Semua
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <script>
            // Toggle Berita Mega Menu
            const beritaBtn = document.getElementById('beritaMenuBtn');
            const beritaMenu = document.getElementById('beritaMegaMenu');
            const beritaIcon = document.getElementById('beritaMenuIcon');
            const header = document.querySelector('header');
            let menuTimeout;

            // Function to position the menu dynamically
            function positionMegaMenu() {
                const menuWidth = beritaMenu.offsetWidth;
                const viewportWidth = window.innerWidth;
                const leftPosition = (viewportWidth - menuWidth) / 2;
                const headerHeight = header.offsetHeight;
                
                beritaMenu.style.left = leftPosition + 'px';
                beritaMenu.style.top = headerHeight + 'px';
            }

            // Position on load and resize
            window.addEventListener('load', positionMegaMenu);
            window.addEventListener('resize', positionMegaMenu);

            // Show menu
            function showMenu() {
                clearTimeout(menuTimeout);
                positionMegaMenu();
                beritaMenu.classList.remove('opacity-0', 'invisible', 'pointer-events-none');
                beritaMenu.classList.add('opacity-100', 'visible', 'pointer-events-auto');
                beritaIcon.style.transform = 'rotate(180deg)';
                beritaBtn.setAttribute('aria-expanded', 'true');
            }

            // Hide menu
            function hideMenu() {
                menuTimeout = setTimeout(() => {
                    beritaMenu.classList.add('opacity-0', 'invisible', 'pointer-events-none');
                    beritaMenu.classList.remove('opacity-100', 'visible', 'pointer-events-auto');
                    beritaIcon.style.transform = 'rotate(0deg)';
                    beritaBtn.setAttribute('aria-expanded', 'false');
                }, 150);
            }

            // Button hover
            beritaBtn.addEventListener('mouseenter', showMenu);
            beritaBtn.addEventListener('mouseleave', hideMenu);

            // Menu hover
            beritaMenu.addEventListener('mouseenter', () => {
                clearTimeout(menuTimeout);
            });
            beritaMenu.addEventListener('mouseleave', hideMenu);

            // Toggle Ekstrakurikuler Mega Menu
            const ekstraBtn = document.getElementById('ekstraMenuBtn');
            const ekstraMenu = document.getElementById('ekstraMegaMenu');
            const ekstraIcon = document.getElementById('ekstraMenuIcon');
            let ekstraMenuTimeout;

            // Function to position ekstrakurikuler menu
            function positionEkstraMenu() {
                const menuWidth = ekstraMenu.offsetWidth;
                const viewportWidth = window.innerWidth;
                const leftPosition = (viewportWidth - menuWidth) / 2;
                const headerHeight = header.offsetHeight;
                
                ekstraMenu.style.left = leftPosition + 'px';
                ekstraMenu.style.top = headerHeight + 'px';
            }

            // Position on load and resize
            window.addEventListener('load', positionEkstraMenu);
            window.addEventListener('resize', positionEkstraMenu);

            // Show ekstrakurikuler menu
            function showEkstraMenu() {
                clearTimeout(ekstraMenuTimeout);
                positionEkstraMenu();
                ekstraMenu.classList.remove('opacity-0', 'invisible', 'pointer-events-none');
                ekstraMenu.classList.add('opacity-100', 'visible', 'pointer-events-auto');
                ekstraIcon.style.transform = 'rotate(180deg)';
                ekstraBtn.setAttribute('aria-expanded', 'true');
            }

            // Hide ekstrakurikuler menu
            function hideEkstraMenu() {
                ekstraMenuTimeout = setTimeout(() => {
                    ekstraMenu.classList.add('opacity-0', 'invisible', 'pointer-events-none');
                    ekstraMenu.classList.remove('opacity-100', 'visible', 'pointer-events-auto');
                    ekstraIcon.style.transform = 'rotate(0deg)';
                    ekstraBtn.setAttribute('aria-expanded', 'false');
                }, 150);
            }

            // Button hover
            ekstraBtn.addEventListener('mouseenter', showEkstraMenu);
            ekstraBtn.addEventListener('mouseleave', hideEkstraMenu);

            // Menu hover
            ekstraMenu.addEventListener('mouseenter', () => {
                clearTimeout(ekstraMenuTimeout);
            });
            ekstraMenu.addEventListener('mouseleave', hideEkstraMenu);

            // Mobile Menu Logic
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const closeMobileMenuBtn = document.getElementById('closeMobileMenuBtn');
            const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
            const mobileMenuSidebar = document.getElementById('mobileMenuSidebar');

            function toggleMobileMenu() {
                const isHidden = mobileMenuSidebar.classList.contains('translate-x-full');
                
                if (isHidden) {
                    // Open menu
                    document.body.style.overflow = 'hidden'; // Lock body scroll
                    mobileMenuOverlay.classList.remove('hidden');
                    mobileMenuBtn.setAttribute('aria-expanded', 'true');
                    // Small delay to allow display:block to apply before opacity transition
                    setTimeout(() => {
                        mobileMenuOverlay.classList.remove('opacity-0');
                        mobileMenuSidebar.classList.remove('translate-x-full');
                    }, 10);
                } else {
                    // Close menu
                    document.body.style.overflow = ''; // Unlock body scroll
                    mobileMenuOverlay.classList.add('opacity-0');
                    mobileMenuSidebar.classList.add('translate-x-full');
                    mobileMenuBtn.setAttribute('aria-expanded', 'false');
                    setTimeout(() => {
                        mobileMenuOverlay.classList.add('hidden');
                    }, 300);
                }
            }

            mobileMenuBtn.addEventListener('click', toggleMobileMenu);
            closeMobileMenuBtn.addEventListener('click', toggleMobileMenu);
            mobileMenuOverlay.addEventListener('click', toggleMobileMenu);

            // Close mobile menu on Escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !mobileMenuSidebar.classList.contains('translate-x-full')) {
                    toggleMobileMenu();
                }
            });
        </script>

        <main class="flex-1">
            <?php echo e($slot ?? ''); ?>

            <?php echo $__env->yieldContent('content'); ?>
        </main>

        <footer class="bg-slate-900 text-slate-200 mt-16">
            <div class="container mx-auto px-4 py-12 grid md:grid-cols-3 gap-8">
                <div>
                    <p class="text-xl font-semibold mb-2"><?php echo e($settings['site_name'] ?? 'ADYATAMA SCHOOL'); ?></p>
                    <p class="text-sm text-slate-400"><?php echo e($settings['site_description'] ?? ''); ?></p>
                </div>
                <div>
                    <p class="font-medium mb-2">Kontak</p>
                    <p class="text-sm"><?php echo e($settings['address'] ?? 'Alamat belum tersedia'); ?></p>
                    <p class="text-sm">Telp: <?php echo e($settings['phone'] ?? '-'); ?></p>
                    <p class="text-sm">Email: <?php echo e($settings['email'] ?? '-'); ?></p>
                </div>
                <div>
                    <p class="font-medium mb-2">Navigasi</p>
                    <div class="flex flex-col gap-1 text-sm text-slate-400">
                        <a href="/posts" class="hover:text-white">Berita</a>
                        <a href="/galleries" class="hover:text-white">Galeri</a>
                        <a href="/daftar-online" class="hover:text-white">Daftar Online</a>
                        <a href="/kontak" class="hover:text-white">Kontak</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-800 py-4 text-center text-xs text-slate-500">
                &copy; <?php echo e(date('Y')); ?> ADYATAMA SCHOOL. All rights reserved.
            </div>
        </footer>
    </div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\adyatama-school2\resources\views/layouts/public.blade.php ENDPATH**/ ?>