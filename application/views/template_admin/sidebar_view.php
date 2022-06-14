<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Sidebar -->
<?php if($this->session->userdata('level') == 'dokter'){?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <?php }elseif($this->session->userdata('level') == 'admin'){?>
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
        <?php }elseif($this->session->userdata('level') == 'pasien'){?>
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
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

            <?php if($this->session->userdata('level') == 'pasien'){?>
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
                    <span>Daftar Pasien</span></a>
            </li>

            <!-- Nav Item - riwayat pasien -->
            <li class="nav-item <?php if($this->uri->uri_string() == 'pasien/riwayatpemeriksaan'){ echo 'active';}?>">
                <a class="nav-link" href="<?php echo base_url('pasien/riwayatpemeriksaan');?>">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Riwayat Pemeriksaan</span></a>
            </li>

            <li class="nav-item <?php if($this->uri->uri_string() == 'transaksi'){ echo 'active';}?>">
                <a class="nav-link" href="<?php echo base_url('transaksi');?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Riwayat Transaksi</span></a>
            </li>

            <?php }?>

            <?php if($this->session->userdata('level') == 'dokter'){?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if($this->uri->uri_string() == 'dashboard'){ echo 'active';}?>">
                <a class="nav-link" href="<?php echo base_url('dashboard');?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - pasien -->
            <li class="nav-item <?php if($this->uri->uri_string() == 'dokter/pasien'){ echo 'active';}?>">
                <a class="nav-link" href="<?php echo base_url('dokter/pasien');?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Pasien</span></a>
            </li>

            <li class="nav-item <?php if($this->uri->uri_string() == 'dokter/riwayatpasien'){ echo 'active';}?>">
                <a class="nav-link" href="<?php echo base_url('dokter/riwayatpasien');?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Riwayat Pasien</span></a>
            </li>

            <!-- Nav Item - transaksi -->
            <li class="nav-item <?php if($this->uri->uri_string() == 'dokter/transaksi'){ echo 'active';}?>">
                <a class="nav-link" href="<?php echo base_url('dokter/transaksi');?>">
                    <i class="fas fa-fw fa-cart-plus"></i>
                    <span>Transaksi</span></a>
            </li>
            <li
                class="nav-item <?php if($this->uri->uri_string() == 'dokter/transaksi/riwayattransaksi'){ echo 'active';}?>">
                <a class="nav-link" href="<?php echo base_url('dokter/transaksi/riwayattransaksi');?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Riwayat Transaksi</span></a>
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
            <li class="nav-item <?php if($this->uri->uri_string() == 'admin/datapasien'){ echo 'active';}?>">
                <a class="nav-link" href="<?php echo base_url('admin/datapasien');?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span> Data Pasien</span></a>
            </li>

            <!-- Nav Item - obat -->
            <!-- <li class="nav-item <?php if($this->uri->uri_string() == 'admin/dataobat'){ echo 'active';}?>">
                <a class="nav-link" href="<?php echo base_url('admin/dataobat');?>">
                    <i class="fas fa-fw fa-plus-square"></i>
                    <span> Data Obat</span></a>
            </li> -->

            <!-- Nav Item - transaksi -->
            <li class="nav-item <?php if($this->uri->uri_string() == 'admin/laporantransaksi'){ echo 'active';}?>">
                <a class="nav-link" href="<?php echo base_url('admin/laporantransaksi');?>">
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