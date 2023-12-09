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
                    <ul class="flex border-b">
                        <li class="-mb-px mr-1">
                            <a id="user-tab-btn" class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold" href="#user-tab">Users</a>
                        </li>
                        <li class="mr-1">
                            <a id="berita-tab-btn" class="bg-white inline-block py-2 px-4 text-gray-600 font-semibold" href="#berita-tab">Berita</a>
                        </li>
                    </ul>

                    <div class="p-6" id="user-tab">
                        <h3 class="text-lg font-semibold mb-4">Profile User</h3>
                        <p class="mb-2">Method: GET</p>
                        <p class="mb-2">URL: /users/{id}</p>
                        <p>Digunakan untuk mendapatkan profile user berdasarkan ID.</p>
                    </div>

                    <div class="hidden p-6" id="berita-tab">
                        <h3 class="text-lg font-semibold mb-4">Berita Sekolah</h3>
                        <p class="mb-2">Method: GET</p>
                        <p class="mb-2">URL: /berita/{id}</p>
                        <p>Digunakan untuk mendapatkan berita sekolah berdasarkan ID.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('user-tab-btn').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('user-tab').classList.remove('hidden');
            document.getElementById('berita-tab').classList.add('hidden');
        });

        document.getElementById('berita-tab-btn').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('berita-tab').classList.remove('hidden');
            document.getElementById('user-tab').classList.add('hidden');
        });
    </script>
</x-app-layout>
