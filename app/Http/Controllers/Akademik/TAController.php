<?php

namespace App\Http\Controllers\Akademik;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Salam\TahunAkademik;

class TAController extends Controller
{
    private $modulURL;

    public function __construct()
    {
        $this->modulURL = route('akademik.ta');
    }

    public function index()
    {
        $no     = 1;
        $data   = TahunAkademik::get();
        return view('ta.index',compact('data','no'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $save = [
            'nama' => $request->nama,
            'status' => 'N'
        ];
        TahunAkademik::create($save);
        return redirect($this->modulURL);
    }

    public function show($id)
    {
        //
    }

    // public function edit($id)
    // {
    //     $status = TahunAkademik::where('id',$id)->firstOrFail();
    //     $st = ($status->status == 'A') ? 'N' : 'A'; 
        
    //     TahunAkademik::where('status','A')->update(['status' => 'N']);
    //     TahunAkademik::where('id',$id)->update(['status' => $st]);
    //     return redirect($this->modulURL);
    // }

    public function update(Request $request)
    {
        $patch = TahunAkademik::findOrFail($request->id);
        $patch->update(['nama' => $request->nama]);
        return redirect($this->modulURL);
    }

    public function destroy($id)
    {
        $patch = TahunAkademik::findOrFail($id);
        $patch->delete();
        return redirect($this->modulURL);
    }

    public function apply($id)
    {
        $status = TahunAkademik::where('id',$id)->firstOrFail();
        $st = ($status->status == 'A') ? 'N' : 'A'; 
        
        TahunAkademik::where('status','A')->update(['status' => 'N']);
        TahunAkademik::where('id',$id)->update(['status' => $st]);
        return redirect($this->modulURL);
    }
}
