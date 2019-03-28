<?php

namespace App\Http\Controllers\Pengguna;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use Session;

use App\Salam\Admin;

class AdminController extends Controller
{
    private $modulURL;

    public function __construct()
    {
        $this->modulURL = route('admin.index');
    }

    public function index()
    {
        $no     = 1;
        $data   = Admin::where('id','!=',Session::get('id'))->get();
        return view('admin.index',compact('data','no'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(AdminStoreRequest $request)
    {
        Admin::create([
            'nickname'      => $request->nickname,
            'passcode'      => bcrypt('12345678'),
            'nama'          => $request->nama,
            'status'        => 'A',
            'mod_santri'    => $request->mod_santri,
            'mod_pendidik'  => $request->mod_pendidik,
            'mod_su'        => 'N',
            'mod_akademik'  => $request->mod_akademik
        ]);
        return redirect($this->modulURL);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $parse   = Admin::where('id',$id);
        if($parse->count() == 0){
            return redirect($this->modulURL);
        }
        $parse = $parse->first();
        return view('admin.edit',compact('parse'));
    }

    public function update(AdminUpdateRequest $request, $id)
    {
        $list = [
            'nama'          => $request->nama,
            'status'        => $request->status,
            'mod_santri'    => $request->mod_santri,
            'mod_pendidik'  => $request->mod_pendidik,
            'mod_akademik'  => $request->mod_akademik
        ];
        $patch = Admin::where('id',$id);
        if($patch->count() == 0){            
            return redirect($this->modulURL);
        }
        $patch->update($list);
        return redirect($this->modulURL)->with('success','Berhasil mengubah');
    }

    public function reset($id)
    {
        $list = [
            'passcode'        => bcrypt('12345678'),
        ];
        $patch = Admin::where('id',$id);
        if($patch->count() == 0){
            return redirect(route('user.index'))->with('warning', 'Data Tidak Tersedia');
        }
        $patch->update($list);
        return redirect(route('user.index'))->with('success', 'Kata Sandi berhasil dikembalikan ke awal');
    }

    public function destroy($id)
    {
        $patch = Admin::where('id',$id);
        if($patch->count() == 0){
            return redirect(route('admin.index'))->with('warning', 'Data Tidak Tersedia');
        }
        $patch->delete();
        return redirect(route('admin.index'))->with('success', 'Data Dihapus');
    }
}
