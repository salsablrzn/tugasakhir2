@extends('layout/index')
@section('konten')

    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Riwayat Penggajian</h3>
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
                        <div class="responsive-table">

                            <table id="datatables-example" class="table table-striped table-bordered" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="border-top-0 text-center">No</th>
                                        <th class="border-top-0 text-center">Bulan</th>
                                        <th class="border-top-0 text-center">Gaji Pokok</th>
                                        <th class="border-top-0 text-center">Total Tunjangan</th>
                                        <th class="border-top-0 text-center">Potongan Tunjangan</th>
                                        <th class="border-top-0 text-center">Gaji Bersih</th>
                                        <th class="border-top-0 text-center">Di Input Pada</th>
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
                                            <td>{{ Helper::bulantahun($item->BULAN_GAJIAN) }}</td>
                                            <td>{{ Helper::price($item->GAJI_POKOK) }}</td>
                                            <td>{{ Helper::price($item->TUNJANGAN_MAMIN) }}</td>
                                            <td>{{ $item->POTONGAN . '% (' . Helper::price($potongan) . ')' }}</td>
                                            <td>{{ Helper::price($item->TOTAL_GAJI) }}
                                            </td>
                                            <td>{{ Helper::waktu($item->CREATE_AT) }}</td>
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
@endsection
