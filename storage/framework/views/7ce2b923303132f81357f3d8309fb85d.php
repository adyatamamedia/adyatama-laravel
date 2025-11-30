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
                    <li>
                        <a href="/guru-staff" class="hover:text-primary-600 transition-colors">Guru & Staff</a>
                    </li>
                    <li>
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </li>
                    <li class="font-medium text-slate-900"><?php echo e($person->nama_lengkap); ?></li>
                </ol>
            </nav>

            <h1 class="text-4xl lg:text-5xl font-bold text-slate-900 mb-3"><?php echo e($person->nama_lengkap); ?></h1>
            <p class="text-lg text-primary-600 font-semibold"><?php echo e($person->jabatan); ?></p>
        </div>
    </div>
</section>

<!-- Profile Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-[1000px] mx-auto">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="/guru-staff" class="inline-flex items-center gap-2 text-slate-500 hover:text-primary-600 transition-colors font-medium text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Daftar
                </a>
            </div>

            <!-- Profile Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-8 lg:p-12">
                    <div class="flex flex-col lg:flex-row gap-8 items-start">
                        <!-- Profile Photo -->
                        <div class="w-full lg:w-64 flex-shrink-0">
                            <div class="aspect-[3/4] rounded-xl overflow-hidden bg-slate-100 border border-slate-200 shadow-md">
                                <?php if($person->photo_url): ?>
                                    <img src="<?php echo e($person->photo_url); ?>" alt="<?php echo e($person->nama_lengkap); ?>" class="w-full h-full object-cover">
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200 text-slate-300">
                                        <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Profile Info -->
                        <div class="flex-1 w-full">
                            <div class="space-y-6">
                                <!-- Bidang Keahlian -->
                                <?php if($person->bidang): ?>
                                <div class="pb-6 border-b border-slate-100">
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Bidang Keahlian</p>
                                            <p class="text-lg font-semibold text-slate-900"><?php echo e($person->bidang); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <!-- Status -->
                                <div class="pb-6 border-b border-slate-100">
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Status</p>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold <?php echo e($person->status === 'aktif' ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-700'); ?>">
                                                <?php echo e(ucfirst($person->status)); ?>

                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- NIP -->
                                <?php if($person->nip): ?>
                                <div class="pb-6 border-b border-slate-100">
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">NIP</p>
                                            <p class="text-base font-mono font-semibold text-slate-900"><?php echo e($person->nip); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <!-- Email -->
                                <?php if($person->email): ?>
                                <div>
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Email</p>
                                            <a href="mailto:<?php echo e($person->email); ?>" class="text-base font-medium text-primary-600 hover:text-primary-700 transition-colors break-all">
                                                <?php echo e($person->email); ?>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', [
    'title' => $person->nama_lengkap,
    'description' => $person->jabatan . ($person->bidang ? ' - ' . $person->bidang : ''),
    'image' => $person->photo_url,
    'type' => 'profile'
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\adyatama-school2\resources\views/guru-staff/show.blade.php ENDPATH**/ ?>