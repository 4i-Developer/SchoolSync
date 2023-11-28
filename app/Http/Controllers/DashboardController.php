<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Kelas;
use App\Models\Presensi;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->user()->id;
        $now = Carbon::now();
        $kelasUser = Kelas::find($request->user()->kelas);
        $start = Carbon::today()->setHour(6)->setMinute(0)->setSecond(0);
        $end = Carbon::today()->setHour(7)->setMinute(0)->setSecond(0);
        $isPresensiTime = $now->greaterThanOrEqualTo($start) && $now->lessThan($end);
        $hasPresensiToday = $this->checkPresensiToday($userId);

        return view('dashboard', [
            'isPresensiTime' => $isPresensiTime,
            'hasPresensiToday' => $hasPresensiToday,
            'kelasUser' => $kelasUser,
        ]);
    }

    public function checkPresensiToday($userId)
    {
        $today = Carbon::today();
        $presensiCount = Presensi::where('id_user', $userId)
            ->whereDate('created_at', $today)
            ->count();

        return $presensiCount > 0;
    }

    public function store(Request $request)
    {
        $userId = $request->user()->id;
        $kelasId = $request->user()->kelas;

        $now = Carbon::now();
        $start = Carbon::today()->setHour(6)->setMinute(0)->setSecond(0);
        $end = Carbon::today()->setHour(7)->setMinute(0)->setSecond(0);
        $status = $now->greaterThanOrEqualTo($start) && $now->lessThan($end) ? '1' : '2';

        Presensi::create([
            'id_user' => $userId,
            'id_kelas' => $kelasId,
            'time' => $now,
            'status' => $status,
        ]);

        return redirect()->back()->with('success', 'Berhasil presensi!');
    }
    public function getPresensiData($userId)
    {
        return Presensi::where('id_user', $userId)
            ->whereDate('created_at', Carbon::today())
            ->latest()
            ->firstOrFail();
    }
}