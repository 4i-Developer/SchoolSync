<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            API Documentation
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Profile User</h3>
                    <p class="mb-2">Method: GET</p>
                    <p class="mb-2">URL: /berita/{id}</p>
                    <p>Digunakan untuk mendapatkan profile user berdasarkan ID.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Berita Sekolah</h3>
                    <p class="mb-2">Method: GET</p>
                    <p class="mb-2">URL: /users/{id}</p>
                    <p>Digunakan untuk mendapatkan berita sekolah berdasarkan ID.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>