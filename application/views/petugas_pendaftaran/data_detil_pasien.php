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
              <p class="designation">Petugas Pendaftaran</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li class="treeview"><a href=""><i class="fa fa-plus"></i><span>Daftar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('c_petugaspendaftaran/tambah_pasien'); ?>"><i class="fa fa-plus-square"></i> Pasien Baru</a></li>
                <li><a href="<?php echo base_url('c_petugaspendaftaran/daftar_berobat_pasien');?>"><i class="fa fa-stethoscope"></i> Berobat</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url('c_petugaspendaftaran/tampil_pasien');?>"><i class="fa fa-gears"></i><span>Kelola Data Pasien</span></a></li>
            <li><a href="<?php echo base_url('c_petugaspendaftaran/list_data_berobat');?>"><i class="fa fa-table"></i><span>List Data Berobat</span></a></li>
            <li class="active"><a href="<?php echo base_url('c_petugaspendaftaran/detil_pasien');?>"><i class="fa fa-eye"></i><span>List Data Rinci Pasien</span></a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-eye"></i> List Data Rinci Pasien</h1>
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
              <h3 class="card-title">List Data Rinci Pasien</h3>
              
                <div class="row">
                    <div class="col-lg-6">
                        <?php foreach($detil as $row){ ?>
                        
                        <div class="form-group">
                            <label>ID. Pasien</label>
                            <p class="form-control-static"><?php echo $row->id_pasien; ?></p>
                            <label>Nama Lengkap</label>
                            <p class="form-control-static"><?php echo $row->nama_pasien; ?></p>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <p class="form-control-static"><?php echo $row->jeniskelamin_pasien; ?></p>
                        </div>

                        <div class="form-group">
                            <label>Tempat & Tanggal Lahir</label>
                            <p class="form-control-static"><?php echo $row->tmptlahir_pasien.', '.date('d F Y',strtotime($row->tgllahir_pasien)); ?></p>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <p class="form-control-static"><?php echo $row->alamat_pasien; ?></p>
                        </div>

                        <div class="form-group">
                            <label>Golongan Darah</label>
                            <p class="form-control-static"><?php echo $row->goldar_pasien; ?></p>
                        </div>

                        <div class="form-group">
                            <label>No. Telp</label>
                            <p class="form-control-static"><?php echo $row->notelp_pasien; ?></p>
                        </div>

                        <div class="form-group">
                            <label>Usia</label>
                            <p class="form-control-static"><?php echo $row->usia_pasien.' Tahun'; ?></p>
                        </div>

                        <div class="form-group">
                            <label>Status Pernikahan</label>
                            <p class="form-control-static"><?php echo $row->statuspernikahan_pasien; ?></p>
                        </div>

                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <p class="form-control-static"><?php echo $row->pekerjaan_pasien; ?></p>
                        </div>

                        <?php }?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">

                        <label>Riwayat Berobat Pasien</label>
                    
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal Berobat</th>
                                        <th>Dokter yang Menangani</th>
                                        <th>Klinik yang dituju</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    if($berobat){
                                        foreach ($berobat as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo date('d F Y',strtotime($row->tgl_diagnosa));?></td>
                                        <td><?php echo $row->nama_dokter;?></td>
                                        <td><?php echo $row->spesialis_dokter;?></td>
                                    </tr>
                                <?php    
                                        }
                                    } else {
                                        echo '<tr><td align="center" colspan="3">Pasien belum pernah berobat</td></tr>';
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