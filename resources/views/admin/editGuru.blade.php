<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Guru') }}
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
                        <form action="{{ route('guru.update', $guru->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Nama Kelas -->
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-600">Nama</label>
                                <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full" value="{{ $guru->name }}" required>
                            </div>

                            <!-- NIK -->
                            <div class="mb-4">
                                <label for="nik" class="block text-sm font-medium text-gray-600">NIK (>10)</label>
                                <input type="number" name="nik" id="nik" class="mt-1 p-2 border rounded-md w-full" value="{{ $guru->nik }}" required>
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                                <input type="email" name="email" id="email" class="mt-1 p-2 border rounded-md w-full" value="{{ $guru->email }}" required>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ route('guru.daftarGuru') }}" class="btn btn-dark mr-2">Kembali</a>
                                <x-primary-button class="ml-4" type="submit">Update Guru</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>