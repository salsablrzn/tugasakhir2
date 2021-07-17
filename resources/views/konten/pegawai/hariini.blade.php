@extends('layout/index')
@section('konten')

    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Presensi Hari Ini </h3>
                    {{-- <p class="animated fadeInDown">
                        Presensi <span class="fa-angle-right fa"></span>Presensi Hari Ini
                    </p> --}}
                </div>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                @include('layout/alert')
                <div class="panel">
                    <div class="panel-heading">
                        <h3>Presensi Hari Ini</h3>
                    </div>
                    <div class="panel-body">
                        <div class="responsive-table">

                            <div class="panel-body">

                                @if (!$data && Helper::comparejam($harikerja->MASUK_AWAL, $harikerja->MASUK_AKHIR))
                                    <a class="btn btn-flat btn-primary" name="btnIn"
                                        href="{{ url('pegawai/presensi/formpresensi') }}">Check In</a>
                                @elseif ($data && Helper::comparejam($harikerja->KELUAR_AWAL, $harikerja->KELUAR_AKHIR) &&  $data->STATUS_KELUAR == '')
                                    <a class="btn btn-flat btn-primary" name="btnIn"
                                        href="{{ url('pegawai/presensi/formpresensi') }}">Check Out</a>
                                @endif


                            </div>

                            <!--  <a href="admincreatedataakun" class="btn btn-success d-none d-md-inline-block text-white" target="_blank">Add </a> -->

                            @if ($harikerja->STATUS_KERJA == 1)
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="">Tanggal</label>
                                            <h5>{{ Helper::tanggal(date('Y-m-d')) }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="">Batas Absen Masuk</label>
                                            <h5>{{ $harikerja->MASUK_AWAL . ' - ' . $harikerja->MASUK_AKHIR }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="">Batas Absen Keluar</label>
                                            <h5>{{ $harikerja->KELUAR_AWAL . ' - ' . $harikerja->KELUAR_AKHIR }}</h5>
                                        </div>
                                    </div>
                                </div>
                                @if ($data)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Data Presensi Masuk</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="">Absen Masuk Pada</label>
                                                <h5>{{ Helper::waktu($data->JAM_MASUK) }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="">Status Absen Masuk</label>
                                                <h5>{{$data->STATUS_MASUK}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="">Keterangan Absen Masuk</label>
                                                <h5>{{ $data->KETERANGAN_MASUK }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="">Foto Absen Masuk</label><br>
                                                <img src="{{ $data->FOTO_MASUK }}" class="avatar" />
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <h4>Data Presensi Keluar</h4>
                                        </div>
                                        @if (Helper::comparejam($harikerja->KELUAR_AWAL, $harikerja->KELUAR_AKHIR))
                                            @if ($data->STATUS_KELUAR != '')
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="">Absen Keluar Pada</label>
                                                    <h5>{{ Helper::waktu($data->JAM_KELUAR) }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="">Status Absen Keluar</label>
                                                    <h5>{{$data->STATUS_KELUAR}}</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="">Keterangan Absen Keluar</label>
                                                    <h5>{{ $data->KETERANGAN_KELUAR }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="">Foto Absen Keluar</label><br>
                                                    <img src="{{ $data->FOTO_KELUAR }}" class="avatar" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <h4>Total Tunjangan Makan Minum {{Helper::price($data->TOTAL_TUNJANGAN)}}</h4>
                                            </div>
                                            @else 
                                            <div class="col-md-12">
                                            <div class="alert alert-danger" role="alert">
                                                    <h4 class="alert-heading">Informasi</h4>

                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <p>
                                                        Anda Belum Melakukan Presensi Keluar
                                                    </p>
                                                </div>
                                            </div>
                                            @endif
                                        
                                        @else 
                                        <div class="col-md-12">
                                          <div class="alert alert-danger" role="alert">
                                                <h4 class="alert-heading">Informasi</h4>

                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <p>
                                                    Belum Waktu Presensi Keluar
                                                </p>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                @else
                                    @if (Helper::comparejam($harikerja->MASUK_AWAL, $harikerja->MASUK_AKHIR))
                                    @else 
                                            <div class="alert alert-danger" role="alert">
                                                    <h4 class="alert-heading">Informasi</h4>

                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <p>
                                                        Belum Waktu Presensi Masuk
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                    <div class="alert alert-warning" role="alert">
                                        <h4 class="alert-heading">Informasi</h4>

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <p>
                                            Anda belum presensi masuk hari ini. Pastikan anda tepat waktu untuk melakukan
                                            presensi
                                        </p>
                                    </div>
                                @endif
                            @else
                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading">Informasi</h4>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <p>
                                        Tidak ada presensi hari ini.
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
