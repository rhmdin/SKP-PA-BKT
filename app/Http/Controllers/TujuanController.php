<?php

namespace App\Http\Controllers;

use App\Models\Sasaran;
use Illuminate\Http\Request;
use App\Models\Tujuan;
use Exception;

class TujuanController extends Controller
{
    //
    public function getTujuan()
    {
        try {
            $tujuans = Tujuan::all();

            foreach ($tujuans as $tujuan) {
                // Check if there's any Sasaran with this tujuan's ID
                $tujuan->is_deletable = !Sasaran::where('id_tujuan', $tujuan->id)->exists();
            }

            return view('tujuan', compact('tujuans'));

        } catch (Exception $e) {
            return view('tujuan', ['tujuans' => []])->with('errshow', 'Gagal tampil tujuan');
        }
    }


    public function addTujuan()
    {
        try
            {
                $tujuans = Tujuan::all();
                return view('tambahTujuan', compact('tujuans'));
            }
        catch(Exception $e)
            {
                return view('tambahTujuan', compact('tujuans'))->with('errshow', 'Gagal tampil tujuan');
            }
    }
    
    public function store(Request $request)
    {
        // validasi inputan
        $validated = $request->validate([
            'isi_tujuan' => 'required'
        ]);
        try
        {
            // menyimpan data produk
            Tujuan::create($validated);
            $tujuans = Tujuan::all();
            return view('tujuan', compact('tujuans'));
        }
        catch(Exception $e)
        {
           dd($e->getMessage());
        }
    }

    public function edit(Tujuan $tujuan)
    {
        try
            {
                $data = [
                    'tujuan' => $tujuan
                ];
                //dd($data['iku']->id);
                return view('editTujuan', compact('data'));
            }
        catch(Exception $e)
            {
            dd($e->getMessage());
            }
    }

    public function update(Request $request, Tujuan $tujuan)
    {
        try
        {
            // validasi inputan
            $validated = $request->validate([
                'isi_tujuan' => 'required'
            ]);

            $tujuan->update($validated);
            return redirect('/tujuan');
        }
        catch(Exception $e)
        {
        dd($e->getMessage());
        }
    }

    public function destroy(Tujuan $tujuan)
    {
        try{
            $tujuan->delete();
            return redirect('/tujuan')->with('successdelete', 'Tujuan berhasil dihapus!');
        }
        catch(Exception $e){
            return redirect('/tujuan')->with('errdelete', 'Tujuan gagal dihapus!');
        }
    }
}
