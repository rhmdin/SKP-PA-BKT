<?php

namespace App\Http\Controllers;

use App\Models\Iku;
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
}