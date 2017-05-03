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
            <li><a href="<?php echo base_url('c_petugaspendaftaran/detil_pasien');?>"><i class="fa fa-eye"></i><span>List Data Rinci Pasien</span></a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Daftar Berobat Pasien</h1>
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
              <h3 class="card-title">Daftar Berobat Pasien</h3>
              
              <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo base_url('c_petugaspendaftaran/cari_pasien');?>" method="post">

                            <div class="form-group">
                                <label>ID. Pasien</label>
                                <input class="form-control" type="text" required placeholder="ID. Pasien" name="id">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary icon-btn" type="submit">
                                    <i class="fa fa-fw fa-lg fa-search"></i>
                                    Cari
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <?php
                            if ($pasien->result() == null){
                                echo '<div class="form-group">';
                                echo '<label>Data Pasien tidak ditemukan</label>';
                                echo '</div>';
                            }else{
                                foreach ($pasien->result() as $row) {
                        ?>
                        <form role="form" action="<?php echo base_url('c_petugaspendaftaran/daftar_berobat_pasien');?>" method="post">

                            <input type="hidden" name="id_pasien" value="<?php echo $row->id_pasien; ?>">

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <p class="form-control-static"><?php echo ucwords($row->nama_pasien);?></p>
                            </div>


                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <p class="form-control-static"><?php echo ucfirst($row->jeniskelamin_pasien);?></p>
                            </div>

                            <div class="form-group">
                                <label>Tempat & Tanggal Lahir</label>
                                <p class="form-control-static"><?php echo ucfirst($row->tmptlahir_pasien).', '.date('d F Y',strtotime($row->tgllahir_pasien));?></p>
                            </div>

                            <div class="form-group">
                                <label>Golongan Darah</label>
                                <p class="form-control-static"><?php echo ucwords($row->goldar_pasien);?></p>
                            </div>

                            <div class="form-group">
                                <label>Poli Klinik</label>
                                <select class="form-control" name="poliklinik" required>
                                            <option value="6">Gigi</option>
                                            <option value="5">Jantung</option>
                                            <option value="1">Kulit</option>
                                            <option value="4">THT</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary icon-btn" type="submit">
                                    <i class="fa fa-fw fa-lg fa-check-circle"></i>
                                    Daftar Berobat
                                </button>
                            </div>
                            
                        </form>
                        
                        <?php
                                }
                            }
                        ?>
                       
                    </div>

                </div>
            </div>
          </div>
        </div>
      </div>