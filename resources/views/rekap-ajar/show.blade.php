@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Rekapitulasi Mengajar
    <small>{{$data['kelas']}} - {{$data['mapel']}}</small>
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
                    <div class="box-header with-border">
                        <h3 class="box-title">Jumlah Pertemuan</h3>
                    </div>
                    
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>Pert.</th>
                                <th>Materi</th>
                                <th>Masuk Kelas</th>
                                <th>Keluar Kelas</th>
                                <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['pert'] as $tmp)
                                <?php
                                    $n = $no++;
                                ?>
                                @if($tmp != NULL)
                                <tr>
                                    <td>{{$tmp->pertemuan}}</td>
                                    <td>{{$tmp->materi}}</td>
                                    <td>{{\Carbon\Carbon::parse($tmp->masuk_kelas)->format('d M Y - H:i')}}</td>
                                    @if($tmp->keluar_kelas == NULL)
                                    <td><span class="label label-danger">Masih Mengajar</span></td>
                                    @else
                                    <td>{{\Carbon\Carbon::parse($tmp->keluar_kelas)->format('d M Y - H:i')}}</td>
                                    @endif
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn-sm btn-danger" href="#" data-messages="Anda yakin ingin menghapus materi ini dan mengisi absen dari awal" data-href="{{route('akademik.rm.delete',$tmp->id)}}"  data-toggle="modal" data-target=".confirm-from-modal"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    <td>
                                        {{$n}}
                                    </td>
                                    <td colspan="4">
                                        <span class="label label-danger">Belum ada pengajaran</span>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade confirm-from-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#00a65a;color:#FFFFFF">
                <h4 class="modal-title">Peringatan !</h4>
            </div>
            <div class="modal-body messages">
                <!-- NTONG DIEUSIAN -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <a class="btn btn-success btn-ok">Ya</a>
            </div>
        </div>
    </div>
</div>
@stop