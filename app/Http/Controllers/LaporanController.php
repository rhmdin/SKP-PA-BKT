<?php

namespace App\Http\Controllers;

use App\Models\DetailIku;
use App\Models\Iku;
use App\Models\InputIku;
use App\Models\Pengukuran;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function getLap()
    {
        $detailiku = DetailIku::groupBy('tahun')->get();
        return view('laporan', compact('detailiku'));
    }
    public function getBln($tahun)
    {
        $tahun = $tahun;
<<<<<<< HEAD
        $detailiku = DetailIku::where('tahun', $tahun)->get();
        $id_detiku = $detailiku[0]->id;
    
        $jmlbln = Pengukuran::where('id_detail',$id_detiku)->count();
        $ukur = Pengukuran::where('id_detail',$id_detiku)->get();
        $ukur2 = $ukur;
        $ukur3 = $ukur;
        return view('rekapperbulan',compact('tahun','detailiku','jmlbln','id_detiku','ukur','ukur2','ukur3'));
        $jml_dtl = DetailIku::where('tahun', $tahun)->count();
            $detail = DetailIku::where('tahun', $tahun)->get();
    }

    public function getTri($tahun)
    {
        $tahun = $tahun;

        $detailiku = DetailIku::where('tahun', $tahun)->get();
        $laporan = Iku::all();
        return view('rekaptriwulan', compact('detailiku', 'tahun'));
    }

    public function getSem($tahun)
    {
        $tahun = $tahun;
        $laporan = Iku::all();
        return view('rekapsemester', compact('laporan'));
    }
}