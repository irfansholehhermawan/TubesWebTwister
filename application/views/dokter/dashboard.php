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
              <p class="designation">Dokter Spesialis</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li><a href="<?php echo base_url('c_dokter/input_diagnosa');?>"><i class="fa fa-user-md"></i><span>Input Data Diagnosa</span></a></li>
            <li><a href="<?php echo base_url('c_dokter/tampil_rekam_medis_pasien');?>"><i class="fa fa-heartbeat"></i><span>View Data Rekam Medis</span></a></li>
          </ul>
        </section>
      </aside>

      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p> Dokter Spesialis</p>
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
              <h3 class="card-title">Dashboard Dokter Spesialis</h3>
              <p style="font-size: 18px;" align="justify">Halaman ini adalah halaman dashboard dokter spesialis. Segala fitur yang terdapat di dalamnya bertujuan untuk mengakomodir dokter spesialis dalam menyelesaikan pekerjaannya.</p>
            </div>
          </div>
        </div>

          <div class="col-md-3">
            <div class="card">
              <h3 class="card-title">Data Diagnosa</h3>
              <p style="font-size: 18px;" align="justify">
              <?php 
                $countDiagnosa = $this->db->count_all('t_diagnosa');
                echo "$countDiagnosa";
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