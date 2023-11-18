<x-app-layout>
    <x-slot name="header">
        @if(Auth::user()->role !== 'siswa')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        @endif
        @if(Auth::user()->role === 'siswa')
        <div class="flex items-center">
            <div>
                <img src="{{ Auth::user()->profile }}" width="75" alt="Profile" class="w-24 h-24 object-cover mt-4">
            </div>
            <div class="ml-4"><br>
                <p class="font-semibold">{{ Auth::user()->name }}</p>
                <p>{{ Auth::user()->nis }}</p>
                <p>Kelas XII</p>
            </div>
        </div>
        @endif
    </x-slot>

    @if(Auth::user()->role === 'siswa')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-right">
                        <p>Ruangan</p>
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelas XX</h2>
                        </div>
                        <div class="text-left">
                            <p>MATEMATIKA</p>
                        </div>
                        <div class="text-right">
                            <p>Waktu</p>
                            <p>08.00 - 09.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 text-center">
        <button class="btn btn-outline-secondary">PRESENSI</button>
    </div>
    @endif

</x-app-layout>
