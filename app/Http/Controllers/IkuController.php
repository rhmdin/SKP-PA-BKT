<?php

namespace App\Http\Controllers;

use App\Models\DetailIku;
use App\Models\Iku;
use App\Models\InputIku;
use App\Models\Pengukuran;
use App\Models\Sasaran;
use Illuminate\Http\Request;
use Exception;

class IkuController extends Controller
{
    public function getIku()
    {
        try
            {
                $ikus = Iku::all();
                return view('iku', compact('ikus'));
            }
        catch(Exception $e)
            {
                return view('iku', compact('ikus'))->with('errshow', 'Gagal tampil IKU');
            }
    }

    public function getRenstra()
    {
        try
            {
                $renstra = Iku::all();
                //dd($ikus);
                return view('renstra', compact('renstra'));
            }
        catch(Exception $e)
            {
                dd($e->getMessage());
                //dd($ikus);
                return view('renstra', compact('renstra'));
            }

    }
    public function getRkt()
    {
        try
        {
            $rkt = Iku::all();
            //dd($ikus);
            return view('rkt', compact('rkt'));
        }
        catch(Exception $e)
        {
        dd($e->getMessage());
        }
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
        try
        {
            // menyimpan data produk
            Iku::create($validated);

            $ikus = Iku::all();
            //dd($ikus);
            return back()->withInput();
        }
        catch(Exception $e)
        {
           dd($e->getMessage());
        }
    }

    public function getSasaran()
    {
        try
        {
            $sasarans = Sasaran::all();
            return view('tambahIku', compact('sasarans'));
        }
        catch(Exception $e)
        {
        dd($e->getMessage());
        }
    }

    public function edit(Iku $iku)
    {
        try
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
        catch(Exception $e)
            {
            dd($e->getMessage());
            }
    }

    public function update(Request $request, Iku $iku)
    {
        try
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
        catch(Exception $e)
        {
        dd($e->getMessage());
        }
    }

    public function destroy(Iku $iku)
    {
        try{
            $id = $iku->id;
            $inputs = InputIku::where('id_iku', $id)->get();
            $detail = DetailIku::where('id_iku', $id)->get();
            foreach ($detail as $det) {
                $det_id = Pengukuran::where('id_detail', $det->id)->get();
                $det_id->each->delete();
            }

            $detail->each->delete();
            $inputs->each->delete();
            $iku->delete();

            return redirect('/indikator-kinerja')->with('successdelete', 'IKU berhasil dihapus!');
        }
        catch(Exception $e){
            return redirect('/indikator-kinerja')->with('errdelete', 'IKU gagal dihapus!');
        }
    }

    public function getInput(Iku $iku)
    {
        try
            {
                $query = $iku->id;
                $inputs = InputIku::where('id_iku', $query)->get();
                $jmlinput = InputIku::where('id_iku', $query)->count();
                //dd($query);
                return view('input', compact('inputs','jmlinput'));
            }
        catch(Exception $e)
            {
            dd($e->getMessage());
            }
    }

    public function get()
    {
        try
        {
            $ikus = Iku::all();
            //dd($ikus);
            return view('tambahInput', compact('ikus'));
        }
        catch(Exception $e)
        {
        dd($e->getMessage());
        }
    }

    public function storeInput(Request $request, Iku $iku)
    {
        try
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
            $jmlinput = InputIku::where('id_iku', $id)->count();

            $ikus = Iku::all();
            //dd($ikus);
            return view('input', compact('inputs', 'jmlinput'));
        }
        catch(Exception $e)
        {
        dd($e->getMessage());
        }
    }


    public function destroyInput(iku $iku, InputIku $id)
    {
        try
        {
            $id->delete();
            return redirect()->back();
        }
        catch(Exception $e)
        {
        dd($e->getMessage());
        }
    }
}