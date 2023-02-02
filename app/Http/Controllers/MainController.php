<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    function index()
    {
     return view('auth/login');
    }

    function checklogin(Request $request)
    {
     $this->validate($request, [
      'nip'   => 'required',
      'password'  => 'required|alphaNum|min:3'
     ]);

     $user_data = array(
      'nip'  => $request->get('nip'),
      'password' => $request->get('password')
     );

     if(Auth::attempt($user_data))
     {
      return redirect('/indikator-kinerja');
     }
     else
     {
      return back()->with('error', 'Data yang dimasukkan salah');
     }

    }

    function successlogin()
    {
     return view('iku');
    }

    function logout()
    {
     Auth::logout();
        return redirect('/login')->with('logout', 'Harap login kembali untuk masuk!');

    }


}

?>
