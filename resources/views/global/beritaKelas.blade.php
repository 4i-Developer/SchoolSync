<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $beritaKelas->judul }}
        </h2>
    </x-slot>
    
<!-- 
| Nama  : Davin Wahyu Wardana
| NIM   : 6706223003
| Kelas : D3IF-4603 
-->

    <style>
        .berita-content {
            white-space: pre-line;
        }

        .berita-gambar {
            height: 400px;
            object-fit: cover;
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-semibold mb-4 text-center">{{ $beritaKelas->judul }}</h3>
                    
                    <div class="mb-4">
                        <img src="{{ asset('images/beritakelas/' . $beritaKelas->gambar) }}" alt="{{ $beritaKelas->judul }}" class="w-full berita-gambar">
                    </div>
                    
                    <div class="berita-content">
                        <p>{!! nl2br(e($beritaKelas->konten)) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>