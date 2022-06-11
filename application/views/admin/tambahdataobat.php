<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Obat</h1>
    </div>

    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php echo form_open_multipart('admin/dataobat/prosestambah'); ?>
            <div class="form-group">
                <label>Kode Obat</label>
                <input type="text" name="kode_obat" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label>Nama Obat</label>
                <input type="text" name="nama_obat" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label>Untuk Sakit</label>
                <input type="text" name="untuk_sakit" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" requireda autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <?php echo form_close(); ?>
        </div>
    </div>


</div>
<!-- /.container-fluid -->