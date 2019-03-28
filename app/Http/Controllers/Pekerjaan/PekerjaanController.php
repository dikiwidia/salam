<?php

namespace App\Http\Controllers\Pekerjaan;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Salam\Pekerjaan;

class PekerjaanController extends Controller
{
    private $modulURL;

    public function __construct()
    {
        $this->modulURL = route('jobs.index');
    }

    public function index()
    {
        $no     = 1;
        $data   = Pekerjaan::get();
        return view('pekerjaan.index',compact('data','no'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Pekerjaan::create([
            'nama'      => $request->nama,
        ]);
        return redirect($this->modulURL);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $list = [
            'nama' => $request->nama
        ];
        $patch = Pekerjaan::where('id',$request->id);
        if($patch->count() == 0){            
            return redirect($this->modulURL);
        }
        $patch->update($list);
        return redirect($this->modulURL);
    }

    public function destroy($id)
    {
        $patch = Pekerjaan::findOrFail($id);
        $patch->delete();
        return redirect($this->modulURL);
    }
}
