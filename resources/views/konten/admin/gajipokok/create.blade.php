@extends('layout/index')
@section('konten')

<div id="content">
                <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Data Gaji Pokok</h3>
                        <p class="animated fadeInDown">
                          Form <span class="fa-angle-right fa"></span> Data Gaji Pokok
                        </p>
                    </div>
                  </div>
                </div>
                <div class="form-element">
                  <div class="col-md-12 padding-0">
                    <div class="col-md-12">
                      <div class="panel form-element-padding">
                        <div class="panel-heading">
                         <h4>Data Gaji Pokok</h4>
                        </div>
                         <div class="panel-body" style="padding-bottom:30px;">
                          <div class="col-md-12">
                            
                            <form class="form-horizontal form-material" action="storegajipokok" method="post">
                                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                                    {{ @csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-sm-12 mb-0">Golongan</label>
                                        <div class="col-sm-12">
                                        <select class="form-control pl-0 form-control-line" name="ID_DETAIL_GOLONGAN">
                                            <option disabled selected style="padding: 10px">Select Golongan</option>
                                            @foreach($detail as $d)
                                            <option value="{{ $d->ID_DETAIL_GOLONGAN }}">{{$d->NAMA_GOLONGAN}} {{$d->NILAI}}</option>
                                            @endforeach
                                            </select>  
                                        </div>
                                      </div>
                        
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Nama Gaji Pokok</label>
                                        <div class="col-md-12">
                                            <input type="name" placeholder="Please input nama gaji pokok"
                                                class="form-control pl-0 form-control-line" name="NAMA_GAJI_POKOK"
                                                id="NAMA_GAJI_POKOK" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Massa Kerja</label>
                                        <div class="col-md-12">
                                            <input type="number" placeholder="Please input massa kerja"
                                                class="form-control pl-0 form-control-line" name="MASSA_KERJA"
                                                id="MASSA_KERJA" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Nominal Gaji Pokok</label>
                                        <div class="col-md-12">
                                            <input type="number" placeholder="Please input nominal gaji pokok"
                                                class="form-control pl-0 form-control-line" name="NOMINAL_GAJI_POKOK"
                                                id="NOMINAL_GAJI_POKOK" required>
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

  @if (session('success'))
  <script>
      Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Data Karyawan Berhasil Disimpan',
          showConfirmButton: false,
          timer: 2000
      }); 
  </script>
  @endif

@endsection