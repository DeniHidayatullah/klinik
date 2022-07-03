<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Berdasarkan tahun</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <style>
    .center {
        margin-left: auto;
        margin-right: auto;
    }

    @page {
        size: landscape;
        margin: 27mm 16mm 27mm 16mm;
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
    <center>
        <h2>LAPORAN TRANSAKSI</h2>
        <h4>Berdasarkan Periode Tahun</h4>
        <h4><?php echo $tahun ?></h4>
    </center>

    <br />

    <table border="1" class="table">
        <thead>
            <tr>
                <th>Id Transaksi</th>
                <th>Tanggal Transaksi</th>
                <th>Nama Pasien</th>
                <th>Keluhan</th>
                <th>Obat</th>
                <th>No Telpon</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($bytahun as $row) {
            ?>
            <tr>
                <td class="text-center"><?= $row->id_transaksi; ?></td>
                <td class="text-center"><?= $row->tanggal_transaksi; ?></td>
                <td class="text-center"><?= $row->nama_pasien; ?></td>
                <td class="text-center"><?= $row->keluhan; ?></td>
                <td class="text-center"><?= $row->nama_obat; ?></td>
                <td class="text-center"><?= $row->no_telp; ?></td>
                <td class="text-center"><?= $row->total; ?></td>
            </tr>
            <?php }; ?>
            <?php
            foreach ($sum as $r) {
            ?>
            <tr>
                <td colspan="6" align="right"><strong>Jumlah Total</strong></td>
                <td colspan="1" align="right"><strong><?= $r->grand;?></strong></td>
            </tr>
            <?php }; ?>
    </table>

    <script>
    window.print();
    </script>
</body>

</html>