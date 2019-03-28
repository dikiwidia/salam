<?php

namespace App\Http\Controllers\Akademik;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Salam\Jadwal;
use App\Salam\TahunAkademik;
use App\Salam\Kelas;
use App\Salam\Guru;
use App\Salam\Mapel;
use App\Salam\Hari;

class JadwalController extends Controller
{
    private $modulURL;
    private $ta;

    public function __construct()
    {
        $this->modulURL = route('akademik.jd');
        $this->ta = TahunAkademik::where('status','A')->get();
    }
    public function index()
    {
        $no = 1;
        $data = Kelas::get();
        return view('jadwal.index',compact('data','no'));
    }

    public function create()
    {
        //
    }

    public function store(Request $r, $kelas)
    {
        if($this->ta->count() != 1){
            return redirect($this->modulURL)->with('warning', 'Kesalahan ! Hubungi Administrator terkait Tahun Akademik');
        }
        $parse['kelas'] = Kelas::where('id',$kelas)->get();
        if($parse['kelas']->count() != 1){
            return redirect($this->modulURL)->with('warning', 'Kesalahan ! Tidak Ada Kelas');
        }
        $parse['guru'] = Guru::where('id',$r->guru)->get();
        if($parse['guru']->count() == 0){
            return redirect($this->modulURL)->with('warning', 'Kesalahan ! Tidak Ada Guru Tersedia');
        }
        $parse['mapel'] = Mapel::where('id',$r->pelajaran)->get();
        if($parse['mapel']->count() == 0){
            return redirect($this->modulURL)->with('warning', 'Kesalahan ! Tidak Ada Mata Pelajaran Tersedia');
        }
        if($r->jam_ke == '' || $r->hari == ''){
            return redirect($this->modulURL)->with('warning', 'Kesalahan ! Terjadi Kesalahan Penginputan');
        }
        
        //Logika
        $cekJadwal = Jadwal::where('kelas',$kelas)->where('jam_ke',$r->jam_ke)->where('hari',$r->hari)->where('tahun_akademik',$this->ta[0]->id)->get();
        if($cekJadwal->count() == 0){
            // dd($r->all());
            $fill = [
                'jam_ke'    => $r->jam_ke,
                'kelas'     => $r->kelas,
                'pelajaran' => $r->pelajaran,
                'guru'      => $r->guru,
                'mulai'     => $r->mulai,
                'selesai'   => $r->selesai,
                'hari'      => $r->hari,
                'tahun_akademik' => $this->ta[0]->id,
            ];
            Jadwal::create($fill);
			//dd($fill);
        }
        return redirect(route('akademik.jd.kelas',$kelas));
    }

    public function kelas($id)
    {
        if($this->ta->count() != 1){
            return redirect($this->modulURL)->with('warning', 'Kesalahan ! Hubungi Administrator terkait Tahun Akademik');
        }
        $ceKelas = Kelas::where('id',$id)->get();
        if($ceKelas->count() != 1){
            return redirect($this->modulURL)->with('warning', 'Tidak Ada Kelas');
        }
        $parse['kelas'] = $ceKelas->first();
        $parse['guru'] = Guru::where('status','A')->get();
        if($parse['guru']->count() == 0){
            return redirect($this->modulURL)->with('warning', 'Tidak Ada Guru Tersedia');
        }
        $parse['mapel'] = Mapel::where('status','A')->get();
        if($parse['mapel']->count() == 0){
            return redirect($this->modulURL)->with('warning', 'Tidak Ada Mata Pelajaran Tersedia');
        }
        
        $parse['jadwal'] = [
            'Sun' => [
                'J1' => Jadwal::where('kelas',$id)->where('hari',1)->where('jam_ke',1)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J2' => Jadwal::where('kelas',$id)->where('hari',1)->where('jam_ke',2)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J3' => Jadwal::where('kelas',$id)->where('hari',1)->where('jam_ke',3)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J4' => Jadwal::where('kelas',$id)->where('hari',1)->where('jam_ke',4)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J5' => Jadwal::where('kelas',$id)->where('hari',1)->where('jam_ke',5)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J6' => Jadwal::where('kelas',$id)->where('hari',1)->where('jam_ke',6)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J7' => Jadwal::where('kelas',$id)->where('hari',1)->where('jam_ke',7)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J8' => Jadwal::where('kelas',$id)->where('hari',1)->where('jam_ke',8)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
            ],
            'Mon' => [
                'J1' => Jadwal::where('kelas',$id)->where('hari',2)->where('jam_ke',1)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J2' => Jadwal::where('kelas',$id)->where('hari',2)->where('jam_ke',2)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J3' => Jadwal::where('kelas',$id)->where('hari',2)->where('jam_ke',3)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J4' => Jadwal::where('kelas',$id)->where('hari',2)->where('jam_ke',4)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J5' => Jadwal::where('kelas',$id)->where('hari',2)->where('jam_ke',5)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J6' => Jadwal::where('kelas',$id)->where('hari',2)->where('jam_ke',6)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J7' => Jadwal::where('kelas',$id)->where('hari',2)->where('jam_ke',7)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J8' => Jadwal::where('kelas',$id)->where('hari',2)->where('jam_ke',8)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
            ],
            'Tue' => [
                'J1' => Jadwal::where('kelas',$id)->where('hari',3)->where('jam_ke',1)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J2' => Jadwal::where('kelas',$id)->where('hari',3)->where('jam_ke',2)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J3' => Jadwal::where('kelas',$id)->where('hari',3)->where('jam_ke',3)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J4' => Jadwal::where('kelas',$id)->where('hari',3)->where('jam_ke',4)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J5' => Jadwal::where('kelas',$id)->where('hari',3)->where('jam_ke',5)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J6' => Jadwal::where('kelas',$id)->where('hari',3)->where('jam_ke',6)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J7' => Jadwal::where('kelas',$id)->where('hari',3)->where('jam_ke',7)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J8' => Jadwal::where('kelas',$id)->where('hari',3)->where('jam_ke',8)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
            ],
            'Wed' => [
                'J1' => Jadwal::where('kelas',$id)->where('hari',4)->where('jam_ke',1)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J2' => Jadwal::where('kelas',$id)->where('hari',4)->where('jam_ke',2)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J3' => Jadwal::where('kelas',$id)->where('hari',4)->where('jam_ke',3)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J4' => Jadwal::where('kelas',$id)->where('hari',4)->where('jam_ke',4)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J5' => Jadwal::where('kelas',$id)->where('hari',4)->where('jam_ke',5)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J6' => Jadwal::where('kelas',$id)->where('hari',4)->where('jam_ke',6)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J7' => Jadwal::where('kelas',$id)->where('hari',4)->where('jam_ke',7)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J8' => Jadwal::where('kelas',$id)->where('hari',4)->where('jam_ke',8)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
            ],
            'Thu' => [
                'J1' => Jadwal::where('kelas',$id)->where('hari',5)->where('jam_ke',1)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J2' => Jadwal::where('kelas',$id)->where('hari',5)->where('jam_ke',2)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J3' => Jadwal::where('kelas',$id)->where('hari',5)->where('jam_ke',3)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J4' => Jadwal::where('kelas',$id)->where('hari',5)->where('jam_ke',4)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J5' => Jadwal::where('kelas',$id)->where('hari',5)->where('jam_ke',5)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J6' => Jadwal::where('kelas',$id)->where('hari',5)->where('jam_ke',6)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J7' => Jadwal::where('kelas',$id)->where('hari',5)->where('jam_ke',7)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J8' => Jadwal::where('kelas',$id)->where('hari',5)->where('jam_ke',8)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
            ],
            'Fri' => [
                'J1' => Jadwal::where('kelas',$id)->where('hari',6)->where('jam_ke',1)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J2' => Jadwal::where('kelas',$id)->where('hari',6)->where('jam_ke',2)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J3' => Jadwal::where('kelas',$id)->where('hari',6)->where('jam_ke',3)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J4' => Jadwal::where('kelas',$id)->where('hari',6)->where('jam_ke',4)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J5' => Jadwal::where('kelas',$id)->where('hari',6)->where('jam_ke',5)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J6' => Jadwal::where('kelas',$id)->where('hari',6)->where('jam_ke',6)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J7' => Jadwal::where('kelas',$id)->where('hari',6)->where('jam_ke',7)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J8' => Jadwal::where('kelas',$id)->where('hari',6)->where('jam_ke',8)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
            ],
            'Sat' => [
                'J1' => Jadwal::where('kelas',$id)->where('hari',7)->where('jam_ke',1)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J2' => Jadwal::where('kelas',$id)->where('hari',7)->where('jam_ke',2)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J3' => Jadwal::where('kelas',$id)->where('hari',7)->where('jam_ke',3)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J4' => Jadwal::where('kelas',$id)->where('hari',7)->where('jam_ke',4)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J5' => Jadwal::where('kelas',$id)->where('hari',7)->where('jam_ke',5)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J6' => Jadwal::where('kelas',$id)->where('hari',7)->where('jam_ke',6)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J7' => Jadwal::where('kelas',$id)->where('hari',7)->where('jam_ke',7)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
                'J8' => Jadwal::where('kelas',$id)->where('hari',7)->where('jam_ke',8)->where('tahun_akademik',$this->ta[0]->id)->get()->first(),
            ]
        ];
        //dd($parse['jadwal']);
        return view('jadwal.class',compact('parse'));
    }

    public function change(Request $r, $kelas)
    {
        if($r->jam_ke == '' || $r->hari == ''){
            return redirect(route('akademik.jd.kelas',$kelas))->with('warning', 'Ups. Terjadi Kesalahan');
        }

        $patch = Jadwal::where('id',$r->id);
        if($patch->get()->count() == 0){
            return redirect(route('akademik.jd.kelas',$kelas))->with('warning', 'Data Tidak Tersedia');
        }
        
        $getData = $patch->get()->first();

        $cheqData = Jadwal::where('jam_ke',$r->jam_ke)->where('hari',$r->hari)->where('tahun_akademik',$getData->tahun_akademik)->where('kelas',$getData->kelas)->count();
        if($cheqData == 0){
            $data['jam_ke']  = $r->jam_ke;
            $data['hari']    = $r->hari;    
            $data['mulai']   = $r->mulai;
            $data['selesai'] = $r->selesai;        
            $data['guru']    = $r->guru;
        } else {
            if($r->jam_ke == $getData->jam_ke && $r->hari == $getData->hari){
                $data['mulai']   = $r->mulai;
                $data['selesai'] = $r->selesai;        
                $data['guru']    = $r->guru;
            } else { 
                return redirect(route('akademik.jd.kelas',$kelas))->with('warning', 'Maaf, Jadwal telah digunakan oleh Mata Pelajaran lain');
            }
        }
        $patch->update($data);
        return redirect(route('akademik.jd.kelas',$kelas))->with('success', 'Jadwal berhasil diubah');
    }

    public function destroy($kelas,$id)
    {
        $patch = Jadwal::where('id',$id);
        if($patch->count() == 0){
            return redirect(route('akademik.jd.kelas',$kelas))->with('warning', 'Data Tidak Tersedia');
        }
        $patch->delete();
        return redirect(route('akademik.jd.kelas',$kelas));
    }
}
