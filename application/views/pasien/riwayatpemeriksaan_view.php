<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Sidebar - Brand -->
        <h1 class="h3 mb-0 text-gray-800">Riwayat Pasien</h1>
    </div>

    <!-- Content Row -->

    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Usia Pasien</th>
                            <th>Gejala Pasien</th>
                            <th>No.Telpon</th>
                            <th>Status Pasien</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $start =0;
                        foreach ($data_pasien as $data)
                        {
                        ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $data->nama_pasien ?></td>
                            <td><?php 
                                if ($data->jenis_kelamin == 'L') {
                                    ?><b>Laki-Laki</b><?php
                                } elseif ($data->jenis_kelamin == 'P') {
                                    ?><b>Perempuan</b><?php
                                }
                                ?></td>
                            <td><?php echo $data->usia_pasien ?></td>
                            <td><?php echo $data->gejala_pasien ?></td>
                            <td><?php echo $data->no_telp ?></td>
                            <td><?php 
                                if ($data->status_pasien == '0') {
                                    ?><span class="badge badge-danger">Belum Dikonfirmasi</span><?php
                                } elseif ($data->status_pasien == '1') {
                                    ?><span class="badge badge-warning">Proses Pemeriksaan</span><?php
                                }elseif ($data->status_pasien == '2') {
                                    ?><span class="badge badge-success">Selesai</span><?php
                                }
                                ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>