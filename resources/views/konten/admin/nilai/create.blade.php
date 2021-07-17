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
                                        <label for="example-id" class="col-md-12">ID Nilai</label>
                                        <div class="col-md-12">
                                            <input type="id" placeholder="Auto ID"
                                                class="form-control pl-0 form-control-line" name="ID_NILAI"
                                                id="ID_NILAI" disabled="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Nilai</label>
                                        <div class="col-md-12">
                                            <input type="name" placeholder="Please input nilai"
                                                class="form-control pl-0 form-control-line" name="NILAI"
                                                id="NILAI" required>
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