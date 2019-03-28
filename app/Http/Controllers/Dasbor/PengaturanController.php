<?php

namespace App\Http\Controllers\Dasbor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequest;

use Illuminate\Support\Facades\Hash;
use Session;

use App\Salam\Admin;
use App\Salam\Pengguna;

class PengaturanController extends Controller
{
    private $modulURL;

    public function __construct()
    {
        $this->modulURL = route('login.exit');
    }

    public function index()
    {
        return view('pengaturan.index');
    }
    
    public function update(PasswordUpdateRequest $request)
    {
        if(Session::get('role') == 'A'){
            $data = Admin::where('id',Session::get('id'))->first();
            $upda = Admin::where('id',Session::get('id'));
        } else {            
            $data = Pengguna::where('id',Session::get('id'))->first();
            $upda = Pengguna::where('id',Session::get('id'));
        }
        if(Hash::check($request->password_old, $data->passcode)){
            $te = [
                'passcode' => bcrypt($request->password)
            ];
        } else {
            return redirect(route('setting.index'))->with('warning','Kata Sandi Lama Salah, Silahkan coba kembali');
        }
        $upda->update($te);
        return redirect($this->modulURL);
    }
}
