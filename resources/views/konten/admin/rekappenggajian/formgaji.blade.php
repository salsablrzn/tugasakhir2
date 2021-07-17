@extends('layout/index')
@section('konten')

    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Penggajian</h3>
                    <p class="animated fadeInDown">
                        <span class="fa-angle-right fa"></span> Penggajian <span class="fa-angle-right fa"></span>Form
                        Penggajian
                    </p>
                </div>
            </div>
        </div>
        <div class="form-element">
            <div class="col-md-12 padding-0">
                <div class="col-md-12">
                    <div class="panel form-element-padding">
                        <div class="panel-heading">
                            <h4>Form Penggajian</h4>
                        </div>
                        <div class="panel-body" style="padding-bottom:30px;">
                            <div class="col-md-12">
                                <div class="container-fluid">

                                    <div class="card">
                                        <form class="form-horizontal form-material"
                                            action="{{ url('admin/penggajian/savegaji') }}" method="post">
                                            {{ @csrf_field() }}

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Pilih Pegawai</label>
                                                            <select class="form-control"
                                                                onchange="getdata(this.options[this.selectedIndex].value)"
                                                                name="id_pegawai" required
                                                                style="margin-top: 0px!important;">
                                                                <option value="">Pilih Pegawai</option>
                                                                @foreach ($data as $item)
                                                                    <option value="{{ $item->ID_PEGAWAI }}">
                                                                        {{ $item->NAMA_PEGAWAI }}</option>

                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="">Gaji Bulan</label>
                                                            <h5>{{ Helper::bulantahun($tdy) }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="panelmessage" style="visibility: hidden; display: none;">
                                                <div class="alert alert-danger" role="alert">
                                                        <h4 class="alert-heading">Informasi</h4>


                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <p>Karyawan yang anda pilih tidak memiliki riwayat presensi..</p>
                                                    </div>
                                                </div>
                                                <div class="row" id="paneldetail" style="visibility: hidden;">
                                                    <div class="col-md-12">
                                                        <h4>Informasi Gaji Karyawan Bulan Ini</h4>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="">Gaji Pokok</label>
                                                            <h5 id="txtgajipokok">-</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="">Tunjangan per hari</label>
                                                            <h5 id="txttunjanganharian">-</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="">Total Tunjangan Bulan Ini</label>
                                                            <h5 id="txttotaltunjangan">-</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="">Total Gaji Kotor</label>
                                                            <h5 id="txtgajikotor">-</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="">Potongan Tunjangan <code>Dalam
                                                                    Persen</code></label><br>
                                                            <input onchange="handleChangePotongan(event)" onkeyup="handleChangePotongan(event)" type="number"
                                                                step="any" min="0" value="" class="form-control"
                                                                name="potongan" id="potongan">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="">Total Gaji Bersih</label>
                                                            <h5 id="txtgajibersih">-</h5>
                                                        </div>
                                                    </div>
                                            <div class="card-footer col-md-12">

                                                <button id="submitdata" value="SimpanData"
                                                    style="margin-top:10px; float: right;" type="submit"
                                                    class="btn btn-success">Simpan Data</button>
                                            </div>
                                                </div>

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

    <script src="{{ asset('asset/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type='text/javascript'>
        var gajibulanan = 0,
            totaltunjangan = 0,
            potongan = 0,
            tunjanganharian = 0,
            totalkotor = 0,
            totalbersih = 0;

        function getdata(select_item) {
            try {
                document.getElementById("panelmessage").style.visibility = 'hidden'
                document.getElementById("panelmessage").style.display = 'none'
                
                document.getElementById("paneldetail").style.visibility = 'hidden'
                $.ajax({
                    type: 'post',
                    url: "{{ url('api/getdetailgaji') }}",
                    dataType: "JSON",
                    data: {
                        id_pegawai: select_item
                    },
                    success: function(data) {
                        if (select_item != "") {
                            console.log(data);
                            document.getElementById("paneldetail").style.visibility = 'visible'
                            var dataku = data.data
                            gajibulanan = parseInt(data.pegawai.GAJI_POKOK)
                            tunjanganharian = parseInt(data.pegawai.TUNJANGAN)
                            totaltunjangan = (dataku == null || dataku.TOTAL_TUNJANGAN == null ? 0 : parseInt(dataku.TOTAL_TUNJANGAN))
                            // document.getElementById("potongan").value = "0"
                            potongan = 0
                            buatview()
                        if (data.data == null) {
                            document.getElementById("panelmessage").style.visibility = 'visible'
                            document.getElementById("panelmessage").style.display = 'block'
                            
                            // document.getElementById("paneldetail").style.visibility = 'hidden'
                        }
                        }
                    }
                });
            } catch (error) {
                console.log(error);
            }
        }
        function handleChangePotongan(event) {
            console.log(event.target.value);
            if (event.target.value != "") {
                
            potongan = parseInt(bersihkan(event.target.value))
            buatview()
            }
        }

        function buatview() {
            console.log(gajibulanan, totaltunjangan);
            totalkotor = totaltunjangan + gajibulanan
            totalbersih = totalkotor - (potongan == 0 ? 0 : (potongan / 100) * totaltunjangan);
            document.getElementById("txtgajipokok").innerHTML = 'Rp ' + formatrupiah(gajibulanan)
            document.getElementById("txttunjanganharian").innerHTML = 'Rp ' + formatrupiah(tunjanganharian)
            document.getElementById("txttotaltunjangan").innerHTML = 'Rp ' + formatrupiah(totaltunjangan)
            document.getElementById("txtgajikotor").innerHTML = 'Rp ' + formatrupiah(totalkotor)
            document.getElementById("txtgajibersih").innerHTML = 'Rp ' + formatrupiah(totalbersih)
        }

        function tanggalbulan(tgl) {

            try {
                var explode = tgl.split('-');
                var thn = explode[0];
                var bln = explode[1];
                var listbulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ];

                var harinya = listbulan[parseInt(bln)] + ' ' + thn;
                return harinya;
            } catch (error) {
                return "";
            }
        }

        function bersihkan(angkanya) {
            try {
                var res = angkanya;
                res = res.replace('.', '');
                res = res.replace('.', '');
                res = res.replace('.', '');
                res = res.replace('.', '');
                return res;
            } catch (error) {
                return angkanya
            }
        }

        function tanggalku(tgl) {

            try {
                var explode = tgl.split('-');
                var thn = explode[0];
                var bln = explode[1];
                var hari = explode[2];
                var listbulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ];

                var harinya = hari + ' ' + listbulan[parseInt(bln)] + ' ' + thn;
                return harinya;
            } catch (error) {
                return "";
            }
        }

        function waktu(tglku) {
            try {
                var tgl = tglku.split(' ')
                var explode = tgl[0].split('-');
                var thn = explode[0];
                var bln = explode[1];
                var hari = explode[2];
                var listbulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ];

                var harinya = hari + ' ' + listbulan[parseInt(bln)] + ' ' + thn + ' ' + tgl[1];
                return harinya;
            } catch (error) {
                return "";
            }
        }

        function formatrupiah(bilangan) {

            try {
                if (bilangan < 0) {
                    var reverse = bilangan.toString().split('').reverse().join(''),
                        ribuan = reverse.match(/\d{1,3}/g);
                    ribuan = '-' + ribuan.join('.').split('').reverse().join('');
                } else {
                    var reverse = bilangan.toString().split('').reverse().join(''),
                        ribuan = reverse.match(/\d{1,3}/g);
                    ribuan = ribuan.join('.').split('').reverse().join('');
                }

                return ribuan;

            } catch (error) {
                console.log(error);
                return bilangan
            }
        }

    </script>



@endsection
