@extends('layout/index')
@section('konten')

<div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Data Pegawai</h3>
                        <p class="animated fadeInDown">
                          Table <span class="fa-angle-right fa"></span> Data Pegawai
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
                        <a href="admincreatedatapegawai" class="btn btn-success d-none d-md-inline-block text-white" target="_blank">Add Pegawai</a>
                        @endif
                       
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                       <thead>
                                            <tr>
                                                <th class="border-top-0">ID Pegawai</th>
                                                <th class="border-top-0">Nama Jabatan</th>
                                                <th class="border-top-0" width="120">NIP</th>
                                                <th class="border-top-0" width="150">Nama Pegawai</th>
                                                <th class="border-top-0" width="90">Username</th>
                                                <th class="border-top-0" width="50">Jenis Kelamin</th>
                                                <th class="border-top-0" width="80">Status Kepegawaian</th>
                                                <th class="border-top-0" width="200">Alamat</th>
                                                <th class="border-top-0">Telepon</th>
                                                <th class="border-top-0" width="90">Tanggal Lahir</th>
                                                <th class="border-top-0" width="50">Status</th>
                                                @if (session()->get('TIPE_AKUN') == "ADMIN")
                                                <th class="border-top-0">Action</th>
                                                @endif
                                            </tr>
                                        </thead>

                                        <tbody>
                                            
                                            @foreach($PEGAWAI as $PEG)
                                              <tr>
                                                <td>{{ $PEG -> ID_PEGAWAI }}</td>
                                                <td>{{ $PEG -> NAMA_JABATAN }}</td>
                                                <td>{{ $PEG -> NIP }}</td>
                                                <td>{{ $PEG -> NAMA_PEGAWAI }}</td>     
                                                <td>{{ $PEG -> USERNAME }}</td>                                       
                                                @if($PEG->JENIS_KELAMIN == 1)
                                                <td><span class="">P</span></td>
                                                @else
                                                <td><span class="">L</span></td>
                                                @endif                          
                                                <td>{{ $PEG -> STATUS_KEPEGAWAIAN }}</td> 
                                                <td>{{ $PEG -> ALAMAT }}</td>
                                                <td>{{ $PEG -> TELEPON }}</td>
                                                <td>
                                                @php
                                                echo date ("d-m-Y",strtotime ($PEG->TANGGAL_LAHIR));
                                                @endphp  
                                                </td>                                      
                                                @if($PEG->STATUS==0)                                                
                                                <td><span class="badge badge-danger">Non Aktif</span></td>
                                                @endif
                                                @if($PEG->STATUS==1)
                                                <td><span class="badge badge-success">Aktif</span></td>
                                                @endif       
                                                @if (session()->get('TIPE_AKUN') == "ADMIN")                                         
                                                <td class="glyphicon glyphicon-pencil" style="padding: 5px"><a href="admineditdatapegawai{{ $PEG -> ID_PEGAWAI }}">Edit</td>
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


@endsection