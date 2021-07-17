@extends('layout/index')
@section('konten')


<div id="content">
                <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Data Tunjangan</h3>
                        <p class="animated fadeInDown">
                          Form <span class="fa-angle-right fa"></span> Data Tunjangan
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
                            
                            <form class="form-horizontal form-material" action="storetunjangan" method="post">
                                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                                    {{ @csrf_field() }}
                                    <div class="form-group">
                                        <label for="example-id" class="col-md-12">ID Tunjangan</label>
                                        <div class="col-md-12">
                                            <input type="id" placeholder="Auto ID"
                                                class="form-control pl-0 form-control-line" name="ID_TUNJANGAN"
                                                id="ID_TUNJANGAN" disabled="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12 mb-0">Nama Golongan</label>
                                        <div class="col-sm-12">
                                        <select class="form-control pl-0 form-control-line" name="ID_GOLONGAN">
                                            <option disabled selected style="padding: 10px">Select Nama Golongan</option>
                                            @foreach($golongan as $key => $value)
                                          <option value="{{ $key }}">{{ $value }}
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
                                                id="NAMA_TUNJANGAN" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-nama" class="col-md-12">Nominal Tunjangan</label>
                                        <div class="col-md-12">
                                            <input type="number" placeholder="Please input nominal tunjangan"
                                                class="form-control pl-0 form-control-line" name="NOMINAL_TUNJANGAN"
                                                id="NOMINAL_TUNJANGAN" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="">Potongan Tunjangan <code>Dalam
                                                    Persen</code></label><br>
                                            <input type="number"
                                            step="any" min="0" class="form-control"
                                            name="potongan" id="potongan">
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
          title: 'Data Tunjangan Berhasil Disimpan',
          showConfirmButton: false,
          timer: 2000
      }); 
  </script>
  @endif

@endsection