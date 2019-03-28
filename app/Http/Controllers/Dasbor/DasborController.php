<?php

namespace App\Http\Controllers\Dasbor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Carbon\Carbon;

use App\Salam\Santri;
use App\Salam\Guru;
use App\Salam\Mapel;
use App\Salam\Kelas;
use App\Salam\Mengajar;
use App\Salam\Hari;
use App\Salam\TahunAkademik;

class DasborController extends Controller
{
    
    public function index()
    {
        $data['santri'] = Santri::where('status','A')->get(); 
        $data['guru'] = Guru::where('status','A')->get(); 
        $data['mp'] = Mapel::where('status','A')->get();
        $data['kl'] = Kelas::get();

        $dNow = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        $mengajar = Mengajar::whereBetween('masuk_kelas',[$dNow .' 00:00:00', $dNow .' 23:59:59'])->get();
        $data['mengajar'] = $mengajar;
        
        $tgl  = Carbon::now('Asia/Jakarta');
        $hari = Hari::where('kode_hari',$tgl->format('D'))->first();
        $ta   = TahunAkademik::where('status','A')->first();
        
        $data['dNow']     = $hari->nama_idn .', '. $tgl->format('d/m/Y') .' - Tahun Akademik: '. $ta->nama;
        $no = 1;

        return view('dasbor.index',compact('data','no'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
