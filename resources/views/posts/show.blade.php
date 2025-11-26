@extends('layouts.public', ['title' => $post->title])

@section('content')
<section class="py-12 lg:py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
            <!-- Main Article -->
            <article class="lg:col-span-8">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                    <!-- Content -->
                    <div class="p-6 lg:p-10">
                        <!-- Breadcrumb -->
                        <nav class="flex items-center gap-2 text-sm mb-6" aria-label="Breadcrumb">
                            <a href="/" class="text-slate-500 hover:text-sky-600 transition-colors">Beranda</a>
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            <a href="{{ route('posts.index') }}" class="text-slate-500 hover:text-sky-600 transition-colors">Berita</a>
                            @if($post->category)
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            <a href="{{ route('posts.index', ['category' => $post->category->slug]) }}" class="text-slate-500 hover:text-sky-600 transition-colors">{{ $post->category->name }}</a>
                            @endif
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="text-slate-900 font-medium">{{ Str::limit($post->title, 50) }}</span>
                        </nav>

                        <!-- Meta -->
                        <div class="flex items-center justify-between gap-3 mb-4 flex-wrap">
                            <div class="flex items-center gap-3 flex-wrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-primary-50 text-primary-700">
                                    {{ $post->category->name ?? 'Berita' }}
                                </span>
                                <div class="flex items-center gap-2 text-sm text-slate-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>{{ $post->published_at?->format('d M Y') }}</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-slate-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $post->published_at?->format('H:i') }} WIB</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-slate-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span>{{ $post->author?->fullname ?? 'Admin' }}</span>
                                </div>
                            </div>
                            <!-- Views -->
                            <div class="flex items-center gap-2 text-sm text-slate-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span>{{ number_format($post->view_count ?? 0) }} views</span>
                            </div>
                        </div>
                        
                        <!-- Title -->
                        <h1 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-4 leading-tight">{{ $post->title }}</h1>

                        <!-- Excerpt -->
                        @if($post->excerpt)
                        <p class="text-lg text-slate-600 mb-6 leading-relaxed">
                            {{ Str::limit($post->excerpt, 200) }}
                        </p>
                        @endif
                        
                        <!-- Share Buttons -->
                        <div class="mb-6">
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-medium text-slate-500">Bagikan:</span>
                                <div class="flex gap-2">
                                    <a href="https://wa.me/?text={{ urlencode($post->title.' '.url()->current()) }}" target="_blank" class="group w-9 h-9 flex items-center justify-center rounded-full bg-[#25D366] text-white hover:scale-110 hover:shadow-lg transition-all duration-200" title="WhatsApp">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.232-.298.33-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                                    </a>
                                    <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="group w-9 h-9 flex items-center justify-center rounded-full bg-[#1877F2] text-white hover:scale-110 hover:shadow-lg transition-all duration-200" title="Facebook">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                    </a>
                                    <a href="https://t.me/share/url?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}" target="_blank" class="group w-9 h-9 flex items-center justify-center rounded-full bg-[#0088cc] text-white hover:scale-110 hover:shadow-lg transition-all duration-200" title="Telegram">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 11.944 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>
                                    </a>
                                    <button onclick="navigator.clipboard.writeText(window.location.href); this.innerHTML='<svg class=\'w-4 h-4\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M5 13l4 4L19 7\'></path></svg>'; setTimeout(() => this.innerHTML='<svg class=\'w-4 h-4\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z\'></path></svg>', 2000)" class="group w-9 h-9 flex items-center justify-center rounded-full bg-slate-700 text-white hover:scale-110 hover:shadow-lg transition-all duration-200" title="Salin Link">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Media (Video or Image) -->
                    @if($post->post_type === 'video' && $post->video_url)
                        @php
                            // Extract YouTube video ID from URL - improved patterns
                            $videoId = null;
                            $url = $post->video_url;
                            
                            // Pattern 1: youtube.com/watch?v=ID
                            if (preg_match('/(?:youtube\.com\/watch\?v=|youtube\.com\/\?v=)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
                                $videoId = $matches[1];
                            } 
                            // Pattern 2: youtu.be/ID
                            elseif (preg_match('/youtu\.be\/([a-zA-Z0-9_-]{11})/', $url, $matches)) {
                                $videoId = $matches[1];
                            } 
                            // Pattern 3: youtube.com/embed/ID
                            elseif (preg_match('/youtube\.com\/embed\/([a-zA-Z0-9_-]{11})/', $url, $matches)) {
                                $videoId = $matches[1];
                            }
                            // Pattern 4: youtube.com/v/ID
                            elseif (preg_match('/youtube\.com\/v\/([a-zA-Z0-9_-]{11})/', $url, $matches)) {
                                $videoId = $matches[1];
                            }
                        @endphp
                        
                        @if($videoId)
                            <!-- YouTube Video Preview (Click to watch on YouTube) -->
                            <div class="relative bg-black">
                                <a href="https://www.youtube.com/watch?v={{ $videoId }}" 
                                   target="_blank" 
                                   rel="noopener"
                                   class="block relative w-full aspect-video overflow-hidden bg-black group/thumb">
                                    
                                    <!-- YouTube Thumbnail -->
                                    <img 
                                        src="https://img.youtube.com/vi/{{ $videoId }}/maxresdefault.jpg" 
                                        alt="{{ $post->title }}"
                                        class="w-full h-full object-cover"
                                        onerror="this.onerror=null; this.src='https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg';">
                                    
                                    <!-- Gradient Overlay -->
                                    <div class="absolute inset-0 bg-linear-to-t from-black/80 via-black/20 to-black/40"></div>
                                    
                                    <!-- Play Button -->
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="relative">
                                            <div class="bg-red-600 rounded-full p-8 shadow-2xl transform group-hover/thumb:scale-110 transition-all duration-300">
                                                <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M8 5v14l11-7z"/>
                                                </svg>
                                            </div>
                                            <!-- Pulse effect -->
                                            <div class="absolute inset-0 bg-red-600 rounded-full animate-ping opacity-20"></div>
                                        </div>
                                    </div>
                                    
                                    <!-- YouTube Badge -->
                                    <div class="absolute top-4 right-4 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-2 shadow-xl transition-colors">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                        </svg>
                                        <span class="group-hover/thumb:underline">Tonton di YouTube</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </div>
                                    
                                    <!-- Video Info Overlay -->
                                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                        <div class="flex items-start gap-3">
                                            <div class="shrink-0 bg-red-600 rounded-full p-2">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M8 5v14l11-7z"/>
                                                </svg>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-semibold line-clamp-2 mb-1">{{ $post->title }}</p>
                                                <p class="text-xs text-white/80">Klik untuk menonton video ini di YouTube</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                
                                @if($post->featuredMedia?->caption)
                                    <div class="px-6 py-3 bg-slate-50 border-t border-slate-100">
                                        <p class="text-xs text-slate-600 italic">{{ $post->featuredMedia->caption }}</p>
                                    </div>
                                @endif
                            </div>
                        @else
                            <!-- Fallback: Show link if video ID cannot be extracted -->
                            <div class="bg-slate-100 p-8 text-center rounded-lg border border-slate-200">
                                <svg class="w-16 h-16 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                                <p class="text-slate-700 font-semibold mb-2">Format URL tidak didukung</p>
                                <p class="text-slate-600 text-sm mb-4">Video ID tidak dapat diekstrak dari URL. Pastikan menggunakan format YouTube yang valid.</p>
                                <div class="bg-white rounded-lg p-3 mb-4 text-left">
                                    <p class="text-xs text-slate-500 mb-1 font-medium">URL Video:</p>
                                    <code class="text-xs text-slate-700 break-all">{{ $post->video_url }}</code>
                                </div>
                                <a href="{{ $post->video_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-medium">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                    </svg>
                                    Tonton di YouTube
                                </a>
                                <div class="mt-4 pt-4 border-t border-slate-300">
                                    <p class="text-xs text-slate-500">
                                        <strong>Format yang didukung:</strong><br>
                                        • https://www.youtube.com/watch?v=VIDEO_ID<br>
                                        • https://youtu.be/VIDEO_ID<br>
                                        • https://www.youtube.com/embed/VIDEO_ID
                                    </p>
                                </div>
                            </div>
                        @endif
                    @elseif($post->featured_image_url)
                        <div class="relative bg-slate-100 cursor-pointer" onclick="openLightbox('{{ $post->featured_image_url }}')">
                            <div class="aspect-video w-full overflow-hidden">
                                <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                            </div>
                            @if($post->featuredMedia?->caption)
                                <div class="px-6 py-3 bg-slate-50 border-t border-slate-100">
                                    <p class="text-xs text-slate-600 italic">{{ $post->featuredMedia->caption }}</p>
                                </div>
                            @endif
                        </div>
                    @endif

                    <div class="p-6 lg:p-10">
                        <!-- Article Body -->
                        <div class="content-body mb-8">
                            {!! $post->content !!}
                        </div>

                        <!-- Tags -->
                        @if($post->tags->count())
                            <div class="flex flex-wrap gap-2 mb-8 pb-8 border-b border-slate-100">
                                @foreach($post->tags as $tag)
                                    <a href="{{ route('posts.index', ['q' => $tag->name]) }}" class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm bg-slate-50 text-slate-600 hover:bg-slate-100 transition-colors">
                                        #{{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        @endif

                        <!-- Reactions -->
                        <div class="mb-8 pb-8 border-b border-slate-100">
                            <div class="flex items-center gap-2 flex-wrap">
                                @foreach($reactions as $reaction)
                                    <button 
                                        onclick="addReaction({{ $post->id }}, {{ $reaction->id }})"
                                        data-reaction-id="{{ $reaction->id }}"
                                        class="reaction-btn group relative inline-flex items-center gap-2 px-4 py-2.5 rounded-full bg-white border-2 border-slate-200 hover:border-primary-500 hover:bg-primary-50 transition-all duration-200 shadow-sm hover:shadow">
                                        <span class="text-xl group-hover:scale-110 transition-transform">{{ $reaction->emoji }}</span>
                                        <span class="text-xs font-semibold text-slate-600 group-hover:text-primary-700">{{ $reaction->label }}</span>
                                        <span class="reaction-count text-xs font-bold text-primary-600 ml-1" data-count="{{ $reaction->reactions_count ?? 0 }}">
                                            {{ $reaction->reactions_count > 0 ? $reaction->reactions_count : '' }}
                                        </span>
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <!-- Comments Section -->
                        <div class="mt-4">
                            <h3 class="text-2xl font-bold text-slate-900 mb-6">Komentar ({{ $post->comments_count ?? 0 }})</h3>

                            @if(session('success'))
                                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700 text-sm">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Comment Form -->
                            <form action="{{ route('comments.store', $post->slug) }}" method="POST" class="mb-8 bg-slate-50 p-6 rounded-xl">
                                @csrf
                                <p class="font-semibold text-slate-800 mb-4">Tulis Komentar</p>
                                <div class="grid sm:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label class="block text-xs font-medium text-slate-600 mb-2">Nama Lengkap</label>
                                        <input type="text" name="author_name" class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-primary-500 focus:ring-2 focus:ring-primary-100 text-sm transition-all" required>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-slate-600 mb-2">Email</label>
                                        <input type="email" name="author_email" class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-primary-500 focus:ring-2 focus:ring-primary-100 text-sm transition-all" required>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-xs font-medium text-slate-600 mb-2">Komentar</label>
                                    <textarea name="content" rows="4" class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-primary-500 focus:ring-2 focus:ring-primary-100 text-sm transition-all" required></textarea>
                                </div>
                                <button type="submit" class="px-6 py-3 bg-slate-900 text-white text-sm font-semibold rounded-lg hover:bg-slate-800 hover:shadow-lg transition-all">
                                    Kirim Komentar
                                </button>
                            </form>

                            <!-- Comments List -->
                            <div class="space-y-6">
                                @forelse($post->comments->whereNull('parent_id') as $comment)
                                    <div class="comment-item" data-comment-id="{{ $comment->id }}">
                                        <div class="flex gap-4 p-4 rounded-xl hover:bg-slate-50 transition-colors">
                                            <div class="shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center text-white font-bold text-sm shadow-sm">
                                                {{ strtoupper(substr($comment->author_name, 0, 2)) }}
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center justify-between gap-3 mb-2">
                                                    <div class="flex items-center gap-3">
                                                        <h4 class="font-bold text-slate-900">{{ $comment->author_name }}</h4>
                                                        <span class="text-xs text-slate-400">{{ $comment->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    <button onclick="toggleReplyForm({{ $comment->id }})" class="text-sm text-primary-600 hover:text-primary-700 font-medium flex items-center gap-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                                        </svg>
                                                        Balas
                                                    </button>
                                                </div>
                                                <p class="text-slate-600 leading-relaxed mb-3">{{ $comment->content }}</p>

                                                <!-- Reply Form -->
                                                <div id="reply-form-{{ $comment->id }}" class="hidden mt-4 ml-12 p-4 bg-slate-50 rounded-lg border border-slate-200">
                                                    <form action="{{ route('comments.store', $post->slug) }}" method="POST" class="space-y-3">
                                                        @csrf
                                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                        <div class="grid sm:grid-cols-2 gap-3">
                                                            <input type="text" name="author_name" placeholder="Nama" class="px-3 py-2 rounded-lg border border-slate-200 focus:border-primary-500 focus:ring-2 focus:ring-primary-100 text-sm" required>
                                                            <input type="email" name="author_email" placeholder="Email" class="px-3 py-2 rounded-lg border border-slate-200 focus:border-primary-500 focus:ring-2 focus:ring-primary-100 text-sm" required>
                                                        </div>
                                                        <textarea name="content" rows="2" placeholder="Tulis balasan..." class="w-full px-3 py-2 rounded-lg border border-slate-200 focus:border-primary-500 focus:ring-2 focus:ring-primary-100 text-sm" required></textarea>
                                                        <div class="flex gap-2">
                                                            <button type="submit" class="px-4 py-2 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition-colors">
                                                                Kirim Balasan
                                                            </button>
                                                            <button type="button" onclick="toggleReplyForm({{ $comment->id }})" class="px-4 py-2 bg-slate-200 text-slate-700 text-sm font-semibold rounded-lg hover:bg-slate-300 transition-colors">
                                                                Batal
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Replies (Nested Comments) -->
                                        @if($comment->replies->count() > 0)
                                            <div class="ml-12 mt-4 space-y-4 border-l-2 border-primary-200 pl-4">
                                                @foreach($comment->replies as $reply)
                                                    <div class="flex gap-4 p-3 rounded-lg bg-slate-50">
                                                        <div class="shrink-0 w-10 h-10 rounded-full bg-gradient-to-br from-sky-400 to-sky-600 flex items-center justify-center text-white font-bold text-xs shadow-sm">
                                                            {{ strtoupper(substr($reply->author_name, 0, 2)) }}
                                                        </div>
                                                        <div class="flex-1 min-w-0">
                                                            <div class="flex items-center gap-2 mb-1">
                                                                <h4 class="font-bold text-slate-900 text-sm">{{ $reply->author_name }}</h4>
                                                                <span class="text-xs text-slate-400">{{ $reply->created_at->diffForHumans() }}</span>
                                                            </div>
                                                            <p class="text-slate-600 text-sm leading-relaxed">{{ $reply->content }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @empty
                                    <div class="text-center py-12">
                                        <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                        </svg>
                                        <p class="text-slate-500">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        <!-- Related Posts Carousel -->
                        @if($related->count())
                        <div class="mt-12 pt-12 border-t border-slate-100">
                            <div class="mb-8 flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-slate-500 uppercase tracking-widest font-semibold mb-1">Bacaan Lanjutan</p>
                                    <h2 class="text-2xl lg:text-3xl font-bold text-slate-900">Artikel Terkait</h2>
                                </div>
                                <a href="{{ route('posts.index') }}" class="text-sky-600 font-semibold text-sm hover:text-sky-700 transition-colors flex items-center gap-1">
                                    Lihat semua
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>

                            <div class="relative group/carousel">
                                <!-- Carousel Container -->
                                <div class="flex flex-nowrap overflow-x-auto snap-x snap-mandatory gap-6 pb-8 -mx-4 px-4 scrollbar-hide" style="scrollbar-width: none; -ms-overflow-style: none;">
                                    @foreach($related as $item)
                                        <a href="/posts/{{ $item->slug }}" class="snap-start shrink-0 w-[85vw] md:w-[calc(50%-1.5rem)] lg:w-[calc(33.333%-1.5rem)] group bg-white border border-slate-100 rounded-2xl overflow-hidden hover:shadow-xl hover:border-sky-200 transition-all duration-300 flex flex-col h-full">
                                            <!-- Image -->
                                            <div class="relative aspect-[4/3] overflow-hidden bg-slate-100">
                                                @if($item->featured_image_url)
                                                    <img src="{{ $item->featured_image_url }}" 
                                                         alt="{{ $item->title }}" 
                                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                                @else
                                                    <div class="w-full h-full flex items-center justify-center bg-sky-50 text-sky-200">
                                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                    </div>
                                                @endif
                                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                                
                                                <!-- Video Badge -->
                                                @if($item->post_type === 'video' && $item->video_url)
                                                    <div class="absolute inset-0 flex items-center justify-center">
                                                        <div class="bg-red-600 rounded-full p-4 shadow-2xl transform group-hover:scale-110 transition-transform duration-300">
                                                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                                <path d="M8 5v14l11-7z"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                @endif
                                                
                                                <div class="absolute top-3 left-3 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-semibold text-slate-700 shadow-sm">
                                                    {{ $item->category->name ?? 'Berita' }}
                                                </div>
                                            </div>
                                            
                                            <!-- Content -->
                                            <div class="p-5 flex flex-col flex-1">
                                                <h3 class="text-lg font-bold text-slate-900 mb-2 line-clamp-2 group-hover:text-sky-600 transition-colors">
                                                    {{ $item->title }}
                                                </h3>
                                                <p class="text-slate-500 text-sm line-clamp-2 mb-4 flex-1">
                                                    {{ $item->excerpt ?? Str::limit(strip_tags($item->content), 100) }}
                                                </p>
                                                <div class="flex items-center text-xs text-slate-400 font-medium pt-4 border-t border-slate-50 mt-auto">
                                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    {{ $item->published_at?->format('d M Y') ?? $item->created_at->format('d M Y') }}
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="lg:col-span-4">
                <div class="sticky top-8 space-y-6">
                    <!-- Popular Posts Widget -->
                    @if($popular_posts->count())
                    <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                        <div class="flex items-center justify-between mb-5">
                            <h3 class="font-bold text-slate-900 text-lg">Artikel Terpopuler</h3>
                            <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                        <div class="space-y-4">
                            @foreach($popular_posts as $item)
                                <a href="/posts/{{ $item->slug }}" class="group flex gap-3 items-start p-2 -m-2 rounded-lg hover:bg-slate-50 transition-colors">
                                    <div class="shrink-0 w-16 h-16 rounded-lg overflow-hidden bg-slate-100 relative">
                                        @if($item->featured_image_url)
                                            <img src="{{ $item->featured_image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-slate-300">
                                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                            </div>
                                        @endif
                                        
                                        <!-- Video Badge for Popular Posts -->
                                        @if($item->post_type === 'video' && $item->video_url)
                                            <div class="absolute inset-0 flex items-center justify-center bg-black/20">
                                                <div class="bg-red-600 rounded-full p-1.5">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M8 5v14l11-7z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        @endif
                                        
                                        <div class="absolute top-1 right-1 bg-amber-500 text-white text-xs font-bold rounded px-1.5 py-0.5">
                                            {{ number_format($item->view_count ?? 0) }}
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-semibold text-slate-800 leading-snug group-hover:text-primary-600 transition-colors line-clamp-2 mb-1">{{ $item->title }}</h4>
                                        <time class="text-xs text-slate-500">{{ $item->published_at?->format('d M Y') }}</time>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Recent Posts Widget -->
                    @if($recent_posts->count())
                    <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                        <div class="flex items-center justify-between mb-5">
                            <h3 class="font-bold text-slate-900 text-lg">Artikel Terbaru</h3>
                            <a href="{{ route('posts.index') }}" class="text-xs font-semibold text-primary-600 hover:text-primary-700 transition-colors">Semua →</a>
                        </div>
                        <div class="space-y-4">
                            @foreach($recent_posts as $item)
                                <a href="/posts/{{ $item->slug }}" class="group flex gap-3 items-start p-2 -m-2 rounded-lg hover:bg-slate-50 transition-colors">
                                    <div class="shrink-0 w-16 h-16 rounded-lg overflow-hidden bg-slate-100 relative">
                                        @if($item->featured_image_url)
                                            <img src="{{ $item->featured_image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-slate-300">
                                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                            </div>
                                        @endif
                                        
                                        <!-- Video Badge for Recent Posts -->
                                        @if($item->post_type === 'video' && $item->video_url)
                                            <div class="absolute inset-0 flex items-center justify-center bg-black/20">
                                                <div class="bg-red-600 rounded-full p-1.5">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M8 5v14l11-7z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-semibold text-slate-800 leading-snug group-hover:text-primary-600 transition-colors line-clamp-2 mb-1">{{ $item->title }}</h4>
                                        <time class="text-xs text-slate-500">{{ $item->published_at?->format('d M Y') }}</time>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Categories Widget -->
                    @if($categories->count())
                    <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                        <h3 class="font-bold text-slate-900 text-lg mb-4">Kategori</h3>
                        <ul class="space-y-1">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('posts.index', ['category' => $category->slug]) }}" class="flex items-center justify-between group py-2.5 px-3 -mx-3 rounded-lg hover:bg-slate-50 transition-colors">
                                        <span class="text-sm text-slate-700 group-hover:text-primary-600 font-medium transition-colors">{{ $category->name }}</span>
                                        <span class="text-xs bg-slate-100 text-slate-600 px-2.5 py-1 rounded-full group-hover:bg-primary-100 group-hover:text-primary-700 transition-colors font-medium">{{ $category->posts_count }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <!-- Tags Widget -->
                    @if($tags->count())
                    <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                        <h3 class="font-bold text-slate-900 text-lg mb-4">Tags Populer</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($tags as $tag)
                                <a href="{{ route('posts.index', ['q' => $tag->name]) }}" class="inline-flex items-center px-3 py-1.5 bg-slate-50 text-slate-600 text-xs font-medium rounded-lg hover:bg-primary-50 hover:text-primary-700 transition-colors border border-slate-200 hover:border-primary-200">
                                    #{{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @endif


                </div>
            </aside>
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 backdrop-blur-sm p-4" onclick="closeLightbox()">
    <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white hover:text-gray-300 transition-colors z-10">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
    <img id="lightbox-img" src="" alt="Lightbox Image" class="max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl" onclick="event.stopPropagation()">
</div>

<script>
    function openLightbox(imageSrc) {
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        lightboxImg.src = imageSrc;
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        const lightbox = document.getElementById('lightbox');
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    // Close lightbox with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    });

    // Add reaction functionality
    function addReaction(postId, reactionTypeId) {
        fetch(`/posts/${postId}/reactions`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                reaction_type_id: reactionTypeId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update count display
                const btn = document.querySelector(`[data-reaction-id="${reactionTypeId}"]`);
                const countSpan = btn.querySelector('.reaction-count');
                const currentCount = parseInt(countSpan.dataset.count) || 0;
                const newCount = currentCount + 1;
                
                countSpan.dataset.count = newCount;
                countSpan.textContent = newCount;
                
                // Add animation
                btn.classList.add('scale-110');
                setTimeout(() => btn.classList.remove('scale-110'), 200);
                
                // Visual feedback
                btn.classList.add('border-primary-600', 'bg-primary-100');
                setTimeout(() => {
                    btn.classList.remove('border-primary-600', 'bg-primary-100');
                }, 1000);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    // Toggle reply form
    function toggleReplyForm(commentId) {
        const replyForm = document.getElementById(`reply-form-${commentId}`);
        
        // Hide all other reply forms
        document.querySelectorAll('[id^="reply-form-"]').forEach(form => {
            if (form.id !== `reply-form-${commentId}`) {
                form.classList.add('hidden');
            }
        });
        
        // Toggle current form
        replyForm.classList.toggle('hidden');
        
        // Focus on textarea when showing
        if (!replyForm.classList.contains('hidden')) {
            const textarea = replyForm.querySelector('textarea');
            setTimeout(() => textarea.focus(), 100);
        }
    }
</script>

@endsection
