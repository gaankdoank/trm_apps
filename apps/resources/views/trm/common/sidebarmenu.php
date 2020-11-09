<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <?php
                    if($this->session->userdata('deptid') == '1') {
                      $dept = 'IP Planning';
                      $site_url = 'ip_planning';
                    }
                    else if($this->session->userdata('deptid') == '2') {
                      $dept = 'FO Planning';
                      $site_url = 'fo_planning';
                    }
                    else if($this->session->userdata('deptid') == '3') {
                      $dept = 'Logistics';
                      $site_url = 'log';
                    }
                    else if($this->session->userdata('deptid') == '4') {
                      $dept = 'PMO';
                      $site_url = 'pmo';
                    }
                    else if($this->session->userdata('deptid') == '5') {
                      $dept = 'Finance';
                      $site_url = 'fin';
                    }
                    else if($this->session->userdata('deptid') == '6') {
                      $dept = 'HRD';
                      $site_url = 'hrd';
                    }
                    else {
                      $dept = 'I & M';
                      $site_url = 'im';
                    }
                ?>
              <a href="<?php echo base_url(); ?>" class="site_title"><i class="fa fa-paw"></i> <!--span><?php echo $dept; ?></span>--></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url('assets/gentella/images/img.jpg'); ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome, </span>
                <h2><?php echo $this->session->userdata('user'); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  
                  <li><a href="<?php echo base_url($site_url); ?>"><i class="fa fa-home"></i> Dashboard <span class="fa"></span></a>
                  </li>
                  <?php 
                    if($this->session->userdata('deptid') == '1') {
                      if($this->session->userdata('isadmin') == '1') {
                  ?>
                        <li><a><i class="fa fa-edit"></i> RSL <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('ip_planning/rsl/monitoring'); ?>">RSL Monitoring</a></li>
                            <li><a href="<?php echo base_url('ip_planning/rsl/history'); ?>">RSL History</a></li>
                            <li><a href="<?php echo base_url('ip_planning/rsl/filter'); ?>">RSL Filter</a></li>
                          </ul>
                        </li>
                      <?php }
                      else if($this->session->userdata('isadmin') == '2') {
                      ?>
                        <li><a><i class="fa fa-edit"></i> RSL <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo base_url('ip_planning/rsl/monitoring'); ?>">RSL Monitoring</a></li>
                              <li><a href="<?php echo base_url('ip_planning/rsl/history'); ?>">RSL History</a></li>
                            </ul>
                        </li>
                      <?php } 
                      else {
                      ?>
                        <li><a><i class="fa fa-edit"></i> RSL <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo base_url('ip_planning/rsl/history'); ?>">RSL History</a></li>
                              <li><a href="<?php echo base_url('ip_planning/rsl/filter'); ?>">RSL Filter</a></li>
                            </ul>
                        </li>
                      <?php } ?>

                  <?php
                    }
                    else if($this->session->userdata('deptid') == '2') {
                  ?>
                  <li><a><i class="fa fa-edit"></i> FO Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('fo_planning/segment'); ?>">FO Segment Mapping</a></li>
                      <li><a href="#">Customer Mapping</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Near End</a></li>
                      <li><a href="#s">Far End</a></li>
                    </ul>
                  </li>
                  <?php
                    } else {
                  ?>
                    <li><a><i class="fa fa-edit"></i> Under Development </a></li>
                  <?php
                    }
                  ?>
                  <!--
                  <li><a><i class="fa fa-gear"></i> Utility <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Coming Soon</a></li>
                      <li><a href="#">Coming Soon</a></li>
                      <li><a href="#">Coming Soon</a></li>
                    </ul>
                  </li>
                  -->
                </ul>
              </div>
              <div class="menu_section">
                <h3>Preferences</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-male"></i> Profile <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?php echo base_url('index/myprofile'); ?>">My Profile</a></li>
                          <?php 
                            if($this->session->userdata('isadmin') == '1') {
                          ?>
                          <li><a href="<?php echo base_url('index/adduser'); ?>">Add User</a></li>
                          <?php } ?>
                          <li><a href="<?php echo base_url('login/logout'); ?>">Logout</a></li>
                        </ul>
                  </li>
                  <!--
                  <li><a><i class="fa fa-wrench"></i> Setting <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('index.php/user') ?>">User</a></li>
                      <li><a href="<?php echo base_url('index.php/customer') ?>">Customer</a></li>
                      <li><a href="<?php echo base_url('index.php/mailsetting') ?>">Mail Setting</a></li>
                    </ul>
                  </li>
                  -->
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>