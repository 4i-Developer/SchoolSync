<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Jadwal') }}
        </h2>
    </x-slot>
<!-- 
Nama    : Davin Wahyu Wardana
NIM     : 6706223003
Kelas   : D3IF-4603 
-->

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('jadwal.update', ['id' => $jadwal->id, 'hari' => strtolower($hari)]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @if ($hari == 'senin')
<!-- Senin 1 -->
<div class="mb-4">
    <label for="senin1" class="block text-sm font-medium text-gray-600">Senin - 07.00 - 09.30</label>
    <input type="text" name="senin1" id="senin1" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->senin1 }}" required>
</div>

<!-- Senin 2 -->
<div class="mb-4">
    <label for="senin2" class="block text-sm font-medium text-gray-600">Senin - 10.00 - 12.00</label>
    <input type="text" name="senin2" id="senin2" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->senin2 }}" required>
</div>

<!-- Senin 3 -->
<div class="mb-4">
    <label for="senin3" class="block text-sm font-medium text-gray-600">Senin - 13.00 - 14.30</label>
    <input type="text" name="senin3" id="senin3" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->senin3 }}" required>
</div>

<!-- Senin 4 -->
<div class="mb-4">
    <label for="senin4" class="block text-sm font-medium text-gray-600">Senin - 14.30 - 16.00</label>
    <input type="text" name="senin4" id="senin4" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->senin4 }}" required>
</div>
@elseif ($hari == 'selasa')
<!-- Selasa 1 -->
<div class="mb-4">
    <label for="selasa1" class="block text-sm font-medium text-gray-600">Selasa - 07.00 - 09.30</label>
    <input type="text" name="selasa1" id="selasa1" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->selasa1 }}" required>
</div>

<!-- Selasa 2 -->
<div class="mb-4">
    <label for="selasa2" class="block text-sm font-medium text-gray-600">Selasa - 10.00 - 12.00</label>
    <input type="text" name="selasa2" id="selasa2" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->selasa2 }}" required>
</div>

<!-- Selasa 3 -->
<div class="mb-4">
    <label for="selasa3" class="block text-sm font-medium text-gray-600">Selasa - 13.00 - 14.30</label>
    <input type="text" name="selasa3" id="selasa3" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->selasa3 }}" required>
</div>

<!-- Selasa 4 -->
<div class="mb-4">
    <label for="selasa4" class="block text-sm font-medium text-gray-600">Selasa - 14.30 - 16.00</label>
    <input type="text" name="selasa4" id="selasa4" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->selasa4 }}" required>
</div>
@elseif ($hari == 'rabu')
<!-- Rabu 1 -->
<div class="mb-4">
    <label for="rabu1" class="block text-sm font-medium text-gray-600">Rabu - 07.00 - 09.30</label>
    <input type="text" name="rabu1" id="rabu1" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->rabu1 }}" required>
</div>

<!-- Rabu 2 -->
<div class="mb-4">
    <label for="rabu2" class="block text-sm font-medium text-gray-600">Rabu - 10.00 - 12.00</label>
    <input type="text" name="rabu2" id="rabu2" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->rabu2 }}" required>
</div>

<!-- Rabu 3 -->
<div class="mb-4">
    <label for="rabu3" class="block text-sm font-medium text-gray-600">Rabu - 13.00 - 14.30</label>
    <input type="text" name="rabu3" id="rabu3" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->rabu3 }}" required>
</div>

<!-- Rabu 4 -->
<div class="mb-4">
    <label for="rabu4" class="block text-sm font-medium text-gray-600">Rabu - 14.30 - 16.00</label>
    <input type="text" name="rabu4" id="rabu4" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->rabu4 }}" required>
</div>
@elseif ($hari == 'kamis')
<!-- Kamis 1 -->
<div class="mb-4">
    <label for="kamis1" class="block text-sm font-medium text-gray-600">Kamis - 07.00 - 09.30</label>
    <input type="text" name="kamis1" id="kamis1" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->kamis1 }}" required>
</div>

<!-- Kamis 2 -->
<div class="mb-4">
    <label for="kamis2" class="block text-sm font-medium text-gray-600">Kamis - 10.00 - 12.00</label>
    <input type="text" name="kamis2" id="kamis2" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->kamis2 }}" required>
</div>

<!-- Kamis 3 -->
<div class="mb-4">
    <label for="kamis3" class="block text-sm font-medium text-gray-600">Kamis - 13.00 - 14.30</label>
    <input type="text" name="kamis3" id="kamis3" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->kamis3 }}" required>
</div>

<!-- Kamis 4 -->
<div class="mb-4">
    <label for="kamis4" class="block text-sm font-medium text-gray-600">Kamis - 14.30 - 16.00</label>
    <input type="text" name="kamis4" id="kamis4" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->kamis4 }}" required>
</div>
@elseif ($hari == 'jumat')
<!-- Jumat 1 -->
<div class="mb-4">
    <label for="jumat1" class="block text-sm font-medium text-gray-600">Jumat - 07.00 - 09.30</label>
    <input type="text" name="jumat1" id="jumat1" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->jumat1 }}" required>
</div>

<!-- Jumat 2 -->
<div class="mb-4">
    <label for="jumat2" class="block text-sm font-medium text-gray-600">Jumat - 10.00 - 12.00</label>
    <input type="text" name="jumat2" id="jumat2" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->jumat2 }}" required>
</div>

<!-- Jumat 3 -->
<div class="mb-4">
    <label for="jumat3" class="block text-sm font-medium text-gray-600">Jumat - 13.00 - 14.30</label>
    <input type="text" name="jumat3" id="jumat3" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->jumat3 }}" required>
</div>

<!-- Jumat 4 -->
<div class="mb-4">
    <label for="jumat4" class="block text-sm font-medium text-gray-600">Jumat - 14.30 - 16.00</label>
    <input type="text" name="jumat4" id="jumat4" class="mt-1 p-2 border rounded-md w-full" value="{{ $jadwal->jumat4 }}" required>
</div>
@endif
                            <!-- Tombol Submit -->
                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ route('guru.jadwal') }}" class="btn btn-dark mr-2">Kembali</a>
                                <x-primary-button class="ml-4" type="submit">Update Jadwal</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>