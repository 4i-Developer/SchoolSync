<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Berita Kelas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($beritaKelas as $berita)
                    <a href="{{ route('beritakelas.show', $berita->id) }}" class="p-6 border rounded-md hover:bg-gray-100 flex">
                        @if($berita->gambar)
                            <div class="mr-4">
                                <img width="100px" src="{{ asset('images/beritakelas/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="object-cover rounded-md">
                            </div>&nbsp;&nbsp;
                        @endif
                        <div>
                            <h3 class="text-lg font-semibold mb-3">{{ $berita->judul }}</h3>
                            <p class="text-sm text-gray-600">{{ substr($berita->konten, 0, 100) }}...</p>
                            <div class="text-xs text-gray-500 mt-2">
                                {{ $berita->created_at->format('Y-m-d H:i:s') }} • {{ $berita->publisher->name }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
