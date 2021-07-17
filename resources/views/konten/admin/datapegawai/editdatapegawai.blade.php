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

                            @foreach ($PEGAWAI as $PEGAWAI)

                            <form class="form-horizontal form-material" role="form" action="adminupdatedatapegawai" method="post">
                                   
                                    {{ @csrf_field() }}
                                    <div class="form-group">
                                        <label for="example-id" class="col-md-12">ID Pegawai</label>
                                        <div class="col-md-12">
                                            <input type="id" placeholder="Auto ID"
                                                class="form-control pl-0 form-control-line" name="ID_PEGAWAI"
                                                id="ID_PEGAWAI" required value=" {{ $PEGAWAI->ID_PEGAWAI }}" readonly>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-12 mb-0">ID Jabatan</label>
                                        <div class="col-sm-12">
                                        <select class="form-control pl-0 form-control-line" id="ID_JABATAN" name="ID_JABATAN">
                                            
                                          @foreach($JABATAN as $J) 
                                          <option value=" {{ $J->ID_JABATAN}}" selected>
                                            {{ $J->NAMA_JABATAN}}
                                          </option>
                                          @endforeach
                                            </select>  
                                        </div>
                                      </div>                                
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">NIP</label>
                                        <div class="col-md-12">
                                            <input type="id" placeholder="Please input NIP"
                                                class="form-control pl-0 form-control-line" name="NIP"
                                                id="NIP" required value=" {{ $PEGAWAI->NIP }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Nama Pegawai</label>
                                        <div class="col-md-12">
                                            <input type="name" placeholder="Please input nama pegawai"
                                                class="form-control pl-0 form-control-line" name="NAMA_PEGAWAI"
                                                id="NAMA_PEGAWAI" required value=" {{ $PEGAWAI->NAMA_PEGAWAI }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Gaji Pokok</label>
                                        <div class="col-md-12">
                                            <input type="name" placeholder="Please input gaji pokok"
                                                class="form-control pl-0 form-control-line" name="GAJI_POKOK"
                                                id="GAJI_POKOK" required value=" {{ $PEGAWAI->GAJI_POKOK }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Tunjangan</label>
                                        <div class="col-md-12">
                                            <input type="name" placeholder="Please input tunjangan"
                                                class="form-control pl-0 form-control-line" name="TUNJANGAN"
                                                id="TUNJANGAN" required value=" {{ $PEGAWAI->TUNJANGAN }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Tipe Akun</label>
                                        <div class="col-md-12">
                                            <input type="name" placeholder="Please input ADMIN / PEGAWAI"
                                                class="form-control pl-0 form-control-line" name="TIPE_AKUN"
                                                id="TIPE_AKUN" required value=" {{ $PEGAWAI->TIPE_AKUN }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Username</label>
                                        <div class="col-md-12">
                                            <input type="name" placeholder="Please input username"
                                                class="form-control pl-0 form-control-line" name="USERNAME"
                                                id="USERNAME" required value=" {{ $PEGAWAI->USERNAME }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" placeholder="Please input password"
                                                class="form-control pl-0 form-control-line" name="PASSWORD"
                                                id="PASSWORD" required value=" {{ $PEGAWAI->PASSWORD }}" password_hash($PASSWORD, PASSWORD_BCRYPT)>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12 mb-0">Select Jenis Kelamin</label>
                                        <div class="col-sm-12">
                                            <select name="JENIS_KELAMIN" id="JENIS_KELAMIN" class="form-control mb-3 mb-3">
                                            @if($PEGAWAI->JENIS_KELAMIN==0)
                                            <option selected value="0">Laki-Laki</option>
                                            <option value='1'>Perempuan</option>
                                            @else
                                            <option value="0">Laki-Laki</option>
                                            <option selected value='1'>Perempuan</option>
                                            @endif
                                            </select>
                                        </div> 
                                    </div>    
                                    <div class="form-group">
                                        <label for="example-username" class="col-md-12">Status Kepegawaian</label>
                                        <div class="col-md-12">
                                            <input type="tangallahir" placeholder="Please input tanggal lahir"
                                                class="form-control pl-0 form-control-line" name="STATUS_KEPEGAWAIAN"
                                                id="STATUS_KEPEGAWAIAN" required value=" {{ $PEGAWAI->STATUS_KEPEGAWAIAN }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-username" class="col-md-12">Alamat</label>
                                        <div class="col-md-12">
                                            <input type="alamat" placeholder="Please input tanggal lahir"
                                                class="form-control pl-0 form-control-line" name="ALAMAT"
                                                id="ALAMAT" required value=" {{ $PEGAWAI->ALAMAT }}">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="example-username" class="col-md-12">Telepon</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Please input telepon"
                                                class="form-control pl-0 form-control-line" name="TELEPON"
                                                id="TELEPON" required value=" {{ $PEGAWAI->TELEPON }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-username" class="col-md-12">Tanggal Lahir</label>
                                        <div class="col-md-2">
                                            <input type="text" placeholder="Please input tanggal lahir"
                                                class="form-control pl-0 form-control-line" name="TANGGAL_LAHIR"
                                                id="TANGGAL_LAHIR" required value=" {{ $PEGAWAI->TANGGAL_LAHIR }}">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-12 mb-0">Select Status</label>
                                        <div class="col-sm-12">
                                            <select name="STATUS" id="STATUS" class="form-control mb-3 mb-3">
                                            @if($PEGAWAI->STATUS==0)
                                            <option selected value="0">Non Aktif</option>
                                            <option value='1'>Aktif</option>
                                            @endif
                                            @if($PEGAWAI->STATUS==1)
                                            <option value="0">Non Aktif</option>
                                            <option selected value='1'>Aktif</option>
                                            @endif
                                            </select>
                                        </div> 
                                    </div>    
                                    <div class="form-group">
                                        <div class="col-sm-12 d-flex">
                                            <center>
                                            <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Submit</button>
                                            </center>
                                        </div>
                                    </div>
                                </form>

                                @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
            </div>



@endsection