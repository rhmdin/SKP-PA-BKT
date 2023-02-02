<?php

namespace App\Http\Controllers;

use App\Models\DetailIku;
use App\Models\Iku;
use App\Models\Pengukuran;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function getLap()
    {
        $detailiku = DetailIku::all();
        return view('laporan', compact('detailiku'));
    }
    public function getBln()
    {
        $pengukuran = Pengukuran::all();
        return view('rekapperbulan', compact('pengukuran'));
    }
    public function getTri()
    {
        $laporan = Iku::all();
        return view('rekaptriwulan', compact('laporan'));
    }
    public function getSem()
    {
        $laporan = Iku::all();
        return view('rekapsemester', compact('laporan'));
    }
}
