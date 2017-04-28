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
              <p class="designation">Staff Logistik</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li class="treeview"><a href=""><i class="fa fa-plus-circle"></i><span> Input Data</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('c_logistik/input_obat'); ?>"><i class="fa fa-medkit"></i> Obat</a></li>
                <li><a href="<?php echo base_url('c_logistik/input_item_non_obat');?>"><i class="fa fa-stethoscope"></i> Medis non Obat</a></li>
              </ul>
            </li>
            <li class="treeview"><a href=""><i class="fa fa-gears"></i><span> Kelola Data</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?php echo base_url('c_logistik/tampil_obat'); ?>"><i class="fa fa-medkit"></i> Obat</a></li>
                <li><a href="<?php echo base_url('c_logistik/tampil_item_non_obat');?>"><i class="fa fa-stethoscope"></i> Medis non Obat</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url('c_logistik/tampil_restock');?>"><i class="fa fa-list"></i><span>List Inventory re-Stock</span></a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-medkit"></i> Kelola Data Obat</h1>
            <p> Staff Logistik</p>
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
              <h3 class="card-title">Ubah Data Obat</h3>

                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo base_url('c_logistik/simpan_obat');?>" method="post" onsubmit="update()">

                        <?php
                            foreach($obat as $row){
                        ?>

                            <input type="hidden" name="id" value="<?php echo $row->id_obat ?>">

                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" type="text" required placeholder="Nama Obat" name="nama" value="<?php echo $row->nama_obat ?>">
                            </div>

                            <div class="form-group">
                                <label>Jenis</label>
                                <select class="form-control" name="jenis" required>
                                <?php
                                    if($row->jenis_obat == 'Pil'){
                                ?>
                                    <option value="Pil" <?php echo 'selected' ?>>Pil</option>
                                    <option value="Tablet">Tablet</option>
                                    <option value="Bubuk">Bubuk</option>
                                    <option value="Kapsul">Kapsul</option>
                                    <option value="Sirup">Sirup</option>
                                <?php
                                    }elseif($row->jenis_obat == 'Tablet'){
                                ?>
                                    <option value="Pil">Pil</option>
                                    <option value="Tablet"  <?php echo 'selected' ?>>Tablet</option>
                                    <option value="Bubuk">Bubuk</option>
                                    <option value="Kapsul">Kapsul</option>
                                    <option value="Sirup">Sirup</option>
                                <?php
                                    }elseif($row->jenis_obat == 'Bubuk'){
                                ?>
                                    <option value="Pil">Pil</option>
                                    <option value="Tablet">Tablet</option>
                                    <option value="Bubuk" <?php echo 'selected' ?>>Bubuk</option>
                                    <option value="Kapsul">Kapsul</option>
                                    <option value="Sirup">Sirup</option>
                                <?php
                                    }elseif($row->jenis_obat == 'Kapsul'){
                                ?>
                                    <option value="Pil">Pil</option>
                                    <option value="Tablet">Tablet</option>
                                    <option value="Bubuk">Bubuk</option>
                                    <option value="Kapsul" <?php echo 'selected' ?>>Kapsul</option>
                                    <option value="Sirup">Sirup</option>
                                <?php
                                    }else{
                                ?>
                                    <option value="Pil">Pil</option>
                                    <option value="Tablet">Tablet</option>
                                    <option value="Bubuk">Bubuk</option>
                                    <option value="Kapsul">Kapsul</option>
                                    <option value="Sirup" <?php echo 'selected' ?>>Sirup</option>
                                <?php
                                    }
                                ?>
                                </select>

                            </div>

                            <div class="form-group">
                                <label>Tanggal Kadaluarsa</label>
                                <input class="form-control" id="demoDate" type="text" placeholder="Tanggal Kadaluarsa" name="tanggal" value="<?php echo date_format(date_create($row->tglkadaluarsa_obat), "Y-m-d"); ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input class="form-control" type="number" required name="harga" step="50" min="50" max="5000000" value="<?php echo $row->hargajual_obat ?>">
                            </div>

                            <div class="form-group">
                                <label>Stok Awal</label>
                                <input class="form-control" type="number" required name="stok" step="1" min="0" max="100000" value="<?php echo $row->stok_obat ?>">
                            </div>

                            <?php } ?>

                            <div class="form-group">
                            <button class="btn btn-primary icon-btn" type="submit">
                                <i class="fa fa-fw fa-lg fa-save"></i>
                                Simpan
                            </button>
                            <button class="btn btn-default icon-btn" type="reset">
                                <i class="fa fa-fw fa-lg fa-times-circle"></i>
                                Default</a>
                           </button>

                        </form>
                    </div>

                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>

