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
        <td colspan="<?= $tipe == "utama" ? 5 : $tipe == "tunjangan" ? 7 : 9 ?>" style="text-align:center; padding: 12px;">
            <?php echo $title; ?>
        </td>
    </tr>
    <tr>
        <td class="border-top-0 text-center">No</td>
        <td class="border-top-0 text-center">Nama Pegawai</td>
        <td class="border-top-0 text-center">Bulan</td>
        @if ($tipe == 'utama' || $tipe == 'keseluruhan')
            <td class="border-top-0 text-center">Gaji Pokok</td>
        @endif
        @if ($tipe == 'tunjangan' || $tipe == 'keseluruhan')
            <td class="border-top-0 text-center">Total Tunjangan</td>
            <td class="border-top-0 text-center">Potongan Tunjangan</td>
            <td class="border-top-0 text-center">Tunjangan Bersih</td>
        @endif
        @if ($tipe == 'keseluruhan')
            <td class="border-top-0 text-center">Gaji Bersih</td>
        @endif
        <td class="border-top-0 text-center">Di Input Pada</td>
    </tr>
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
            <td>{{ Helper::waktu($item->CREATE_AT) }}</td>
        </tr>
    @endforeach
</table>