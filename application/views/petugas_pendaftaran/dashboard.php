<!-- Navbar-->
      <header class="main-header hidden-print"><a class="logo" href="<?php echo base_url(); ?>">Twister Hospital</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
                  <li><a href="#"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                  <li><a href="#"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                  <li><a href="<?php echo base_url('c_authentication/logout');?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="<?php echo base_url('assets/images/user.png'); ?>" alt="User Image"></div>
            <div class="pull-left info">
              <p><?php echo ucfirst($this->session->userdata('nama'));?></p>
              <p class="designation">Petugas Pendaftaran</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li class="treeview"><a href=""><i class="fa fa-plus"></i><span>Daftar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('c_petugaspendaftaran/tambah_pasien'); ?>"><i class="fa fa-plus-square"></i> Pasien Baru</a></li>
                <li><a href="<?php echo base_url('c_petugaspendaftaran/daftar_berobat_pasien');?>"><i class="fa fa-stethoscope"></i> Berobat</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url('c_petugaspendaftaran/tampil_pasien');?>"><i class="fa fa-gears"></i><span>Kelola Data Pasien</span></a></li>
            <li><a href="<?php echo base_url('c_petugaspendaftaran/list_data_berobat');?>"><i class="fa fa-table"></i><span>List Data Berobat</span></a></li>
            <li><a href="<?php echo base_url('c_petugaspendaftaran/detil_pasien');?>"><i class="fa fa-eye"></i><span>List Data Rinci Pasien</span></a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p> Petugas Pendaftaran</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="<?php echo base_url(); ?>">Dashboard</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-title">Dashboard Petugas Pendaftaran</h3>
              <p style="font-size: 20px;" align="justify">Halaman ini adalah halaman dashboard petugas pendaftaran. Segala fitur yang terdapat di dalamnya bertujuan untuk mengakomodir petugas pendaftaran dalam menyelesaikan pekerjaannya.</p>
            </div>
          </div>
        </div>

        <div class="col-md-3">
            <div class="card">
              <h3 class="card-title">Data Pasien</h3>
              <p style="font-size: 18px;" align="justify">
              <?php 
                $countPasien = $this->db->count_all('t_pasien');
                echo "$countPasien";
              ?>
              </p>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card">
              <h3 class="card-title">Data Berobat</h3>
              <p style="font-size: 18px;" align="justify">
              <?php 
                $countBerobat = $this->db->count_all ('t_berobat');
                echo "$countBerobat";
              ?>
              </p>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card">
              <h3 class="card-title">Data Dokter</h3>
              <p style="font-size: 18px;" align="justify">
              <?php 
                $countDokter = $this->db->count_all ('t_dokter');
                echo "$countDokter";
              ?>
              </p>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card">
              <h3 class="card-title">Data Karyawan</h3>
              <p style="font-size: 18px;" align="justify">
              <?php 
                $countKaryawan = $this->db->count_all ('t_user');
                echo "$countKaryawan";
              ?>
              </p>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading">Traffic Overview</div>
                <div class="panel-body">
                  <div class="canvas-wrapper">
                    <canvas class="main-chart" id="line-chart" height="200" width="800"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div><!--/.row-->

          <div class="row">
            <div class="col-xs-6 col-md-3">
              <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                  <h4>Daftar Berobat Baru</h4>
                  <div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent">92%</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-6 col-md-3">
              <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                  <h4>Pasien Baru</h4>
                  <div class="easypiechart" id="easypiechart-teal" data-percent="75" ><span class="percent">75%</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-6 col-md-3">
              <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                  <h4>Diagnosa Baru</h4>
                  <div class="easypiechart" id="easypiechart-teal" data-percent="75" ><span class="percent">75%</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-6 col-md-3">
              <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                  <h4>Pengunjung</h4>
                  <div class="easypiechart" id="easypiechart-red" data-percent="40" ><span class="percent">40%</span>
                  </div>
                </div>
              </div>
            </div>
          </div><!--/.row-->

          <script src="<?php echo base_url('assets/js/lumino.glyphs.js'); ?>"></script>
          <script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
          <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
          <script src="<?php echo base_url('assets/js/chart.min.js'); ?>"></script>
          <script src="<?php echo base_url('assets/js/chart-data.js'); ?>"></script>
          <script src="<?php echo base_url('assets/js/easypiechart.js'); ?>"></script>
          <script src="<?php echo base_url('assets/js/easypiechart-data.js'); ?>"></script>
          <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>

            <script>
              $('#calendar').datepicker({
              });

              !function ($) {
                  $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
                      $(this).find('em:first').toggleClass("glyphicon-minus");      
                  }); 
                  $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
              }(window.jQuery);

              $(window).on('resize', function () {
                if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
              })
              $(window).on('resize', function () {
                if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
              })
            </script>
      </div>