<?php

namespace App\Http\Controllers;

use App\Models\Iku;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function getLap()
    {
        $ikus = Iku::all();
        return view('laporan', compact('ikus'));
    }
    public function getBln()
    {
        $laporan = Iku::all();
        return view('rekapperbulan', compact('laporan'));
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
