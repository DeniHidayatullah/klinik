<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Sidebar - Brand -->
        <h1 class="h3 mb-0 text-gray-800">Daftar Sebagai Pasien</h1>
    </div>

    <!-- Content Row -->

    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('Pasien/prosesdaftar');?>" method="POST">
                <div class="form-group">
                    <label>Nama Pasien</label>
                    <input type="text" class="form-control" name="nama_pasien" placeholder="Masukan Nama Pasien..."
                        required>
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
                    <label>Usia Pasien</label>
                    <input type="number" class="form-control" name="usia_pasien" placeholder="Masukan Usia Pasien..."
                        required>
                </div>
                <div class="form-group">
                    <label>Gejala Pasien</label>
                    <input type="text" class="form-control" name="gejala_pasien" placeholder="Masukan Gejala Pasien..."
                        required>
                </div>
                <div class="form-group">
                    <label>No Telpon Pasien</label>
                    <input type="text" class="form-control" name="no_telp" placeholder="Masukan No Telpon Pasien..."
                        required>
                </div>
                <button type="submit" class="btn btn-primary">Daftar Pasien</button>
            </form>
        </div>
    </div>
</div>