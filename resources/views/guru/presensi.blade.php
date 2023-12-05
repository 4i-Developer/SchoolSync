<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Presensi Hari Ini') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <a href="{{ route('presensi.export') }}" class="btn btn-icon btn-dark">Export</a><br><br>
                    Kelas {{ $kelas->nama_kelas }}<br><br>
                    <table class="min-w-full table-auto w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2 text-center">No</th>
                                <th class="border px-4 py-2 text-center">Nama</th>
                                <th class="border px-4 py-2 text-center">Jam</th>
                                <th class="border px-4 py-2 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPresensi as $presensi)
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $presensi['no'] }}</td>
                                <td class="border px-4 py-2">{{ $presensi['nama'] }}</td>
                                <td class="border px-4 py-2 text-center">{{ $presensi['jam'] }}</td>
                                <td class="border px-4 py-2 text-center">{{ $presensi['status'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
