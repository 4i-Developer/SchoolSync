<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Presensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">Presensi Hari Ini<br><br>
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
                                <tr>
                                    <td class="border px-4 py-2 text-center">1</td>
                                    <td class="border px-4 py-2">Davin Wahyu Wardana</td>
                                    <td class="border px-4 py-2 text-center">06.35.00</td>
                                    <td class="border px-4 py-2 text-center">Hadir</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2 text-center">2</td>
                                    <td class="border px-4 py-2">Anugrah Panji Pradipa</td>
                                    <td class="border px-4 py-2 text-center">06.40.10</td>
                                    <td class="border px-4 py-2 text-center">Hadir</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2 text-center">3</td>
                                    <td class="border px-4 py-2">Azka Faris Akbar</td>
                                    <td class="border px-4 py-2 text-center">07.09.00</td>
                                    <td class="border px-4 py-2 text-center">Terlambat</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2 text-center">4</td>
                                    <td class="border px-4 py-2">Dimas Dwi Kurniawan</td>
                                    <td class="border px-4 py-2 text-center">-</td>
                                    <td class="border px-4 py-2 text-center">Alpa</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>