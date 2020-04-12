<?php $this->load->view('backend/header') ?>

<!-- <style type="text/css">
    .navbar .navbar-brand-wrapper{
      background: #01595A;
    }
  </style> -->



<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="admin"><img src="template/regal/images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="admin "><img src="template/regal/images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search Projects.." aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <!-- <li class="nav-item dropdown d-lg-flex d-none">
                <button type="button" class="btn btn-info font-weight-bold">+ Create New</button>
            </li> -->
          <li class="nav-item dropdown d-flex mr-4 ">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
              <a class="dropdown-item preview-item">               
                  <i class="icon-head"></i> Profile
              </a>
              <a class="dropdown-item preview-item" href="logout/admin">
                  <i class="icon-inbox"></i> Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php $this->load->view('backend/sidebar') ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12 mb-4 mb-xl-0">
              <h4 class="font-weight-bold text-dark"><?=$title1?></h4>
              <p class="font-weight-normal mb-2 text-muted">APRIL 1, 2019</p>
            </div>
          </div>
          
          <div class="row">
              <div class="col-xl-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><?=$title?>
                    <a href="<?php echo base_url('/form/tambah'); ?>" class="float-xl-right"><i class="fa fa-plus"></i></a>
                    
<hr>

                    <table class="table table-stripped">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode</th>
			<th>Nama Gunung</th>
			<th>GeoJSON</th>
			<!-- <th>Warna</th> -->
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=1;
			foreach ($datatable->result() as $row) {
				?>
					<tr>
						<td><?=$no?></td>
						<td><?=$row->kd_gunung?></td>
						<td><?=$row->nm_gunung?></td>
						<td><a href="<?=assets('unggah/geojson/'.$row->geojson_gunung)?>" target="_BLANK"><?=$row->geojson_gunung?></a></td>
						
						<!-- <td style="background: <?=$row->warna_gunung?>"></td> -->
						<td>
							<a href="<?=site_url($url.'/form/ubah/'.$row->id_gunung)?>" class="btn-floating" data-position="top"
									><i class="material-icons">edit</i></a>
							<a href="<?=site_url($url.'/hapus/'.$row->id_gunung)?>" class="btn-floating" data-position="top"
									><i class="material-icons">delete</i></a>
						</td>
					</tr>
				<?php
				$no++;
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
        <!-- content-wrapper ends -->

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  

  <?php $this->load->view('backend/footer') ?>

</body>

</html>

