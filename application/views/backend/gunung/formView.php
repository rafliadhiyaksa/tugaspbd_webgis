<?php $this->load->view('backend/header') ?>

<body>
	<?php $this->load->view('backend/sidebar') ?>
	<div class="main-content" id="panel">
		<?php $this->load->view('backend/navbar') ?>
		<div class="header bg-primary pb-6">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-center py-4">
						<div class="col-lg-6 col-7">
							<h6 class="h2 text-white d-inline-block mb-0">Default</h6>
							<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
								<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
									<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
									<li class="breadcrumb-item"><a href="<?php base_url()?> admin">Admin</a></li>
									<li class="breadcrumb-item active" aria-current="page">Data Account</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Page content -->
		<?php
      $id_gunung="";
      $kd_gunung="";
      $nm_gunung="";
      $geojson_gunung="";
      $lokasi="";
      $keterangan="";
      $lat="";
      $lng="";
      $status="";
      if($parameter=='ubah' && $id!=''){
          $this->db->where('id_gunung',$id);
          $row=$this->Model->get()->row_array();
          extract($row);
      }
    ?>
		<div class="container-fluid mt--6">


			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<div class="card-header border-0"> 
              <h3 class="mb-0">
              <?=$title?>
              </h3>
            </div>
						
						<div class="card-content">
              <div class="container-fluid">
							<form id="add-user-form" method="post" action="<?=site_url($url.'/simpan')?>"
								enctype="multipart/form-data">
								<?=input_hidden('parameter',$parameter)?>
								<?=input_hidden('id_gunung',$id_gunung)?>
								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="kode">Kode Gunung</label>
										<?=input_text('kd_gunung',$kd_gunung)?>
									</div>
									<div class="form-group col-md-12">
										<label for="nama">Nama Gunung</label>
										<?=input_text('nm_gunung',$nm_gunung)?>
									</div>
									<div class="form-group col-md-12">
										<label for="lokasi">Lokasi</label>
										<?=input_text('lokasi',$lokasi)?>
									</div>
									<div class="form-group col-md-12">
										<label for="keterangan">Keterangan</label>
										<?=input_text('keterangan',$keterangan)?>
									</div>
									<div class="form-group col-md-12">
										<label for="latitude">Latitude</label>
										<?=input_text('lat',$lat)?>
									</div>
									<div class="form-group col-md-12">
										<label for="longtitude">Longtitude</label>
										<?=input_text('lng',$lng)?>
									</div>
									<div class="form-group col-md-12">
										<label for="gambar">Gambar Status</label>
										<?=input_file('status','')?>
										<?php if ($parameter=='ubah'): ?>
										<small class="text-success">Biarkan kosong jika tidak ingin diubah</small>
										<?php endif ?>
									</div>
									<!-- <div class="form-group">
    		<label>Gambar Status</label>
    		<div class="row">
	    		<div class="col-md-4">
    				<?=input_file('status',$status)?>
                    <?php if ($parameter=='ubah'): ?>
                        <small class="text-success">Biarkan kosong jika tidak ingin diubah</small>
                    <?php endif ?>
    			</div>
        </div> -->
									<div class="form-group col-md-12">
										<label for="json">GeoJSON</label>
										<?=input_file('geojson_gunung',$geojson_gunung)?>
										<?php if ($parameter=='ubah'): ?>
										<small class="text-success">Biarkan kosong jika tidak ingin diubah</small>
										<?php endif ?>
									</div>
									<!-- <div class="form-group">
    		<label>Warna</label> 
    		<div class="row">
	    		<div class="col-md-3">
	    			<?=input_color('warna_kecamatan',$warna_kecamatan)?>
	    		</div>
    		</div>
    	</div> -->

								</div>
								<div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
									<button type="submit" name="simpan" value="true" class="btn btn-info"><i class="fa fa-save"></i>
										Simpan</button>
									<a href="<?=site_url($url)?>" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
                  </div>
								</div>
						</div>
            </form>
            </div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('backend/footer') ?>
</body>
</html>
