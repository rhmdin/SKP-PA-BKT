<?php

namespace App\Http\Controllers;

use App\Models\DetailIku;
use App\Models\Iku;
use App\Models\Pengukuran;
use Illuminate\Http\Request;

class PengukuranController extends Controller
{
    public function getPeng()
    {
        $pengs = Pengukuran::all();
        //dd($ikus);
        return view('pengukuran', compact('pengs'));
    }
    public function getIku()
    {
        $ikus = DetailIku::all();

        return view('tambahPeng', compact('ikus'));
    }
    public function store(Request $request)
    {
        $query = $request->id_detail;
        $id_iku = DetailIku::where('id', $query)->get('id_iku');
        $target = Iku::where('id', $id_iku)->get('target');

        $realisasi = $request->realisasi;

        (string)$realisasi = round(((int)$request->input_satu / (int)$request->input_dua)*100);


        (string)$capaian = round(((int)$realisasi / (int)$target)*100);

        $request['capaian'] = $capaian;
        $request['realisasi'] = $realisasi;

        $validated = $request->validate([
            'id_detail' => 'required',
            'bulan' => 'required',
            'input_satu' => 'required',
            'input_dua' => 'required',
            'sumber_data' => 'required',
            'realisasi' => 'required',
            'capaian' => 'required'
        ]);


        Pengukuran::create($validated);
        $pk = Iku::all();

        return back()->withInput();
    }
<<<<<<< Updated upstream

    public function edit(Pengukuran $peng)
    {
        $ikus = DetailIku::all();
        $data = [
            'peng' => $peng,
            'iku' => $ikus
        ];
        //dd($data['iku']->id);
        return view('editPeng', compact('data'));
    }

    public function update(Request $request, Pengukuran $peng)
    {
        $query = $request->id_detail;
        $iku = DetailIku::where('id', $query)->get('target');

        $target = $iku[0]->target;

        $realisasi = $request->realisasi;

        (string)$realisasi = round(((int)$request->input_satu / (int)$request->input_dua)*100);
       

        (string)$capaian = round(((int)$realisasi / (int)$target)*100);

        $request['capaian'] = $capaian;
        $request['realisasi'] = $realisasi;

        // validasi inputan
        $validated = $request->validate([
            'id_detail' => 'required',
            'bulan' => 'required',
            'input_satu' => 'required',
            'input_dua' => 'required',
            'sumber_data' => 'required',
            'realisasi' => 'required',  
            'capaian' => 'required' 
        ]);

        $peng->update($validated);

        $pk = Iku::all();
        return redirect('/pengukuran-kinerja');
    }

    public function destroy(Pengukuran $peng)
    {
        $peng->delete();

        return redirect('/pengukuran-kinerja');
    }

}
=======
}
>>>>>>> Stashed changes
