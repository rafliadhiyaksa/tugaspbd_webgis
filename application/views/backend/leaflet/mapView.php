<?php $this->load->view('backend/header') ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
		integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
		crossorigin="" />

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
		<div class="container-fluid mt--6">
			<div class="row">
				<div class="col">
					<div class="card" style="border-radius: 20px 20px 20px 20px;">
						<style type="text/css">
							#mapid {
								height: 650px;
                border-radius: 10px 10px 10px 10px;
							}

						</style>
						<div id="mapid" ></div>
					</div>
				</div>
			</div>
		</div>
	</div>
  <?php $this->load->view('backend/footer') ?>
  <?php
    if(isset($js)){
        echo $js;
    }
  ?>
</body>
<script typye="text/javascript">
  var map = L.map('mapid').setView([-0.281833, 115.504175], 4.3);
  var base_url="<?=base_url()?>";

  

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

$.getJSON(base_url+"maps/gunung_json", function(data){
    $.each(data, function(i, field){


      var v_lat=parseFloat(data[i].lat);
      var v_lng=parseFloat(data[i].lng);
      var icon_gunung = L.icon({
                  iconUrl:
				  base_url+'assets/unggah/marker/erupt2.gif',
                  iconSize:[30,50]

      })
	

    L.marker([v_lng,v_lat],{icon: icon_gunung }).addTo(map)
    .bindPopup(data[i].nm_gunung,data[i].lat)
    .openPopup();

    });
  });
   </script>

</html>