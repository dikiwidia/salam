@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Ubah Absensi Santri
    <small>{{$data['mapel']}} - {{$data['kelas']}} - Pertemuan #{{$data['pertemuan']}}</small>
    </h1>
    </section>

    <section class="content container-fluid">
        @if(session()->has('warning'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
            {!! session()->get('warning') !!}
        </div>   
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <a href="{{route('rekap.absen',$data['jadwal'])}}" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="POST" action="{{route('mengajar.absent.update',['jadwal'=>$data['jadwal'],'pertemuan'=>$data['pertemuan']])}}">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Hadir</th>
                                <th>Sakit</th>
                                <th>Ijin</th>
                                <th>Alpa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data['parse']->get()->count() == 0)
                                <tr>
                                    <td colspan="7">Tidak Ada Data</td>
                                </tr>
                                @else
                                @foreach($data['parse']->get() as $temp)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$temp->getRegistrasiKelas->getSantri->nisn}}</td>
                                    <td>{{$temp->getRegistrasiKelas->getSantri->nama}}</td>
                                    <td><input name="absensi[{{$temp->id}}][absen]" class="register" type="radio" value="H" {{$temp->absen == 'H' ? 'checked':''}} /></td>
                                    <td><input name="absensi[{{$temp->id}}][absen]" class="register" type="radio" value="S" {{$temp->absen == 'S' ? 'checked':''}} /></td>
                                    <td><input name="absensi[{{$temp->id}}][absen]" class="register" type="radio" value="I" {{$temp->absen == 'I' ? 'checked':''}} /></td>
                                    <td><input name="absensi[{{$temp->id}}][absen]" class="register" type="radio" value="A" {{$temp->absen == 'A' ? 'checked':''}} /></td>
                                </tr>
                                <input type="hidden" name="absensi[{{$temp->id}}][id]" value="{{$temp->id}}" />
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <input type="hidden" name="_method" value="PATCH" />
                        <div class="btn-group pull-right" style="margin: 20px 0;">
                            <input class="btn btn-primary saved" type="submit" value="Perbaharui" />
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
