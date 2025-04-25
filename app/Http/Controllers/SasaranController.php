<?php

namespace App\Http\Controllers;

use Symfony\Component\Console\Input\Input;
use App\Models\DetailIku;
use App\Models\Iku;
use App\Models\InputIku;
use App\Models\Pengukuran;
use App\Models\Tujuan;
use App\Models\Sasaran;
use Illuminate\Http\Request;
use Exception;

class SasaranController extends Controller
{
    public function getSasaran()
    {
        try
            {
                $sasarans = Sasaran::all();
                return view('sasaran', compact('sasarans'));
            }
        catch(Exception $e)
            {
                return view('sasaran', compact('sasarans'))->with('errshow', 'Gagal tampil sasaran');
            }
    }

    public function getTujuan()
    {
        $tujuans = Tujuan::all();
        return view('tambahSasaran', compact('tujuans'));        
    }

    public function store(Request $request)
    {
        // validasi inputan
        $validated = $request->validate([
            'id_tujuan' => 'required',
            'isi_sasaran' => 'required',
            'periode' => 'required',
        ]);
        try
        {
            // menyimpan data produk
            Sasaran::create($validated);
            $sasarans = Sasaran::all();
            return view('sasaran', compact('sasarans'));
        }
        catch(Exception $e)
        {
           dd($e->getMessage());
        }
    }

    public function edit(Sasaran $sasaran)
    {
        try
            {
                $tujuans = Tujuan::all();
                $id = $sasaran->id_tujuan;
                $isi_tujuan = Tujuan::where('id', $id)->get('isi_tujuan');
                $data = [
                    'tujuans' => $tujuans,
                    'sasaran' => $sasaran
                ];
                //dd($data['iku']->id);
                return view('editSasaran', compact('data', 'isi_tujuan'));
            }
        catch(Exception $e)
            {
            dd($e->getMessage());
            }
    }

    public function update(Request $request, Sasaran $sasaran)
    {
        try
        {
            // validasi inputan
            $validated = $request->validate([
                'id_tujuan' => 'required',
                'isi_sasaran' => 'required',
                'periode' => 'required',
            ]);

            $sasaran->update($validated);


            return redirect('/sasaran-strategis');
        }
        catch(Exception $e)
        {
        dd($e->getMessage());
        }
    }

    public function destroy(Sasaran $sasaran)
    {
        try{
            $id = $sasaran->id;
            $ikus = Iku::where('id_sasaran', $id)->get(); 

            foreach ($ikus as $iku) {
                $input_id = InputIku::where('id_iku', $iku->id)->get();
                $input_id->each->delete();

                $iku_id = DetailIku::where('id_iku', $iku->id)->get();
                foreach ($iku_id as $det) {
                    $det_id = Pengukuran::where('id_detail', $det->id)->get();
                    $det_id->each->delete();
                }
                $iku_id->each->delete();
            }
            $ikus->each->delete();

            $sasaran->delete();

            return redirect('/sasaran-strategis')->with('successdelete', 'Sasaran berhasil dihapus!');
        }
        catch(Exception $e){
            return redirect('/sasaran-strategis')->with('errdelete', 'Sasaran gagal dihapus!');
        }
    }

}