<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Sidebar -->
<?php if($this->session->userdata('level') == 'dokter'){?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <?php }elseif($this->session->userdata('level') == 'admin'){?>
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
        <?php }?>

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center"
            href="<?php echo base_url('dashboard');?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SI Klinik</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <?php if($this->session->userdata('level') == 'dokter'){?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?php if($this->uri->uri_string() == 'dashboard'){ echo 'active';}?>">
            <a class="nav-link" href="<?php echo base_url('dashboard');?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Nav Item - pasien -->
        <li class="nav-item <?php if($this->uri->uri_string() == 'pasien'){ echo 'active';}?>">
            <a class="nav-link" href="<?php echo base_url('pasien');?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Pasien</span></a>
        </li>

        <!-- Nav Item - transaksi -->
        <li class="nav-item <?php if($this->uri->uri_string() == 'transaksi'){ echo 'active';}?>">
            <a class="nav-link" href="<?php echo base_url('transaksi');?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Transaksi Obat</span></a>
        </li>
        <?php }?>

        <!-- Jika login level admin -->

        <?php if($this->session->userdata('level') == 'admin'){?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?php if($this->uri->uri_string() == 'dashboard'){ echo 'active';}?>">
            <a class="nav-link" href="<?php echo base_url('dashboard');?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Nav Item - pasien -->
        <li class="nav-item <?php if($this->uri->uri_string() == 'datapasien'){ echo 'active';}?>">
            <a class="nav-link" href="<?php echo base_url('datapasien');?>">
                <i class="fas fa-fw fa-user"></i>
                <span> Data Pasien</span></a>
        </li>

        <!-- Nav Item - obat -->
        <li class="nav-item <?php if($this->uri->uri_string() == 'dataobat'){ echo 'active';}?>">
            <a class="nav-link" href="<?php echo base_url('dataobat');?>">
                <i class="fas fa-fw fa-plus-square"></i>
                <span> Data Obat</span></a>
        </li>

        <!-- Nav Item - transaksi -->
        <li class="nav-item <?php if($this->uri->uri_string() == 'laporantransaksi'){ echo 'active';}?>">
            <a class="nav-link" href="<?php echo base_url('laporantransaksi');?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Laporan Transaksi</span></a>
        </li>
        <?php }?>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->