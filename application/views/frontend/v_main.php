<!doctype html>
<style type="text/css">

  /* html { height: 100% }
  body { height: 100%; margin: 0px; padding: 0px }
  #mapid { height: 100% } */

</style>


<html lang="en">


<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link href="<?php echo base_url('assets/css/main.css') ?>" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="<?php echo base_url('assets/css/fontawesome.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/solid.min.css') ?>" rel="stylesheet">
</head>

<body>

	<div id="wrapper">
		<!-- Sidebar -->
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<li><a href="#">MAPS</a></li>
				<li><a href="#">MAPS TABLE</a></li>
			</ul>
		</div>

		<!-- Page Content -->
		<div id="page-content-wrapper">
			<div class="container-fluid">
        
				<div class="row">
					<div class="col-lg-12">
						<a href="#" class="btn" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
            
          </div>
          <?php $content?>
				</div>
				
			</div>
		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
	</script>
	<script scr="<?php echo base_url('assets/js/fontawesome.min.js') ?>"></script>
	<script>
		$(document).ready(function () {
			$("#menu-toggle").click(function (e) {
				e.preventDefault();
				$("#wrapper").toggleClass("menuDisplayed");
			});
		});

	</script>
	<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="
    sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin="">
	</script>
	
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
					integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
					crossorigin="" />
</body>

</html>
