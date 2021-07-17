@extends('layout/index')
@section('konten')


<div id="content">
                <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Data Pegawai</h3>
                        <p class="animated fadeInDown">
                          Form <span class="fa-angle-right fa"></span> Data Pegawai
                        </p>
                    </div>
                  </div>
                </div>
                <div class="form-element">
                  <div class="col-md-12 padding-0">
                    <div class="col-md-12">
                      <div class="panel form-element-padding">
                        <div class="panel-heading">
                         <h4>Data Akun</h4>
                        </div>
                         <div class="panel-body" style="padding-bottom:30px;">
                          <div class="col-md-12">

                            <form class="form-horizontal form-material" action="adminstoredatapegawai" method="post">
                                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                                    {{ @csrf_field() }}
                                    <div class="form-group">
                                        <label for="example-id" class="col-md-12">ID Pegawai</label>
                                        <div class="col-md-12">
                                            <input type="id" placeholder="Auto ID"
                                                class="form-control pl-0 form-control-line" name="ID_PEGAWAI"
                                                id="ID_PEGAWAI" disabled="" required>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-12 mb-0">ID Jabatan</label>
                                        <div class="col-sm-12">
                                        <select class="form-control pl-0 form-control-line" name="ID_JABATAN">
                                            <option disabled selected style="padding: 10px">Select ID Jabatan</option>
                                            @foreach($jabatan as $key => $value)
                                          <option value="{{$key}}">{{ $value }}
                                          </option>
                                          @endforeach
                                            </select>  
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-12 mb-0">Golongan</label>
                                        <div class="col-sm-12">
                                        <select class="form-control pl-0 form-control-line select-golongan" name="ID_DETAIL_GOLONGAN">
                                            <option disabled selected style="padding: 10px">Select Golongan</option>
                                            @foreach($detail as $id =>$nama)
                                            <option value="{{ $id }}">{{$nama}}</option>
                                            @endforeach
                                            </select>  
                                        </div>
                                      </div> 
                                      <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Gaji Pokok</label>
                                        <div class="col-md-12">
                                            <!-- <input type="text"class="form-control pl-0 form-control-line" name="GAJI_POKOK" id="" required> -->
                                            <select class="form-control pl-0 form-control-line GAJI-POKOK" name="GAJI_POKOK" id="">
                                                <option disabled selected style="padding: 10px">Select Golongan</option>
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">NIP</label>
                                        <div class="col-md-12">
                                            <input type="id" placeholder="Please input NIP"
                                                class="form-control pl-0 form-control-line" name="NIP"
                                                id="NIP" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Nama Pegawai</label>
                                        <div class="col-md-12">
                                            <input type="name" placeholder="Please input nama pegawai"
                                                class="form-control pl-0 form-control-line" name="NAMA_PEGAWAI"
                                                id="NAMA_PEGAWAI" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Tunjangan</label>
                                        <div class="col-md-12">
                                            <input type="number" placeholder="Please input tunjangan"
                                                class="form-control pl-0 form-control-line" name="TUNJANGAN"
                                                id="TUNJANGAN" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Tipe Akun</label>
                                        <div class="col-md-12">
                                            <input type="name" placeholder="Please input ADMIN / PEGAWAI"
                                                class="form-control pl-0 form-control-line" name="TIPE_AKUN"
                                                id="TIPE_AKUN" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Username</label>
                                        <div class="col-md-12">
                                            <input type="name" placeholder="Please input username"
                                                class="form-control pl-0 form-control-line" name="USERNAME"
                                                id="USERNAME" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" placeholder="Please input password"
                                                class="form-control pl-0 form-control-line" name="PASSWORD"
                                                id="PASSWORD" required password_hash($PASSWORD, PASSWORD_BCRYPT)>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12 mb-0">Jenis Kelamin</label>
                                        <div class="col-sm-12">
                                            <select class="form-control pl-0 form-control-line" name="JENIS_KELAMIN">
                                            <option disabled selected style="padding: 10px">Select Jenis Kelamin</option>
                                            <option value='0'>Laki-Laki</option>
                                            <option value='1'>Perempuan</option>
                                            </select>  
                                        </div> 
                                    </div>    
                                    <div class="form-group">
                                        <label for="example-username" class="col-md-12">Status Kepegawaian</label>
                                        <div class="col-md-12">
                                            <input type="tangallahir" placeholder="Please input tanggal lahir"
                                                class="form-control pl-0 form-control-line" name="STATUS_KEPEGAWAIAN"
                                                id="STATUS_KEPEGAWAIAN" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-username" class="col-md-12">Alamat</label>
                                        <div class="col-md-12">
                                            <input type="alamat" placeholder="Please input tanggal lahir"
                                                class="form-control pl-0 form-control-line" name="ALAMAT"
                                                id="ALAMAT" required>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="example-username" class="col-md-12">Telepon</label>
                                        <div class="col-md-12">
                                            <input type="number" placeholder="Please input telepon"
                                                class="form-control pl-0 form-control-line" name="TELEPON"
                                                id="TELEPON" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-username" class="col-md-12">Tanggal Lahir</label>
                                        <div class="col-md-2">
                                            <input type="date" placeholder="Please input tanggal lahir"
                                                class="form-control pl-0 form-control-line" name="TANGGAL_LAHIR"
                                                id="TANGGAL_LAHIR" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-12 mb-0">Select Status</label>
                                        <div class="col-sm-12">
                                            <select class="form-control pl-0 form-control-line" name="STATUS">
                                            <option disabled selected style="padding: 10px">Select Status</option>
                                            <option value='0'>Non Aktif</option>
                                            <option value='1'>Aktif</option>
                                            </select>  
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
@endsection