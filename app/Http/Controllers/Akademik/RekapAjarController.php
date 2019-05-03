<?php

namespace App\Http\Controllers\Akademik;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Session;

use App\Salam\Hari;
use App\Salam\TahunAkademik;
use App\Salam\Pengguna;
use App\Salam\Jadwal;
use App\Salam\Absensi;
use App\Salam\Pertemuan;
use App\Salam\Mengajar;
use App\Salam\RegistrasiKelas;
use App\Salam\Kelas;

class RekapAjarController extends Controller
{
    private $modulURL;
    private $ta;

    public function __construct()
    {
        $this->modulURL = route('akademik.rm');
        $this->ta = TahunAkademik::where('status','A')->get();
    }
    public function index()
    {
        $no = 1;
        $data = Kelas::get();
        return view('rekap-ajar.index',compact('data','no'));
    }

    public function kelas($kelas)
    {
        $d = Jadwal::where('kelas',$kelas)->where('tahun_akademik',$this->ta[0]->id)->get();
        if($d->count() == 0){
            return redirect($this->modulURL)->with('warning','Ups Mata Kuliah Tidak Tersedia');
        }
        $k = Kelas::where('id',$kelas)->first();
        $data['kelas']   = $k->nama;
        $data['kelasID'] = $kelas;
        $data['jadwal']  = $d;      
        $no = 1;
        
        return view('rekap-ajar.class',compact('data','no'));
    }

    public function show($kelas,$jadwal)
    {
        $d = Jadwal::where('kelas',$kelas)->first();
        if($d->count() == 0){
            return redirect($this->modulURL)->with('warning','Ups belum dilakukan KBM pada Mata Pelajaran ini');
        }
        $data['mapel'] = $d->getMapel->nama_idn;
        $data['kelas'] = $d->getKelas->nama;
        $data['kelasID'] = $kelas;
        $data['id']    = $d->id;
        
        for ($i = 1; $i <= 25; $i++) {
            $r[] = Mengajar::where('jadwal',$jadwal)->where('pertemuan',$i)->first();
        }
        $data['pert'] = $r;      
        $no = 1;
        
        return view('rekap-ajar.show',compact('data','no'));
    }
    
    public function destroy($id)
    {
        $patch = Mengajar::where('id',$id);
        if($patch->count() == 0){
            return redirect(route('akademik.rm'))->with('warning', 'Data Tidak Tersedia');
        }
        $hps_data = $patch->first();
        if($hps_data->count() > 0){
            Absensi::where('jadwal',$hps_data->jadwal)->where('pertemuan',$hps_data->pertemuan)->delete();
        }
        $patch->delete();
        return redirect(route('akademik.rm'))->with('success', 'Berhasil di reset awal');
    }
}
