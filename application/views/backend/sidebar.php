
<nav class="sidebar sidebar-offcanvas fixed"  id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img src="<?php echo base_url(); ?>template/regal/images/faces/face1.jpg">
          </div>

          <div class="user-name">
              <?php  echo $this->session->userdata('nama');?>
          </div>
          <div class="user-designation">
          <?php  echo $this->session->userdata('role');?>
          </div>
        </div>
        <ul class="nav">

        <!-- DASHBOARD -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin'); ?>">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <!-- ACCOUNT -->
          <?php
          if($this->session->userdata('role') == 'admin') {
            echo '<li class="nav-item">
            <a class="nav-link" href="';
            echo base_url('admin/data_akun');
            echo '">';
            echo '<i class="icon-head menu-icon"></i>
              <span class="menu-title">Account Data</span>
            </a>
          </li>';

          }
          
          ?>


           <!-- Geo Maps -->
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#maps" aria-expanded="false" aria-controls="maps">
              <i class="icon-map menu-icon"></i>
              <span class="menu-title">Geological Maps</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="maps">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?=site_url('gunung')?>">Table Maps</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?=site_url('maps')?>">Maps View</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>