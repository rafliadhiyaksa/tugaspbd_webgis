<style type="text/css">
	#mapid {
		height: 100%;
		width: 100%;
	}
	

</style>
<html lang="en">
<?php $this->load->view('frontend/header') ?>

<body>
		
		<div>
			<?php $this->load->view('frontend/navbar') ?>
		</div>
		<div id="mapid"></div>

	<?php $this->load->view('frontend/footer') ?>
	<?php
    if(isset($js)){
        echo $js;
    }
  ?>
</body>
<script typye="text/javascript">
	var map = L.map('mapid').setView([-0.281833, 115.504175], 5.4);
	var base_url = "<?=base_url()?>";

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	$.getJSON(base_url + "maps/gunung_json", function (data) {
		$.each(data, function (i, field) {

			var v_lat = parseFloat(data[i].lat);
			var v_lng = parseFloat(data[i].lng);
			var icon_gunung = L.icon({
				iconUrl: base_url + 'assets/unggah/marker/erupt2.gif',
				iconSize: [30, 50]

			})
			


			L.marker([v_lng, v_lat], {
					icon: icon_gunung
				}).addTo(map)
				.bindPopup('Gunung ' + data[i].nm_gunung, 
				data[i].lat
					)
				.openPopup();

		});
	});

</script>
</html>
