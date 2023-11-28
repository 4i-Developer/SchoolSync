<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Presensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">Jadwal Pelajaran<br><br>
                    <table class="min-w-full table-auto w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2 text-center">Hari</th>
                                <th class="border px-4 py-2 text-center">07.00 - 09.30</th>
                                <th class="border px-4 py-2 text-center">10.00 - 12.00</th>
                                <th class="border px-4 py-2 text-center">13.00 - 14.30</th>
                                <th class="border px-4 py-2 text-center">14.30 - 16.00</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td class="border px-4 py-2 text-center">Senin</td>
                                    <td class="border px-4 py-2 text-center">Matematika</td>
                                    <td class="border px-4 py-2 text-center">Matematika Wajib</td>
                                    <td class="border px-4 py-2 text-center">Fisika</td>
                                    <td class="border px-4 py-2 text-center">Kimia</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2 text-center">Selasa</td>
                                    <td class="border px-4 py-2 text-center">Biologi</td>
                                    <td class="border px-4 py-2 text-center">PPkn</td>
                                    <td class="border px-4 py-2 text-center">Agama</td>
                                    <td class="border px-4 py-2 text-center">Sejarah</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2 text-center">Rabu</td>
                                    <td class="border px-4 py-2 text-center">Bahasa Daerah</td>
                                    <td class="border px-4 py-2 text-center">Bahasa Inggris</td>
                                    <td class="border px-4 py-2 text-center">Bahasa Indonesia</td>
                                    <td class="border px-4 py-2 text-center">Bahasa Arab</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2 text-center">Kamis</td>
                                    <td class="border px-4 py-2 text-center">Sosiologi</td>
                                    <td class="border px-4 py-2 text-center">Ekonomi</td>
                                    <td class="border px-4 py-2 text-center">TIK</td>
                                    <td class="border px-4 py-2 text-center">Geografi</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2 text-center">Jumat</td>
                                    <td class="border px-4 py-2 text-center">PJOK</td>
                                    <td class="border px-4 py-2 text-center">Prakarya</td>
                                    <td class="border px-4 py-2 text-center">Seni Budaya</td>
                                    <td class="border px-4 py-2 text-center">-</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>