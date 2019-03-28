<?php

namespace App\Http\Controllers\Akademik;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\MapelStoreRequest;
use App\Http\Requests\MapelUpdateRequest;
use App\Salam\Mapel;

class MataPelajaranController extends Controller
{
    private $modulURL;

    public function __construct()
    {
        $this->modulURL = route('akademik.mp');
    }

    public function index()
    {
        return redirect($this->modulURL);
    }

    public function create()
    {
        return view('mapel.create');
    }

    public function store(MapelStoreRequest $request)
    {
        Mapel::create([
            'kode_mapel'=> $request->kode_mapel,
            'nama_idn'  => $request->nama_idn,
            'nama_eng'  => $request->nama_eng,
            'sks'       => $request->sks,
            'status'    => 'A'
        ]);
        return redirect($this->modulURL);  
    }

    public function show()
    {
        $no     = 1;
        $data   = Mapel::get();
        return view('mapel.index',compact('data','no'));
    }

    public function edit($id)
    {
        $parse   = Mapel::where('id',$id);
        if($parse->count() == 0){
            return redirect($this->modulURL);
        }
        $parse = $parse->first();
        return view('mapel.edit',compact('parse'));
    }

    public function update(MapelUpdateRequest $request, $id)
    {
        $list = [
            'nama_idn'  => $request->nama_idn,
            'nama_eng'  => $request->nama_eng,
            'sks'       => $request->sks,
            'status'    => $request->status
        ];
        $patch = Mapel::where('id',$id);
        if($patch->count() == 0){            
            return redirect($this->modulURL);
        }
        $patch->update($list);
        return redirect($this->modulURL);
    }

    public function destroy($id)
    {
        $patch = Mapel::findOrFail($id);
        $patch->delete();
        return redirect($this->modulURL);
    }
}
