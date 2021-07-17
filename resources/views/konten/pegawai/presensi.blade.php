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

                            <br><br>
                        <div class="responsive-table" id="tmpdata">


                            <table id="datatables-example" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th class="border-top-0 text-center" rowspan="2">No</th>
                                        <th class="border-top-0 text-center" rowspan="2">Tanggal</th>
                                        <th class="border-top-0 text-center" colspan="3">Presensi Masuk</th>
                                        <th class="border-top-0 text-center" colspan="3">Presensi Pulang</th>
                                        <th class="border-top-0 text-center" rowspan="2">Total Tunjangan</th>
                                    </tr>
                                    <tr>
                                      <td>Status</td>
                                      <td>Foto</td>
                                      <td>Keterangan - Waktu Presensi</td>
                                      <td>Status</td>
                                      <td>Foto</td>
                                      <td>Keterangan - Waktu Presensi</td>
                                    </tr>
                                </thead>

                                <tbody>
                                  @foreach ($data as $item)
                                      <tr>
                                        
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{Helper::tanggal($item->TANGGAL)}}</td>
                                        <td>{{$item->STATUS_MASUK}}</td>
                                        <td><img src="{{$item->FOTO_MASUK}}" class="avatar"/></td>
                                        <td>{!!$item->KETERANGAN_MASUK.' <br>- '. Helper::waktu($item->JAM_MASUK)!!}</td>
                                        <td>{{$item->STATUS_KELUAR}}</td>
                                        <td><img src="{{$item->FOTO_KELUAR}}" class="avatar"/></td>
                                        <td>{!!$item->KETERANGAN_KELUAR.' <br>- '.Helper::waktu($item->JAM_KELUAR)!!}</td>
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
            url: '{{url("api/getriwayatpresensi")}}',
            dataType: "JSON",
            data: {
                bulan: select_item,
                id_pegawai:"{{$id_pegawai}}"
            },
            success: function(data) {
                console.log(data);
                var html = '<table id="datatables-example" class="table table-striped table-bordered" width="100%">'+
                            '<thead><tr><th class="border-top-0 text-center" rowspan="2">No</th><th class="border-top-0 text-center" rowspan="2">Tanggal</th><th class="border-top-0 text-center" colspan="3">Presensi Masuk</th><th class="border-top-0 text-center" colspan="3">Presensi Pulang</th><th class="border-top-0 text-center" rowspan="2">Total Tunjangan</th></tr>'+
                            '<tr><td>Status</td><td>Foto</td><td>Keterangan - Waktu Presensi</td><td>Status</td><td>Foto</td><td>Keterangan - Waktu Presensi</td></tr></thead><tbody>';
                data.data.forEach((element, index) => {
                  html += "<tr><td>"+ (index+1).toString() +'</td>'
                  html += "<td>"+ tanggalku(element.TANGGAL) +'</td>'
                  html += "<td>"+ element.STATUS_MASUK +'</td>'
                  html += "<td><img src='"+ element.FOTO_MASUK +"' class='avatar'/></td>"
                  html += "<td>"+ element.KETERANGAN_MASUK +'<br>- '+waktu(element.JAM_MASUK) +'</td>'
                  html += "<td>"+ element.STATUS_KELUAR +'</td>'
                  html += "<td><img src='"+ element.FOTO_KELUAR +"' class='avatar'/></td>"
                  html += "<td>"+ element.KETERANGAN_KELUAR +'<br>- '+waktu(element.JAM_KELUAR) +'</td>'
                  html += "<td>Rp "+ formatrupiah(element.TOTAL_TUNJANGAN) +'</td></tr>'
                });
                html += '</tbody></table>'
                document.getElementById("tmpdata").innerHTML =html
                $('#datatables-example').DataTable();
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
