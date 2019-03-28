@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Tahun Akademik
    <small>Data</small>
    </h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".create">
                            Buat Baru
                        </button>
                    </div>
                    
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Tahun Akademik</th>
                                <th>Status</th>
                                <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data->count() == 0)
                                <tr>
                                    <td colspan="4">Tidak Ada Data</td>
                                </tr>
                                @else
                                @foreach($data as $temp)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$temp->nama}}</td>
                                    <td><span class="label label-{{($temp->status == 'A' ? 'success':'danger')}}">{{($temp->status == 'A' ? 'Aktif':'Nonaktif')}}</span></td>
                                    <td>
                                        <div class="btn-group">
                                                @if($temp->status == 'A')
                                                <a href="{{route('akademik.ta.apply', $temp->id)}}" class="btn-sm btn-primary">Nonaktifkan</a>
                                                @else
                                                <a href="{{route('akademik.ta.apply', $temp->id)}}" class="btn-sm btn-success">Aktifkan</a>
                                                @endif
                                                <a href="#" data-value="{{$temp->nama}}" data-id="{{$temp->id}}" class="btn-sm btn-warning" data-toggle="modal" data-target=".edit-ta"><i class="fa fa-edit"></i></a>
                                                <a href="#" data-messages="{{$temp->nama}}" data-href="{{route('akademik.ta.delete', $temp->id)}}" class="btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i></a>
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
                        <label for="input1">Tahun Akademik *</label>
                        <input name="nama" class="form-control" id="input1" placeholder="Masukkan Tahun Akademik" type="text" maxlength="50" required>
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
                            <label for="input1">Tahun Akademik *</label>
                            <input name="nama" class="form-control value-ta" id="input1" placeholder="Masukkan Tahun Akademik" type="text" maxlength="50" required>
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