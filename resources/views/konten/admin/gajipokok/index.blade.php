@extends('layout/index')
@section('konten')

<div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Data Gaji Pokok</h3>
                        <p class="animated fadeInDown">
                          Table <span class="fa-angle-right fa"></span> Data Gaji Pokok
                        </p>
                    </div>
                  </div>
              </div>
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Data Tables</h3>
                    </div>
                    <div class="panel-body">
                      <div class="responsive-table">
                       
                        @if (session()->get('TIPE_AKUN') == "ADMIN")
                        <a href="creategajipokok" class="btn btn-success d-none d-md-inline-block text-white" target="_blank">Add Gaji Pokok</a>
                        @endif
                       
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                       <thead>
                                            <tr>
                                                <th class="border-top-0">ID Gaji Pokok</th>
                                                <th class="border-top-0">GOLONGAN</th>
                                                <th class="border-top-0">NAMA_GAJI_POKOK</th>
                                                <th class="border-top-0">MASSA_KERJA</th>
                                                <th class="border-top-0">NOMINAL_GAJI_POKOK</th>
                                                <th class="border-top-0">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            
                                            @foreach($GAJI_POKOK as $GAJI)
                                              <tr>
                                                <td>{{ $GAJI -> ID_GAJU_UTAMA}}</td>
                                                <td>{{ $GAJI -> NAMA_GOLONGAN }} {{ $GAJI -> NILAI }}</td>
                                                <td>{{ $GAJI -> NAMA_GAJI_UTAMA }}</td>
                                                <td>{{ $GAJI -> MASSA_KERJA}}</td>
                                                <td>{{ $GAJI -> NOMINAL_GAJI_UTAMA }}</td>
                                                @if (session()->get('TIPE_AKUN') == "ADMIN")                                         
                                                <td class="glyphicon glyphicon-pencil" style="padding: 5px"><a href="editgajipokok{{ $GAJI -> ID_GAJU_UTAMA }}">Edit</td>
                                                @endif
                                            @endforeach 

                                        </tbody>

                        </table>
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