<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Siswa') }}
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
                        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Nama Kelas -->
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-600">Nama</label>
                                <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full" value="{{ $siswa->name }}" required>
                            </div>

                            <!-- NIS -->
                            <div class="mb-4">
                                <label for="nis" class="block text-sm font-medium text-gray-600">NIS (>10)</label>
                                <input type="number" name="nis" id="nis" class="mt-1 p-2 border rounded-md w-full" value="{{ $siswa->nis }}" required>
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                                <input type="email" name="email" id="email" class="mt-1 p-2 border rounded-md w-full" value="{{ $siswa->email }}" required>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ route('siswa.daftarSiswa') }}" class="btn btn-dark mr-2">Kembali</a>
                                <x-primary-button class="ml-4" type="submit">Update Siswa</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>