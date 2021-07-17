@extends('layout/index')
@section('konten')


<div id="content">
                <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Waktu Presensi</h3>
                        <p class="animated fadeInDown">
                          Form <span class="fa-angle-right fa"></span> Waktu Presensi
                        </p>
                    </div>
                  </div>
                </div>
                <div class="form-element">
                  <div class="col-md-12 padding-0">
                    <div class="col-md-12">
                      <div class="panel form-element-padding">
                        <div class="panel-heading">
                         <h4>Waktu Presensi</h4>
                        </div>
                         <div class="panel-body" style="padding-bottom:30px;">
                          <div class="col-md-12">

                            @foreach ($HARI_KERJA as $HARI_KERJA)

                            <form class="form-horizontal form-material" role="form" action="updatewaktupresensi" method="post">
                                   
                                    {{ @csrf_field() }}
                                    <div class="form-group">
                                        <label for="example-id" class="col-md-12">ID Hari Kerja</label>
                                        <div class="col-md-12">
                                            <input type="id" placeholder="Auto ID"
                                                class="form-control pl-0 form-control-line" name="ID_HARI"
                                                id="ID_HARI" required value=" {{ $HARI_KERJA->ID_HARI }}" readonly>
                                        </div>
                                    </div>   
                                    <div class="form-group">
                                        <label for="example-id" class="col-md-12">Nama Hari Kerja</label>
                                        <div class="col-md-12">
                                            <input type="id" placeholder="Auto ID"
                                                class="form-control pl-0 form-control-line" name="NAMA_HARI"
                                                id="NAMA_HARI" required value=" {{ $HARI_KERJA->NAMA_HARI }}" readonly>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-sm-12 mb-0">Select Status Kerja</label>
                                        <div class="col-sm-12">
                                            <select name="STATUS_KERJA" id="STATUS_KERJA" class="form-control mb-3 mb-3">
                                            @if($HARI_KERJA->STATUS_KERJA==0)
                                            <option selected value="0">LIBUR</option>
                                            <option value='1'>KERJA</option>
                                            @else
                                            <option value="0">LIBUR</option>
                                            <option selected value='1'>KERJA</option>
                                            @endif
                                            </select>
                                        </div> 
                                    </div>    
                                    <div class="form-group">
                                        <label for="example-id" class="col-md-12">Batas Waktu Check In Awal</label>
                                        <div class="col-md-12">
                                            <input type="id" placeholder="Auto ID"
                                                class="form-control pl-0 form-control-line" name="MASUK_AWAL"
                                                id="MASUK_AWAL" required value=" {{ $HARI_KERJA->MASUK_AWAL }}">
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="example-id" class="col-md-12">Batas Waktu Check In Akhir</label>
                                        <div class="col-md-12">
                                            <input type="id" placeholder="Auto ID"
                                                class="form-control pl-0 form-control-line" name="MASUK_AKHIR"
                                                id="MASUK_AKHIR" required value=" {{ $HARI_KERJA->MASUK_AKHIR }}">
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="example-id" class="col-md-12">Batas Waktu Check Out Awal</label>
                                        <div class="col-md-12">
                                            <input type="id" placeholder="Auto ID"
                                                class="form-control pl-0 form-control-line" name="KELUAR_AWAL"
                                                id="KELUAR_AWAL" required value=" {{ $HARI_KERJA->KELUAR_AWAL }}">
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="example-id" class="col-md-12">Batas Waktu Check Out Awal</label>
                                        <div class="col-md-12">
                                            <input type="id" placeholder="Auto ID"
                                                class="form-control pl-0 form-control-line" name="KELUAR_AKHIR"
                                                id="KELUAR_AKHIR" required value=" {{ $HARI_KERJA->KELUAR_AKHIR }}">
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