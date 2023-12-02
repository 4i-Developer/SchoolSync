<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Berita Kelas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('beritakelas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Judul Berita -->
                        <div class="mb-4">
                            <label for="judul" class="block text-sm font-medium text-gray-600">Judul Berita</label>
                            <input type="text" name="judul" id="judul" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>
                        <!-- Konten Berita -->
                        <div class="mb-4">
                            <label for="konten" class="block text-sm font-medium text-gray-600">Konten Berita</label>
                            <textarea name="konten" id="konten" class="mt-1 p-2 border rounded-md w-full" required></textarea>
                        </div>
                        <!-- Sampul Berita -->
                        <div class="mb-4">
                            <label for="gambar" class="block text-sm font-medium text-gray-600">Sampul Berita</label>
                            <input type="file" name="gambar" id="gambar" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('beritakelas.daftarBerita') }}" class="btn btn-dark">Back</a>
                            <x-primary-button class="ml-4" type="submit">Tambah Berita</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
