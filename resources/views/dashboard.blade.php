<x-app-layout>
    <x-slot name="header">
        @if(Auth::user()->role === 'developer')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Developer') }}
        </h2>
        @endif
        @if(Auth::user()->role === 'admin')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
        @endif
        @if(Auth::user()->role === 'guru')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Guru') }}
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
        @if(Auth::user()->role === 'wali')
        <div class="flex items-center">
            <div class="ml-4"><br>
                <p class="font-semibold">{{ Auth::user()->name }}</p>
                <p>Kelas XII</p>
            </div>
        </div>
        @endif
    </x-slot>

    @if(Auth::user()->role === 'siswa')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
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

    @php
        $userId = Auth::id();
        $now = now();
        $start = now()->setHour(6)->setMinute(0)->setSecond(0);
        $end = now()->setHour(11)->setMinute(0)->setSecond(0);
        $dashboardController = new \App\Http\Controllers\DashboardController();
        $isPresensiTime = $now->greaterThanOrEqualTo($start) && $now->lessThan($end);
        $hasPresensiToday = $dashboardController->checkPresensiToday($userId);
    @endphp

    @if($hasPresensiToday)
    @php
        $presensiData = $dashboardController->getPresensiData($userId);
        if ($presensiData) {
            $jamPresensi = \Carbon\Carbon::parse($presensiData->time)->format('H:i');
            $statusPresensi = $presensiData->status == '1' ? 'TEPAT WAKTU' : 'TERLAMBAT';
        } else {
            $jamPresensi = '';
            $statusPresensi = '';
        }
    @endphp
        <div class="mt-4 text-center">
            <button class="btn btn-outline-secondary">ANDA SUDAH PRESENSI<br>CHECK IN : {{ $jamPresensi }}<br>STATUS : {{ $statusPresensi }}</button>
        </div>
    @elseif($isPresensiTime)
    <form action="{{ route('dashboard.presensi') }}" method="POST">
        @csrf
        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-outline-secondary">PRESENSI</button>
        </div>
    </form>
    @else
        <div class="mt-4 text-center">
            <button class="btn btn-outline-secondary">TIDAK DAPAT<br>PRESENSI</button>
            <br><small>sudah melebihi waktu presensi*</small>
        </div>
    @endif


    @endif

</x-app-layout>
