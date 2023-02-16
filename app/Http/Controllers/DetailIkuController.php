<?php

namespace App\Http\Controllers;

use App\Models\DetailIku;
use App\Models\Iku;
use Illuminate\Http\Request;

class DetailIkuController extends Controller
{

    public function getPk()
    {
        $pk = Iku::all();

        return view('pk', compact('pk'));
    }
    public function store(Request $request)
    {
        // validasi inputan
        $validated = $request->validate([
            'id_iku' => 'required',
            'tahun' => 'required',
            'target' => 'required',
        ]);

        // menyimpan data produk
        DetailIku::create($validated);
        $pk = Iku::all();

        return back()->withInput();
    }

    public function storePk(Request $request)
    {
        // validasi inputan
        $validated = $request->validate([
            'id_iku' => 'required',
            'tahun' => 'required',
            'target' => 'required',
            'pihak_satu' => 'required',
            'pihak_dua' => 'required',
            'tanggal_ditetapkan' => 'required'
        ]);

        // menyimpan data produk
        DetailIku::create($validated);
        $pk = Iku::all();

        return back()->withInput();
    }

    public function getIku()
    {
        $ikus = Iku::all();

        return view('tambahRkt', compact('ikus'));
    }

    public function edit(DetailIku $rkt)
    {
        $iku = Iku::all();
        $id = $rkt->id_iku;
        $isi = Iku::where('id', $id)->get('isi_iku');
        $data = [
            'pk' => $rkt,
            'iku' => $iku
        ];
        //dd($isi);
        return view('editRkt', compact('data', 'isi'));
    }

    public function update(Request $request, DetailIku $rkt)
    {
        // validasi inputan
        $validated = $request->validate([
            'id_iku' => 'required',
            'tahun' => 'required',
            'target' => 'required',
        ]);

        $rkt->update($validated);

        $pk = Iku::all();
        return redirect('/rencana-kinerja-tahunan');
    }

    public function destroy(DetailIku $rkt)
    {
        $rkt->delete();

        return redirect('/rencana-kinerja-tahunan');
    }

    public function editPk(DetailIku $pk)
    {
        $query = $pk->id_iku;
        $iku = Iku::where('id', $query)->get();
        $data = [
            'pk' => $pk,
            'iku' => $iku[0]
        ];
        //dd($data);
        return view('editPk', compact('data'));
    }

    public function updatePk(Request $request, DetailIku $pk)
    {
        // validasi inputan
        $validated = $request->validate([
            'pihak_satu' => 'required',
            'pihak_dua' => 'required',
            'tanggal_ditetapkan' => 'required'
        ]);

        $pk->update($validated);

        $pk = Iku::all();
        return redirect('/perjanjian-kinerja');
    }
}