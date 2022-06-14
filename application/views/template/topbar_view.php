<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-dark bg-primary topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link bg-dark d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('home');?>">
        <div class="sidebar-brand-icon text-white rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text text-white mx-3">Klinik Ketapanrame</div>
    </a>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav  ml-auto">
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php if($this->uri->uri_string() == 'home'){ echo 'active';}?>">
                    <a class="nav-link" href="<?php echo base_url('home');?>">Beranda</a>
                </li>
                <li class="nav-item <?php if($this->uri->uri_string() == 'home/tentang'){ echo 'active';}?>">
                    <a class="nav-link" href="<?php echo base_url('home/tentang');?>">Tentang</a>
                </li>
                <li class="nav-item <?php if($this->uri->uri_string() == 'home/pelayanan'){ echo 'active';}?>">
                    <a class="nav-link" href="<?php echo base_url('home/pelayanan');?>">Pelayanan</a>
                </li>
                <?php if($this->session->userdata('level') != 'pasien'){?>
                <li class="nav-item <?php if($this->uri->uri_string() == 'login'){ echo 'active';}?>">
                    <a class="nav-link" href="<?php echo base_url('login');?>">Login</a>
                </li>
                <?php } ?>
                <!-- <?php if($this->session->userdata('level') == 'pasien'){?>
                <li class="nav-item <?php if($this->uri->uri_string() == 'pasien'){ echo 'active';}?>">
                    <a class="nav-link" href="<?php echo base_url('pasien');?>">Daftar Pasien</a>
                </li>
                <li
                    class="nav-item <?php if($this->uri->uri_string() == 'pasien/riwayatpemeriksaan'){ echo 'active';}?>">
                    <a class="nav-link" href="<?php echo base_url('pasien/riwayatpemeriksaan');?>">Riwayat
                        Pemeriksaan</a>
                </li>
                <li class="nav-item <?php if($this->uri->uri_string() == 'login/logout'){ echo 'active';}?>">
                    <a class="nav-link" href="<?php echo base_url('login/logout');?>">Logout</a>
                </li>
                <?php } ?> -->
            </ul>
        </div>
    </ul>
</nav>
<!-- End of Topbar -->