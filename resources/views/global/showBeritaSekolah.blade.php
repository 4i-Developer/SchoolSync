<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Berita Sekolah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($beritaSekolah as $berita)
                    <a href="{{ route('beritasekolah.show', $berita->id) }}" class="p-6 border rounded-md hover:bg-gray-100">
                        <h3 class="text-lg font-semibold mb-3">{{ $berita->judul }}</h3>
                        @if($berita->gambar)
                            <img src="{{ asset('path/to/your/image/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full mb-3">
                        @endif
                        <p class="text-sm text-gray-600">{{ substr($berita->konten, 0, 100) }}...</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>