<?php

namespace App\Http\Controllers\Akademik;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Salam\TahunAkademik;
use App\Salam\RegistrasiKelas;
use App\Salam\Kelas;
use App\Salam\Santri;

class NaikKelasController extends Controller
{
    private $modulURL;
    private $ta;

    public function __construct()
    {
        $this->modulURL = route('akademik.rk');
        $this->ta = TahunAkademik::where('status','A')->get();
    }

    public function index()
    {
        $no = 1;
        $data = Kelas::get();
        return view('registrasi-kelas.index',compact('data','no'));
    }

    public function register($kelas)
    {
        if($this->ta->count() != 1){
            return redirect($this->modulURL)->with('warning', 'Kesalahan ! Hubungi Administrator terkait Tahun Akademik');
        }
        $ceKelas = Kelas::where('id',$kelas)->get();
        if($ceKelas->count() != 1){
            return redirect($this->modulURL)->with('warning', 'Tidak Ada Kelas');
        }
        $ceSantri = Santri::where('status','A')->get();
        if($ceSantri->count() == 0){
            return redirect($this->modulURL)->with('warning', 'Tidak Ada Santri "Aktif" Tersedia');
        }
        $reg_kelas = RegistrasiKelas::where('tahun_akademik',$this->ta[0]->id)->get();
        $reg_quota = RegistrasiKelas::where('kelas',$kelas)->where('tahun_akademik',$this->ta[0]->id)->get();
        if($reg_kelas->count() == 0){
            $data['santri'] = Santri::where('status','A')->where('jenjang',$ceKelas[0]->jenjang);
        } else {
            foreach($reg_kelas as $r){
                $nama[] = $r->nama;
            }
            $data['santri'] = Santri::where('status','A')->where('jenjang',$ceKelas[0]->jenjang)->whereNotIn('id',$nama);
        }
        //dd($reg_kelas);
        $no = 1;
        $data['numShow'] = 50;
        $data['kapasitas'] = $ceKelas[0]->kapasitas - $reg_quota->count();
        $data['kelas'] = Kelas::where('id',$kelas)->get()->first();
        return view('registrasi-kelas.register',compact('data','no'));
    }

    public function create()
    {
        // 
    }

    public function list_kelas($kelas)
    {
        if($this->ta->count() != 1){
            return redirect($this->modulURL)->with('warning', 'Kesalahan ! Hubungi Administrator terkait Tahun Akademik');
        }
        $ceKelas = Kelas::where('id',$kelas)->get();
        if($ceKelas->count() != 1){
            return redirect($this->modulURL)->with('warning', 'Tidak Ada Kelas');
        }
        $data['santri'] = RegistrasiKelas::where('kelas',$kelas)->where('tahun_akademik',$this->ta[0]->id)->get();
        if($data['santri']->count() == 0){
            return redirect($this->modulURL)->with('warning', 'Belum Ada Santri yang didaftarkan di Kelas ini');
        }
        $no = 1;
        $data['registered'] = $data['santri']->count();
        $data['kelas'] = Kelas::where('id',$kelas)->get()->first();
        return view('registrasi-kelas.registered',compact('data','no')); 
    }

    public function store(Request $r, $kelas)
    {
        if($this->ta->count() != 1){
            return redirect($this->modulURL)->with('warning', 'Kesalahan ! Hubungi Administrator terkait Tahun Akademik');
        }

        $ceKelas = Kelas::where('id',$kelas)->get();
        if($ceKelas->count() != 1){
            return redirect($this->modulURL)->with('warning', 'Tidak Ada Kelas');
        }
        $ceRK = RegistrasiKelas::where('kelas',$kelas)->where('tahun_akademik',$this->ta[0]->id)->get();
        $quota = $ceKelas[0]->kapasitas - $ceRK->count();

        if($r->reg == NULL){
            return redirect(route('akademik.rk.register',$kelas))->with('warning', 'Anda harus memilih');
        } else {
            $ceQuota = $quota - count($r->reg);
            if($ceQuota < 0){
                return redirect($this->modulURL)->with('warning', 'Melampaui kuota yang diizinkan');
            }
            foreach($r->reg as $id){
                $res[] = [
                    'nama' => $id,
                    'tahun_akademik' => $this->ta[0]->id,
                    'kelas' => $kelas
                ];
            }
        }
        
        RegistrasiKelas::insert($res);
        return redirect(route('akademik.rk.register',$kelas));
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

    public function destroy($kelas,$id)
    {
        $patch = RegistrasiKelas::where('id',$id);
        if($patch->count() == 0){
            return redirect(route('akademik.rk.list',$kelas))->with('warning', 'Data Tidak Tersedia');
        }
        $patch->delete();
        return redirect(route('akademik.rk.list',$kelas))->with('success', 'Data Dihapus');
    }
}
