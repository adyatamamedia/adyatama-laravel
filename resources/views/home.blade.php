@extends('layouts.public', [
    'title' => 'Beranda',
    'title_override' => ($settings['site_name'] ?? 'ADYATAMA SCHOOL') . ' | ' . ($settings['site_tagline'] ?? 'Membentuk Generasi Qurani dan Berprestasi'),
    'description' => $settings['site_description'] ?? 'Sekolah Islam terpadu dengan fokus pada karakter dan prestasi akademik.',
    'image' => $settings['hero_bg_image'] ?? null,
])

@section('content')
    <section class="bg-gradient-to-br from-sky-50 to-white py-16">
        <div class="container mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <p class="text-sm uppercase tracking-[0.4em] text-sky-500 font-semibold mb-4">
                    {{ $settings['site_name'] ?? 'Adyatama Islamic School' }}</p>
                <h1 class="text-4xl md:text-5xl font-bold leading-tight text-slate-900 mb-6">
                    {{ $settings['site_tagline'] ?? 'Membentuk Generasi Qurani dan Berprestasi' }}</h1>
                <p class="text-lg text-slate-600 mb-8">
                    {{ $settings['site_description'] ?? 'Sekolah Islam terpadu dengan fokus pada karakter dan prestasi akademik.' }}
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="/daftar-online"
                        class="inline-flex items-center gap-2 bg-sky-600 text-white px-6 py-3 rounded-full font-semibold shadow-lg shadow-sky-200">
                        Daftar Online MI
                    </a>
                    <a href="/posts"
                        class="inline-flex items-center gap-2 border border-slate-200 px-6 py-3 rounded-full font-semibold text-slate-700 hover:border-slate-300">
                        Lihat Berita Terbaru
                    </a>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -inset-4 bg-sky-100 rounded-3xl blur-xl"></div>
                <div class="relative bg-white rounded-3xl shadow-xl overflow-hidden">
                    @php($heroImage = media_url($settings['hero_bg_image'] ?? null))
                    @if ($heroImage)
                        <img src="{{ $heroImage }}" alt="{{ $settings['site_name'] ?? 'Hero Image' }}"
                            class="w-full h-auto">
                    @elseif($featuredImage = $featuredPost?->featured_image_url)
                        <img src="{{ $featuredImage }}" alt="{{ $featuredPost->title }}" class="w-full h-auto">
                    @endif
                </div>
            </div>
        </div>
    </section>

    @if (isset($welcomeMessage) && $welcomeMessage)
        <section class="py-16 md:py-12 bg-slate-900 border-b border-slate-800">
            <div class="container mx-auto px-4">
                <div class="grid md:grid-cols-10 gap-6 items-center">
                    <!-- Left: Image -->
                    <div class="md:col-span-3 flex justify-center md:justify-start">
                        <div class="relative w-[150px] md:w-full aspect-square md:aspect-[5/4]">
                            <div class="absolute -inset-4 bg-white/5 rounded-3xl -z-10 transform -rotate-2 w-full h-full">
                            </div>
                            <div class="relative rounded-2xl overflow-hidden shadow-lg w-full h-full">
                                @if ($welcomeMessage->featured_image_url)
                                    <img src="{{ $welcomeMessage->featured_image_url }}" alt="Kepala Sekolah"
                                        class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-slate-800 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-slate-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Right: Content -->
                    <div class="md:col-span-7">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-[2px] bg-amber-500 rounded-full"></div>
                            <span class="text-sm font-bold text-amber-500 tracking-widest uppercase">Sambutan Kepala
                                Sekolah</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6 leading-tight">
                            {{ $welcomeMessage->title }}
                        </h2>
                        <div class="prose prose-invert text-slate-300 mb-8 leading-relaxed">
                            <p>{{ Str::limit(strip_tags($welcomeMessage->content), 400) }}</p>
                        </div>
                        <a href="/page/kata-pengantar"
                            class="inline-flex items-center gap-2 text-sky-400 font-bold hover:text-sky-300 transition-colors group">
                            Baca Selengkapnya
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500 uppercase tracking-widest font-semibold mb-1">Update Terkini</p>
                    <h2 class="text-3xl font-bold text-slate-900">Berita Utama</h2>
                </div>
                <a href="/posts"
                    class="text-sky-600 font-semibold text-sm hover:text-sky-700 transition-colors flex items-center gap-1">
                    Lihat semua
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <div class="relative group/carousel">
                <!-- Carousel Container -->
                <div class="flex flex-nowrap overflow-x-auto snap-x snap-mandatory gap-6 pb-8 -mx-4 px-4 scrollbar-hide"
                    style="scrollbar-width: none; -ms-overflow-style: none;">
                    @foreach ($latestPosts as $post)
                        <a href="/posts/{{ $post->slug }}"
                            class="snap-start shrink-0 w-[85vw] md:w-[calc(50%-1.5rem)] lg:w-[calc(25%-1.125rem)] group bg-white border border-slate-100 rounded-2xl overflow-hidden hover:shadow-xl hover:border-sky-200 transition-all duration-300 flex flex-col h-full">
                            <!-- Image -->
                            <div class="relative aspect-[4/3] overflow-hidden bg-slate-100">
                                @if ($post->featured_image_url)
                                    <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-sky-50 text-sky-200">
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                                <div
                                    class="absolute top-3 left-3 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-semibold text-slate-700 shadow-sm">
                                    {{ $post->category->name ?? 'Berita' }}
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-5 flex flex-col flex-1">
                                <h3
                                    class="text-lg font-bold text-slate-900 mb-2 line-clamp-2 group-hover:text-sky-600 transition-colors">
                                    {{ $post->title }}
                                </h3>
                                <p class="text-slate-500 text-sm line-clamp-2 mb-4 flex-1">
                                    {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 100) }}
                                </p>
                                <div
                                    class="flex items-center text-xs text-slate-400 font-medium pt-4 border-t border-slate-50 mt-auto">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $post->published_at?->format('d M Y') ?? $post->created_at->format('d M Y') }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="mb-10 text-center">
                <p class="text-sm text-slate-500 uppercase tracking-[0.4em]">Galeri</p>
                <h2 class="text-3xl font-bold text-slate-900">Momen Terbaik Siswa</h2>
            </div>
            <div class="flex flex-nowrap overflow-x-auto snap-x snap-mandatory gap-6 pb-8 -mx-4 px-4 scrollbar-hide md:grid md:grid-cols-3 md:overflow-visible md:pb-0 md:mx-0 md:px-0"
                style="scrollbar-width: none; -ms-overflow-style: none;">
                @foreach ($galleries as $gallery)
                    <a href="/galleries/{{ $gallery->slug }}"
                        class="snap-start shrink-0 w-[85vw] md:w-auto group rounded-3xl overflow-hidden border border-slate-100 bg-slate-50 block">
                        <div class="relative">
                            @php($cover = $gallery->items->first()?->image_url)
                            @if ($cover)
                                <img src="{{ $cover }}" alt="{{ $gallery->title }}"
                                    class="aspect-[4/3] w-full object-cover">
                            @else
                                <div
                                    class="aspect-[4/3] bg-slate-200 flex items-center justify-center text-slate-500 text-sm">
                                    {{ $gallery->items->first()->caption ?? 'Galeri Sekolah' }}
                                </div>
                            @endif

                            <!-- Desktop Hover Overlay -->
                            <div
                                class="hidden md:block absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition duration-300">
                            </div>
                            <div
                                class="hidden md:flex flex-col justify-end absolute inset-0 p-4 opacity-0 group-hover:opacity-100 transition duration-300">
                                <p class="text-white font-bold mb-2 line-clamp-2">{{ $gallery->title }}</p>
                                <div class="flex items-center gap-3 text-xs text-white/80">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span>{{ $gallery->created_at->format('d M Y') }}</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <span>{{ $gallery->view_count ?? 0 }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Mobile Item Count Badge -->
                            <div
                                class="md:hidden absolute top-3 right-3 bg-black/60 backdrop-blur-sm text-white text-xs px-2 py-1 rounded-full flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $gallery->items->count() }}
                            </div>
                        </div>

                        <!-- Mobile Content -->
                        <div class="p-4 md:hidden">
                            <h3 class="font-bold text-slate-900 mb-2 line-clamp-2">{{ $gallery->title }}</h3>
                            <div class="flex items-center justify-between text-xs text-slate-500">
                                <div class="flex items-center gap-2">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>{{ $gallery->created_at->format('d M Y') }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <span>{{ $gallery->view_count ?? 0 }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-16 bg-slate-900 text-white">
        <div class="container mx-auto px-4">
            <div class="mb-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <p class="text-sm uppercase tracking-[0.4em] text-slate-400">Tenaga Pendidik</p>
                    <h2 class="text-3xl font-bold">Guru dan Pembina Unggulan</h2>
                </div>
                <a href="/guru-staff"
                    class="inline-flex items-center gap-2 text-sm font-semibold text-sky-300 hover:text-sky-200 transition">Lihat
                    semua →</a>
            </div>
            <div class="grid md:grid-cols-4 gap-6">
                @foreach ($guru as $person)
                    <a href="{{ route('guru-staff.show', $person->id) }}"
                        class="group bg-white/5 border border-white/10 rounded-2xl p-4 hover:bg-white/10 transition duration-300">
                        <div class="flex items-center gap-4">
                            <div
                                class="h-16 w-16 rounded-full overflow-hidden border-2 border-white/20 group-hover:border-sky-400 transition flex-shrink-0">
                                @if ($person->photo_url)
                                    <img src="{{ $person->photo_url }}" alt="{{ $person->nama_lengkap }}"
                                        class="h-full w-full object-cover">
                                @else
                                    <div
                                        class="h-full w-full flex items-center justify-center bg-white/10 text-lg font-semibold text-slate-300">
                                        {{ strtoupper(mb_substr($person->nama_lengkap, 0, 1)) }}
                                    </div>
                                @endif
                            </div>
                            <div class="min-w-0">
                                <p class="font-semibold truncate group-hover:text-sky-300 transition">
                                    {{ $person->nama_lengkap }}</p>
                                <p class="text-sm text-slate-400 truncate">{{ $person->jabatan ?? 'Guru' }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Siap bergabung dengan {{ $settings['site_name'] ?? 'ADYATAMA SCHOOL' }}?
            </h2>
            <p class="text-lg text-slate-600 mb-8">Isi formulir pendaftaran online MI dan tim kami akan menghubungi dalam
                1x24 jam.</p>
            <a href="/daftar-online"
                class="inline-flex items-center gap-2 bg-emerald-500 text-white px-8 py-3 rounded-full font-semibold">
                Mulai Pendaftaran
            </a>
        </div>
    </section>
@endsection
