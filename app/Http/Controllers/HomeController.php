<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home_admin(){
        return view('master_admin');
    }
    public function Index(){
        return redirect('/beranda');
    }
    public function Login(){
        return view('front.login');
    }
    public function HomeDosen(){
        return redirect('/dashboard');
    }
    public function HomeMahasiswa(){
        return view('front.master_mahasiswa');
    }
}
