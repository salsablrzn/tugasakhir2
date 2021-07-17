@extends('layout/index')
@section('konten')

<div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Data Tunjangan</h3>
                        <p class="animated fadeInDown">
                          Table <span class="fa-angle-right fa"></span> Data Tunjangan
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
                        <a href="createtunjangan" class="btn btn-success d-none d-md-inline-block text-white" target="_blank">Add Tunjangan</a>
                        @endif
                                             <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                       <thead>
                                            <tr>
                                                <th class="border-top-0">ID_TUNJANGAN</th>
                                                <th class="border-top-0">ID_GOLONGAN</th>
                                                <th class="border-top-0">NAMA_TUNJANGAN</th>
                                                <th class="border-top-0">NOMINAL_TUNJANGAN</th>
                                                <th class="border-top-0">POTONGAN_TUNJANGAN</th>
                                                <th class="border-top-0">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            
                                            @foreach($TUNJANGAN as $TUNJANG)
                                              <tr>
                                                <td>{{ $TUNJANG -> ID_TUNJANGAN}}</td>
                                                <td>{{ $TUNJANG -> ID_GOLONGAN}}</td>
                                                 <td>{{ $TUNJANG -> NAMA_TUNJANGAN}}</td>
                                                <td>{{ $TUNJANG -> NOMINAL_TUNJANGAN }}</td>
                                                
                                                <td>
                                                 @php
                                                (int)$TUNJANG -> POTONGAN_TUNJANGAN
                                                @endphp
                                                </td>
                                                
                                                
                                                @if (session()->get('TIPE_AKUN') == "ADMIN")                                         
                                                <td class="glyphicon glyphicon-pencil" style="padding: 5px"><a href="edittunjangan{{ $TUNJANG -> ID_TUNJANGAN}}">Edit</td>
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