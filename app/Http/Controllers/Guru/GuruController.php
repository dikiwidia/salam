<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\GuruStoreRequest;
use App\Http\Requests\GuruUpdateRequest;
use App\Salam\Guru;

class GuruController extends Controller
{
    private $modulURL;

    public function __construct()
    {
        $this->modulURL = route('guru.index');
    }

    public function index()
    {
        $no     = 1;
        $data   = Guru::get();
        return view('pendidik.index',compact('data','no'));
    }

    public function create()
    {
        return view('pendidik.create');
    }

    public function store(GuruStoreRequest $request)
    {
        Guru::create([
            'nama'              => $request->nama,
            'niptk'             => $request->niptk,
            'alamat'            => $request->alamat,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'status_perkawinan' => $request->status_perkawinan,
            'kode_pos'          => $request->kode_pos,
            'status'            => 'A'
        ]);
        return redirect($this->modulURL);  
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $parse   = Guru::where('id',$id);
        if($parse->count() == 0){
            return redirect($this->modulURL);
        }
        $parse = $parse->first();
        return view('pendidik.edit',compact('parse'));
    }

    public function update(GuruUpdateRequest $request, $id)
    {
        $list = [
            'nama'              => $request->nama,
            'niptk'             => $request->niptk,
            'alamat'            => $request->alamat,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'status_perkawinan' => $request->status_perkawinan,
            'kode_pos'          => $request->kode_pos,
            'status'            => $request->status
        ];
        $patch = Guru::where('id',$id);
        if($patch->count() == 0){            
            return redirect($this->modulURL);
        }
        $patch->update($list);
        return redirect($this->modulURL);
    }

    public function destroy($id)
    {
        $patch = Guru::findOrFail($id);
        $patch->delete();
        return redirect($this->modulURL);
    }
}
