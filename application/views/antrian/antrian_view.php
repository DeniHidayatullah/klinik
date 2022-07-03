<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Antrian Pasien</h1>
    </div>

    <!-- Content Row -->

    <div class="row">
        <div class="col-md-12 text-center" style="margin-bottom: 60px;">
            <h4>
                <?php
                      $hari = date('D');
                      switch ($hari) {
                        case 'Sun':
                          $hari = "Minggu";
                        break;
                    
                        case 'Mon':     
                          $hari = "Senin";
                        break;
                    
                        case 'Tue':
                          $hari = "Selasa";
                        break;
                    
                        case 'Wed':
                          $hari = "Rabu";
                        break;
                    
                        case 'Thu':
                          $hari = "Kamis";
                        break;
                    
                        case 'Fri':
                          $hari = "Jumat";
                        break;
                    
                        case 'Sat':
                          $hari = "Sabtu";
                        break;
                        
                        default:
                          $hari = "";   
                        break;
                      }
                      $tanggal = date('d');
                      $bulan = date('n');
                      switch ($bulan) {
                        case 1:
                          $bulan = "Januari";
                        break;

                        case 2:
                          $bulan = "Februari";
                        break;

                        case 3:
                          $bulan = "Maret";
                        break;

                        case 4:
                          $bulan = "April";
                        break;

                        case 5:
                          $bulan = "Mei";
                        break;

                        case 6:
                          $bulan = "Juni";
                        break;

                        case 7:
                          $bulan = "Juli";
                        break;

                        case 8:
                          $bulan = "Agustus";
                        break;

                        case 9:
                          $bulan = "September";
                        break;

                        case 10:
                          $bulan = "Oktober";
                        break;

                        case 11:
                          $bulan = "November";
                        break;

                        case 12:
                          $bulan = "Desember";
                        break;
                        
                        default:
                          $bulan = "";   
                        break;
                      }
                      $tahun = date('Y');
                    //   echo $hari . ", ". $tanggal . " " . $bulan . " " . $tahun;
                      ?>
            </h4>
        </div>
        <div class="col-md-4 text-center">
            <div class="card">
                <div class="card-header card-header-text bg-success text-white">
                    <h4 class="card-title">Sisa antrian</h4>
                </div>
                <div class="card-body">
                    <h2 id="sisa-antrian-ini" style="color: #000000; margin: 0px;">
                        <?php 
                if ($sisa_antrian) {
                  echo $sisa_antrian;
                } else {
                  echo "0";
                } ?>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card">
                <div class="card-header card-header-text bg-primary text-white">
                    <h4 class="card-title">Antrian saat ini</h4>
                </div>
                <div class="card-body">
                    <h2 id="antrian-ini" style="color: #000000; margin: 0px;"><?php 
                if (is_array($list) && !empty($list)) {
                  echo $list[0]['antrian'];
                } else {
                  echo "-";
                } ?>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card">
                <div class="card-header card-header-text bg-warning text-white">
                    <h4 class="card-title">Tanggal Hari Ini</h4>
                </div>
                <div class="card-body">
                    <h2 id="waktu-tunggu-ini" style="color: #000000; margin: 0px;">
                        <?php 
                echo $hari . ", ". $tanggal . " " . $bulan . " " . $tahun;
                ?>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center" style="margin-top: 40px;"><a href="<?php echo base_url('Pasien'); ?>"
                class="btn btn-danger btn-raised btn-lg">Daftar</a></div>
    </div>
    <!-- /.Content Row -->

</div>
<!-- /.container-fluid -->