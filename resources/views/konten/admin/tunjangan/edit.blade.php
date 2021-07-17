@extends('layout/index')
@section('konten')


<div id="content">
                <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Data Tunjangan</h3>
                        <p class="animated fadeInDown">
                          Edit <span class="fa-angle-right fa"></span> Data Tunjangan
                        </p>
                    </div>
                  </div>
                </div>
                <div class="form-element">
                  <div class="col-md-12 padding-0">
                    <div class="col-md-12">
                      <div class="panel form-element-padding">
                        <div class="panel-heading">
                         <h4>Data Tunjangan</h4>
                        </div>
                         <div class="panel-body" style="padding-bottom:30px;">
                          <div class="col-md-12">

                            @foreach ($TUNJANGAN as $TUNJANG)

                            <form class="form-horizontal form-material" role="form" action="updatetunjangan" method="post">
                                   
                                    {{ @csrf_field() }}
                                     <div class="form-group">
                                        <label for="example-id" class="col-md-12">ID Tunjangan</label>
                                        <div class="col-md-12">
                                            <input type="id" placeholder="Auto ID"
                                                class="form-control pl-0 form-control-line" name="ID_TUNJANGAN"
                                                id="ID_TUNJANGAN" disabled="" required value=" {{ $TUNJANG->ID_TUNJANGAN }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12 mb-0">Nama Golongan</label>
                                        <div class="col-sm-12">
                                        <select class="form-control pl-0 form-control-line" id="ID_GOLONGAN" name="ID_GOLONGAN">
                                            
                                          @foreach($GOLONGAN as $G) 
                                          <option value=" {{ $G->ID_GOLONGAN}}" selected>
                                            {{ $G->NAMA_GOLONGAN}}
                                          </option>
                                          @endforeach
                                            </select>  
                                        </div>
                                      </div>  
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Nama Tunjangan</label>
                                        <div class="col-md-12">
                                            <input type="name" placeholder="Please input nama tunjangan"
                                                class="form-control pl-0 form-control-line" name="NAMA_TUNJANGAN"
                                                id="NAMA_TUNJANGAN" required value=" {{ $TUNJANG->NAMA_TUNJANGAN }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Nominal Tunjangan</label>
                                        <div class="col-md-12">
                                            <input type="name" placeholder="Please input nominal tunjangan"
                                                class="form-control pl-0 form-control-line" name="NOMINAL_TUNJANGAN"
                                                id="NOMINAL_TUNJANGAN" required value=" {{ $TUNJANG->NOMINAL_TUNJANGAN }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Potongan Tunjangan</label>
                                        <div class="col-md-12">
                                            <input type="name" placeholder="Please input potongan tunjangan"
                                                class="form-control pl-0 form-control-line" name="POTONGAN_TUNJANGAN"
                                                id="POTONGAN_TUNJANGAN" required value=" {{ $TUNJANG->POTONGAN_TUNJANGAN}}">
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