<?php $this->load->view('frontend/account/header') ?>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Login
					</span>
					<span class="login100-form-title p-b-48">
							<!-- <i class="fa fa-user-circle"></i> -->
					</span>

					<!-- UNTUK USERNAME -->
					<div class="wrap-input100 validate-input" data-validate = "Enter Username">
						<input class="input100" type="text" id="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<!-- UNTUK PASSWORD -->
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" id="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="button">
								Login
							</button>
						</div>
					</div>

					
					<div class="text-center p-t-115">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="#">
							<?php echo anchor('Register','Register'); ?>
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
        
          var username = $("#username").val();
          var password = $("#password").val();

          if(username.length == "") {

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

            $.ajax({

              url: "<?php echo base_url() ?>login/cek_login",
              type: "POST",
              data: {
                  username : username,
                  password : password
              },

              success: function(response){

                if (response == "success") {
                
                  Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "<?php echo base_url() ?>main";
                  });

                } else {

                  Swal.fire({
                    type: 'error',
                    title: 'Login Gagal!',
                    text: 'Username atau Password Salah'
                  });


                }

                console.log(response);

              },

              error:function(response){

                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error!'
                  });

                  console.log(response);

              }

            });

          }

        }); 

      });
    </script>


</body>
</html>