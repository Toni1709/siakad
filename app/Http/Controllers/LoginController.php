<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postlogin(Request $request){
        if(Auth::guard('user')->attempt(['email' => $request->username, 'password' => $request->password])){
                return redirect('home_admin');
        }
        else{
            return redirect()->route('login');
        }
    }
    public function logout(){
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        }elseif(Auth::guard('dosen')->check()){
            Auth::guard('dosen')->logout();
        }
        return redirect()->route('login');
    }

    public function PostLogin2(Request $request){
        if(Auth::guard('dosen')->attempt(['nip' => $request->username, 'password' => $request->password])){
            return redirect('home_dosen');
        }elseif(Auth::guard('mahasiswa')->attempt(['nim' => $request->username, 'password' => $request->password ])){
            return redirect('home_mahasiswa');
        }
        else{
            return redirect('/login');
        }
    }
    public function logout2(){
        if(Auth::guard('dosen')->check()){
            Auth::guard('dosen')->logout();
        }elseif(Auth::guard('mahasiswa')->check()){
            Auth::guard('mahasiswa')->logout();
        }
        return redirect('/login');
    }
}
