@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Rekapitulasi Mengajar
    <small>{{$data['kelas']}}</small>
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
                                <th>Pengajar</th>
                                <th>Kelas</th>
                                <th>Jenjang</th>
                                <th>SKS</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data['jadwal']->count() == 0)
                                <tr>
                                    <td colspan="10">Tidak Ada Data</td>
                                </tr>
                                @else
                                @foreach($data['jadwal'] as $temp)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$temp->getMapel->kode_mapel}}</td>
                                    <td>{{$temp->getMapel->nama_idn}}</td>
                                    <td>{{$temp->guru == NULL ? '-': $temp->getGuru->nama}}</td>
                                    <td>{{$temp->getKelas->nama}}</td>
                                    <td>{{$temp->getKelas->jenjang}}</td>
                                    <td>{{$temp->getMapel->sks}}</td>
                                    <td>{{$temp->mulai}}</td>
                                    <td>{{$temp->selesai}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="{{route('akademik.rm.show',['kelas'=>$data['kelasID'],'jadwal'=>$temp->id])}}"><i class="fa fa-history"></i> Riwayat Mengajar</a>
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