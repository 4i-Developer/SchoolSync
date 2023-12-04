<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Wali') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif
<!-- 
| Nama  : Davin Wahyu Wardana
| NIM   : 6706223003
| Kelas : D3IF-4603 
--> 
                    <form action="{{ route('wali.store') }}" method="POST">
                        @csrf
                        <!-- Nama -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-600">Nama</label>
                            <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                            <input type="email" name="email" id="email" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                            <input type="password" name="password" id="password" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>

                        <!-- Murid -->
                        <div class="mt-4">
                            <x-input-label for="id_murid" :value="__('Murid')" />
                            <select id="id_murid" name="id_murid" class="block mt-1 w-full" required autofocus>
                                @foreach($siswa as $siswaa)
                                    <option value="{{ $siswaa->id }}">{{ $siswaa->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('id_murid')" class="mt-2" />
                        </div><br>

                        <!-- Tombol Submit -->
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('wali.daftarWali') }}" class="btn btn-dark">Back</a>
                            <x-primary-button class="ml-4" type="submit">Tambah Wali</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>