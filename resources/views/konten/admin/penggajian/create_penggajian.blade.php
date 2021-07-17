@extends('layout/index')
@section('konten')


<div id="content">
                <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Data Nilai</h3>
                        <p class="animated fadeInDown">
                          Form <span class="fa-angle-right fa"></span> Data Nilai
                        </p>
                    </div>
                  </div>
                </div>
                <div class="form-element">
                  <div class="col-md-12 padding-0">
                    <div class="col-md-12">
                      <div class="panel form-element-padding">
                        <div class="panel-heading">
                         <h4>Data Nilai</h4>
                        </div>
                         <div class="panel-body" style="padding-bottom:30px;">
                          <div class="col-md-12">

                            <form class="form-horizontal form-material" action="storenilai" method="post">
                                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                                    {{ @csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-sm-12 mb-0">Pegawai</label>
                                        <div class="col-sm-12">
                                        <select class="form-control pl-0 form-control-line select-pegawai" name="pegawai">
                                            <option disabled selected style="padding: 10px">Select Pegawai</option>
                                            @foreach($pegawai as $key => $value)
                                          <option value="{{$key}}">{{ $value }}
                                          </option>
                                          @endforeach
                                            </select>  
                                        </div>
                                      </div>
                                      
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Golongan</label>
                                        <div class="col-md-12">
                                            <input type="text" id="golongan" name="golongan" class="form-control pl-0 form-control-line" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Lama Kerja</label>
                                        <div class="col-md-12">
                                            <input type="text" id="lama_kerja" class="form-control pl-0 form-control-line" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Gaji Pokok</label>
                                        <div class="col-md-12">
                                            <input type="text" id="gaji_pokok" class="form-control pl-0 form-control-line" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Tunjangan</label>
                                        <div class="col-md-12">
                                            <input type="text" id="tunjangan" class="form-control pl-0 form-control-line" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Potongan Tunjangan</label>
                                        <div class="col-md-12">
                                            <input type="text" id="potongan_tunjangan" class="form-control pl-0 form-control-line" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Total Tunjangan</label>
                                        <div class="col-md-12">
                                            <input type="text" id="total_tunjangan" class="form-control pl-0 form-control-line" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Total Gaji</label>
                                        <div class="col-md-12">
                                            <input type="text" id="total_gaji" class="form-control pl-0 form-control-line" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12 d-flex">
                                            <center>
                                            <button class="btn btn-success mx-auto mx-md-0 text-white">Submit</button>
                                            </center>
                                        </div>
                                    </div>
                                </form>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
            </div>



@endsection
@section('script')
<script src="{{ asset('/assets/select-gaji-pokok.js') }}"></script>
<script src="{{ asset('/assets/select-pegawai.js') }}"></script>
@endsection