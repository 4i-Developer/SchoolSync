<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kelas') }}
        </h2>
    </x-slot>
<!-- 
| Nama  : Davin Wahyu Wardana
| NIM   : 6706223003
| Kelas : D3IF-4603 
-->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('kelas.tambahKelas') }}" class="btn btn-icon btn-dark">Tambah</a><br><br>
                    <table class="min-w-full table-auto w-full"> 
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">Nama Kelas</th>
                                <th class="border px-4 py-2">Wali Kelas</th>
                                <th class="border px-4 py-2">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kelas as $key => $kelass)
                                <tr>
                                    <td class="border px-4 py-2">{{ $key + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $kelass->nama_kelas }}</td>
                                    <td class="border px-4 py-2">{{ $kelass->id_guru }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('kelas.infoKelas', $kelass->id) }}" class="btn btn-icon btn-sm btn-dark"><i class="bi bi-heart"></i></a>
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