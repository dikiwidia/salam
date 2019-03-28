<?php

namespace App\Http\Controllers\Kbm;

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

class KbmController extends Controller
{
    private $modulURL, $dasbor, $ta;

    public function __construct()
    {
        $this->modulURL = route('mengajar.index');
        $this->dasbor   = route('dasbor.index');
        $this->ta       = TahunAkademik::where('status','A')->get();
    }

    public function index()
    {
        
        if($this->ta->count() != 1){
            return redirect($this->dasbor)->with('warning','Tidak ada Tahun Akademik yang AKTIF'); 
        }
        $no     = 1;
        $day = Carbon::now('Asia/Jakarta')->format('D');
        $day = Hari::where('kode_hari', $day)->first();
        $user = Pengguna::where('id', Session::get('id'))->first();
        $data['jadwal'] = Jadwal::where('guru',$user->guru)->where('tahun_akademik',$this->ta[0]->id)->where('hari',$day->id);

        $now = $day->nama_idn;
        return view('kbm.index',compact('data','no','now'));
    }

    public function teaching($jadwal)
    {
        $a = Pengguna::where('id',Session::get('id'))->first();
        $d = Jadwal::where('id',$jadwal)->where('guru',$a->guru)->first();
        if(count($d) == 0){
            return redirect($this->modulURL)->with('warning','Ups terjadi kesalahan');
        }
        $data['mapel'] = $d->getMapel->nama_idn;
        $data['kelas'] = $d->getKelas->nama;
        $data['id']    = $d->id;
        
        for ($i = 1; $i <= 25; $i++) {
            $r[] = Mengajar::where('jadwal',$jadwal)->where('pertemuan',$i)->first();
        }
        $data['pert'] = $r;      
        $no = 1;
        return view('kbm.teaching',compact('data','no'));
    }

    public function store(Request $r, $jadwal, $pertemuan)
    {
        $ceAjar = Mengajar::where('jadwal',$jadwal)->where('pertemuan',$pertemuan);
        if($ceAjar->get()->count() == 1){
            return redirect($this->modulURL)->with('warning','Maaf Anda sudah mengajar pada pertemuan ini');
        }
        $data = [
            'materi'        => $r->materi,
            'jadwal'        => $jadwal,
            'pertemuan'     => $pertemuan,
            'masuk_kelas'   => Carbon::now('Asia/Jakarta')
        ];
        Mengajar::create($data);
        return redirect(route('mengajar.absent',['jadwal' => $jadwal, 'pertemuan' => $pertemuan]));
    }
    
    public function update(Request $r, $jadwal, $pertemuan)
    {
        $ceAjar = Mengajar::where('jadwal',$jadwal)->where('pertemuan',$pertemuan);
        if($ceAjar->get()->count() == 0){
            return redirect($this->modulURL)->with('warning','Maaf tidak ada materi dalam pertemuan ini');
        }
        $data = [
            'materi'        => $r->materi,
        ];
        $ceAjar->update($data);
        return redirect(route('mengajar.begin',$jadwal));
    }

    public function finish($jadwal, $pertemuan)
    {
        $ceAjar = Mengajar::where('jadwal',$jadwal)->where('pertemuan',$pertemuan);
        if($ceAjar->get()->count() == 0){
            return redirect($this->modulURL)->with('warning','Maaf tidak ada materi dalam pertemuan ini');
        }
        $data = [
            'keluar_kelas'  => Carbon::now('Asia/Jakarta'),
        ];
        $ceAjar->update($data);
        return redirect(route('mengajar.begin',$jadwal));
    }

    public function schedule($jadwal,$pertemuan){
        
    }

    public function absent($jadwal,$pertemuan){
        $a = Pengguna::where('id',Session::get('id'))->first();
        $ceAjar = Mengajar::where('jadwal',$jadwal)->where('pertemuan',$pertemuan);
        $ceAbse = Absensi::where('jadwal',$jadwal)->where('pertemuan',$pertemuan);
        if($ceAjar->get()->count() == 0){
            return redirect(route('mengajar.begin',$jadwal))->with('warning','Anda belum memasukkan materi ajar.');
        }
        if($ceAbse->get()->count() > 0){
            return redirect(route('mengajar.begin',$jadwal))->with('warning','Untuk melihat Absensi yang sudah di Input, silahkan kunjungi halaman "Rekapitulasi Absen"');
        }
        $ceJdw = Jadwal::where('id',$jadwal)->where('guru',$a->guru)->first();
        if(count($ceJdw) == 0){
            return redirect(route('mengajar.begin',$jadwal))->with('warning','Ups ! Terjadi Kesalahan"');
        }
        $data['mapel'] = $ceJdw->getMapel->nama_idn;
        $data['kelas'] = $ceJdw->getKelas->nama;
        $data['santri'] = RegistrasiKelas::where('kelas',$ceJdw->kelas)->where('tahun_akademik',$this->ta[0]->id);
        if($data['santri']->get()->count() == 0){
            return redirect(route('mengajar.begin',$jadwal))->with('warning','Belum ada santri yang di daftarkan ke kelas ini. Silahkan menghubungi bagian akademik untuk informasi lengkap.');
        }
        $data['jadwal'] = $jadwal;
        $data['pertemuan'] = $pertemuan;
        // dd($data['santri']->get());
        $no = 1;
        return view('kbm.absen',compact('data','no'));
    }

    public function absent_store(Request $r, $jadwal, $pertemuan)
    {
        $ceAjar = Mengajar::where('jadwal',$jadwal)->where('pertemuan',$pertemuan);
        if($ceAjar->get()->count() == 0){
            return redirect($this->modulURL)->with('warning','Anda belum memasukkan materi ajar.');
        }
        $data['jadwal'] = $jadwal;
        $data['pertemuan'] = $pertemuan;

        // foreach($r->absensi as $dt){
        //     $data[] = [
        //         'absen'     => $dt->absen,
        //         'jadwal'    => $dt->jadwal,
        //         'pertemuan' => $dt->pertemuan,
        //         'nama'      => $dt->nama
        //     ];
        // }
        Absensi::insert($r->absensi);
        
        return redirect(route('mengajar.begin',['jadwal' => $jadwal]))->with('success','Absensi berhasil diinput, untuk mengubah atau melihat absensi yang telah diinput, silahkan kunjungi halaman "Rekapitulasi Absen"');
    }

    public function rekap_index()
    {
        
        if($this->ta->count() != 1){
            return redirect($this->dasbor)->with('warning','Tidak ada Tahun Akademik yang AKTIF'); 
        }
        $no     = 1;
        $user = Pengguna::where('id', Session::get('id'))->first();
        $data['jadwal'] = Jadwal::where('guru',$user->guru)->where('tahun_akademik',$this->ta[0]->id);

        return view('kbm.rekap-index',compact('data','no'));
    }
    
    public function rekap_show($jadwal)
    {
        $no = 1;
        $a = Pengguna::where('id',Session::get('id'))->first();
        $d = Jadwal::where('id',$jadwal)->where('guru',$a->guru)->where('tahun_akademik',$this->ta[0]->id)->first();

        if(count($d) == 0){
            return redirect(route('rekap.index'))->with('warning','Ups terjadi kesalahan');
        }
        $rk = RegistrasiKelas::where('kelas',$d->kelas)->where('tahun_akademik',$this->ta[0]->id)->get();
        if($rk->count() == 0){
            return redirect(route('rekap.index'))->with('warning','Belum ada santri yang didaftarkan');
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
        //dd($data);
        return view('kbm.rekap-show',compact('data','no'));
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

    public function rekap_absen($jadwal)
    {
        $a = Pengguna::where('id',Session::get('id'))->first();
        $d = Jadwal::where('id',$jadwal)->where('guru',$a->guru)->first();
        if(count($d) == 0){
            return redirect($this->modulURL)->with('warning','Ups terjadi kesalahan');
        }
        $data['mapel'] = $d->getMapel->nama_idn;
        $data['kelas'] = $d->getKelas->nama;
        $data['id']    = $d->id;
        
        for ($i = 1; $i <= 25; $i++) {
            $r[] = Mengajar::where('jadwal',$jadwal)->where('pertemuan',$i)->first();
        }
        $data['pert'] = $r;      
        $no = 1;
        return view('kbm.rekap-absen',compact('data','no'));
    }

    public function edit_absent($jadwal,$pertemuan){
        $a = Pengguna::where('id',Session::get('id'))->first();
        $ceAbse = Absensi::where('jadwal',$jadwal)->where('pertemuan',$pertemuan);
        if($ceAbse->get()->count() == 0){
            return redirect(route('mengajar.absent',['jadwal' => $jadwal, 'pertemuan' => $pertemuan]))->with('warning','Anda tidak dapat mengubah absensi. Karena Anda belum mengisi Absensi. Silahkan isi terlebih dahulu');
        }
        $ceJdw = Jadwal::where('id',$jadwal)->where('guru',$a->guru)->first();
        if(count($ceJdw) == 0){
            return redirect(route('rekap.absen',$jadwal))->with('warning','Ups ! Terjadi Kesalahan"');
        }
        $data['mapel'] = $ceJdw->getMapel->nama_idn;
        $data['kelas'] = $ceJdw->getKelas->nama;
        $data['parse'] = $ceAbse;
        // dd($data['parse']->get());
        $data['jadwal'] = $jadwal;
        $data['pertemuan'] = $pertemuan;
        $no = 1;
        return view('kbm.edit-absen',compact('data','no'));
    }

    public function absent_update(Request $r, $jadwal, $pertemuan)
    {
        foreach($r->absensi as $ab => $key){
            $ids    = $key['id'];             
            $abs    = ['absen' => $key['absen']];
            Absensi::where('id',$ids)->update($abs);
        }
        
        return redirect(route('rekap.index'))->with('success','Absensi berhasil diubah');
    }
}
