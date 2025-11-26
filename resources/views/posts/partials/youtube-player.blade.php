{{-- YouTube Video Player Component --}}
@props(['videoId', 'title' => 'Video', 'caption' => null])

<div class="relative bg-black group/video" x-data="{ useIframe: true, embedError: false }">
    <div class="aspect-video w-full">
        {{-- Iframe Player --}}
        <template x-if="useIframe && !embedError">
            <iframe 
                class="w-full h-full" 
                :src="'https://www.youtube.com/embed/{{ $videoId }}?enablejsapi=1&origin={{ request()->getSchemeAndHttpHost() }}'"
                title="{{ $title }}"
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share; fullscreen" 
                allowfullscreen
                referrerpolicy="strict-origin-when-cross-origin"
                loading="lazy"
                @error="embedError = true">
            </iframe>
        </template>
        
        {{-- Thumbnail Fallback --}}
        <template x-if="!useIframe || embedError">
            <a href="https://www.youtube.com/watch?v={{ $videoId }}" 
               target="_blank" 
               rel="noopener"
               class="block relative w-full h-full bg-black">
                <img 
                    src="https://img.youtube.com/vi/{{ $videoId }}/maxresdefault.jpg" 
                    alt="{{ $title }}"
                    class="w-full h-full object-cover"
                    @error="$el.src='https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg'">
                
                {{-- Play Button Overlay --}}
                <div class="absolute inset-0 flex items-center justify-center bg-black/30 group-hover/video:bg-black/20 transition-colors">
                    <div class="bg-red-600 rounded-full p-6 shadow-2xl transform group-hover/video:scale-110 transition-transform duration-300">
                        <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                </div>
                
                {{-- YouTube Badge --}}
                <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1.5 rounded text-xs font-bold flex items-center gap-2">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                    Tonton di YouTube
                </div>
            </a>
        </template>
    </div>
    
    {{-- Switch to Thumbnail Button --}}
    <div class="absolute bottom-4 right-4 opacity-0 group-hover/video:opacity-100 transition-opacity" x-show="useIframe && !embedError">
        <button @click="useIframe = false" class="px-3 py-2 bg-slate-900/80 hover:bg-slate-900 text-white text-xs rounded-lg backdrop-blur transition-colors">
            Gunakan Thumbnail
        </button>
    </div>
    
    @if($caption)
        <div class="px-6 py-3 bg-slate-50 border-t border-slate-100">
            <p class="text-xs text-slate-600 italic">{{ $caption }}</p>
        </div>
    @endif
</div>
