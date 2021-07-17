@extends('layout/index')
@section('konten')


<div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Data Akun</h3>
                        <p class="animated fadeInDown">
                          Table <span class="fa-angle-right fa"></span> Data Akun
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

                        <a href="admincreatedataakun" class="btn btn-success d-none d-md-inline-block text-white" target="_blank">Add Akun</a>

                        <br><br>

                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                       <thead>
                                            <tr>
                                                <th class="border-top-0">ID</th>
                                                <th class="border-top-0">Nama Pegawai</th>
                                                <th class="border-top-0">Username</th>
                                                <th class="border-top-0">Password</th>
                                                <th class="border-top-0">Status</th>
                                                <th class="border-top-0">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            
                                            @foreach($dataakun as $AKUN)
                                              <tr>
                                                <td>{{ $AKUN -> id_dataakun }}</td>
                                                <td>{{ $AKUN -> nama_dataakun }}</td>
                                                <td>{{ $AKUN -> username_dataakun }}</td>
                                                <td>{{ $AKUN -> password_dataakun }}</td>
                                                @if($AKUN->status_dataakun == 1)
                                                <td><span class="badge badge-success">Aktif</span></td>
                                                @else
                                                <td><span class="badge badge-danger">Non Aktif</span></td>
                                                @endif                                                
                                                <td class="glyphicon glyphicon-pencil" style="padding: 5px"><a href="admineditdataakun{{ $AKUN -> id_dataakun }}">Edit</td>
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