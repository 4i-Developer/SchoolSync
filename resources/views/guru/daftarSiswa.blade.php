<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Siswa') }}
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
                    <a href="{{ route('siswa.tambahSiswa') }}" class="btn btn-icon btn-dark">Tambah</a><br><br>
                    Kelas {{ $kelas->nama_kelas }}<br><br>
                    <table class="min-w-full table-auto w-full"> 
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2 text-center">No</th>
                                <th class="border px-4 py-2 text-center">Nama Siswa</th>
                                <th class="border px-4 py-2 text-center">NIS</th>
                                <th class="border px-4 py-2 text-center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($siswa as $key => $siswaa)
                                <tr>
                                    <td class="border px-4 py-2 text-center">{{ $key + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $siswaa->name }}</td>
                                    <td class="border px-4 py-2">{{ $siswaa->nis }}</td>
                                    <td class="border px-4 py-2 text-center">
                                        <a href="{{ route('siswa.editSiswa', $siswaa->id) }}" class="btn btn-icon btn-sm btn-dark">Edit</a>
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