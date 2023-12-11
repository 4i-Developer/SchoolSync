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
                <img src="{{ asset('images/profile/' . Auth::user()->profile) }}" width="75" alt="Profile" class="w-24 h-24 object-cover mt-4">
            </div>
            <div class="ml-4"><br>
                <p class="font-semibold">{{ Auth::user()->name }}</p>
                <p>{{ Auth::user()->nis }}</p>
                <p>{{ $kelasUser ? $kelasUser->nama_kelas : '' }}</p>
            </div>
        </div>
        @endif
        @if(Auth::user()->role === 'wali')
        <div class="flex items-center">
            <div class="ml-4">
                <p class="font-semibold">{{ Auth::user()->name }}</p>
                @php
                    $murid = App\Models\User::find(Auth::user()->id)->murid;
                @endphp
                @if($murid)
                    <p>Wali Murid dari {{ $murid->name }}</p>
                @endif
                <p>{{ $kelasUser ? $kelasUser->nama_kelas : '' }} ({{ $murid->nis }})</p>
            </div>
        </div>
        @endif
    </x-slot>

    @if(Auth::user()->role === 'admin' || Auth::user()->role === 'guru')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <img src="{{ asset('images/dashboard/student.png') }}" alt="Dashboard Image" class="w-full">
        </div>
    </div>
    @endif

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
                        <p>Kelas</p>
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $kelasUser ? $kelasUser->nama_kelas : '' }}</h2>
                    </div>

                    <div class="text-left">
                        <p>
                            @php
                                $hari = \Carbon\Carbon::now()->format('l');
                                $harinya = 'senin1';
                                $jamWaktu = '08.00 - 09.30';
                                switch ($hari) {
                                    case 'Monday':
                                        $hari = 'senin';
                                        break;
                                    case 'Tuesday':
                                        $hari = 'selasa';
                                        break;
                                    case 'Wednesday':
                                        $hari = 'rabu';
                                        break;
                                    case 'Thursday':
                                        $hari = 'kamis';
                                        break;
                                    case 'Friday':
                                        $hari = 'jumat';
                                        break;
                                    case 'Saturday':
                                        $hari = 'sabtu';
                                        break;
                                    case 'Sunday':
                                        $hari = 'minggu';
                                        break;
                                    default:
                                        $hari = 'invalid';
                                        break;
                                }
                                $jamSekarang = \Carbon\Carbon::now()->format('H:i');
                                if ($jamSekarang >= '00:00' && $jamSekarang < '09:30') {
                                    $harinya = $hari.'1';
                                    $jamWaktu = '07.00 - 09.30';
                                    $mataPelajaran = $kelasUser ? $kelasUser->$harinya : '';
                                } elseif ($jamSekarang >= '09:30' && $jamSekarang < '10:00') {
                                    $jamWaktu = '09.30 - 10.00';
                                    $mataPelajaran = 'Istirahat 1';
                                } elseif ($jamSekarang >= '10:00' && $jamSekarang < '12:00') {
                                    $harinya = $hari.'2';
                                    $jamWaktu = '10.00 - 12.00';
                                    $mataPelajaran = $kelasUser ? $kelasUser->$harinya : '';
                                } elseif ($jamSekarang >= '12:00' && $jamSekarang < '13:00') {
                                    $jamWaktu = '12.00 - 13.00';
                                    $mataPelajaran = 'Istirahat 2';
                                } elseif ($jamSekarang >= '13:00' && $jamSekarang < '14:30') {
                                    $harinya = $hari.'3';
                                    $jamWaktu = '13.00 - 14.30';
                                    $mataPelajaran = $kelasUser ? $kelasUser->$harinya : '';
                                } elseif ($jamSekarang >= '14:30' && $jamSekarang < '23:59') {
                                    $harinya = $hari.'4';
                                    $jamWaktu = '14.30 - 16.00';
                                    $mataPelajaran = $kelasUser ? $kelasUser->$harinya : '';
                                }
                                echo $mataPelajaran;
                            @endphp
                        </p>
                    </div>

                    <div class="text-right">
                        <p>Waktu</p>
                        <p>{{ $jamWaktu }}</p>
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
        $end = now()->setHour(10)->setMinute(0)->setSecond(0);
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

    @if(Auth::user()->role === 'wali')
        <br><br><br>
    @php
    $user = Auth::user();
    $userId = $user->id;
    $muridId = $user->id_murid;
    $now = now();
    $start = now()->setHour(6)->setMinute(0)->setSecond(0);
    $end = now()->setHour(10)->setMinute(0)->setSecond(0);
    $dashboardController = new \App\Http\Controllers\DashboardController();
    $isPresensiTime = $now->greaterThanOrEqualTo($start) && $now->lessThan($end);
    $hasPresensiToday = $dashboardController->checkPresensiToday($muridId);
@endphp

@if($hasPresensiToday)
    @php
        $presensiData = $dashboardController->getPresensiData($muridId);
        if ($presensiData) {
            $jamPresensi = \Carbon\Carbon::parse($presensiData->time)->format('H:i');
            $statusPresensi = $presensiData->status == '1' ? 'TEPAT WAKTU' : 'TERLAMBAT';
        } else {
            $jamPresensi = '';
            $statusPresensi = '';
        }
    @endphp
    <div class="mt-4 text-center">
        <button class="btn btn-outline-secondary">ANAK ANDA SUDAH PRESENSI<br>CHECK IN : {{ $jamPresensi }}<br>STATUS : {{ $statusPresensi }}</button>
    </div>
@elseif($isPresensiTime)
    <form action="{{ route('dashboard.presensi') }}" method="POST">
        @csrf
        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-outline-secondary">ANAK ANDA<br>BELUM PRESENSI<br>HARI INI</button>
        </div>
    </form>
@else
    <div class="mt-4 text-center">
        <button class="btn btn-outline-secondary">ANAK ANDA<br>TIDAK PRESENSI<br>HARI INI</button>
    </div>
@endif

    @endif

</x-app-layout>
