@extends('layout/index')
@section('konten')


<div id="content">
                <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Profile</h3>
                        <p class="animated fadeInDown">
                          Dashboard <span class="fa-angle-right fa"></span> Profile
                        </p>
                    </div>
                  </div>
                </div>
                <div class="form-element">
                  <div class="col-md-12 padding-0">
                    <div class="col-md-12">
                      <div class="panel form-element-padding">
                        <div class="panel-heading">
                         <h4>Profile</h4>
                        </div>
                         <div class="panel-body" style="padding-bottom:30px;">
                          <div class="col-md-12">

                            @foreach ($PEGAWAI as $PEGAWAI)                            
                            
                            
                                   
                                    {{ @csrf_field() }}

                                    <div class="form-group">
                                        <div class="col-sm-12 d-flex">
                                            <a href="editprofile"> <button  type="button" class="btn btn-success mx-auto mx-md-0 text-white">Edit Profile</button></a>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="example-id" class="col-md-12">ID Pegawai</label>
                                        <div class="col-md-6">
                                            <input type="id" placeholder="Auto ID"
                                                class="form-control pl-0 form-control-line" name="ID_PEGAWAI"
                                                id="ID_PEGAWAI" required value=" {{ $PEGAWAI->ID_PEGAWAI }}" readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Username</label>
                                        <div class="col-md-6">
                                            <input type="name" placeholder="Please input username"
                                                class="form-control pl-0 form-control-line" name="USERNAME"
                                                id="USERNAME" required value=" {{ $PEGAWAI->USERNAME }}" readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Password</label>
                                        <div class="col-md-6">
                                            <input type="password" placeholder="Please input password"
                                                class="form-control pl-0 form-control-line" name="PASSWORD"
                                                id="PASSWORD" required value=" {{ $PEGAWAI->PASSWORD }}" password_hash($PASSWORD, PASSWORD_BCRYPT) readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="example-username" class="col-md-12">Alamat</label>
                                        <div class="col-md-6">
                                            <input type="alamat" placeholder="Please input tanggal lahir"
                                                class="form-control pl-0 form-control-line" name="ALAMAT"
                                                id="ALAMAT" required value=" {{ $PEGAWAI->ALAMAT }}" readonly>
                                        </div>
                                    </div>
                                    <br>
                                     <div class="form-group">
                                        <label for="example-username" class="col-md-12">Telepon</label>
                                        <div class="col-md-6">
                                            <input type="text" placeholder="Please input telepon"
                                                class="form-control pl-0 form-control-line" name="TELEPON"
                                                id="TELEPON" required value=" {{ $PEGAWAI->TELEPON }}" readonly>
                                        </div>
                                    </div>
                                    
                                

                                @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
            </div>



@endsection