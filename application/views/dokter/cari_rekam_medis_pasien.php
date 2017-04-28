<!-- Navbar-->
      <header class="main-header hidden-print"><a class="logo" href="<?php echo base_url(); ?>">Twister Hospital</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              
              <!-- User Menu-->
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <li><a href="#"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                  <li><a href="#"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                  <li><a href="<?php echo base_url('c_authentication/logout');?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
              </li>
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
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li><a href="<?php echo base_url('c_dokter/input_diagnosa');?>"><i class="fa fa-user-md"></i><span>Input Data Diagnosa</span></a></li>
            <li class="active"><a href="<?php echo base_url('c_dokter/tampil_rekam_medis_pasien');?>"><i class="fa fa-heartbeat"></i><span>View Data Rekam Medis</span></a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-heartbeat"></i> View Data Rekam Medis Pasien</h1>
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
              <h3 class="card-title">Cari Data Rekam Medis Pasien berdasarkan ID. Pasien</h3>
              <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo base_url('c_dokter/tampil_rekam_medis_pasien');?>" method="post">

                            <div class="form-group">
                                <label>ID. Pasien</label>
                                <input class="form-control" type="text" required placeholder="ID. Pasien" name="id">
                            </div>
                            <div class="form-group">
                              <button class="btn btn-primary icon-btn" type="submit">
                                  <i class="fa fa-fw fa-lg fa-search"></i>
                                  Cari Data
                              </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>