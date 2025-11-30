@extends('layouts.public', [
    'title' => 'Penulis',
    'description' => 'Daftar penulis dan kontributor konten'
])

@section('content')
<!-- Header Section -->
<section class="py-12 bg-gradient-to-br from-sky-50 via-white to-blue-50 border-b border-slate-100">
    <div class="container mx-auto px-4">
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
                    <li class="font-medium text-slate-900">Penulis</li>
                </ol>
            </nav>

            <h1 class="text-4xl lg:text-5xl font-bold text-slate-900 mb-3">Penulis</h1>
            <p class="text-slate-600 max-w-2xl mx-auto">Daftar penulis dan kontributor konten di website kami</p>
        </div>
    </div>
</section>

<!-- Authors Grid Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            @if($authors->count() > 0)
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($authors as $author)
                        <a href="{{ route('authors.show', $author) }}" class="group bg-white border border-slate-200 rounded-2xl p-6 hover:shadow-xl hover:border-primary-300 transition-all duration-300">
                            <div class="flex flex-col items-center text-center">
                                <!-- Avatar -->
                                <div class="relative mb-4">
                                    @if($author->photo_url)
                                        <img src="{{ $author->photo_url }}" 
                                             alt="{{ $author->fullname }}" 
                                             class="w-24 h-24 rounded-full object-cover border-4 border-slate-100 group-hover:border-primary-200 transition-colors">
                                    @else
                                        <div class="w-24 h-24 rounded-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center text-white text-3xl font-bold border-4 border-slate-100 group-hover:border-primary-200 transition-colors">
                                            {{ strtoupper(substr($author->fullname, 0, 1)) }}
                                        </div>
                                    @endif
                                    
                                    <!-- Online Badge -->
                                    <div class="absolute bottom-1 right-1 w-5 h-5 bg-green-500 rounded-full border-2 border-white"></div>
                                </div>

                                <!-- Author Info -->
                                <h3 class="font-bold text-lg text-slate-900 mb-1 group-hover:text-primary-600 transition-colors">
                                    {{ $author->fullname }}
                                </h3>
                                
                                @if($author->username)
                                    <p class="text-sm text-slate-500 mb-3">{{ '@' . $author->username }}</p>
                                @endif

                                <!-- Stats -->
                                <div class="flex items-center gap-4 text-sm">
                                    <div class="flex items-center gap-1 text-slate-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <span class="font-semibold">{{ number_format($author->posts_count) }}</span>
                                    </div>
                                </div>

                                <!-- View Profile Button -->
                                <div class="mt-4 inline-flex items-center gap-1 text-sm text-primary-600 font-medium group-hover:gap-2 transition-all">
                                    Lihat Profil
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-100 rounded-full mb-4">
                        <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Belum Ada Penulis</h3>
                    <p class="text-slate-600">Belum ada penulis yang terdaftar di sistem.</p>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
