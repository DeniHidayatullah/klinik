<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pasien</h1>
        <a href="<?php echo base_url() . 'admin/dataobat/tambah' ?>"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Obat</a>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>
    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Untuk Sakit</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $start =0;
                        foreach ($data_obat as $data)
                        {
                        ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $data->kode_obat ?></td>
                            <td><?php echo $data->nama_obat ?></td>
                            <td><?php echo $data->untuk_sakit ?></td>
                            <td><?php echo $data->harga ?></td>
                            <td><?php echo $data->stok ?></td>
                            <td>
                                <!-- <a href="<?php echo base_url() ?>admin/dataobat/detail/<?php echo  $data->kode_obat; ?>"
                                    class="btn btn-sm btn-success" title="detail"><i class="fa fa-search-plus"></i></a> -->
                                <a href="<?php echo base_url() ?>admin/dataobat/edit/<?php echo  $data->kode_obat; ?>"
                                    class="btn btn-sm btn-primary" title="edit"><i class="fa fa-edit"></i></a>
                                <a onclick="javascript: return confirm('Apakah anda yakin akan dihapus?');"
                                    href="<?php echo base_url() ?>admin/dataobat/hapus/<?php echo  $data->kode_obat; ?>"
                                    class="btn btn-sm btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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