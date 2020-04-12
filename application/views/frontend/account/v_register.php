<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
 <?php $this->load->view('frontend/account/header') ?>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Register
					</span>
					<span class="login100-form-title p-b-48">
							<!-- <i class="fa fa-user-circle"></i> -->
					</span>


                    <!-- INI UNTUK NAMA-->
					<div class="wrap-input100 validate-input" data-validate = "Enter Name">
						<input class="input100" type="text" name="nama" id="nama">
						<span class="focus-input100" data-placeholder="Name"></span>
					</div>

                    <!-- INI UNTUK USERNAME -->
                    <div class="wrap-input100 validate-input" data-validate = "Enter Username">
						<input class="input100" type="text" name="username" id="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

                    <!-- INI UNTUK PASSWORD -->
					<div class="wrap-input100 validate-input" data-validate="Enter Password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

                    <!-- INI UNTUK CONFIRM PASSWORD -->
					<!-- <div class="wrap-input100 validate-input" data-validate="Confirm Password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="con-password">
						<span class="focus-input100" data-placeholder="Confirm Password"></span>
					</div> -->

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="button">
                                Register
							</button>
						</div>
					</div>


					<div class="text-center p-t-115">
						<span class="txt1">
							Already have an account?
						</span>

						<a class="txt2" href="#">
							<?php echo anchor('Login','Login'); ?>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

    <?php $this->load->view('frontend/account/footer') ?>
    
    <script>
      $(document).ready(function() {

        $(".login100-form-btn").click( function() {
        
          var nama = $("#nama").val();
          var username = $("#username").val();
          var password = $("#password").val();

          if (nama.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Nama Wajib Diisi !'
            });

          } else if(username.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Username Wajib Diisi !'
            });

          } else if(password.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Password Wajib Diisi !'
            });

          } else {

            //ajax
            $.ajax({

              url: "<?php echo base_url('register/simpan') ?>",
              type: "POST",
              data: {
                  nama : nama,
                  username : username,
                  password : password
              },

              success:function(response){

                if (response == "success") {
                
                  Swal.fire({
                    type: 'success',
                    title: 'Register Berhasil!',
                    text: 'silahkan login!'

                  }).then (function() {
                    window.location.href = "<?php echo base_url() ?>login";
                  });

                  $("#nama").val('');
                  $("#username").val('');
                  $("#password").val('');

                  

                } else {

                  Swal.fire({
                    type: 'error',
                    title: 'Register Gagal!',
                    text: 'silahkan coba lagi!'
                  });

                }

                console.log(response);

              },

              error:function(response){
                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'Username sudah ada'
                  });

                  console.log(response);
              }

            })

          }

        }); 

      });
    </script>

</body>
</html>