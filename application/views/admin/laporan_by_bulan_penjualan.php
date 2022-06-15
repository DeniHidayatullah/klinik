<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Berdasarkan bulan</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/transaksi/paper.css">

    <style>
    .center {
        margin-left: auto;
        margin-right: auto;
    }

    @page {
        size: A4
    }

    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th {
        padding: 8px 8px;
        border: 1px solid #000000;
        text-align: center;
    }

    .table td {
        padding: 3px 3px;
        border: 1px solid #000000;
    }

    .text-center {
        text-align: center;
    }
    </style>
</head>

<body class="A4">

    <?php
    if ($bulanawal == "1") {
        $bl1 = "Januari";
    }elseif ($bulanawal == "2") {
        $bl1 = "Februari";
    }elseif ($bulanawal == "3") {
        $bl1 = "Maret";
    }elseif ($bulanawal == "4") {
        $bl1 = "April";
    }elseif ($bulanawal == "5") {
        $bl1 = "Mei";
    }elseif ($bulanawal == "6") {
        $bl1 = "Juni";
    }elseif ($bulanawal == "7") {
        $bl1 = "Juli";
    }elseif ($bulanawal == "8") {
        $bl1 = "Agustus";
    }elseif ($bulanawal == "9") {
        $bl1 = "September";
    }elseif ($bulanawal == "10") {
        $bl1 = "Oktober";
    }elseif ($bulanawal == "11") {
        $bl1 = "November";
    }elseif ($bulanawal == "12") {
        $bl1 = "Desember";
    }


    if ($bulanakhir == "1") {
        $bl2 = "Januari";
    }elseif ($bulanakhir == "2") {
        $bl2 = "Februari";
    }elseif ($bulanakhir == "3") {
        $bl2 = "Maret";
    }elseif ($bulanakhir == "4") {
        $bl2 = "April";
    }elseif ($bulanakhir == "5") {
        $bl2 = "Mei";
    }elseif ($bulanakhir == "6") {
        $bl2 = "Juni";
    }elseif ($bulanakhir == "7") {
        $bl2 = "Juli";
    }elseif ($bulanakhir == "8") {
        $bl2 = "Agustus";
    }elseif ($bulanakhir == "9") {
        $bl2 = "September";
    }elseif ($bulanakhir == "10") {
        $bl2 = "Oktober";
    }elseif ($bulanakhir == "11") {
        $bl2 = "November";
    }elseif ($bulanakhir == "12") {
        $bl2 = "Desember";
    }

?>
    <center>
        <h2>LAPORAN TRANSAKSI</h2>
        <h4>Berdasarkan Periode Bulan</h4>
        <h4><?php echo $bl1." - ".$bl2." - ".$tahun ?></h4>
    </center>

    <br />

    <table border="1" class="table">
        <tr>
            <th>Id Transaksi</th>
            <th>Tanggal Transaksi</th>
            <th>Nama Pasien</th>
            <th>Keluhan</th>
            <th>No Telpon</th>
            <th>Sub Total</th>
        </tr>
        <?php
        foreach ($bybulan as $row) {
        ?>
        <tr>
            <td class="text-center"><?= $row->id_transaksi; ?></td>
            <td class="text-center"><?= $row->tanggal_transaksi; ?></td>
            <td class="text-center"><?= $row->nama_pasien; ?></td>
            <td class="text-center"><?= $row->keluhan; ?></td>
            <td class="text-center"><?= $row->no_telp; ?></td>
            <td class="text-center"><?= $row->total; ?></td>
        </tr>
        <?php }; ?>
        <?php
            foreach ($sum as $r) {
            ?>
        <tr>
            <td colspan="5" align="right"><strong>Jumlah Total</strong></td>
            <td colspan="1" class="text-center"><strong>
                    <?= $r->grand;?>
                </strong></td>
        </tr>
        <?php }; ?>
    </table>

    <script>
    window.print();
    </script>
</body>

</html>