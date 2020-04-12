<?php $this->load->view('backend/header') ?>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php $this->load->view('backend/navbar') ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php $this->load->view('backend/sidebar') ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12 mb-4 mb-xl-0">
              <h4 class="font-weight-bold text-dark">ACCOUNT DATA</h4>
              <p class="font-weight-normal mb-2 text-muted"><?php echo tanggal() ?></p>
            </div>
          </div>
          <?=$content?>
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