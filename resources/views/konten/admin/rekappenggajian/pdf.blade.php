@include('layout/styleprint')
<div class="content-area">

    <div style="margin: auto; width: auto;">

        <table width="100%" cellspacing="0" cellpadding="0" style="width: 100%; padding: 25px 32px; color: #343030;">
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0"
                        style="padding-bottom: 20px; border-bottom: thin dashed #cccccc;">
                        <tr>
                            <td style="width: 100%; vertical-align: top;">
                                <table width="100%" cellspacing="0" cellpadding="0">
                                    <tr>
                                        {{-- <td>
                                            <img src="{{ asset('logo.jpeg') }}" alt="Tokopedia"
                                                style="margin-bottom: 15px; width: 100px; height: 100px;">
                                        </td> --}}
                                        <td colspan="2" style="font-size: 20px; text-align:center">
                                            <span style="font-weight: 600;">SDN TAPAAN 1 KOTA PASURUAN</span><br>
                                            <span style="font-size: 20px;font-weight: 600;">SLIP GAJI PEGAWAI</span>
                                        <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="font-size: 12px; padding: 12px 0;"></td>
                                    </tr>
                                    <tr>
                                        <td width="120"  style="font-size: 14px;">
                                            <span style="font-weight: 600">Kode Penggajian</span></td>
                                        <td> <span
                                                style="color: #42b549; font-weight: 600;"
                                                id="ID_PENGGAJIAN">#{{ strtoupper($data->ID_PENGGAJIAN) }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="120" 
                                            style="font-size: 12px; font-weight: 600; padding-bottom: 6px; width: 80px;">

                                            <!-- Instansi -->

                                        </td>
                                        <td style="font-size: 12px; padding-bottom: 6px;">
                                            <p>
                                                <!-- SDN TAPAAN 1 KOTA PASURUAN -->
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="120" 
                                            style="font-size: 14px; font-weight: 600; padding-bottom: 6px; width: 80px;">
                                            Tanggal Cetak
                                        </td>
                                        <td style="font-size: 14px; padding-bottom: 6px;">
                                            {{ Helper::tanggal(date('Y-m-d')) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="120" 
                                            style="font-size: 14px; font-weight: 600; padding-bottom: 6px; width: 80px;">
                                            Nama Pegawai
                                        </td>
                                        <td style="font-size: 14px; padding-bottom: 6px;">
                                            {{ $data->NAMA_PEGAWAI }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="120" 
                                            style="font-size: 14px; font-weight: 600; padding-bottom: 6px; width: 80px;">
                                            NIP
                                        </td>
                                        <td style="font-size: 14px; padding-bottom: 6px;">
                                            {{ $data->NIP }}
                                        </td>
                                    </tr>




                                </table>
                            </td>

                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0"
                        style="border: thin dashed rgba(0, 0, 0, 0.34); border-radius: 4px; color: #343030; margin-top: 20px;">
                        <tr style="background-color: rgba(242, 242, 242, 0.74); font-size: 14px; font-weight: 600;">
                            {{-- <td style="padding: 10px 15px;">Nama Pegawai</td> --}}
                            <td style="padding: 10px 15px;">Bulan</td>
                            @if ($tipe == 'utama' || $tipe == 'keseluruhan')
                                <td style="padding: 10px 15px;">Gaji Pokok</td>
                            @endif
                            @if ($tipe == 'tunjangan' || $tipe == 'keseluruhan')
                                <td style="padding: 10px 15px;">Total Tunjangan</td>
                                <td style="padding: 10px 15px;">Potongan Tunjangan</td>
                                <td style="padding: 10px 15px;">Tunjangan Bersih</td>
                            @endif
                            <td style="padding: 10px 15px;">Di Input Pada</td>
                        </tr>


                        @php
                        $potongan = ($data->POTONGAN == 0 ? 0 : $data->POTONGAN) / 100 *
                        $data->TUNJANGAN_MAMIN
                        @endphp
                        <tr style="font-size: 14px;">
                            {{-- <td style="padding: 10px; font-weight: 600; word-break: break-word;">
                                {{ $data->NAMA_PEGAWAI }}</td> --}}
                           <td style="padding: 10px; font-weight: 600; word-break: break-word;">
                                {{ Helper::bulantahun($data->BULAN_GAJIAN) }}</td>
                            @if ($tipe == 'utama' || $tipe == 'keseluruhan')
                                <td  style="padding: 10px;">
                                    {{ Helper::price($data->GAJI_POKOK) }}</td>
                            @endif
                            @if ($tipe == 'tunjangan' || $tipe == 'keseluruhan')
                                <td  style="padding: 10px;">
                                    {{ Helper::price($data->TUNJANGAN_MAMIN) }}</td>
                                <td  style="padding: 10px;">
                                    {{ $data->POTONGAN . '% (' . Helper::price($potongan) . ')' }}</td>
                                <td  style="padding: 10px;">
                                    {{ Helper::price((int) $data->TUNJANGAN_MAMIN - (int) $potongan) }}</td>
                            @endif
                            <td  style="padding: 10px;">

                                {{ Helper::waktu($data->CREATE_AT) }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" style="padding: 0 15px;">
                                <div style="border-bottom: thin solid #e0e0e0"></div>
                            </td>
                        </tr>



                        <tr>
                            <td></td>
                            <td></td>
                            <td colspan="2">
                                <table width="100%" cellspacing="0" cellpadding="0"
                                    style="padding-right: 15px; font-size: 17px; font-weight: 600;">
                                    <tr>
                                        <td colspan="2">
                                            <div style="border-bottom: thin solid #e0e0e0"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        @if ($tipe == 'keseluruhan')
                                            <td class="padding: 10px 15px; text-align: center;" style="text-align:center">Gaji Bersih</td>
                                            <td style="padding: 15px 0 15px 15px; text-align:center">
                                               {{ Helper::price($data->TOTAL_GAJI) }}
                                            </td>
                                        @endif
                                    </tr>
                                </table>
                            </td>
                            <td colspan="3"></td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
    </div>
    </td>
    </tr>
    </table>
</div>
</div>
