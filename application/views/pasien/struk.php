<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Struk Transaksi</title>

    <style>
    @media print {
        .page-break {
            display: block;
            page-break-before: always;
        }
    }

    #invoice-POS {
        box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        padding: 2mm;
        margin: 0 auto;
        width: 44mm;
        background: #FFF;
    }

    #invoice-POS ::selection {
        background: #f31544;
        color: #FFF;
    }

    #invoice-POS ::moz-selection {
        background: #f31544;
        color: #FFF;
    }

    #invoice-POS h1 {
        font-size: 1.5em;
        color: #222;
    }

    #invoice-POS h2 {
        font-size: .9em;
    }

    #invoice-POS h3 {
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
    }

    #invoice-POS p {
        font-size: .7em;
        color: #666;
        line-height: 1.2em;
    }

    #invoice-POS #top,
    #invoice-POS #mid,
    #invoice-POS #bot {
        /* Targets all id with 'col-' */
        border-bottom: 1px solid #EEE;
    }

    #invoice-POS #top {
        min-height: 100px;
    }

    #invoice-POS #mid {
        min-height: 80px;
    }

    #invoice-POS #bot {
        min-height: 50px;
    }

    #invoice-POS .info {
        display: block;
        margin-left: 0;
    }

    #invoice-POS .title {
        float: right;
    }

    #invoice-POS .title p {
        text-align: right;
    }

    #invoice-POS table {
        width: 100%;
        border-collapse: collapse;
    }

    #invoice-POS .tabletitle {
        font-size: .5em;
        background: #EEE;
    }

    #invoice-POS .service {
        border-bottom: 1px solid #EEE;
    }

    #invoice-POS .item {
        width: 24mm;
    }

    #invoice-POS .itemtext {
        font-size: .5em;
    }

    #invoice-POS #legalcopy {
        margin-top: 5mm;
    }
    </style>

    <script>
    window.console = window.console || function(t) {};
    </script>



    <script>
    if (document.location.search.match(/type=embed/gi)) {
        window.parent.postMessage("resize", "*");
    }
    </script>


</head>

<body translate="no">


    <div id="invoice-POS">

        <div id="mid">
            <div class="info">
                <h2>Klinik</h2>
                <p>
                    Alamat : ....</br>
                    Email : ...</br>
                    Telephone : ...</br>
                </p>
            </div>
        </div>
        <!--End Invoice Mid-->

        <div id="bot">

            <div id="table">
                <table>
                    <tr class="tabletitle">
                        <td class="item">
                            <h2>Nama Pasien</h2>
                        </td>
                        <td class="Hours">
                            <h2>Keluhan</h2>
                        </td>
                        <td class="Rate">
                            <h2>Total</h2>
                        </td>
                    </tr>

                    <tr class="service">
                        <td class="tableitem">
                            <p class="itemtext"><?=  $transaksi_pasien->nama_pasien?></p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext"><?=  $transaksi_pasien->keluhan?></p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext"><?= 'Rp. '. $transaksi_pasien->total?></p>
                        </td>
                    </tr>

                    <tr class="tabletitle">
                        <td></td>
                        <td class="Rate">
                            <h2>Total</h2>
                        </td>
                        <td class="payment">
                            <h2><?= 'Rp. '. $transaksi_pasien->total?></h2>
                        </td>
                    </tr>

                </table>
            </div>
            <!--End Table-->

            <div id="legalcopy">
                <p class="legal"><strong>Terimakasih Telah Berkunjung!</strong> Semoga lekas Sembuh. Jangan lupa
                    Semangat kembali
                </p>
            </div>

        </div>
        <!--End InvoiceBot-->
    </div>
    <!--End Invoice-->

</body>

</html>