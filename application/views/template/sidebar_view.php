<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php
            $d = $this->db->query("SELECT * FROM tbl_login WHERE id_login='$idbo'")->row();
            if(!empty($d->foto)){
          ?>
                <br />
                <img src="<?php echo base_url();?>assets_style/image/<?php echo $d->foto;?>" alt="#" c lass="user-image"
                    style="border:2px solid #fff;height:auto;width:100%;" />
                <?php }else{?>
                <!--<img src="" alt="#" class="user-image" style="border:2px solid #fff;"/>-->
                <i class="fa fa-user fa-4x" style="color:#fff;"></i>
                <?php }?>
            </div>
            <div class="pull-left info" style="margin-top: 5px;">
                <p><?php echo $d->nama;?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
            <br />
            <br />
            <br />
            <br />
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if($this->uri->uri_string() == 'dashboard'){ echo 'active';}?>">
                <a href="<?php echo base_url('dashboard');?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="<?php if($this->uri->uri_string() == 'data'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'data/tambah'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'data/edit/'.$this->uri->segment('3')){ echo 'active';}?>">
                <a href="<?php echo base_url('data');?>" class="cursor">
                    <i class="fa fa-list"></i> <span>Data Obat</span></a>
            </li>
            <li class="<?php if($this->uri->uri_string() == 'peramalan'){ echo 'active';}?>">
                <?php if($this->uri->uri_string() == 'peramalan/tambah'){ echo 'active';}?>
                <a href="<?php echo base_url("peramalan");?>" class="cursor">
                    <i class="fa fa-pencil-square"></i> <span>peramalan</span>

                </a>
            </li>
        </ul>
        <div class="clearfix"></div>
        <br />
        <br />
    </section>
    <!-- /.sidebar -->
</aside>