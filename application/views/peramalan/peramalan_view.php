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
                <div class="row">
                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h4> Input Periode Peramalan</h4>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form method="post" action="<?= base_url('transaksi/dendaproses');?>">
                                    <div class="form-group">
                                        <label for="">Input Tahun</label>
                                        <select class="form-control" name="status">
                                            <option>2022</option>
                                            <option>2021</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kode Obat</label>
                                        <select class="form-control" name="status">
                                            <option>obat 1</option>
                                            <option>obat 2</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Obat</label>
                                        <select class="form-control" name="status">
                                            <option>Obat 1</option>
                                            <option>Obat 2</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i
                                            class="fa fa-edit"></i>Proses</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped table" width="100%">
                                        <thead>
                                            <tr>
                                                <!-- <th>No</th> -->
                                                <th>Tahun</th>
                                                <th>Bulan</th>
                                                <th>Nama Obat</th>
                                                <th>Forcasting Stok</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
											foreach($obat as $isi){?>
                                            <tr>
                                                <!-- <td><?= $no;?></td> -->
                                                <td><?= 'tahun';?></td>
                                                <td><?= 'bulan';?></td>
                                                <td><?= 'nama obat';?></td>
                                                <td><?= 'forcasting stok';?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>