@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Absensi Santri
    <small>{{$data['mapel']}} - {{$data['kelas']}}</small>
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
                        <a href="{{route('mengajar.begin',$data['jadwal'])}}" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="POST" action="{{route('mengajar.absent.store',['jadwal'=>$data['jadwal'],'pertemuan'=>$data['pertemuan']])}}">
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
                                @if($data['santri']->get()->count() == 0)
                                <tr>
                                    <td colspan="7">Tidak Ada Data</td>
                                </tr>
                                @else
                                @foreach($data['santri']->get() as $temp)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$temp->getSantri->nisn}}</td>
                                    <td>{{$temp->getSantri->nama}}</td>
                                    <td><input name="absensi[{{$temp->id}}][absen]" class="register" type="radio" value="H" checked /></td>
                                    <td><input name="absensi[{{$temp->id}}][absen]" class="register" type="radio" value="S" /></td>
                                    <td><input name="absensi[{{$temp->id}}][absen]" class="register" type="radio" value="I" /></td>
                                    <td><input name="absensi[{{$temp->id}}][absen]" class="register" type="radio" value="A" /></td>
                                </tr>
                                <input type="hidden" name="absensi[{{$temp->id}}][nama]" value="{{$temp->id}}" />
                                <input type="hidden" name="absensi[{{$temp->id}}][jadwal]" value="{{$data['jadwal']}}" />
                                <input type="hidden" name="absensi[{{$temp->id}}][pertemuan]" value="{{$data['pertemuan']}}" />
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="btn-group pull-right" style="margin: 20px 0;">
                            <input class="btn btn-success saved" type="submit" value="Simpan" />
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
