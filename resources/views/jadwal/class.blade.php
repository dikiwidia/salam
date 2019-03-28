@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Jadwal Pembelajaran
    <small>{{$parse['kelas']->nama}}</small>
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
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Senin</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Jam Ke</th>
                                    <th>Kode</th>
                                    <th>Mata Pelajaran</th>
                                    <th>SKS</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Pengajar</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{$parse['jadwal']['Mon']['J1'] != NULL ? $parse['jadwal']['Mon']['J1']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J1'] != NULL ? $parse['jadwal']['Mon']['J1']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J1'] != NULL ? $parse['jadwal']['Mon']['J1']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J1'] != NULL ? $parse['jadwal']['Mon']['J1']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J1'] != NULL ? $parse['jadwal']['Mon']['J1']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J1'] != NULL ? ($parse['jadwal']['Mon']['J1']->guru == NULL ? '-' : $parse['jadwal']['Mon']['J1']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Mon']['J1'] == NULL)
                                        <a href="#" data-hari="2" data-jam="1" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Mon']['J1']->id}}" data-mapel="{{$parse['jadwal']['Mon']['J1']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Mon']['J1']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Mon']['J1']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>{{$parse['jadwal']['Mon']['J2'] != NULL ? $parse['jadwal']['Mon']['J2']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J2'] != NULL ? $parse['jadwal']['Mon']['J2']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J2'] != NULL ? $parse['jadwal']['Mon']['J2']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J2'] != NULL ? $parse['jadwal']['Mon']['J2']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J2'] != NULL ? $parse['jadwal']['Mon']['J2']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J2'] != NULL ? ($parse['jadwal']['Mon']['J2']->guru == NULL ? '-' : $parse['jadwal']['Mon']['J2']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Mon']['J2'] == NULL)
                                        <a href="#" data-hari="2" data-jam="2" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Mon']['J2']->id}}" data-mapel="{{$parse['jadwal']['Mon']['J2']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Mon']['J2']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Mon']['J2']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>{{$parse['jadwal']['Mon']['J3'] != NULL ? $parse['jadwal']['Mon']['J3']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J3'] != NULL ? $parse['jadwal']['Mon']['J3']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J3'] != NULL ? $parse['jadwal']['Mon']['J3']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J3'] != NULL ? $parse['jadwal']['Mon']['J3']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J3'] != NULL ? $parse['jadwal']['Mon']['J3']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J3'] != NULL ? ($parse['jadwal']['Mon']['J3']->guru == NULL ? '-' : $parse['jadwal']['Mon']['J3']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Mon']['J3'] == NULL)
                                        <a href="#" data-hari="2" data-jam="3" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Mon']['J3']->id}}" data-mapel="{{$parse['jadwal']['Mon']['J3']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Mon']['J3']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Mon']['J3']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>{{$parse['jadwal']['Mon']['J4'] != NULL ? $parse['jadwal']['Mon']['J4']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J4'] != NULL ? $parse['jadwal']['Mon']['J4']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J4'] != NULL ? $parse['jadwal']['Mon']['J4']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J4'] != NULL ? $parse['jadwal']['Mon']['J4']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J4'] != NULL ? $parse['jadwal']['Mon']['J4']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J4'] != NULL ? ($parse['jadwal']['Mon']['J4']->guru == NULL ? '-' : $parse['jadwal']['Mon']['J4']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Mon']['J4'] == NULL)
                                        <a href="#" data-hari="2" data-jam="4" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Mon']['J4']->id}}" data-mapel="{{$parse['jadwal']['Mon']['J4']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Mon']['J4']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Mon']['J4']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>{{$parse['jadwal']['Mon']['J5'] != NULL ? $parse['jadwal']['Mon']['J5']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J5'] != NULL ? $parse['jadwal']['Mon']['J5']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J5'] != NULL ? $parse['jadwal']['Mon']['J5']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J5'] != NULL ? $parse['jadwal']['Mon']['J5']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J5'] != NULL ? $parse['jadwal']['Mon']['J5']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J5'] != NULL ? ($parse['jadwal']['Mon']['J5']->guru == NULL ? '-' : $parse['jadwal']['Mon']['J5']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Mon']['J5'] == NULL)
                                        <a href="#" data-hari="2" data-jam="5" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Mon']['J5']->id}}" data-mapel="{{$parse['jadwal']['Mon']['J5']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Mon']['J5']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Mon']['J5']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>{{$parse['jadwal']['Mon']['J6'] != NULL ? $parse['jadwal']['Mon']['J6']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J6'] != NULL ? $parse['jadwal']['Mon']['J6']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J6'] != NULL ? $parse['jadwal']['Mon']['J6']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J6'] != NULL ? $parse['jadwal']['Mon']['J6']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J6'] != NULL ? $parse['jadwal']['Mon']['J6']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J6'] != NULL ? ($parse['jadwal']['Mon']['J6']->guru == NULL ? '-' : $parse['jadwal']['Mon']['J6']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Mon']['J6'] == NULL)
                                        <a href="#" data-hari="2" data-jam="6" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Mon']['J6']->id}}" data-mapel="{{$parse['jadwal']['Mon']['J6']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Mon']['J6']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Mon']['J6']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>{{$parse['jadwal']['Mon']['J7'] != NULL ? $parse['jadwal']['Mon']['J7']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J7'] != NULL ? $parse['jadwal']['Mon']['J7']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J7'] != NULL ? $parse['jadwal']['Mon']['J7']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J7'] != NULL ? $parse['jadwal']['Mon']['J7']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J7'] != NULL ? $parse['jadwal']['Mon']['J7']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J7'] != NULL ? ($parse['jadwal']['Mon']['J7']->guru == NULL ? '-' : $parse['jadwal']['Mon']['J7']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Mon']['J7'] == NULL)
                                        <a href="#" data-hari="2" data-jam="7" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Mon']['J7']->id}}" data-mapel="{{$parse['jadwal']['Mon']['J7']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Mon']['J7']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Mon']['J7']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>{{$parse['jadwal']['Mon']['J8'] != NULL ? $parse['jadwal']['Mon']['J8']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J8'] != NULL ? $parse['jadwal']['Mon']['J8']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J8'] != NULL ? $parse['jadwal']['Mon']['J8']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J8'] != NULL ? $parse['jadwal']['Mon']['J8']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J8'] != NULL ? $parse['jadwal']['Mon']['J8']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Mon']['J8'] != NULL ? ($parse['jadwal']['Mon']['J8']->guru == NULL ? '-' : $parse['jadwal']['Mon']['J8']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Mon']['J8'] == NULL)
                                        <a href="#" data-hari="2" data-jam="8" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Mon']['J8']->id}}" data-mapel="{{$parse['jadwal']['Mon']['J8']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Mon']['J8']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Mon']['J8']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Selasa</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Jam Ke</th>
                                    <th>Kode</th>
                                    <th>Mata Pelajaran</th>
                                    <th>SKS</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Pengajar</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{$parse['jadwal']['Tue']['J1'] != NULL ? $parse['jadwal']['Tue']['J1']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J1'] != NULL ? $parse['jadwal']['Tue']['J1']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J1'] != NULL ? $parse['jadwal']['Tue']['J1']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J1'] != NULL ? $parse['jadwal']['Tue']['J1']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J1'] != NULL ? $parse['jadwal']['Tue']['J1']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J1'] != NULL ? ($parse['jadwal']['Tue']['J1']->guru == NULL ? '-' : $parse['jadwal']['Tue']['J1']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Tue']['J1'] == NULL)
                                        <a href="#" data-hari="3" data-jam="1" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Tue']['J1']->id}}" data-mapel="{{$parse['jadwal']['Tue']['J1']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Tue']['J1']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Tue']['J1']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>{{$parse['jadwal']['Tue']['J2'] != NULL ? $parse['jadwal']['Tue']['J2']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J2'] != NULL ? $parse['jadwal']['Tue']['J2']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J2'] != NULL ? $parse['jadwal']['Tue']['J2']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J2'] != NULL ? $parse['jadwal']['Tue']['J2']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J2'] != NULL ? $parse['jadwal']['Tue']['J2']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J2'] != NULL ? ($parse['jadwal']['Tue']['J2']->guru == NULL ? '-' : $parse['jadwal']['Tue']['J2']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Tue']['J2'] == NULL)
                                        <a href="#" data-hari="3" data-jam="2" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Tue']['J2']->id}}" data-mapel="{{$parse['jadwal']['Tue']['J2']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Tue']['J2']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Tue']['J2']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>{{$parse['jadwal']['Tue']['J3'] != NULL ? $parse['jadwal']['Tue']['J3']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J3'] != NULL ? $parse['jadwal']['Tue']['J3']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J3'] != NULL ? $parse['jadwal']['Tue']['J3']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J3'] != NULL ? $parse['jadwal']['Tue']['J3']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J3'] != NULL ? $parse['jadwal']['Tue']['J3']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J3'] != NULL ? ($parse['jadwal']['Tue']['J3']->guru == NULL ? '-' : $parse['jadwal']['Tue']['J3']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Tue']['J3'] == NULL)
                                        <a href="#" data-hari="3" data-jam="3" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Tue']['J3']->id}}" data-mapel="{{$parse['jadwal']['Tue']['J3']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Tue']['J3']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Tue']['J3']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>{{$parse['jadwal']['Tue']['J4'] != NULL ? $parse['jadwal']['Tue']['J4']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J4'] != NULL ? $parse['jadwal']['Tue']['J4']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J4'] != NULL ? $parse['jadwal']['Tue']['J4']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J4'] != NULL ? $parse['jadwal']['Tue']['J4']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J4'] != NULL ? $parse['jadwal']['Tue']['J4']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J4'] != NULL ? ($parse['jadwal']['Tue']['J4']->guru == NULL ? '-' : $parse['jadwal']['Tue']['J4']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Tue']['J4'] == NULL)
                                        <a href="#" data-hari="3" data-jam="4" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Tue']['J4']->id}}" data-mapel="{{$parse['jadwal']['Tue']['J4']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Tue']['J4']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Tue']['J4']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>{{$parse['jadwal']['Tue']['J5'] != NULL ? $parse['jadwal']['Tue']['J5']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J5'] != NULL ? $parse['jadwal']['Tue']['J5']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J5'] != NULL ? $parse['jadwal']['Tue']['J5']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J5'] != NULL ? $parse['jadwal']['Tue']['J5']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J5'] != NULL ? $parse['jadwal']['Tue']['J5']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J5'] != NULL ? ($parse['jadwal']['Tue']['J5']->guru == NULL ? '-' : $parse['jadwal']['Tue']['J5']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Tue']['J5'] == NULL)
                                        <a href="#" data-hari="3" data-jam="5" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Tue']['J5']->id}}" data-mapel="{{$parse['jadwal']['Tue']['J5']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Tue']['J5']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Tue']['J5']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>{{$parse['jadwal']['Tue']['J6'] != NULL ? $parse['jadwal']['Tue']['J6']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J6'] != NULL ? $parse['jadwal']['Tue']['J6']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J6'] != NULL ? $parse['jadwal']['Tue']['J6']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J6'] != NULL ? $parse['jadwal']['Tue']['J6']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J6'] != NULL ? $parse['jadwal']['Tue']['J6']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J6'] != NULL ? ($parse['jadwal']['Tue']['J6']->guru == NULL ? '-' : $parse['jadwal']['Tue']['J6']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Tue']['J6'] == NULL)
                                        <a href="#" data-hari="3" data-jam="6" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Tue']['J6']->id}}" data-mapel="{{$parse['jadwal']['Tue']['J6']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Tue']['J6']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Tue']['J6']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>{{$parse['jadwal']['Tue']['J7'] != NULL ? $parse['jadwal']['Tue']['J7']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J7'] != NULL ? $parse['jadwal']['Tue']['J7']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J7'] != NULL ? $parse['jadwal']['Tue']['J7']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J7'] != NULL ? $parse['jadwal']['Tue']['J7']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J7'] != NULL ? $parse['jadwal']['Tue']['J7']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J7'] != NULL ? ($parse['jadwal']['Tue']['J7']->guru == NULL ? '-' : $parse['jadwal']['Tue']['J7']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Tue']['J7'] == NULL)
                                        <a href="#" data-hari="3" data-jam="7" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Tue']['J7']->id}}" data-mapel="{{$parse['jadwal']['Tue']['J7']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Tue']['J7']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Tue']['J7']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>{{$parse['jadwal']['Tue']['J8'] != NULL ? $parse['jadwal']['Tue']['J8']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J8'] != NULL ? $parse['jadwal']['Tue']['J8']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J8'] != NULL ? $parse['jadwal']['Tue']['J8']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J8'] != NULL ? $parse['jadwal']['Tue']['J8']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J8'] != NULL ? $parse['jadwal']['Tue']['J8']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Tue']['J8'] != NULL ? ($parse['jadwal']['Tue']['J8']->guru == NULL ? '-' : $parse['jadwal']['Tue']['J8']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Tue']['J8'] == NULL)
                                        <a href="#" data-hari="3" data-jam="8" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Tue']['J8']->id}}" data-mapel="{{$parse['jadwal']['Tue']['J8']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Tue']['J8']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Tue']['J8']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Rabu</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Jam Ke</th>
                                    <th>Kode</th>
                                    <th>Mata Pelajaran</th>
                                    <th>SKS</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Pengajar</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{$parse['jadwal']['Wed']['J1'] != NULL ? $parse['jadwal']['Wed']['J1']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J1'] != NULL ? $parse['jadwal']['Wed']['J1']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J1'] != NULL ? $parse['jadwal']['Wed']['J1']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J1'] != NULL ? $parse['jadwal']['Wed']['J1']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J1'] != NULL ? $parse['jadwal']['Wed']['J1']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J1'] != NULL ? ($parse['jadwal']['Wed']['J1']->guru == NULL ? '-' : $parse['jadwal']['Wed']['J1']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Wed']['J1'] == NULL)
                                        <a href="#" data-hari="4" data-jam="1" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Wed']['J1']->id}}" data-mapel="{{$parse['jadwal']['Wed']['J1']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Wed']['J1']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Wed']['J1']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>{{$parse['jadwal']['Wed']['J2'] != NULL ? $parse['jadwal']['Wed']['J2']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J2'] != NULL ? $parse['jadwal']['Wed']['J2']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J2'] != NULL ? $parse['jadwal']['Wed']['J2']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J2'] != NULL ? $parse['jadwal']['Wed']['J2']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J2'] != NULL ? $parse['jadwal']['Wed']['J2']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J2'] != NULL ? ($parse['jadwal']['Wed']['J2']->guru == NULL ? '-' : $parse['jadwal']['Wed']['J2']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Wed']['J2'] == NULL)
                                        <a href="#" data-hari="4" data-jam="2" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Wed']['J2']->id}}" data-mapel="{{$parse['jadwal']['Wed']['J2']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Wed']['J2']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Wed']['J2']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>{{$parse['jadwal']['Wed']['J3'] != NULL ? $parse['jadwal']['Wed']['J3']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J3'] != NULL ? $parse['jadwal']['Wed']['J3']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J3'] != NULL ? $parse['jadwal']['Wed']['J3']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J3'] != NULL ? $parse['jadwal']['Wed']['J3']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J3'] != NULL ? $parse['jadwal']['Wed']['J3']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J3'] != NULL ? ($parse['jadwal']['Wed']['J3']->guru == NULL ? '-' : $parse['jadwal']['Wed']['J3']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Wed']['J3'] == NULL)
                                        <a href="#" data-hari="4" data-jam="3" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Wed']['J3']->id}}" data-mapel="{{$parse['jadwal']['Wed']['J3']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Wed']['J3']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Wed']['J3']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>{{$parse['jadwal']['Wed']['J4'] != NULL ? $parse['jadwal']['Wed']['J4']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J4'] != NULL ? $parse['jadwal']['Wed']['J4']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J4'] != NULL ? $parse['jadwal']['Wed']['J4']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J4'] != NULL ? $parse['jadwal']['Wed']['J4']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J4'] != NULL ? $parse['jadwal']['Wed']['J4']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J4'] != NULL ? ($parse['jadwal']['Wed']['J4']->guru == NULL ? '-' : $parse['jadwal']['Wed']['J4']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Wed']['J4'] == NULL)
                                        <a href="#" data-hari="4" data-jam="4" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Wed']['J4']->id}}" data-mapel="{{$parse['jadwal']['Wed']['J4']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Wed']['J4']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Wed']['J4']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>{{$parse['jadwal']['Wed']['J5'] != NULL ? $parse['jadwal']['Wed']['J5']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J5'] != NULL ? $parse['jadwal']['Wed']['J5']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J5'] != NULL ? $parse['jadwal']['Wed']['J5']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J5'] != NULL ? $parse['jadwal']['Wed']['J5']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J5'] != NULL ? $parse['jadwal']['Wed']['J5']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J5'] != NULL ? ($parse['jadwal']['Wed']['J5']->guru == NULL ? '-' : $parse['jadwal']['Wed']['J5']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Wed']['J5'] == NULL)
                                        <a href="#" data-hari="4" data-jam="5" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Wed']['J5']->id}}" data-mapel="{{$parse['jadwal']['Wed']['J5']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Wed']['J5']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Wed']['J5']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>{{$parse['jadwal']['Wed']['J6'] != NULL ? $parse['jadwal']['Wed']['J6']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J6'] != NULL ? $parse['jadwal']['Wed']['J6']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J6'] != NULL ? $parse['jadwal']['Wed']['J6']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J6'] != NULL ? $parse['jadwal']['Wed']['J6']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J6'] != NULL ? $parse['jadwal']['Wed']['J6']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J6'] != NULL ? ($parse['jadwal']['Wed']['J6']->guru == NULL ? '-' : $parse['jadwal']['Wed']['J6']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Wed']['J6'] == NULL)
                                        <a href="#" data-hari="4" data-jam="6" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Wed']['J6']->id}}" data-mapel="{{$parse['jadwal']['Wed']['J6']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Wed']['J6']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Wed']['J6']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>{{$parse['jadwal']['Wed']['J7'] != NULL ? $parse['jadwal']['Wed']['J7']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J7'] != NULL ? $parse['jadwal']['Wed']['J7']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J7'] != NULL ? $parse['jadwal']['Wed']['J7']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J7'] != NULL ? $parse['jadwal']['Wed']['J7']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J7'] != NULL ? $parse['jadwal']['Wed']['J7']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J7'] != NULL ? ($parse['jadwal']['Wed']['J7']->guru == NULL ? '-' : $parse['jadwal']['Wed']['J7']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Wed']['J7'] == NULL)
                                        <a href="#" data-hari="4" data-jam="7" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Wed']['J7']->id}}" data-mapel="{{$parse['jadwal']['Wed']['J7']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Wed']['J7']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Wed']['J7']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>{{$parse['jadwal']['Wed']['J8'] != NULL ? $parse['jadwal']['Wed']['J8']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J8'] != NULL ? $parse['jadwal']['Wed']['J8']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J8'] != NULL ? $parse['jadwal']['Wed']['J8']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J8'] != NULL ? $parse['jadwal']['Wed']['J8']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J8'] != NULL ? $parse['jadwal']['Wed']['J8']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Wed']['J8'] != NULL ? ($parse['jadwal']['Wed']['J8']->guru == NULL ? '-' : $parse['jadwal']['Wed']['J8']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Wed']['J8'] == NULL)
                                        <a href="#" data-hari="4" data-jam="8" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Wed']['J8']->id}}" data-mapel="{{$parse['jadwal']['Wed']['J8']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Wed']['J8']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Wed']['J8']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Kamis</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Jam Ke</th>
                                    <th>Kode</th>
                                    <th>Mata Pelajaran</th>
                                    <th>SKS</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Pengajar</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{$parse['jadwal']['Thu']['J1'] != NULL ? $parse['jadwal']['Thu']['J1']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J1'] != NULL ? $parse['jadwal']['Thu']['J1']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J1'] != NULL ? $parse['jadwal']['Thu']['J1']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J1'] != NULL ? $parse['jadwal']['Thu']['J1']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J1'] != NULL ? $parse['jadwal']['Thu']['J1']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J1'] != NULL ? ($parse['jadwal']['Thu']['J1']->guru == NULL ? '-' : $parse['jadwal']['Thu']['J1']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Thu']['J1'] == NULL)
                                        <a href="#" data-hari="5" data-jam="1" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Thu']['J1']->id}}" data-mapel="{{$parse['jadwal']['Thu']['J1']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Thu']['J1']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Thu']['J1']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>{{$parse['jadwal']['Thu']['J2'] != NULL ? $parse['jadwal']['Thu']['J2']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J2'] != NULL ? $parse['jadwal']['Thu']['J2']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J2'] != NULL ? $parse['jadwal']['Thu']['J2']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J2'] != NULL ? $parse['jadwal']['Thu']['J2']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J2'] != NULL ? $parse['jadwal']['Thu']['J2']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J2'] != NULL ? ($parse['jadwal']['Thu']['J2']->guru == NULL ? '-' : $parse['jadwal']['Thu']['J2']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Thu']['J2'] == NULL)
                                        <a href="#" data-hari="5" data-jam="2" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Thu']['J2']->id}}" data-mapel="{{$parse['jadwal']['Thu']['J2']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Thu']['J2']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Thu']['J2']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>{{$parse['jadwal']['Thu']['J3'] != NULL ? $parse['jadwal']['Thu']['J3']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J3'] != NULL ? $parse['jadwal']['Thu']['J3']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J3'] != NULL ? $parse['jadwal']['Thu']['J3']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J3'] != NULL ? $parse['jadwal']['Thu']['J3']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J3'] != NULL ? $parse['jadwal']['Thu']['J3']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J3'] != NULL ? ($parse['jadwal']['Thu']['J3']->guru == NULL ? '-' : $parse['jadwal']['Thu']['J3']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Thu']['J3'] == NULL)
                                        <a href="#" data-hari="5" data-jam="3" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Thu']['J3']->id}}" data-mapel="{{$parse['jadwal']['Thu']['J3']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Thu']['J3']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Thu']['J3']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>{{$parse['jadwal']['Thu']['J4'] != NULL ? $parse['jadwal']['Thu']['J4']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J4'] != NULL ? $parse['jadwal']['Thu']['J4']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J4'] != NULL ? $parse['jadwal']['Thu']['J4']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J4'] != NULL ? $parse['jadwal']['Thu']['J4']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J4'] != NULL ? $parse['jadwal']['Thu']['J4']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J4'] != NULL ? ($parse['jadwal']['Thu']['J4']->guru == NULL ? '-' : $parse['jadwal']['Thu']['J4']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Thu']['J4'] == NULL)
                                        <a href="#" data-hari="5" data-jam="4" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Thu']['J4']->id}}" data-mapel="{{$parse['jadwal']['Thu']['J4']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Thu']['J4']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Thu']['J4']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>{{$parse['jadwal']['Thu']['J5'] != NULL ? $parse['jadwal']['Thu']['J5']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J5'] != NULL ? $parse['jadwal']['Thu']['J5']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J5'] != NULL ? $parse['jadwal']['Thu']['J5']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J5'] != NULL ? $parse['jadwal']['Thu']['J5']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J5'] != NULL ? $parse['jadwal']['Thu']['J5']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J5'] != NULL ? ($parse['jadwal']['Thu']['J5']->guru == NULL ? '-' : $parse['jadwal']['Thu']['J5']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Thu']['J5'] == NULL)
                                        <a href="#" data-hari="5" data-jam="5" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Thu']['J5']->id}}" data-mapel="{{$parse['jadwal']['Thu']['J5']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Thu']['J5']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Thu']['J5']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>{{$parse['jadwal']['Thu']['J6'] != NULL ? $parse['jadwal']['Thu']['J6']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J6'] != NULL ? $parse['jadwal']['Thu']['J6']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J6'] != NULL ? $parse['jadwal']['Thu']['J6']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J6'] != NULL ? $parse['jadwal']['Thu']['J6']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J6'] != NULL ? $parse['jadwal']['Thu']['J6']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J6'] != NULL ? ($parse['jadwal']['Thu']['J6']->guru == NULL ? '-' : $parse['jadwal']['Thu']['J6']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Thu']['J6'] == NULL)
                                        <a href="#" data-hari="5" data-jam="6" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Thu']['J6']->id}}" data-mapel="{{$parse['jadwal']['Thu']['J6']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Thu']['J6']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Thu']['J6']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>{{$parse['jadwal']['Thu']['J7'] != NULL ? $parse['jadwal']['Thu']['J7']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J7'] != NULL ? $parse['jadwal']['Thu']['J7']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J7'] != NULL ? $parse['jadwal']['Thu']['J7']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J7'] != NULL ? $parse['jadwal']['Thu']['J7']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J7'] != NULL ? $parse['jadwal']['Thu']['J7']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J7'] != NULL ? ($parse['jadwal']['Thu']['J7']->guru == NULL ? '-' : $parse['jadwal']['Thu']['J7']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Thu']['J7'] == NULL)
                                        <a href="#" data-hari="5" data-jam="7" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Thu']['J7']->id}}" data-mapel="{{$parse['jadwal']['Thu']['J7']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Thu']['J7']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Thu']['J7']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>{{$parse['jadwal']['Thu']['J8'] != NULL ? $parse['jadwal']['Thu']['J8']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J8'] != NULL ? $parse['jadwal']['Thu']['J8']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J8'] != NULL ? $parse['jadwal']['Thu']['J8']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J8'] != NULL ? $parse['jadwal']['Thu']['J8']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J8'] != NULL ? $parse['jadwal']['Thu']['J8']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Thu']['J8'] != NULL ? ($parse['jadwal']['Thu']['J8']->guru == NULL ? '-' : $parse['jadwal']['Thu']['J8']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Thu']['J8'] == NULL)
                                        <a href="#" data-hari="5" data-jam="8" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Thu']['J8']->id}}" data-mapel="{{$parse['jadwal']['Thu']['J8']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Thu']['J8']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Thu']['J8']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Jumat</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Jam Ke</th>
                                    <th>Kode</th>
                                    <th>Mata Pelajaran</th>
                                    <th>SKS</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Pengajar</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{$parse['jadwal']['Fri']['J1'] != NULL ? $parse['jadwal']['Fri']['J1']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J1'] != NULL ? $parse['jadwal']['Fri']['J1']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J1'] != NULL ? $parse['jadwal']['Fri']['J1']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J1'] != NULL ? $parse['jadwal']['Fri']['J1']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J1'] != NULL ? $parse['jadwal']['Fri']['J1']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J1'] != NULL ? ($parse['jadwal']['Fri']['J1']->guru == NULL ? '-' : $parse['jadwal']['Fri']['J1']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Fri']['J1'] == NULL)
                                        <a href="#" data-hari="6" data-jam="1" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Fri']['J1']->id}}" data-mapel="{{$parse['jadwal']['Fri']['J1']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Fri']['J1']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Fri']['J1']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>{{$parse['jadwal']['Fri']['J2'] != NULL ? $parse['jadwal']['Fri']['J2']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J2'] != NULL ? $parse['jadwal']['Fri']['J2']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J2'] != NULL ? $parse['jadwal']['Fri']['J2']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J2'] != NULL ? $parse['jadwal']['Fri']['J2']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J2'] != NULL ? $parse['jadwal']['Fri']['J2']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J2'] != NULL ? ($parse['jadwal']['Fri']['J2']->guru == NULL ? '-' : $parse['jadwal']['Fri']['J2']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Fri']['J2'] == NULL)
                                        <a href="#" data-hari="6" data-jam="2" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Fri']['J2']->id}}" data-mapel="{{$parse['jadwal']['Fri']['J2']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Fri']['J2']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Fri']['J2']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>{{$parse['jadwal']['Fri']['J3'] != NULL ? $parse['jadwal']['Fri']['J3']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J3'] != NULL ? $parse['jadwal']['Fri']['J3']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J3'] != NULL ? $parse['jadwal']['Fri']['J3']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J3'] != NULL ? $parse['jadwal']['Fri']['J3']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J3'] != NULL ? $parse['jadwal']['Fri']['J3']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J3'] != NULL ? ($parse['jadwal']['Fri']['J3']->guru == NULL ? '-' : $parse['jadwal']['Fri']['J3']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Fri']['J3'] == NULL)
                                        <a href="#" data-hari="6" data-jam="3" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Fri']['J3']->id}}" data-mapel="{{$parse['jadwal']['Fri']['J3']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Fri']['J3']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Fri']['J3']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>{{$parse['jadwal']['Fri']['J4'] != NULL ? $parse['jadwal']['Fri']['J4']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J4'] != NULL ? $parse['jadwal']['Fri']['J4']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J4'] != NULL ? $parse['jadwal']['Fri']['J4']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J4'] != NULL ? $parse['jadwal']['Fri']['J4']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J4'] != NULL ? $parse['jadwal']['Fri']['J4']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J4'] != NULL ? ($parse['jadwal']['Fri']['J4']->guru == NULL ? '-' : $parse['jadwal']['Fri']['J4']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Fri']['J4'] == NULL)
                                        <a href="#" data-hari="6" data-jam="4" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Fri']['J4']->id}}" data-mapel="{{$parse['jadwal']['Fri']['J4']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Fri']['J4']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Fri']['J4']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>{{$parse['jadwal']['Fri']['J5'] != NULL ? $parse['jadwal']['Fri']['J5']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J5'] != NULL ? $parse['jadwal']['Fri']['J5']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J5'] != NULL ? $parse['jadwal']['Fri']['J5']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J5'] != NULL ? $parse['jadwal']['Fri']['J5']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J5'] != NULL ? $parse['jadwal']['Fri']['J5']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J5'] != NULL ? ($parse['jadwal']['Fri']['J5']->guru == NULL ? '-' : $parse['jadwal']['Fri']['J5']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Fri']['J5'] == NULL)
                                        <a href="#" data-hari="6" data-jam="5" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Fri']['J5']->id}}" data-mapel="{{$parse['jadwal']['Fri']['J5']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Fri']['J5']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Fri']['J5']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>{{$parse['jadwal']['Fri']['J6'] != NULL ? $parse['jadwal']['Fri']['J6']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J6'] != NULL ? $parse['jadwal']['Fri']['J6']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J6'] != NULL ? $parse['jadwal']['Fri']['J6']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J6'] != NULL ? $parse['jadwal']['Fri']['J6']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J6'] != NULL ? $parse['jadwal']['Fri']['J6']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J6'] != NULL ? ($parse['jadwal']['Fri']['J6']->guru == NULL ? '-' : $parse['jadwal']['Fri']['J6']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Fri']['J6'] == NULL)
                                        <a href="#" data-hari="6" data-jam="6" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Fri']['J6']->id}}" data-mapel="{{$parse['jadwal']['Fri']['J6']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Fri']['J6']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Fri']['J6']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>{{$parse['jadwal']['Fri']['J7'] != NULL ? $parse['jadwal']['Fri']['J7']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J7'] != NULL ? $parse['jadwal']['Fri']['J7']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J7'] != NULL ? $parse['jadwal']['Fri']['J7']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J7'] != NULL ? $parse['jadwal']['Fri']['J7']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J7'] != NULL ? $parse['jadwal']['Fri']['J7']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J7'] != NULL ? ($parse['jadwal']['Fri']['J7']->guru == NULL ? '-' : $parse['jadwal']['Fri']['J7']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Fri']['J7'] == NULL)
                                        <a href="#" data-hari="6" data-jam="7" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Fri']['J7']->id}}" data-mapel="{{$parse['jadwal']['Fri']['J7']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Fri']['J7']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Fri']['J7']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>{{$parse['jadwal']['Fri']['J8'] != NULL ? $parse['jadwal']['Fri']['J8']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J8'] != NULL ? $parse['jadwal']['Fri']['J8']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J8'] != NULL ? $parse['jadwal']['Fri']['J8']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J8'] != NULL ? $parse['jadwal']['Fri']['J8']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J8'] != NULL ? $parse['jadwal']['Fri']['J8']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Fri']['J8'] != NULL ? ($parse['jadwal']['Fri']['J8']->guru == NULL ? '-' : $parse['jadwal']['Fri']['J8']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Fri']['J8'] == NULL)
                                        <a href="#" data-hari="6" data-jam="8" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Fri']['J8']->id}}" data-mapel="{{$parse['jadwal']['Fri']['J8']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Fri']['J8']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Fri']['J8']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Sabtu</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Jam Ke</th>
                                    <th>Kode</th>
                                    <th>Mata Pelajaran</th>
                                    <th>SKS</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Pengajar</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{$parse['jadwal']['Sat']['J1'] != NULL ? $parse['jadwal']['Sat']['J1']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J1'] != NULL ? $parse['jadwal']['Sat']['J1']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J1'] != NULL ? $parse['jadwal']['Sat']['J1']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J1'] != NULL ? $parse['jadwal']['Sat']['J1']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J1'] != NULL ? $parse['jadwal']['Sat']['J1']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J1'] != NULL ? ($parse['jadwal']['Sat']['J1']->guru == NULL ? '-' : $parse['jadwal']['Sat']['J1']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Sat']['J1'] == NULL)
                                        <a href="#" data-hari="7" data-jam="1" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Sat']['J1']->id}}" data-mapel="{{$parse['jadwal']['Sat']['J1']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Sat']['J1']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Sat']['J1']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>{{$parse['jadwal']['Sat']['J2'] != NULL ? $parse['jadwal']['Sat']['J2']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J2'] != NULL ? $parse['jadwal']['Sat']['J2']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J2'] != NULL ? $parse['jadwal']['Sat']['J2']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J2'] != NULL ? $parse['jadwal']['Sat']['J2']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J2'] != NULL ? $parse['jadwal']['Sat']['J2']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J2'] != NULL ? ($parse['jadwal']['Sat']['J2']->guru == NULL ? '-' : $parse['jadwal']['Sat']['J2']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Sat']['J2'] == NULL)
                                        <a href="#" data-hari="7" data-jam="2" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Sat']['J2']->id}}" data-mapel="{{$parse['jadwal']['Sat']['J2']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Sat']['J2']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Sat']['J2']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>{{$parse['jadwal']['Sat']['J3'] != NULL ? $parse['jadwal']['Sat']['J3']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J3'] != NULL ? $parse['jadwal']['Sat']['J3']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J3'] != NULL ? $parse['jadwal']['Sat']['J3']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J3'] != NULL ? $parse['jadwal']['Sat']['J3']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J3'] != NULL ? $parse['jadwal']['Sat']['J3']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J3'] != NULL ? ($parse['jadwal']['Sat']['J3']->guru == NULL ? '-' : $parse['jadwal']['Sat']['J3']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Sat']['J3'] == NULL)
                                        <a href="#" data-hari="7" data-jam="3" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Sat']['J3']->id}}" data-mapel="{{$parse['jadwal']['Sat']['J3']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Sat']['J3']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Sat']['J3']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>{{$parse['jadwal']['Sat']['J4'] != NULL ? $parse['jadwal']['Sat']['J4']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J4'] != NULL ? $parse['jadwal']['Sat']['J4']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J4'] != NULL ? $parse['jadwal']['Sat']['J4']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J4'] != NULL ? $parse['jadwal']['Sat']['J4']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J4'] != NULL ? $parse['jadwal']['Sat']['J4']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J4'] != NULL ? ($parse['jadwal']['Sat']['J4']->guru == NULL ? '-' : $parse['jadwal']['Sat']['J4']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Sat']['J4'] == NULL)
                                        <a href="#" data-hari="7" data-jam="4" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Sat']['J4']->id}}" data-mapel="{{$parse['jadwal']['Sat']['J4']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Sat']['J4']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Sat']['J4']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>{{$parse['jadwal']['Sat']['J5'] != NULL ? $parse['jadwal']['Sat']['J5']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J5'] != NULL ? $parse['jadwal']['Sat']['J5']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J5'] != NULL ? $parse['jadwal']['Sat']['J5']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J5'] != NULL ? $parse['jadwal']['Sat']['J5']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J5'] != NULL ? $parse['jadwal']['Sat']['J5']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J5'] != NULL ? ($parse['jadwal']['Sat']['J5']->guru == NULL ? '-' : $parse['jadwal']['Sat']['J5']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Sat']['J5'] == NULL)
                                        <a href="#" data-hari="7" data-jam="5" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Sat']['J5']->id}}" data-mapel="{{$parse['jadwal']['Sat']['J5']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Sat']['J5']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Sat']['J5']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>{{$parse['jadwal']['Sat']['J6'] != NULL ? $parse['jadwal']['Sat']['J6']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J6'] != NULL ? $parse['jadwal']['Sat']['J6']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J6'] != NULL ? $parse['jadwal']['Sat']['J6']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J6'] != NULL ? $parse['jadwal']['Sat']['J6']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J6'] != NULL ? $parse['jadwal']['Sat']['J6']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J6'] != NULL ? ($parse['jadwal']['Sat']['J6']->guru == NULL ? '-' : $parse['jadwal']['Sat']['J6']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Sat']['J6'] == NULL)
                                        <a href="#" data-hari="7" data-jam="6" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Sat']['J6']->id}}" data-mapel="{{$parse['jadwal']['Sat']['J6']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Sat']['J6']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Sat']['J6']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>{{$parse['jadwal']['Sat']['J7'] != NULL ? $parse['jadwal']['Sat']['J7']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J7'] != NULL ? $parse['jadwal']['Sat']['J7']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J7'] != NULL ? $parse['jadwal']['Sat']['J7']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J7'] != NULL ? $parse['jadwal']['Sat']['J7']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J7'] != NULL ? $parse['jadwal']['Sat']['J7']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J7'] != NULL ? ($parse['jadwal']['Sat']['J7']->guru == NULL ? '-' : $parse['jadwal']['Sat']['J7']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Sat']['J7'] == NULL)
                                        <a href="#" data-hari="7" data-jam="7" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Sat']['J7']->id}}" data-mapel="{{$parse['jadwal']['Sat']['J7']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Sat']['J7']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Sat']['J7']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>{{$parse['jadwal']['Sat']['J8'] != NULL ? $parse['jadwal']['Sat']['J8']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J8'] != NULL ? $parse['jadwal']['Sat']['J8']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J8'] != NULL ? $parse['jadwal']['Sat']['J8']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J8'] != NULL ? $parse['jadwal']['Sat']['J8']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J8'] != NULL ? $parse['jadwal']['Sat']['J8']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sat']['J8'] != NULL ? ($parse['jadwal']['Sat']['J8']->guru == NULL ? '-' : $parse['jadwal']['Sat']['J8']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Sat']['J8'] == NULL)
                                        <a href="#" data-hari="7" data-jam="8" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Sat']['J8']->id}}" data-mapel="{{$parse['jadwal']['Sat']['J8']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Sat']['J8']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Sat']['J8']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Minggu</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Jam Ke</th>
                                    <th>Kode</th>
                                    <th>Mata Pelajaran</th>
                                    <th>SKS</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Pengajar</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{$parse['jadwal']['Sun']['J1'] != NULL ? $parse['jadwal']['Sun']['J1']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J1'] != NULL ? $parse['jadwal']['Sun']['J1']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J1'] != NULL ? $parse['jadwal']['Sun']['J1']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J1'] != NULL ? $parse['jadwal']['Sun']['J1']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J1'] != NULL ? $parse['jadwal']['Sun']['J1']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J1'] != NULL ? ($parse['jadwal']['Sun']['J1']->guru == NULL ? '-' : $parse['jadwal']['Sun']['J1']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Sun']['J1'] == NULL)
                                        <a href="#" data-hari="1" data-jam="1" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Sun']['J1']->id}}" data-mapel="{{$parse['jadwal']['Sun']['J1']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Sun']['J1']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Sun']['J1']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>{{$parse['jadwal']['Sun']['J2'] != NULL ? $parse['jadwal']['Sun']['J2']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J2'] != NULL ? $parse['jadwal']['Sun']['J2']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J2'] != NULL ? $parse['jadwal']['Sun']['J2']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J2'] != NULL ? $parse['jadwal']['Sun']['J2']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J2'] != NULL ? $parse['jadwal']['Sun']['J2']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J2'] != NULL ? ($parse['jadwal']['Sun']['J2']->guru == NULL ? '-' : $parse['jadwal']['Sun']['J2']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Sun']['J2'] == NULL)
                                        <a href="#" data-hari="1" data-jam="2" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Sun']['J2']->id}}" data-mapel="{{$parse['jadwal']['Sun']['J2']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Sun']['J2']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Sun']['J2']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>{{$parse['jadwal']['Sun']['J3'] != NULL ? $parse['jadwal']['Sun']['J3']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J3'] != NULL ? $parse['jadwal']['Sun']['J3']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J3'] != NULL ? $parse['jadwal']['Sun']['J3']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J3'] != NULL ? $parse['jadwal']['Sun']['J3']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J3'] != NULL ? $parse['jadwal']['Sun']['J3']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J3'] != NULL ? ($parse['jadwal']['Sun']['J3']->guru == NULL ? '-' : $parse['jadwal']['Sun']['J3']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Sun']['J3'] == NULL)
                                        <a href="#" data-hari="1" data-jam="3" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Sun']['J3']->id}}" data-mapel="{{$parse['jadwal']['Sun']['J3']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Sun']['J3']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Sun']['J3']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>{{$parse['jadwal']['Sun']['J4'] != NULL ? $parse['jadwal']['Sun']['J4']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J4'] != NULL ? $parse['jadwal']['Sun']['J4']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J4'] != NULL ? $parse['jadwal']['Sun']['J4']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J4'] != NULL ? $parse['jadwal']['Sun']['J4']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J4'] != NULL ? $parse['jadwal']['Sun']['J4']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J4'] != NULL ? ($parse['jadwal']['Sun']['J4']->guru == NULL ? '-' : $parse['jadwal']['Sun']['J4']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Sun']['J4'] == NULL)
                                        <a href="#" data-hari="1" data-jam="4" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Sun']['J4']->id}}" data-mapel="{{$parse['jadwal']['Sun']['J4']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Sun']['J4']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Sun']['J4']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>{{$parse['jadwal']['Sun']['J5'] != NULL ? $parse['jadwal']['Sun']['J5']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J5'] != NULL ? $parse['jadwal']['Sun']['J5']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J5'] != NULL ? $parse['jadwal']['Sun']['J5']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J5'] != NULL ? $parse['jadwal']['Sun']['J5']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J5'] != NULL ? $parse['jadwal']['Sun']['J5']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J5'] != NULL ? ($parse['jadwal']['Sun']['J5']->guru == NULL ? '-' : $parse['jadwal']['Sun']['J5']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Sun']['J5'] == NULL)
                                        <a href="#" data-hari="1" data-jam="5" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Sun']['J5']->id}}" data-mapel="{{$parse['jadwal']['Sun']['J5']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Sun']['J5']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Sun']['J5']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>{{$parse['jadwal']['Sun']['J6'] != NULL ? $parse['jadwal']['Sun']['J6']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J6'] != NULL ? $parse['jadwal']['Sun']['J6']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J6'] != NULL ? $parse['jadwal']['Sun']['J6']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J6'] != NULL ? $parse['jadwal']['Sun']['J6']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J6'] != NULL ? $parse['jadwal']['Sun']['J6']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J6'] != NULL ? ($parse['jadwal']['Sun']['J6']->guru == NULL ? '-' : $parse['jadwal']['Sun']['J6']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Sun']['J6'] == NULL)
                                        <a href="#" data-hari="1" data-jam="6" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Sun']['J6']->id}}" data-mapel="{{$parse['jadwal']['Sun']['J6']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Sun']['J6']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Sun']['J6']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>{{$parse['jadwal']['Sun']['J7'] != NULL ? $parse['jadwal']['Sun']['J7']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J7'] != NULL ? $parse['jadwal']['Sun']['J7']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J7'] != NULL ? $parse['jadwal']['Sun']['J7']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J7'] != NULL ? $parse['jadwal']['Sun']['J7']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J7'] != NULL ? $parse['jadwal']['Sun']['J7']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J7'] != NULL ? ($parse['jadwal']['Sun']['J7']->guru == NULL ? '-' : $parse['jadwal']['Sun']['J7']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Sun']['J7'] == NULL)
                                        <a href="#" data-hari="1" data-jam="7" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Sun']['J7']->id}}" data-mapel="{{$parse['jadwal']['Sun']['J7']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Sun']['J7']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Sun']['J7']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>{{$parse['jadwal']['Sun']['J8'] != NULL ? $parse['jadwal']['Sun']['J8']->getMapel->kode_mapel : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J8'] != NULL ? $parse['jadwal']['Sun']['J8']->getMapel->nama_idn : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J8'] != NULL ? $parse['jadwal']['Sun']['J8']->getMapel->sks : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J8'] != NULL ? $parse['jadwal']['Sun']['J8']->mulai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J8'] != NULL ? $parse['jadwal']['Sun']['J8']->selesai : ''}}</td>
                                    <td>{{$parse['jadwal']['Sun']['J8'] != NULL ? ($parse['jadwal']['Sun']['J8']->guru == NULL ? '-' : $parse['jadwal']['Sun']['J8']->getGuru->nama) : ''}}</td>
                                    <td>
                                        @if($parse['jadwal']['Sun']['J8'] == NULL)
                                        <a href="#" data-hari="1" data-jam="8" class="btn btn-sm btn-success" data-toggle="modal" data-target=".create-jd"><i class="fa fa-calendar-plus-o"></i> Tambah</a>
                                        @else
                                        <div class="btn-group">
                                            <a href="#" data-id="{{$parse['jadwal']['Sun']['J8']->id}}" data-mapel="{{$parse['jadwal']['Sun']['J8']->getMapel->nama_idn}}" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".change-jd"><i class="fa fa-edit"></i> Sunting</a>
                                            <a href="#" data-messages="{{$parse['jadwal']['Sun']['J8']->getMapel->nama_idn}}" data-href="{{route('akademik.jd.delete', ['kelas' => $parse['kelas']->id, 'id' => $parse['jadwal']['Sun']['J8']->id])}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
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
<div class="modal fade create-jd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('akademik.jd.store',$parse['kelas']->id)}}" autocomplete="off">
                <div class="modal-header" style="background:#00a65a;color:#FFFFFF">
                    <h4 class="modal-title">Tambah Jadwal - {{$parse['kelas']->nama}}</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Mata Pelajaran *</label>
                        <select name="pelajaran" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach($parse['mapel'] as $mapel)
                            <option value="{{$mapel->id}}">{{$mapel->kode_mapel}} | {{$mapel->nama_idn}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mulai *</label>        
                        <div class="input-group">
                            <input name="mulai" data-mask class="form-control timepicker" type="text" required>
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Selesai *</label>        
                        <div class="input-group">
                            <input name="selesai" class="form-control timepicker" type="text" data-mask required>
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Pengajar *</label>
                        <select name="guru" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach($parse['guru'] as $guru)
                            <option value="{{$guru->id}}">{{$guru->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="value-jd" name="jam_ke" />
                    <input type="hidden" class="value-hr" name="hari" />
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>   
            </form>
        </div>
    </div>
</div>
<div class="modal fade change-jd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('akademik.jd.change',$parse['kelas']->id)}}" autocomplete="off">
                <div class="modal-header" style="background:#00a65a;color:#FFFFFF">
                    <h4 class="modal-title">Ubah Jadwal - {{$parse['kelas']->nama}}</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Mata Pelajaran</label>
                        <input type="text" class="form-control value-mp" disabled>
                    </div>
                    <div class="form-group">
                        <label>Mulai *</label>        
                        <div class="input-group">
                            <input name="mulai" data-mask class="form-control timepicker" type="text" required>
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Selesai *</label>        
                        <div class="input-group">
                            <input name="selesai" class="form-control timepicker" type="text" data-mask required>
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Pengajar *</label>
                        <select name="guru" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach($parse['guru'] as $guru)
                            <option value="{{$guru->id}}">{{$guru->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jam Ke *</label>
                        <select name="jam_ke" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hari *</label>
                        <select name="hari" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option value="1">Minggu</option>
                            <option value="2">Senin</option>
                            <option value="3">Selasa</option>
                            <option value="4">Rabu</option>
                            <option value="5">Kamis</option>
                            <option value="6">Jumat</option>
                            <option value="7">Sabtu</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="value-id" name="id" />
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>   
            </form>
        </div>
    </div>
</div>
@stop
