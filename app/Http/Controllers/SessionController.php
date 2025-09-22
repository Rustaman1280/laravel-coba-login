<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        return view('sesi/index');
    }
    public function login(Request $request){
    Session::flash('email', $request->email);
    $request->validate([
        'email' => 'required',
        'password' => 'required'
    ]);
    [
        'email' => 'Email wajib diisi',
        
        'password' => 'Password wajib diisi'
    ];
    $infoLogin = [
        'email' => $request->email,
        'password' => $request->password
    ];
    if(Auth::attempt($infoLogin)){
        return redirect('departemen')->with('success', 'Berhasil login');
    }else{
        return redirect('sesi')->with('Email atau password salah');
    }
    }   
    
    public function logout(){
        Auth::logout();
        return redirect('sesi')->with('success', 'Berhasil logout');
    }
}
