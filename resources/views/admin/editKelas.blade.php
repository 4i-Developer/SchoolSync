<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kelas') }}
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
                        <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Nama Kelas -->
                            <div class="mb-4">
                                <label for="namaKelas" class="block text-sm font-medium text-gray-600">Nama Kelas</label>
                                <input type="text" name="namaKelas" id="namaKelas" class="mt-1 p-2 border rounded-md w-full" value="{{ $kelas->nama_kelas }}" required>
                            </div>

                            <!-- Wali Kelas -->
                            <div class="mt-4">
                                <x-input-label for="idGuru" :value="__('Wali Kelas')" />
                                <select id="idGuru" name="idGuru" class="block mt-1 w-full" required autofocus>
                                @foreach($users as $user)
                                    @if($user->role == 'guru')
                                        <option value="{{ $user->id }}" @if($user->id == $kelas->id_guru) selected @endif>
                                            {{ $user->name }} @if($user->id == $kelas->id_guru) (Selected) @endif
                                        </option>
                                    @endif
                                @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('idGuru')" class="mt-2" />
                            </div><br>

                            <!-- Tombol Submit -->
                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ route('kelas.daftarKelas') }}" class="btn btn-dark mr-2">Kembali</a>
                                <x-primary-button class="ml-4" type="submit">Update Kelas</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>