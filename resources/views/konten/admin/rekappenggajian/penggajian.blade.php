@extends('layout/index')
@section('konten')

    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Riwayat Presensi</h3>
                    <p class="animated fadeInDown">
                        {{-- Table <span class="fa-angle-right fa"></span>Presensi
                        --}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading" id="titlepage">
                        <h3>{{ $title }}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Pilih Bulan<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select class="form-control required select2"
                                                onchange="getdata(this.options[this.selectedIndex].value)" name="pilihbulan"
                                                id="pilihbulan">
                                                <option value="">Filter Berdasarkan Bulan</option>
                                                @foreach ($history as $item)
                                                    <option value="{{$item->bulan}}">{{Helper::bulantahun($item->bulan)}}</option>
                                                @endforeach
                                                </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6 m-b-10">
                                <div id="tempatbtn">
                                    <a target="_blank" href="{{ url("admin/penggajian/export/$tipe/$tdy") }}"
                                        style="margin-right:10px; margin-bottom: 10px;" class="btn btn-success"><i
                                            class="fa fa-file-excel"></i> Export To Excel</a>
                                </div>
                            </div>
                            <div class="col-md-6 m-b-10">
                                <div class="float-right">
                                     @if (session()->get('TIPE_AKUN') == "ADMIN")
                                    <a href="{{ url('admin/penggajian/buat') }}"
                                        style="margin-right:10px; margin-bottom: 10px; float:right;"
                                        class="btn btn-primary"><i class="fa fa-plus"></i> Form Penggajian</a>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="responsive-table" id="tmpdata">


                            <table id="datatables-example" class="table table-striped table-bordered" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="border-top-0 text-center">No</th>
                                        <th class="border-top-0 text-center">Nama Pegawai</th>
                                        <th class="border-top-0 text-center">Bulan</th>
                                        @if ($tipe == 'utama' || $tipe == 'keseluruhan')
                                            <th class="border-top-0 text-center">Gaji Pokok</th>
                                        @endif
                                        @if ($tipe == 'tunjangan' || $tipe == 'keseluruhan')
                                            <th class="border-top-0 text-center">Total Tunjangan</th>
                                            <th class="border-top-0 text-center">Potongan Tunjangan</th>
                                            <th class="border-top-0 text-center">Tunjangan Bersih</th>
                                        @endif
                                        @if ($tipe == 'keseluruhan')
                                            <th class="border-top-0 text-center">Gaji Bersih</th>
                                        @endif
                                        <th class="border-top-0 text-center">Di Input Pada / Cetak</th>
                                    </tr>
                                </thead>

                                <tbody id="tmpdata">
                                    @foreach ($data as $item)
                                        @php
                                        $potongan = ($item->POTONGAN == 0 ? 0 : $item->POTONGAN) / 100 *
                                        $item->TUNJANGAN_MAMIN
                                        @endphp
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->NAMA_PEGAWAI }}</td>
                                            <td>{{ Helper::bulantahun($item->BULAN_GAJIAN) }}</td>
                                            @if ($tipe == 'utama' || $tipe == 'keseluruhan')
                                                <td>{{ Helper::price($item->GAJI_POKOK) }}</td>
                                            @endif
                                            @if ($tipe == 'tunjangan' || $tipe == 'keseluruhan')
                                                <td>{{ Helper::price($item->TUNJANGAN_MAMIN) }}</td>
                                                <td>{{ $item->POTONGAN.'% ('. Helper::price($potongan).')' }}</td>
                                                <td>{{ Helper::price((int)$item->TUNJANGAN_MAMIN - (int)$potongan) }}</td>
                                            @endif
                                            @if ($tipe == 'keseluruhan')
                                                <td>{{ Helper::price($item->TOTAL_GAJI) }}</td>
                                            @endif
                                            <td>
                                                {{ Helper::waktu($item->CREATE_AT) }}
                                                <a class="btn btn-sm" href="{{url('admin/penggajian/exportpdf/'.$item->ID_PENGGAJIAN.'/'.$tipe.'')}}"><i class="fa fa-print"></i> </a>
                                            </td>
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
    
    <script src="{{ asset('asset/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type='text/javascript'>
        var tipe = "{{ $tipe }}"

        function getdata(select_item) {
            $.ajax({
                type: 'post',
                url: '{{ url("api/getgaji") }}',
                dataType: "JSON",
                data: {
                    bulan: select_item,
                    tipe: tipe,
                },
                success: function(data) {
                    console.log(data);
                    var html = '<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0"><thead><tr><th class="border-top-0 text-center">No</th><th class="border-top-0 text-center">Nama Pegawai</th><th class="border-top-0 text-center">Bulan</th>'
                    if (tipe == 'utama' || tipe == 'keseluruhan') {
                        html += '<th class="border-top-0 text-center">Gaji Pokok</th>'
                    }
                    if (tipe == 'tunjangan' || tipe == 'keseluruhan') {
                        html +=
                            '<th class="border-top-0 text-center">Total Tunjangan</th><th class="border-top-0 text-center">Potongan Tunjangan</th><th class="border-top-0 text-center">Tunjangan Bersih</th>'
                    }
                    if (tipe == 'keseluruhan') {
                        html +=
                            '<th class="border-top-0 text-center">Gaji Bersih</th>'
                    }
                    html += '<th class="border-top-0 text-center">Di Input Pada / Cetak</th></tr></thead><tbody>';
                    data.data.forEach((element, index) => {
                        var potongan = (element.POTONGAN == 0 ? 0 : element.POTONGAN) / 100 * element.TUNJANGAN_MAMIN
                        html += "<tr><td>" + (index + 1).toString() + '</td>'
                        html += "<td>" + element.NAMA_PEGAWAI + '</td>'
                        html += "<td>" + tanggalbulan(element.BULAN_GAJIAN) + '</td>'
                    if (tipe == 'utama' || tipe == 'keseluruhan') {
                        html += "<td>Rp " + formatrupiah(element.GAJI_POKOK) + '</td>'
                    }
                    if (tipe == 'tunjangan' || tipe == 'keseluruhan') {
                        html += '<td class="border-top-0 text-center">'+formatrupiah(element.TUNJANGAN_MAMIN)+'</td><td class="border-top-0 text-center">'+element.POTONGAN+'% (Rp '+ formatrupiah(potongan)+')</td><td class="border-top-0 text-center">(Rp '+ formatrupiah((parseInt(element.TUNJANGAN_MAMIN) - potongan))+')</td>'
                    }
                    if (tipe == 'keseluruhan') {
                        html += '<td class="border-top-0 text-center">'+formatrupiah(element.TOTAL_GAJI)+'</td>'
                    }
                        html += "<td>" + waktu(element.CREATE_AT) + 
                            "  <a class='btn btn-sm' href='{{url('admin/penggajian/exportpdf/')}}/"+element.ID_PENGGAJIAN+"/"+tipe+"'><i class='fa fa-print'></i></a>"
                            +'</td></tr>'
                    });
                    html += '</tbody></table>'
                    document.getElementById("tmpdata").innerHTML = html
                    $('#datatables-example').DataTable();
                    document.getElementById('tempatbtn').innerHTML = '<a target="_blank" href="{{ url("admin/penggajian/export/") }}/'+tipe+'/' + select_item +'" style="margin-right:10px; margin-bottom: 10px;" class="btn btn-success"><i class="fa fa-file-excel"></i> Export To Excel</a>';
                    // console.log(html);
                    document.getElementById("titlepage").innerHTML = '<h3>' + data.title + '</h3>'


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
                var listbulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ];

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
                return ""
            }
        }

    </script>

@endsection
