@extends('layout/index')
@section('konten')

<div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Data Nilai</h3>
                        <p class="animated fadeInDown">
                          Table <span class="fa-angle-right fa"></span> Data Nilai
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
                        <a href="createpenggajian" class="btn btn-success d-none d-md-inline-block text-white" target="_blank">Add Nilai</a>
                        @endif
                       
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                       <thead>
                                            <tr>
                                                <th class="border-top-0">NIP</th>
                                                <th class="border-top-0">Nama Pegawai</th>
                                                <th class="border-top-0">Lama Kerja</th>
                                                <th class="border-top-0">Golongan</th>
                                                <th class="border-top-0">Gaji Pokok</th>
                                                <th class="border-top-0">Tunjangan</th>
                                                <th class="border-top-0">Potongan Tunjangan</th>
                                                <th class="border-top-0">Total Tunjangan</th>
                                                <th class="border-top-0">Total Penggajian</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            
                                           

                                        </tbody>

                        </table>
                      </div>
                  </div>
                </div>
              </div>  
              </div>
            </div>


@endsection