@extends('layouts.public', ['title' => 'Ekstrakurikuler'])

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
                    <li class="font-medium text-slate-900">Ekstrakurikuler</li>
                </ol>
            </nav>

            <h1 class="text-4xl lg:text-5xl font-bold text-slate-900 mb-3">Ekstrakurikuler</h1>
            <p class="text-slate-600 max-w-2xl mx-auto">Berbagai kegiatan pengembangan minat, bakat, dan karakter siswa</p>
        </div>
    </div>
</section>

<!-- Ekstrakurikuler Grid Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-6">
            @foreach($extracurriculars as $item)
                <a href="{{ route('galleries.index', ['extracurricular' => $item->slug]) }}" class="group bg-white border border-slate-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:border-sky-200 transition-all duration-300">
                    <!-- Thumbnail -->
                    <div class="relative aspect-[4/3] overflow-hidden bg-slate-100">
                        @php
                            $thumbnail = $item->galleries->first()?->items->first()?->image_url;
                        @endphp
                        
                        @if($thumbnail)
                            <img src="{{ $thumbnail }}" 
                                 alt="{{ $item->name }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-sky-50 text-sky-200">
                                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                        
                        <!-- Gradient overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <!-- Gallery count badge -->
                        @if($item->galleries->count() > 0)
                            <div class="absolute top-3 right-3 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-semibold text-slate-700 shadow-sm">
                                {{ $item->galleries->count() }} Galeri
                            </div>
                        @endif
                    </div>
                    
                    <!-- Content -->
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-sky-600 transition-colors">
                            {{ $item->name }}
                        </h3>
                        <p class="text-sm text-slate-600 line-clamp-2 leading-relaxed">
                            {{ $item->description }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

@endsection
