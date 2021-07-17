@extends('layout/index')
@section('konten')

    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Presensi {{ $tipe }}</h3>
                    <p class="animated fadeInDown">
                        Form <span class="fa-angle-right fa"></span> Presensi Hari Ini <span
                            class="fa-angle-right fa"></span> Presensi {{ $tipe }}
                    </p>
                </div>
            </div>
        </div>
        <div class="form-element">
            <div class="col-md-12 padding-0">
                <div class="col-md-12">
                    <div class="panel form-element-padding">
                        <div class="panel-heading">
                            <h4>Presensi {{ $tipe }}</h4>
                        </div>
                        <div class="panel-body" style="padding-bottom:30px;">
                            <div class="col-md-12">
                                <div class="container-fluid">
                                    <!-- ============================================================== -->
                                    <!-- Start Page Content -->
                                    <!-- ============================================================== -->
                                    <!-- Row -->
                                    <div class="row">
                                        <!-- Column -->

                                        <!-- Column -->
                                        <!-- Column -->
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form class="form-horizontal form-material"
                                                        action="{{url('pegawai/presensi/savepresensi')}}" method="post">
                                                        {{ @csrf_field() }}

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">

                                                                    <p>Silahkan Pilih Daftar Hadir :</p>

                                                                    <div>
                                                                        <input type="radio" id="hadir" name="status"
                                                                            value="Hadir" checked>
                                                                        <label for="hadir">Hadir</label>
                                                                    </div>

                                                                    <div>
                                                                        <input type="radio" id="sakit" name="status"
                                                                            value="Sakit">
                                                                        <label for="sakit">Sakit</label>
                                                                    </div>

                                                                    <div>
                                                                        <input type="radio" id="izin" name="status"
                                                                            value="Izin">
                                                                        <label for="izin">Izin</label>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="col-md-12 mb-0">Keterangan</label><br>
                                                                    <textarea class="form-control" name="keterangan"></textarea>

                                                                </div>
                                                            </div>
                                                        </div>
                                                            <div class="col-md-12">

                                                                <div class="form-group">
                                                                    <label class="">Foto</label><br>
                                                                    <div id="wrap" class="col-md-12">
                                                                        <img src="" id="img" name="img" required="required">
                                                                        <input id="foto" name="foto" type="hidden" value=""
                                                                            required>
                                                                    </div>

                                                                </div>

                                                            </div>




                                                        <div>

                                                            <button type="button" onclick="btn_ambilFoto()"
                                                                style="margin-top:10px;" class="btn btn-primary"
                                                                data-toggle="modal" data-target="#exampleModalCenter">Ambil
                                                                Foto</button>

                                                            <button id="submitdata" disabled="true" value="SimpanData" style="margin-top:10px;"
                                                                type="submit" class="btn btn-success">Submit</button>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Column -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModalCenter" tabrekappresensi="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="float:center;">
                <div class="modal-content" style="width:800px; margin-left:50px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="margin-top:5px; margin-left:10px;">Ambil
                            Foto
                            </h3>
                            <button type="button" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div id="kamera"></div>
                        <div id="results" style="float:right; margin-top:-240px; margin-right:0px;"></div>
                        <button id="btn_kamera" type="button" onclick="take_snapshot()" class="btn btn-primary"><i
                                class="fa fa-camera fa-lg" style="float:center;"></i></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="save" class="btn btn-primary simpan-foto" data-dismiss="modal">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div>

        <style>
            #kamera {
                width: 320px;
                height: 240px;
                border: 1px solid #ccc;
                margin-left: 50px;
            }

            #wrap {
                width: 320px;
                height: 240px;
                border: 1px solid #ccc;
            }

            #btn_kamera {
                margin-top: 10px;
                margin-left: 105px;
            }

        </style>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"
            integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw=="
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"
            integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw=="
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>

        <script>
            Webcam.set({
                width: 320,
                height: 240,
                image_format: 'jpeg',
                jpeg_quality: 90
            })

            function btn_ambilFoto() {
                Webcam.attach("#kamera")
            }

            function take_snapshot() {
                Webcam.snap(function(data_uri) {
                    document.getElementById('results').innerHTML =
                        '<img id="hasil" src="' + data_uri + '"/>';
                });

                var hasil = $('#hasil').attr('src');
                $('#save').click(function() {
                    $('#img').attr('src', hasil);
                    $('#foto').val(hasil);
                    document.getElementById("submitdata").disabled = false;

                });
            }

        </script>

    @endsection
