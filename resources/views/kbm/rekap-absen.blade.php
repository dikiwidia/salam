@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Rekapitulasi Absen
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
                                            <a class="btn-sm btn-warning" href="{{route('rekap.edit',['jadwal' => $data['id'], 'pertemuan' => $n])}}"><i class="fa fa-calendar"></i> Ubah Absensi</a>
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
<div class="modal fade submit-from-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" autocomplete="off">
                <div class="modal-header" style="background:#00a65a;color:#FFFFFF">
                    <h4 class="modal-title">Mulai Mengajar</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul *</label>
                        <input type="text" name="materi" class="form-control" maxlength="100" placeholder="Judul Materi di Pertemuan ini" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Mulai Mengajar</button>
                </div>   
            </form>
        </div>
    </div>
</div>
<div class="modal fade submit-from-modal-2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" autocomplete="off">
                <div class="modal-header" style="background:#00a65a;color:#FFFFFF">
                    <h4 class="modal-title">Sunting Materi</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul *</label>
                        <input type="text" name="materi" class="form-control value-mt" maxlength="100" placeholder="Judul Materi di Pertemuan ini" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="_method" value="PATCH" />
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Sunting Materi</button>
                </div>   
            </form>
        </div>
    </div>
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
                <a class="btn btn-success btn-ok">Selesai</a>
            </div>
        </div>
    </div>
</div>
@stop