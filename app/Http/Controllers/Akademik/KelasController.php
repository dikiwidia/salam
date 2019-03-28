<?php

namespace App\Http\Controllers\Akademik;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\KelasStoreRequest;
use App\Http\Requests\KelasUpdateRequest;
use App\Salam\Kelas;
use App\Salam\Guru;

class KelasController extends Controller
{
    private $modulURL;

    public function __construct()
    {
        $this->modulURL = route('akademik.kl');
    }

    public function index()
    {
        $no     = 1;
        $data   = Kelas::get();
        return view('kelas.index',compact('data','no'));
    }

    public function create()
    {
        $guru   = Guru::get();
        if($guru->count() == 0){
            return redirect($this->modulURL)->with('warning', 'Maaf ! Tidak ada "Guru" yang dimasukkan ke dalam sistem, hubungi Administrator untuk menyelesaikan permasalahan ini.');
        }
        return view('kelas.create',compact('guru'));
    }

    public function store(KelasStoreRequest $request)
    {
        Kelas::create([
            'kode_kelas'=> $request->kode_kelas,
            'nama'      => $request->nama,
            'kapasitas' => $request->kapasitas,
            'jenjang'   => $request->jenjang,
            'wali_kelas'=> $request->wali_kelas
        ]);
        return redirect($this->modulURL);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $guru   = Guru::get();
        if($guru->count() == 0){
            return redirect($this->modulURL)->with('warning', 'Maaf ! Tidak ada "Guru" yang dimasukkan ke dalam sistem, hubungi Administrator untuk menyelesaikan permasalahan ini.');
        }
        $parse   = Kelas::where('id',$id);
        if($parse->count() == 0){
            return redirect($this->modulURL);
        }
        $parse = $parse->first();
        return view('kelas.edit',compact('parse','guru'));
    }

    public function update(KelasUpdateRequest $request, $id)
    {
        $list = [
            'nama'      => $request->nama,
            'kapasitas' => $request->kapasitas,
            'jenjang'   => $request->jenjang,
            'wali_kelas'=> $request->wali_kelas
        ];
        $patch = Kelas::where('id',$id);
        if($patch->count() == 0){            
            return redirect($this->modulURL);
        }
        $patch->update($list);
        return redirect($this->modulURL);
    }

    public function destroy($id)
    {
        $patch = Kelas::findOrFail($id);
        $patch->delete();
        return redirect($this->modulURL);
    }
}
