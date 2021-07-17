@extends('layout/index')
@section('konten')


<div id="content">
                <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Data Golongan</h3>
                        <p class="animated fadeInDown">
                          Edit <span class="fa-angle-right fa"></span> Data Golongan
                        </p>
                    </div>
                  </div>
                </div>
                <div class="form-element">
                  <div class="col-md-12 padding-0">
                    <div class="col-md-12">
                      <div class="panel form-element-padding">
                        <div class="panel-heading">
                         <h4>Data Golongan</h4>
                        </div>
                         <div class="panel-body" style="padding-bottom:30px;">
                          <div class="col-md-12">

                            @foreach ($GOLONGAN as $GOLONGAN)

                            <form class="form-horizontal form-material" role="form" action="updategolongan" method="post">
                                   
                                    {{ @csrf_field() }}
                                    <div class="form-group">
                                        <label for="example-id" class="col-md-12">ID Pegawai</label>
                                        <div class="col-md-12">
                                            <input type="id" placeholder="Auto ID"
                                                class="form-control pl-0 form-control-line" name="ID_GOLONGAN"
                                                id="ID_GOLONGAN" required value=" {{ $GOLONGAN->ID_GOLONGAN}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Nama Golongan</label>
                                        <div class="col-md-12">
                                            <input type="name" placeholder="Please input nama golongan"
                                                class="form-control pl-0 form-control-line" name="NAMA_GOLONGAN"
                                                id="NAMA_GOLONGAN" required value=" {{ $GOLONGAN->NAMA_GOLONGAN }}">
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