<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Berita') }}
        </h2>
    </x-slot>
<!-- 
| Nama  : Davin Wahyu Wardana
| NIM   : 6706223003
| Kelas : D3IF-4603 
-->
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif  
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('beritasekolah.tambahBerita') }}" class="btn btn-icon btn-dark">Tambah</a><br><br>
                    <table class="min-w-full table-auto w-full"> 
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2 text-center">No</th>
                                <th class="border px-4 py-2 text-center">Judul</th>
                                <th class="border px-4 py-2 text-center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($berita as $key => $beritaSekolah)
                                <tr>
                                    <td class="border px-4 py-2 text-center">{{ $key + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $beritaSekolah->judul }}</td>
                                    <td class="border px-4 py-2 text-center">
                                        <a href="{{ route('beritasekolah.editBerita', $beritaSekolah->id) }}" class="btn btn-icon btn-sm btn-dark">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>