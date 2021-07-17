<?php
header('Content-type: application/vnd-ms-excel');

header("Content-Disposition: attachment; filename=$title.xls");

// header("Pragma: no-cache");

// header("Expires: 0");
?>
<style type="text/css">
    table {
        border-collapse: collapse;
    }

    table,
    tr,
    td {
        border: 1px solid black;
        padding: 5px;
    }

</style>
 <table border="1" width="100%">
 <tr>
    <td colspan="12"  style="text-align:center; padding: 12px;">
        <?php echo $title; ?>
    </td>
</tr>
        <tr>
            <td class="border-top-0 text-center" rowspan="2">No</td>
            <td class="border-top-0 text-center" rowspan="2">Nama Pegawai</td>
            <td class="border-top-0 text-center" rowspan="2">Bulan</td>
            <td class="border-top-0 text-center" colspan="4">Absen Masuk</td>
            <td class="border-top-0 text-center" colspan="4">Absen keluar</td>
            <td class="border-top-0 text-center" rowspan="2">Total Tunjangan</td>
        </tr>
        <tr>
            
            <td class="border-top-0 text-center">Hadir</td>
            <td class="border-top-0 text-center">Ijin</td>
            <td class="border-top-0 text-center">Sakit</td>
            <td class="border-top-0 text-center">Telat/Tidak Absen</td>
            
            <td class="border-top-0 text-center">Hadir</td>
            <td class="border-top-0 text-center">Ijin</td>
            <td class="border-top-0 text-center">Sakit</td>
            <td class="border-top-0 text-center">Telat/Tidak Absen</td>
        </tr>
        @foreach ($data as $item)
             <tr>
                                        
                <td>{{$loop->iteration}}</td>
                <td>{{$item->NAMA_PEGAWAI}}</td>
                <td>{{Helper::bulantahun($id)}}</td>
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
</table>
