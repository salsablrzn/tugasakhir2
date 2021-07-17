@extends('layout/index')
@section('konten')

    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Riwayat Presensi</h3>
                    <p class="animated fadeInDown">
                        {{-- Table <span class="fa-angle-right fa"></span>Presensi --}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading" id="titlepage">
                        <h3>{{$title}}</h3>
                    </div>
                    <div class="panel-body">
                            <div class="panel-body">
                                 <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Pilih Bulan<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select class="form-control required select2" onchange="getdata(this.options[this.selectedIndex].value)" name="pilihbulan" id="pilihbulan">
                                                    <option value="">Filter Berdasarkan Bulan</option>
                                                    <?php
                                                    $bln = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                                                    foreach ($history as $db) {
                                                        $bulan = $db['bulan'];
                                                        if ($bulan < 10) {
                                                            $bulan = "0" . $bulan;
                                                        }
                                                        echo "<option value='$db[tahun]-$bulan'>" . $bln[(int)$db['bulan']] . '-' . $db['tahun'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>

                        <div class="row">
                            <div class="col-md-6 m-b-10">
                                <div id="tempatbtn">
                                    <a target="_blank" href="{{url("admin/rekapabsensiexcel/$tdy")}}" style="margin-right:10px; margin-bottom: 10px;" class="btn btn-success"><i class="fa fa-file-excel"></i> Export To Excel</a>
                                </div>
                            </div>
                        </div>
                            <br><br>
                        <div class="responsive-table" id="tmpdata">


                            <table id="datatables-example" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th class="border-top-0 text-center" rowspan="2">No</th>
                                        <th class="border-top-0 text-center" rowspan="2">Nama Pegawai</th>
                                        <th class="border-top-0 text-center" rowspan="2">Bulan</th>
                                        <th class="border-top-0 text-center" colspan="4">Absen Masuk</th>
                                        <th class="border-top-0 text-center" colspan="4">Absen keluar</th>
                                        <th class="border-top-0 text-center" rowspan="2">Total Tunjangan</th>
                                    </tr>
                                    <tr>
                                        
                                        <th class="border-top-0 text-center">Hadir</th>
                                        <th class="border-top-0 text-center">Ijin</th>
                                        <th class="border-top-0 text-center">Sakit</th>
                                        <th class="border-top-0 text-center">Telat/Tidak Absen</th>
                                        
                                        <th class="border-top-0 text-center">Hadir</th>
                                        <th class="border-top-0 text-center">Ijin</th>
                                        <th class="border-top-0 text-center">Sakit</th>
                                        <th class="border-top-0 text-center">Telat/Tidak Absen</th>
                                    </tr>
                                </thead>

                                <tbody>
                                  @foreach ($data as $item)
                                      <tr>
                                        
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->NAMA_PEGAWAI}}</td>
                                        <td>{{Helper::bulantahun($tdy)}}</td>
                                        <td>{{($item->Hadirmasuk)}}</td>
                                        <td>{{($item->Izinmasuk)}}</td>
                                        <td>{{($item->Sakitmasuk)}}</td>
                                        <td>{{($item->Telatmasuk)}}</td>
                                        <td>{{($item->Hadirkeluar)}}</td>
                                        <td>{{($item->Izinkeluar)}}</td>
                                        <td>{{($item->Sakitkeluar)}}</td>
                                        <td>{{($item->Telatkeluar)}}</td>
                                        <td>{{Helper::price($item->TOTAL_TUNJANGAN)}}</td>
                                      </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <script src="{{asset('asset/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script type='text/javascript'>
    function getdata(select_item) {
        $.ajax({
            type: 'post',
            url: '{{url("api/getrekappresensi")}}',
            dataType: "JSON",
            data: {
                bulan: select_item
            },
            success: function(data) {
                console.log(data);
                var html = '<table id="datatables-example" class="table table-striped table-bordered" width="100%">'+
                            '<thead> <tr> <th class="border-top-0 text-center" rowspan="2">No</th> <th class="border-top-0 text-center" rowspan="2">Nama Pegawai</th> <th class="border-top-0 text-center" rowspan="2">Bulan</th> <th class="border-top-0 text-center" colspan="4">Absen Masuk</th> <th class="border-top-0 text-center" colspan="4">Absen keluar</th> <th class="border-top-0 text-center" rowspan="2">Total Tunjangan</th> </tr> <tr> <th class="border-top-0 text-center">Hadir</th> <th class="border-top-0 text-center">Ijin</th> <th class="border-top-0 text-center">Sakit</th> <th class="border-top-0 text-center">Telat/Tidak Absen</th> <th class="border-top-0 text-center">Hadir</th> <th class="border-top-0 text-center">Ijin</th> <th class="border-top-0 text-center">Sakit</th> <th class="border-top-0 text-center">Telat/Tidak Absen</th> </tr> </thead><tbody>';
                data.data.forEach((element, index) => {
                  html += "<tr><td>"+ (index+1).toString() +'</td>'
                  html += "<td>"+ element.NAMA_PEGAWAI +'</td>'
                  html += "<td>"+ tanggalbulan(data.tdy) +'</td>'
                  html += "<td>"+ (element.Hadirmasuk).toString() +'</td>'
                  html += "<td>"+ (element.Izinmasuk).toString() +'</td>'
                  html += "<td>"+ (element.Sakitmasuk).toString() +'</td>'
                  html += "<td>"+ (element.Telatmasuk).toString() +'</td>'
                  html += "<td>"+ (element.Hadirkeluar).toString() +'</td>'
                  html += "<td>"+ (element.Izinkeluar).toString() +'</td>'
                  html += "<td>"+ (element.Sakitkeluar).toString() +'</td>'
                  html += "<td>"+ (element.Telatkeluar).toString() +'</td>'
                  html += "<td>Rp "+ formatrupiah(element.TOTAL_TUNJANGAN) +'</td></tr>'
                });
                html += '</tbody></table>'
                console.log(html)
                document.getElementById("tmpdata").innerHTML =html
                $('#datatables-example').DataTable();
                document.getElementById('tempatbtn').innerHTML = '<a target="_blank" href="{{url("admin/rekapabsensiexcel/")}}/' + select_item + '" style="margin-right:10px; margin-bottom: 10px;" class="btn btn-success"><i class="fa fa-file-excel"></i> Export To Excel</a>';

                document.getElementById("titlepage").innerHTML = '<h3>'+data.title+'</h3>'
                
                
            }
        });
    }

    function printDiv() {
        var printContents = document.getElementById("iniprint").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }

    function tanggalbulan(tgl) {

      try {
        var explode = tgl.split('-');
        var thn = explode[0];
        var bln = explode[1];
        var listbulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        var harinya = listbulan[parseInt(bln)] + ' ' + thn;
        return harinya;
      } catch (error) {
        return "";
      }
    }
    function tanggalku(tgl) {

      try {
        var explode = tgl.split('-');
        var thn = explode[0];
        var bln = explode[1];
        var hari = explode[2];
        var listbulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

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
        var listbulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        var harinya = hari + ' ' + listbulan[parseInt(bln)] + ' ' + thn +' '+tgl[1];
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
          return ""
        }
    }
</script>

@endsection
