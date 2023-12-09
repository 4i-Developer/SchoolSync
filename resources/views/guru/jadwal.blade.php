<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jadwal Pelajaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif  
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Kelas {{ $kelas->nama_kelas }}</h3>
                    <br>
                    <table class="min-w-full table-auto w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2 text-center">Hari</th>
                                <th class="border px-4 py-2 text-center">07.00 - 09.30</th>
                                <th class="border px-4 py-2 text-center">10.00 - 12.00</th>
                                <th class="border px-4 py-2 text-center">13.00 - 14.30</th>
                                <th class="border px-4 py-2 text-center">14.30 - 16.00</th>
                                <th class="border px-4 py-2 text-center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2 text-center">Senin</td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->senin1 !== null)
                                        {{ $kelas->senin1 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->senin2 !== null)
                                        {{ $kelas->senin2 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->senin3 !== null)
                                        {{ $kelas->senin3 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->senin4 !== null)
                                        {{ $kelas->senin4 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{ route('jadwal.editJadwal', ['id' => $kelas->id, 'hari' => 'senin']) }}" class="btn btn-icon btn-sm btn-dark">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2 text-center">Selasa</td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->selasa1 !== null)
                                        {{ $kelas->selasa1 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->selasa2 !== null)
                                        {{ $kelas->selasa2 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->selasa3 !== null)
                                        {{ $kelas->selasa3 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->selasa4 !== null)
                                        {{ $kelas->selasa4 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{ route('jadwal.editJadwal', ['id' => $kelas->id, 'hari' => 'selasa']) }}" class="btn btn-icon btn-sm btn-dark">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2 text-center">Rabu</td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->rabu1 !== null)
                                        {{ $kelas->rabu1 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->rabu2 !== null)
                                        {{ $kelas->rabu2 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->rabu3 !== null)
                                        {{ $kelas->rabu3 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->rabu4 !== null)
                                        {{ $kelas->rabu4 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{ route('jadwal.editJadwal', ['id' => $kelas->id, 'hari' => 'rabu']) }}" class="btn btn-icon btn-sm btn-dark">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2 text-center">Kamis</td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->kamis1 !== null)
                                        {{ $kelas->kamis1 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->kamis2 !== null)
                                        {{ $kelas->kamis2 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->kamis3 !== null)
                                        {{ $kelas->kamis3 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->kamis4 !== null)
                                        {{ $kelas->kamis4 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{ route('jadwal.editJadwal', ['id' => $kelas->id, 'hari' => 'kamis']) }}" class="btn btn-icon btn-sm btn-dark">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2 text-center">Jumat</td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->jumat1 !== null)
                                        {{ $kelas->jumat1 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->jumat2 !== null)
                                        {{ $kelas->jumat2 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->jumat3 !== null)
                                        {{ $kelas->jumat3 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($kelas->jumat4 !== null)
                                        {{ $kelas->jumat4 }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{ route('jadwal.editJadwal', ['id' => $kelas->id, 'hari' => 'jumat']) }}" class="btn btn-icon btn-sm btn-dark">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
