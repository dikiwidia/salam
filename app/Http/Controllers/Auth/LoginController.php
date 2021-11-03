<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use App\Salam\Admin;
use App\Salam\Pengguna;

class LoginController extends Controller
{
    public function __construct(){
        //
    }
    public function index(){
        if(session()->has('masuk')){
            return redirect('/');
        }
        return view('login.login');
    }
    public function auth(Request $r){
        if(session()->has('masuk')){
            return redirect('/');
        }
        $u = $r->nickname;
        $l = $r->role;
        $p = $r->passcode;
        if($l == 'A'){        
            $data = Admin::where('nickname',$u)->where('status','A')->first();
        } else {        
            $data = Pengguna::where('nickname',$u)->where('status','A')->first();
        }
        if($data != null){
            if (Hash::check($p, $data->passcode)) {
                // The passwords match...
                Session::put('id',$data->id);
                Session::put('role',$l);
                if($l == 'A'){
                    Session::put('nama',$data->nama);
                    Session::put('mod_santri',$data->mod_santri);
                    Session::put('mod_pendidik',$data->mod_pendidik);
                    Session::put('mod_akademik',$data->mod_akademik);
                    Session::put('mod_su',$data->mod_su);
                    Session::put('role','A');
                } else {
                    Session::put('nama',$data->getGuru->nama);
                    Session::put('mod_santri','N');
                    Session::put('mod_pendidik','N');
                    Session::put('mod_akademik','N');
                    Session::put('mod_su','N');
                    Session::put('role','G');
                }
                Session::put('masuk',TRUE);
                return redirect('/');
            }
            else{
                return redirect('/login')->with('status', $u)->withInput();
            }
        }
        else{
            return redirect('/login')->with('status', $u)->withInput();
        }
    }
    public function logout(){
        session()->forget('masuk');
        session()->flush();
        return redirect('/');
    }
    public function phpinfo(){
        phpinfo();
    }
}
