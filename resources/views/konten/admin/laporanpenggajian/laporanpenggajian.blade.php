@extends('layout/index')
@section('konten')

<div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Laporan Penggajian</h3>
                        <p class="animated fadeInDown">
                          Table <span class="fa-angle-right fa"></span> Laporan Penggajian
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

                        <!-- <a href="admincreatedataakun" class="btn btn-success d-none d-md-inline-block text-white" target="_blank">Add TU</a> -->

                        <br><br>

                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                                             <tr>
                                                <th class="border-top-0">No.</th>
                                                <th class="border-top-0">NIP</th>
                                                <th class="border-top-0">Nama Pegawai</th>
                                                <th class="border-top-0">Jabatan</th>
                                                <th class="border-top-0">Jumlah Gaji Keseluruhan</th>
                                                <th class="border-top-0">Status</th>
                                                <th class="border-top-0">Action</th>
                                            </tr>
                                        </thead>
                        </table>
                      </div>
                  </div>
                </div>
              </div>  
              </div>
            </div>

@endsection