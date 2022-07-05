<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Sidebar - Brand -->
        <h1 class="h3 mb-0 text-gray-800">Profil User</h1>
    </div>

    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php echo form_open_multipart('Pasien/prosesdaftar'); ?>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" class="form-control" value="<?= $data_pasien->username;?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" value="<?= $data_pasien->nama;?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Email User</label>
                        <input type="text" class="form-control" value="<?= $data_pasien->email;?>" disabled>
                    </div>
                </div>

                <div class="col-6">
                    <img src="<?= base_url('assets/img/user.png');?>" height="300px">
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>

</div>