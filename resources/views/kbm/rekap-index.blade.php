@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Rekapitulasi Absen
    <small>Indeks</small>
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
                        <h3 class="box-title">Kelas yang Tersedia</h3>
                    </div>
                    
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama Pelajaran</th>
                                <th>SKS</th>
                                <th>Kelas</th>
                                <th>Jenjang</th>
                                <th>Hari</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data['jadwal']->get()->count() == 0)
                                <tr>
                                    <td colspan="9">Tidak Ada Data</td>
                                </tr>
                                @else
                                @foreach($data['jadwal']->get() as $temp)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$temp->getMapel->kode_mapel}}</td>
                                    <td>{{$temp->getMapel->nama_idn}}</td>
                                    <td>{{$temp->getMapel->sks}}</td>
                                    <td>{{$temp->getKelas->nama}}</td>
                                    <td>{{$temp->getKelas->jenjang}}</td>
                                    <td>{{$temp->getHari->nama_idn}}</td>
                                    @if($temp->mulai == NULL)
                                    <td><span class="label label-danger">Not Set</span></td>
                                    @else
                                    <td>{{\Carbon\Carbon::parse($temp->mulai)->format('H:i')}}</td>
                                    @endif
                                    @if($temp->selesai == NULL)
                                    <td><span class="label label-danger">Not Set</span></td>
                                    @else
                                    <td>{{\Carbon\Carbon::parse($temp->selesai)->format('H:i')}}</td>
                                    @endif
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-success" href="{{route('rekap.show',$temp->id)}}"><i class="fa fa-bar-chart"></i> Lihat</a>
                                            <a class="btn btn-sm btn-primary" href="{{route('rekap.absen',$temp->id)}}"><i class="fa fa-eye"></i> Rincian</a>
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
@stop