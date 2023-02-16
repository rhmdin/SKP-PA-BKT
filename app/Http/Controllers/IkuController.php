<?php

namespace App\Http\Controllers;

use App\Models\Iku;
use App\Models\InputIku;
use App\Models\Sasaran;
use Illuminate\Http\Request;

class IkuController extends Controller
{
    public function getIku()
    {
        $ikus = Iku::all();
       
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
        $id = $iku->id_sasaran;
        $isi_sasaran = Sasaran::where('id', $id)->get('isi_sasaran');
        $data = [
            'sasarans' => $sasarans,
            'iku' => $iku
        ];
        //dd($data['iku']->id);
        return view('editIku', compact('data', 'isi_sasaran'));
    }

    public function update(Request $request, Iku $iku)
    {
        // validasi inputan
        $validated = $request->validate([
            'id_sasaran' => 'required',
            'jenis' => 'required',
            'isi_iku' => 'required',
            'penanggung_jawab' => 'required',
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

    public function getInput(Iku $iku)
    {
        $query = $iku->id;
        $inputs = InputIku::where('id_iku', $query)->get();
        //dd($query);
        return view('input', compact('inputs'));
    }

    public function get()
    {
        $ikus = Iku::all();
        //dd($ikus);
        return view('tambahInput', compact('ikus'));
    }

    public function storeInput(Request $request, Iku $iku)
    {
        $id = $iku->id;
        $request['id_iku'] = $id;
        // validasi inputan
        $validated = $request->validate([
            'id_iku' => 'required',
            'ket_input' => 'required'
            
        ]);

        // menyimpan data produk
        InputIku::create($validated);

        $inputs = InputIku::where('id_iku', $id)->get();
        $ikus = Iku::all();
        //dd($ikus);
        return view('input', compact('inputs'));
    }

    
    public function destroyInput(iku $iku, InputIku $id)
    {
        $id->delete();

        return redirect()->back();
    }
}