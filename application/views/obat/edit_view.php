<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> <?= $title_web;?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-edit"></i>&nbsp; <?= $title_web;?></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo base_url('data/prosesedit');?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Kode Obat</label>
                                        <input type="text" class="form-control" value="<?= $obat->kode_obat;?>"
                                            name="kode_obat" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Obat</label>
                                        <input type="text" class="form-control" value="<?= $obat->nama_obat;?>"
                                            name="nama_obat" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="text" class="form-control" value="<?= $obat->harga;?>" name="harga"
                                            required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="number" class="form-control" value="<?= $obat->stok;?>" name="stok"
                                            required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>QTY</label>
                                        <input type="number" class="form-control" value="<?= $obat->qty;?>" name="qty"
                                            required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="tgl_masuk"
                                            value="<?= $obat->tgl_masuk;?>" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="pull-left">
                                <input type="hidden" value="<?= $obat->kode_obat;?>" name="id" required
                                    autocomplete="off">
                                <button type="submit" class="btn btn-primary btn-md">Simpan</button>
                        </form>
                        <a href="<?= base_url('data');?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>