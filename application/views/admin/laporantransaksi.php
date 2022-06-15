<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Transaksi</h1>
    </div>

    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Laporan Berdasarkan Bulan</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/LaporanTransaksi/laporanbybulan') ?>" method="POST"
                                target="_blank">
                                <label for=""> Pilih Tahun</label>
                                <select class="form-contol" name="tahun1" id="" required>
                                    <?php foreach ($tahun as $row) { ?>
                                    <option value="<?= $row->tahun; ?>"><?= $row->tahun; ?></option>
                                    <?php } ?>
                                </select>
                                <br>
                                <label for=""> Bulan Awal</label>
                                <select class="form-contol" name="bulanawal1" id="" required>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">Nobember</option>
                                    <option value="12">Desember</option>
                                </select>
                                <br>
                                <label for=""> Bulan Akhir</label>
                                <select class="form-contol" name="bulanakhir" id="" required>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">Nobember</option>
                                    <option value="12">Desember</option>
                                </select><br>
                                <button type="submit" class="btn btn-xs btn-info">Print</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Laporan Berdasarkan Tahun</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/LaporanTransaksi/laporanbytahun') ?>" method="POST"
                                target="_blank">
                                <label for=""> Pilih Tahun</label>
                                <select class="form-contol" name="tahun2" id="" required>
                                    <?php foreach ($tahun as $row) { ?>
                                    <option value="<?= $row->tahun; ?>"><?= $row->tahun; ?></option>
                                    <?php } ?>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-xs btn-info">Print</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.container-fluid -->