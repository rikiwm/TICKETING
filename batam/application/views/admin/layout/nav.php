  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url('admin/dasboard')?>" class="site_title"><i class="fa fa-ship">
              </i> <span><?php echo "Ferry Tour"?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('nama_admin')?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="<?php echo base_url('admin/dasboard')?>"><i class="fa fa-home"></i>Dashboard<span class="label label-success pull-right"></span></a></li>
                    
                    <?php if ($this->session->userdata('level_admin') == '1') { ?>
                    <li><a><i class="fa fa-edit"></i> Pengguna <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?php echo base_url('admin/user')?>">Data User</a></li>
                          <!-- <li><a href="form_advanced.html">Data Costumer</a></li> -->
                        </ul>
                    </li>
                    <?php }else{ } ?>

                    <?php if ($this->session->userdata('level_admin') == '1') { ?>
                    <li><a><i class="fa fa-desktop"></i> Services <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?php echo base_url('admin/kapal')?>">Data Kapal</a></li>
                        <li><a href="<?php echo base_url('admin/jadwal')?>">Data Jadwal</a></li>
                        <li><a href="<?php echo base_url('admin/tujuan')?>">Data Tujuan</a></li>
                        <li><a href="<?php echo base_url('admin/kelas')?>">Data Kelas</a></li>
                      </ul>
                    </li>
                    <?php }else{ } ?>

<!--                     <li><a href="<?php echo base_url('admin/jadwal_v')?>"><i class="fa fa-th-list"></i>Jadwal<span class="label label-success pull-right"></span></a></li> -->

                    <li><a href="<?php echo base_url('admin/pemesanan')?>"><i class="fa fa-ticket"></i>Pemesanan<span class="label label-success pull-right"></span></a></li>

                    <li><a href="<?php echo base_url('admin/pembayaran')?>"><i class="fa fa-credit-card"></i>Pembayaran<span class="label label-success pull-right"></span></a></li>

                    <li><a href="<?php echo base_url('admin/tiket')?>"><i class="fa fa-ticket"></i>Tiket<span class="label label-success pull-right"></span></a></li>

                    <?php if ($this->session->userdata('level_admin') == '1') { ?>
                    <li><a href="<?php echo base_url('admin/laporan')?>"><i class="fa fa-file"></i>Laporan<span class="label label-success pull-right"></span></a></li>
                    <?php }else{ } ?>                    


                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- top navigation -->
          <div class="top_nav">
            <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <?php echo $this->session->userdata('nama_admin')?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a> 
                      <a class="dropdown-item"  href="<?php echo base_url('login/logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

