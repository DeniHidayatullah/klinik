<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> <?= $title_web;?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web;?></li>
        </ol>
    </section>
    <section class="content">
        <?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <a href="data/obattambah"><button class="btn btn-primary">
                                <i class="fa fa-plus"> </i> Tambah Obat</button></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <br />
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Harga</th>
                                        <th>Stok Obat</th>
                                        <th>Qty</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;foreach($obat as $isi){?>
                                    <tr>
                                        <td><?= $no;?></td>
                                        <td><?= $isi->kode_obat;?></td>
                                        <td><?= $isi->nama_obat;?></td>
                                        <td><?= $isi->harga;?></td>
                                        <td><?= $isi->stok;?></td>
                                        <td><?= $isi->qty;?></td>
                                        <td><?= $isi->tgl_masuk;?></td>
                                        <td>
                                            <a href="<?= base_url('data/obatedit/'.$isi->kode_obat);?>"><button
                                                    class="btn btn-success"><i class="fa fa-edit">Edit</i></button></a>
                                            <!-- <a href="<?= base_url('data/obatdetail/'.$isi->kode_obat);?>">
                                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i>
                                                    Detail</button></a> -->
                                            <a href="<?= base_url('data/obathapus/'.$isi->kode_obat);?>"
                                                onclick="return confirm('Anda yakin Buku ini akan dihapus ?');">
                                                <button class="btn btn-danger"><i
                                                        class="fa fa-trash"></i>Hapus</button></a>
                                        </td>
                                    </tr>
                                    <?php $no++;}?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>