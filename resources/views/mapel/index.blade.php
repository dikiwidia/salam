@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Mata Pelajaran
    <small>Data</small>
    </h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a class="btn btn-primary" href="{{route('akademik.mp.create')}}">
                           <i class="fa fa-book"></i> Tambah
                        </a>
                    </div>
                    
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama (Indonesia)</th>
                                <th>Nama (English)</th>
                                <th>SKS</th>
                                <th>Status</th>
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
                                    <td>{{$temp->kode_mapel}}</td>
                                    <td>{{$temp->nama_idn}}</td>
                                    <td>{{$temp->nama_eng}}</td>
                                    <td>{{$temp->sks}}</td>
                                    <td><span class="label label-{{($temp->status == 'A') ? 'success':'danger'}}">
                                    @if($temp->status == 'A') Aktif @else Nonaktif @endif</span></td>
                                    <td>
                                        <div class="btn-group">

                                                <a href="{{route('akademik.mp.edit', $temp->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>

                                                <a href="#" data-messages="{{$temp->kode_mapel}}" data-href="{{route('akademik.mp.delete', $temp->id)}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i></a>
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