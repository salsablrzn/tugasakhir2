@extends('layout/index')
@section('konten')

<div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Waktu Presensi</h3>
                        <p class="animated fadeInDown">
                          Table <span class="fa-angle-right fa"></span> Waktu Presensi
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
                                               
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                       <thead>
                                            <tr>
                                                <th class="border-top-0">ID Hari Kerja</th>
                                                <th class="border-top-0">Nama Hari Kerja</th>
                                                <th class="border-top-0">Status Kerja</th>
                                                <th class="border-top-0">Batas Check In Awal</th>
                                                <th class="border-top-0">Batas Check In Akhir</th>
                                                <th class="border-top-0">Batas Check Out Awal</th>
                                                <th class="border-top-0">Batas Check Out Akhir</th>
                                                <th class="border-top-0">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            
                                            @foreach($HARI_KERJA as $HARI)
                                              <tr>
                                                <td>{{ $HARI -> ID_HARI }}</td>
                                                <td>{{ $HARI -> NAMA_HARI }}</td>                                       
                                                @if($HARI->STATUS_KERJA == 1)
                                                <td><span class="">KERJA</span></td>
                                                @else
                                                <td><span class="">LIBUR</span></td>
                                                @endif   

                                                <td>{{ $HARI -> MASUK_AWAL }}</td>
                                                <td>{{ $HARI -> MASUK_AKHIR }}</td>
                                                <td>{{ $HARI -> KELUAR_AWAL }}</td>
                                                <td>{{ $HARI -> KELUAR_AKHIR }}</td>                                           
                                                                                    
                                                <td class="glyphicon glyphicon-pencil" style="padding: 5px"><a href="editwaktupresensi{{ $HARI -> ID_HARI }}">Edit</td>
                                            @endforeach 

                                        </tbody>

                        </table>
                      </div>
                  </div>
                </div>
              </div>  
              </div>
            </div>


@endsection