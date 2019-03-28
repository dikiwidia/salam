@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Santri
    <small>Data</small>
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
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Berhasil !</h4>
            {!! session()->get('success') !!}
        </div>   
        @endif
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a class="btn btn-primary" href="{{route('santri.create')}}">
                           <i class="fa fa-user-plus"></i> Tambah
                        </a>
                    </div>
                    
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data->count() == 0)
                                <tr>
                                    <td colspan="7">Tidak Ada Data</td>
                                </tr>
                                @else
                                @foreach($data as $temp)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$temp->nama}}</td>
                                    <td>{{$temp->nisn}}</td>
                                    <td><i class='fa fa-{{$temp->jenis_kelamin == 'L' ? "male":"female"}}'></i> {{$temp->jenis_kelamin == 'L' ? "Laki-laki":"Perempuan"}}</td>
                                    <td>{{$temp->tmp_lahir}}</td>
                                    <td>{{$temp->tgl_lahir}}</td>
                                    <td>
                                        <div class="btn-group">

                                                <a href="{{route('santri.edit', $temp->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>

                                                <a href="#" data-messages="{{$temp->nama}}" data-href="{{route('santri.delete', $temp->id)}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i></a>
                                        </div>       
                                    </td>
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