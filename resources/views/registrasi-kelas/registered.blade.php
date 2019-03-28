@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Daftar Santri
    <small>{{$data['kelas']->nama}} - Terdaftar {{$data['registered']}} dari {{$data['kelas']->kapasitas}} Santri</small>
    </h1>
    </section>

    <section class="content container-fluid">
        @if(session()->has('warning'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
            {!! session()->get('warning') !!}
        </div>
        @elseif(session()->has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Berhasil !</h4>
            {!! session()->get('success') !!}
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
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Tahun Akademik</th>
                                <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data['santri']->count() == 0)
                                <tr>
                                    <td colspan="8">Tidak Ada Data</td>
                                </tr>
                                @else
                                @foreach($data['santri'] as $temp)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$temp->getSantri->nama}}</td>
                                    <td>{{$temp->getSantri->nisn}}</td>
                                    <td><i class='fa fa-{{$temp->getSantri->jenis_kelamin == 'L' ? "male":"female"}}'></i> {{$temp->getSantri->jenis_kelamin == 'L' ? "Laki-laki":"Perempuan"}}</td>
                                    <td>{{$temp->getSantri->tmp_lahir}}</td>
                                    <td>{{$temp->getSantri->tgl_lahir}}</td>
                                    <td>{{$temp->getTahunAkademik->nama}}</td>
                                    <td><div class="btn-group">
                                        <a href="#" data-messages="{{$temp->getSantri->nama}}" data-href="{{route('akademik.rk.delete', ['kelas' => $data['kelas']->id, 'id' => $temp->id])}}" class="btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                    </div></td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#dd4b39;color:#FFFFFF">
                <h4 class="modal-title">Peringatan !</h4>
            </div>
            <div class="modal-body messages">
                <!-- NTONG DIEUSIAN -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger btn-ok">Hapus</a>
            </div>
        </div>
    </div>
</div>
@stop
