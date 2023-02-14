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

        $jml_dtl = DetailIku::where('tahun', $tahun)->count();
        if($jml_dtl > 0){
            $detail = DetailIku::where('tahun', $tahun)->join('iku', 'iku.id','=', 'detail_iku.id_iku')->select('detail_iku.id','id_iku', 'tahun', 'target', 'iku.jenis')->orderBy('iku.jenis')->get();
        }
        else{
            $detail = 0;
        }
        return view('rekapperbulan',compact('tahun','detail','jml_dtl'));

    }

    public function getTri($tahun)
    {
        $tahun = $tahun;

        $detailiku = DetailIku::where('tahun', $tahun)->join('iku', 'iku.id','=', 'detail_iku.id_iku')->select('detail_iku.id','id_iku', 'tahun', 'target', 'iku.jenis')->orderBy('iku.jenis')->get();
        $laporan = Iku::all();
        return view('rekaptriwulan', compact('detailiku', 'tahun'));
    }

    public function getSem($tahun)
    {
        $tahun = $tahun;
        $jml_dtl = DetailIku::where('tahun', $tahun)->count();
        if($jml_dtl > 0){
            $detail = DetailIku::where('tahun', $tahun)->join('iku', 'iku.id','=', 'detail_iku.id_iku')->select('detail_iku.id','id_iku', 'tahun', 'target', 'iku.jenis')->orderBy('iku.jenis')->get();
        }
        else{
            $detail = 0;
        }
        return view('rekapsemester',compact('tahun','detail','jml_dtl'));
    }

}
