@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Registrasi Santri
    <small>{{$data['kelas']->nama}}</small>
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
                        <a href="{{route('akademik.rk')}}" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="POST" action="{{route('akademik.rk.store',$data['kelas']->id)}}">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Tahun Akademik</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data['santri']->count() == 0)
                                <tr>
                                    <td colspan="7">Tidak Ada Data</td>
                                </tr>
                                @else
                                @foreach($data['santri']->paginate($data['numShow']) as $temp)
                                <tr>
                                    <td><input name="reg[]" class="register" type="checkbox" value="{{$temp->id}}" /></td>
                                    <td>{{$temp->nama}}</td>
                                    <td>{{$temp->nisn}}</td>
                                    <td><i class='fa fa-{{$temp->jenis_kelamin == 'L' ? "male":"female"}}'></i> {{$temp->jenis_kelamin == 'L' ? "Laki-laki":"Perempuan"}}</td>
                                    <td>{{$temp->tmp_lahir}}</td>
                                    <td>{{$temp->tgl_lahir}}</td>
                                    <td>{{$temp->getTahunAkademik->nama}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <br />
                            <i>Santri Terpilih <small class="counter"></small> dari <small>{{$data['kapasitas']}}</small> sisa kursi yang tersedia</i>
                        <br /><br />
                        {{ $data['santri']->paginate($data['numShow'])->links() }}
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <input type="hidden" class="kapasitas" value="{{$data['kapasitas']}}" />
                        <div class="btn-group pull-right" style="margin: 20px 0;">
                            <input class="btn btn-warning reset" type="reset" value="Kosongkan" />
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
