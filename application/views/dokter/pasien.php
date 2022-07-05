<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Pasien</h1>
    </div>

    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Antrian</th>
                            <th>Tanggal Daftar</th>
                            <th>Nama Pasien</th>
                            <th>TTL</th>
                            <th>Jenis Kelamin</th>
                            <th>Keluhan</th>
                            <th>No.Telpon</th>
                            <th>Syarat Pendaftaran</th>
                            <th>Status Pasien</th>
                            <th>Aksi</th>
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
                            <td><?php echo $data->antrian ?></td>
                            <td><?php echo date('d-m-Y', strtotime($data->tanggal_daftar)) ?></td>
                            <td><?php echo $data->nama_pasien ?></td>
                            <td><?php echo $data->tempat.', '. date('d-m-Y', strtotime($data->tanggal_lahir)) ?>
                            </td>
                            <td><?php 
                                if ($data->jenis_kelamin == 'L') {
                                    ?><b>Laki-Laki</b><?php
                                } elseif ($data->jenis_kelamin == 'P') {
                                    ?><b>Perempuan</b><?php
                                }
                                ?></td>
                            <td><?php echo $data->keluhan ?></td>
                            <td><?php echo $data->no_telp ?></td>
                            <td><img src="<?= base_url('assets/SyaratPasien/'.$data->syarat_daftar);?>"
                                    class="img-responsive" width="100px" height="100px"></td>
                            <td><?php 
                                if ($data->status_pasien == '0') {
                                    ?><span class="badge badge-danger">Belum Dikonfirmasi</span><?php
                                } elseif ($data->status_pasien == '1') {
                                    ?><span class="badge badge-warning">Proses Pemeriksaan</span><?php
                                }
                                ?></td>
                            <td><?php 
                                if ($data->status_pasien == '0') {
                                    ?>
                                <a href="<?php echo base_url() ?>dokter/pasien/proseskonfirmasi/<?php echo  $data->id_pasien; ?>"
                                    class="btn btn-sm btn-success">Konfirmasi</a>
                                <?php
                                } elseif ($data->status_pasien == '1') {
                                    ?> <a
                                    href="<?php echo base_url() ?>dokter/pasien/prosesselesai/<?php echo  $data->id_pasien; ?>"
                                    class="btn btn-sm btn-primary">Selesai</a><?php
                                }
                                ?>
                            </td>
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
<!-- /.container-fluid -->