<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Sidebar - Brand -->
        <h1 class="h3 mb-0 text-gray-800">Daftar Sebagai Pasien</h1>
    </div>

    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php echo form_open_multipart('Pasien/prosesdaftar'); ?>
            <div class="form-group">
                <label>Nama Pasien</label>
                <input type="text" class="form-control" name="nama_pasien" placeholder="Masukan Nama Pasien..."
                    required>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <label>Tempat</label>
                        <input type="text" class="form-control" name="tempat" placeholder="Masukan Tempat Lahir..."
                            required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir"
                            placeholder="Masukan Tanggal Lahir..." required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name='jenis_kelamin' value='L' checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Laki - laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name='jenis_kelamin' value='P'>
                    <label class="form-check-label" for="exampleRadios2">
                        Perempuan
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>No Telpon Pasien</label>
                <input type="text" class="form-control" name="no_telp" placeholder="Masukan No Telpon Pasien..."
                    required>
            </div>
            <div class="form-group">
                <label>Keluhan</label>
                <input type="text" class="form-control" name="keluhan" placeholder="Masukan Keluhan Pasien..." required>
            </div>
            <div class="form-group">
                <label>Syart Pendaftaran</label>
                <input type="file" class="form-control" accept="image/*" name="syarat_daftar" required>

                <!-- <br /> -->
                <!-- <img src="<?= base_url('assets_style/image/'.$user->syarat);?>" class="img-responsive" alt="#"> -->
            </div>
            <button type="submit" class="btn btn-primary">Daftar Pasien</button>
            <?php echo form_close(); ?>
        </div>
    </div>

</div>