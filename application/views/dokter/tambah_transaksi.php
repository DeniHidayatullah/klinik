<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Sidebar - Brand -->
        <h1 class="h3 mb-0 text-gray-800">Input Transaksi</h1>
    </div>

    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php echo form_open_multipart('dokter/Transaksi/prosestransaksi'); ?>
            <div class="row">
                <div class="form-group">
                    <label>Nama Pasien</label><br>
                    <select name="id_pasien" id="id_pasien" class="form-control select-id-pasien">
                        <option disabled="disabled" selected="selected">Pilih Nama Pasien</option>
                        <?php
                        foreach ($pasien as $row){ ?>
                        <option value="<?php echo $row->id_pasien; ?>">
                            <?php echo $row->nama_pasien; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>No Telp</th>
                                <th>Keluhan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" class="form-control" name="nama_pasien" id="nama_pasien"
                                        disabled>
                                </td>
                                <td><input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin"
                                        disabled>
                                </td>
                                <td><input type="text" class="form-control" name="no_telp" id="no_telp" disabled>
                                </td>
                                <td><input type="text" class="form-control" name="keluhan" id="keluhan" disabled>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="form-group">
                <label>Total</label>
                <input type="number" class="form-control" name="total" id="total" autocomplete="off">
            </div>
            <br>
            <div class="form-group">
                <label>Bayar</label>
                <input type="text" class="form-control" name="bayar" id="Bayar" oninput="hitungkembali()"
                    autocomplete="off">
            </div>
            <br>
            <div class="form-group">
                <label>Kembali</label>
                <input type="text" class="form-control" name="kembalian" id="kembalian" disabled>
                <input type="hidden" class="form-control" name="kembali" id="kembali">
            </div>

            <div class="row">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>

</div>
<script src="<?php echo base_url();?>assets/transaksi/jquery.js"></script>
<script src="<?php echo base_url();?>assets/transaksi/select2.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css"> -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/transaksi/select2.min.css">
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script> -->

<script>
$(".select-id-pasien").select2();
</script>

<script>
function hitungkembali() {
    //menghitung kembali
    var bayari = parseInt($('input[name="bayar"]').val());
    var totali = parseInt($('input[name="total"]').val());
    var totalkembali = bayari - totali;
    console.log(total);
    document.getElementById("kembalian").innerHTML = totalkembali;
    $('input[name="kembalian"]').val(totalkembali);
    document.getElementById("kembali").innerHTML = totalkembali;
    $('input[name="kembali"]').val(totalkembali);
}
</script>

<script>
$(document).ready(function() {

    $('#id_pasien').change(function() {
        var id = $(this).val();
        console.log(id);
        $.ajax({
            method: 'POST',
            url: "<?php echo site_url('dokter/Transaksi/get_pasien');?>",
            data: {
                id_pasien: id
            },
            async: true,
        }).done(function(data) {
            var result = jQuery.parseJSON(data);
            // var html = '';
            // html += 'tempat';
            $("#nama_pasien").val(result.nama_pasien);
            $("#tempat").val(result.tempat);
            $("#tanggal_lahir").val(result.tanggal_lahir);
            $("#jenis_kelamin").val(result.jenis_kelamin);
            $("#no_telp").val(result.no_telp);
            $("#keluhan").val(result.keluhan);
        });
        return false;
    });

});
</script>