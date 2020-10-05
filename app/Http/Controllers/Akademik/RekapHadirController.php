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

class RekapHadirController extends Controller
{
    private $modulURL;
    private $ta;

    public function __construct()
    {
        $this->modulURL = route('akademik.rp');
        $this->ta = TahunAkademik::where('status','A')->get();
    }
    public function index()
    {
        $no = 1;
        $data = Kelas::get();
        return view('rekap-absen.index',compact('data','no'));
    }

    public function kelas($kelas)
    {
        if($this->ta->count() != 1){
            return redirect($this->dasbor)->with('warning','Tidak ada Tahun Akademik yang AKTIF'); 
        }
        $v = Kelas::where('id',$kelas)->first();
        if(count($v) == 0){
            return redirect($this->dasbor)->with('warning','Kelas tidak tersedia'); 
        }
        $no = 1;
        $data['jadwal'] = Jadwal::where('kelas',$kelas)->where('tahun_akademik',$this->ta[0]->id);
        $data['kelas']  = $v->nama;
        $data['kelasID']= $v->id;
        
        return view('rekap-absen.class',compact('data','no'));
    }
    
    public function show($kelas,$jadwal)
    {
        $no = 1;
        $d = Jadwal::where('id',$jadwal)->where('kelas',$kelas)->where('tahun_akademik',$this->ta[0]->id)->first();

        if(count($d) == 0){
            return redirect($this->modulURL)->with('warning','Ups terjadi kesalahan');
        }
        $rk = RegistrasiKelas::where('kelas',$d->kelas)->get();
        if($rk->count() == 0){
            return redirect($this->modulURL)->with('warning','Belum ada santri yang didaftarkan');
        }
        foreach($rk as $n){
            $uu[] = [
                'nisn' => $n->getSantri->nisn,
                'nama' => $n->getSantri->nama,
                'status' => $this->getAbsensi($n->id,$jadwal)
            ];
        }
        $data['absensi'] = $uu;
        $data['pertemuan'] = Pertemuan::get();
        $data['mapel'] = $d->getMapel->nama_idn;
        $data['kelas'] = $d->getKelas->nama;
        $data['kelasID']= $kelas;
        
        return view('rekap-absen.show',compact('data','no'));
    }

    public function getAbsensi($id,$jadwal){
        $pt = Pertemuan::get();
        foreach($pt as $pt){
            $absen = Absensi::where('nama',$id)->where('jadwal',$jadwal)->where('pertemuan',$pt->id)->first();    
            $result[$pt->id] = [
                'pt' => $pt->id,
                'absen' => count($absen) == 0 ? 'NR' : $absen->absen,
            ];
        }
        return $result;
    }
}
