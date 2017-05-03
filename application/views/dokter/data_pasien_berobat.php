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
            <li class="active"><a href="<?php echo base_url('c_dokter/input_diagnosa');?>"><i class="fa fa-user-md"></i><span>Input Data Diagnosa</span></a></li>
            <li><a href="<?php echo base_url('c_dokter/tampil_rekam_medis_pasien');?>"><i class="fa fa-heartbeat"></i><span>View Data Rekam Medis</span></a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-user-md"></i> Input Data Diagnosa</h1>
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
              <h3 class="card-title">List Pasien Berobat</h3>
              
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID. Pasien</th>
                                        <th>Nama Lengkap</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if($berobat != null){
                                        $x=1;
                                        foreach($berobat as $row){
                                ?>
                                    <tr>
                                        <td><?php echo $x; ?></td>
                                        <td><?php echo $row->id_pasien?></td>
                                        <td><?php echo $row->nama_pasien?></td>
                                        <td><?php echo anchor('c_dokter/form_input_diagnosa/'.$row->id_berobat,'Diagnosa');?></td>
                                    </tr>
                                    <?php
                                            $x++;
                                        }
                                    } else {
                                    ?>
                                    <tr>
                                        <td colspan="4" align="center">Tidak ada data pasien yang berobat</td>
                                    </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
          </div>
        </div>
      </div>