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
            <li class="active"><a href="<?php echo base_url('c_petugaspendaftaran/tampil_pasien');?>"><i class="fa fa-gears"></i><span>Kelola Data Pasien</span></a></li>
            <li><a href="<?php echo base_url('c_petugaspendaftaran/list_data_berobat');?>"><i class="fa fa-table"></i><span>List Data Berobat</span></a></li>
            <li><a href="<?php echo base_url('c_petugaspendaftaran/detil_pasien');?>"><i class="fa fa-eye"></i><span>List Data Rinci Pasien</span></a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i> Ubah Data Pasien</h1>
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
              <h3 class="card-title">Form Ubah Biodata Pasien</h3>
              <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo base_url('c_petugaspendaftaran/simpan_pasien');?>" method="post" onsubmit="update()">
                            <?php
                                foreach($pasien as $row){
                            ?>

                            <input type="hidden" name="identitas" value="<?php echo $row->id_pasien; ?>" required>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input class="form-control" placeholder="Enter text" value="<?php echo $row->nama_pasien; ?>" name="nama" required>
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                            <?php if ($row->jeniskelamin_pasien == 'Laki-laki'){?>
                                <div class="animated-radio-button">
                                    <label>
                                      <input type="radio" value="Laki-laki" name="jk" <?php echo 'checked'; ?> required><span class="label-text">Laki-laki</span>
                                    </label>
                                </div>
                                <div class="animated-radio-button">
                                    <label>
                                      <input type="radio" value="Perempuan" name="jk"><span class="label-text">Perempuan</span>
                                    </label>
                                </div>
                            <?php } else {?>
                                <div class="animated-radio-button">
                                    <label>
                                      <input type="radio" value="Laki-laki" name="jk" required><span class="label-text">Laki-laki</span>
                                    </label>
                                </div>
                                <div class="animated-radio-button">
                                    <label>
                                      <input type="radio" value="Perempuan" name="jk" <?php echo 'checked'; ?>><span class="label-text">Perempuan</span>
                                    </label>
                                </div>
                            <?php } ?>
                            </div>

                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input class="form-control" placeholder="Enter text" value="<?php echo $row->tmptlahir_pasien; ?>"  name="tempat" required>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input class="form-control" id="demoDate" type="text" value="<?php echo date_format(date_create($row->tgllahir_pasien), "Y-m-d"); ?>" placeholder="Tanggal Lahir" name="tanggal" required>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" rows="3" name="alamat" required><?php echo $row->alamat_pasien; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Golongan Darah</label>
                                <select class="form-control" name="goldar" required>
                                    <?php
                                        if($row->goldar_pasien == 'A'){
                                    ?>
                                            <option value="A" <?php echo 'selected'; ?>>A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                    <?php
                                        } elseif($row->goldar_pasien == 'B'){
                                    ?>
                                            <option value="A">A</option>
                                            <option value="B" <?php echo 'selected'; ?>>B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                    <?php
                                        } elseif($row->goldar_pasien == 'AB'){
                                    ?>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB" <?php echo 'selected'; ?>>AB</option>
                                            <option value="O">O</option>
                                    <?php
                                        } else {
                                    ?>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O" <?php echo 'selected'; ?>>O</option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>No. Telp</label>
                                <input class="form-control" placeholder="Enter text" value="<?php echo $row->notelp_pasien; ?>" pattern="[0-9]*" name="notelp" required>
                            </div>

                            <div class="form-group">
                                <label>Status Pernikahan</label>
                                <select class="form-control" name="status" required>
                                    <?php
                                        if($row->statuspernikahan_pasien == 'Menikah'){
                                    ?>
                                            <option value="Menikah" <?php echo 'selected'; ?>>Menikah</option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                    <?php
                                        } else{
                                    ?>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Belum Menikah" <?php echo 'selected'; ?>>Belum Menikah</option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <select class="form-control" name="pekerjaan" required>
                                    <?php
                                        if($row->pekerjaan_pasien == 'PNS'){
                                    ?>
                                            <option value="PNS" <?php echo 'selected'; ?>>PNS</option>
                                            <option value="Pegawai Swasta">Pegawai Swasta</option>
                                            <option value="Wiraswasta">Wiraswasta</option>
                                            <option value="Lain-lain">Lain-lain</option>
                                    <?php
                                        } elseif($row->pekerjaan_pasien == 'Pegawai Swasta'){
                                    ?>
                                            <option value="PNS">PNS</option>
                                            <option value="Pegawai Swasta"  <?php echo 'selected'; ?> >Pegawai Swasta</option>
                                            <option value="Wiraswasta">Wiraswasta</option>
                                            <option value="Lain-lain">Lain-lain</option>
                                    <?php
                                        } elseif($row->pekerjaan_pasien == 'Wiraswasta'){
                                    ?>
                                            <option value="PNS">PNS</option>
                                            <option value="Pegawai Swasta">Pegawai Swasta</option>
                                            <option value="Wiraswasta" <?php echo 'selected'; ?> >Wiraswasta</option>
                                            <option value="Lain-lain">Lain-lain</option>
                                    <?php
                                        } else {
                                    ?>
                                            <option value="PNS">PNS</option>
                                            <option value="Pegawai Swasta">Pegawai Swasta</option>
                                            <option value="Wiraswasta">Wiraswasta</option>
                                            <option value="Lain-lain" <?php echo 'selected'; ?> >Lain-lain</option>
                                    <?php
                                        }
                                    ?>
                                    
                                </select>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary icon-btn" id="demoNotify" type="submit">
                                    <i class="fa fa-fw fa-lg fa-check-circle"></i>
                                    Simpan
                                </button>
                                <button class="btn btn-default icon-btn" type="reset">
                                    <i class="fa fa-fw fa-lg fa-times-circle"></i>
                                    Default</a>
                                </button>
                            </div>
                            <?php
                                }
                            ?>
                        </form>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>