@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Pendidik
    <small>Data</small>
    </h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a class="btn btn-primary" href="{{route('guru.create')}}">
                           <i class="fa fa-user-plus"></i> Tambah
                        </a>
                    </div>
                    
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIPTK</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data->count() == 0)
                                <tr>
                                    <td colspan="6">Tidak Ada Data</td>
                                </tr>
                                @else
                                @foreach($data as $temp)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$temp->nama}}</td>
                                    <td>{{$temp->niptk}}</td>
                                    <td><i class='fa fa-{{$temp->jenis_kelamin == 'L' ? "male":"female"}}'></i> {{$temp->jenis_kelamin == 'L' ? "Laki-laki":"Perempuan"}}</td>
                                    <td><span class="label label-{{($temp->status == 'A') ? 'success':'default'}}">
                                    @if($temp->status == 'A') Aktif @elseif($temp->status == 'N') Nonaktif @elseif($temp->status == 'K') Keluar @else Meninggal @endif</span></td>
                                    <td>
                                        <div class="btn-group">

                                                <a href="{{route('guru.edit', $temp->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>

                                                <a href="#" data-messages="{{$temp->nama}}" data-href="{{route('guru.delete', $temp->id)}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i></a>
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
<div class="modal fade create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('akademik.ta.store')}}" autocomplete="off">
                <div class="modal-header" style="background:#00a65a;color:#FFFFFF">
                    <h4 class="modal-title">Buat Baru</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="input1">Tahun Akademik</label>
                        <input name="nama" class="form-control" id="input1" placeholder="Masukkan Tahun Akademik" type="text" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>   
            </form>
        </div>
    </div>
</div>
<div class="modal fade edit-ta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('akademik.ta.update')}}" autocomplete="off">
                <div class="modal-header" style="background:#00a65a;color:#FFFFFF">
                    <h4 class="modal-title">Ubah Data</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="input1">Tahun Akademik</label>
                        <input name="nama" class="form-control value-ta" id="input1" placeholder="Masukkan Tahun Akademik" type="text" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <input type="hidden" name="id" class="value-id" />
                    <input type="hidden" name="_method" value="patch" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Perbaharui</button>
                </div>   
            </form>
        </div>
    </div>
</div>
@stop