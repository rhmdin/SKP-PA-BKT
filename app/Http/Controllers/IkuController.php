<?php

namespace App\Http\Controllers;

use App\Models\Iku;
use App\Models\Sasaran;
use Illuminate\Http\Request;

class IkuController extends Controller
{
    public function getIku()
    {
        $ikus = Iku::all();
        //dd($ikus);
        return view('iku', compact('ikus'));
    }

    public function getRenstra()
    {
        $renstra = Iku::all();
        
        //dd($ikus);
        return view('renstra', compact('renstra'));
    }
    public function getRkt()
    {
        $rkt = Iku::all();
        
        //dd($ikus);
        return view('rkt', compact('rkt'));
    }

    

    public function store(Request $request)
    {
        // validasi inputan
        $validated = $request->validate([
            'id_sasaran' => 'required',
            'jenis' => 'required',
            'isi_iku' => 'required',
            'penanggung_jawab' => 'required',
            'target' => 'required',
            'sumber_data' => 'required'
        ]);

        // menyimpan data produk
        Iku::create($validated);

        $ikus = Iku::all();
        //dd($ikus);
        return back()->withInput();
    }

    public function getSasaran()
    {
        $sasarans = Sasaran::all();
        return view('tambahIku', compact('sasarans'));
    }

    public function edit(Iku $iku)
    {
        $sasarans = Sasaran::all();
        $data = [
            'sasarans' => $sasarans,
            'iku' => $iku
        ];
        //dd($data['iku']->id);
        return view('editIku', compact('data'));
    }

    public function update(Request $request, Iku $iku)
    {
        // validasi inputan
        $validated = $request->validate([
            'id_sasaran' => 'required',
            'jenis' => 'required',
            'isi_iku' => 'required',
            'penanggung_jawab' => 'required',
            'target' => 'required',
            'sumber_data' => 'required'
        ]);

        $iku->update($validated);


        return redirect('/indikator-kinerja');
    }

    public function destroy(Iku $iku)
    {
        $iku->delete();

        return redirect('/indikator-kinerja');
    }

}