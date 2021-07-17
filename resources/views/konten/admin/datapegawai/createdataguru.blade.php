@extends('layout/index')
@section('konten')


<div id="content">
                <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Data Guru</h3>
                        <p class="animated fadeInDown">
                          Form <span class="fa-angle-right fa"></span> Data Guru
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

                            <form class="form-horizontal form-material" action="adminstoredataakun" method="post">
                                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                                    {{ @csrf_field() }}
                                    <div class="form-group">
                                        <label for="example-id" class="col-md-12">ID</label>
                                        <div class="col-md-12">
                                            <input type="id" placeholder="Auto ID"
                                                class="form-control pl-0 form-control-line" name="id_dataguru"
                                                id="example-id" disabled="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">NIP</label>
                                        <div class="col-md-12">
                                            <input type="id" placeholder="Please input NIP"
                                                class="form-control pl-0 form-control-line" name="nip_dataguru"
                                                id="example-nama" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Nama Pegawai</label>
                                        <div class="col-md-12">
                                            <input type="name" placeholder="Please input nama pegawai"
                                                class="form-control pl-0 form-control-line" name="nama_dataguru"
                                                id="example-nama" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12 mb-0">Select Jenis Kelamin</label>
                                        <div class="col-sm-12">
                                            <select class="form-control pl-0 form-control-line" name="status_dataguru">
                                            <option disabled selected style="padding: 10px">Select Jenis Kelamin</option>
                                            <option value='0'>Laki-Laki</option>
                                            <option value='1'>Perempuan</option>
                                            </select>  
                                        </div> 
                                    </div>    
                                    <div class="form-group">
                                        <label for="example-username" class="col-md-12">Tanggal Lahir</label>
                                        <div class="col-md-12">
                                            <input type="tangallahir" placeholder="Please input tanggal lahir"
                                                class="form-control pl-0 form-control-line" name="tanggallahir_dataguru"
                                                id="example-username" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12 mb-0">Select Status</label>
                                        <div class="col-sm-12">
                                            <select class="form-control pl-0 form-control-line" name="status_dataguru">
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