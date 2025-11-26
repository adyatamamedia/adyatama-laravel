@extends('layouts.public', ['title' => 'Guru & Staff'])

@section('content')
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
                    <li class="font-medium text-slate-900">Guru & Staff</li>
                </ol>
            </nav>

            <h1 class="text-4xl lg:text-5xl font-bold text-slate-900 mb-3">Guru & Staff</h1>
            <p class="text-slate-600 max-w-2xl mx-auto">
                Mengenal lebih dekat para pendidik dan tenaga kependidikan yang berdedikasi tinggi
            </p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <!-- Section Guru -->
        <div class="mb-16">
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-1 h-8 bg-primary-600 rounded-full"></div>
                    <h2 class="text-2xl font-bold text-slate-900">Tenaga Pendidik</h2>
                </div>
                <p class="text-slate-600 ml-6">Guru-guru profesional dan berpengalaman</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @foreach($guru as $person)
                    <a href="{{ route('guru-staff.show', $person->id) }}" class="group bg-white border border-slate-100 rounded-2xl overflow-hidden hover:shadow-xl hover:border-sky-200 transition-all duration-300">
                        <!-- Photo -->
                        <div class="relative aspect-square overflow-hidden bg-slate-100">
                            @if($person->photo_url)
                                <img src="{{ $person->photo_url }}" 
                                     alt="{{ $person->nama_lengkap }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200 text-slate-300">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Gradient overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        
                        <!-- Info -->
                        <div class="p-4 text-center">
                            <h3 class="font-bold text-slate-900 group-hover:text-sky-600 transition-colors line-clamp-2 mb-1">
                                {{ $person->nama_lengkap }}
                            </h3>
                            <p class="text-xs text-slate-500 line-clamp-2">{{ $person->jabatan }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Section Staff -->
        <div>
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-1 h-8 bg-green-600 rounded-full"></div>
                    <h2 class="text-2xl font-bold text-slate-900">Staff & Administrasi</h2>
                </div>
                <p class="text-slate-600 ml-6">Tenaga kependidikan yang mendukung operasional sekolah</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @foreach($staff as $person)
                    <a href="{{ route('guru-staff.show', $person->id) }}" class="group bg-white border border-slate-100 rounded-2xl overflow-hidden hover:shadow-xl hover:border-green-200 transition-all duration-300">
                        <!-- Photo -->
                        <div class="relative aspect-square overflow-hidden bg-slate-100">
                            @if($person->photo_url)
                                <img src="{{ $person->photo_url }}" 
                                     alt="{{ $person->nama_lengkap }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200 text-slate-300">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Gradient overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        
                        <!-- Info -->
                        <div class="p-4 text-center">
                            <h3 class="font-bold text-slate-900 group-hover:text-green-600 transition-colors line-clamp-2 mb-1">
                                {{ $person->nama_lengkap }}
                            </h3>
                            <p class="text-xs text-slate-500 line-clamp-2">{{ $person->jabatan }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
