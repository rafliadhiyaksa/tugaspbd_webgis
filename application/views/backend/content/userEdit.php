<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<span class="card-title"><?php echo $pageTitle; ?></span>
			<p class="card-description">
				Data Akun
			</p>
			<div class="card-content">
				<form class="row" id="edit-user-form" method="post" action="">
					<?php if(validation_errors()): ?>
					<div class="col s12">
						<div class="card-panel">
							<span class="white-text"><?php echo validation_errors('<p>', '</p>'); ?></span>
						</div>
					</div>
					<?php endif; ?>
					<?php if($message = $this->session->flashdata('message')): ?>
					<div class="col s12">
						<div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
							<span class="white-text"><?php echo $message['message']; ?></span>
						</div>
					</div>
					<?php endif; ?>
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="nama">Nama</label>
              <input id="nama" name="nama" type="text" value="" class="form-control" placeholder="Nama">
						</div>
						<div class="form-group col-md-6">
							<label for="username">Username</label>
              <input id="username" name="username" type="text" value="<?php echo $user->username; ?>" class="form-control">
						</div>
            <div class="form-group col-md-6">
							<label for="password">Password</label>
              <input id="password" name="password" type="password" value="" class="form-control" placeholder="Password">
						</div>
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
							<label for="role">Role</label>
							<select id="role" name="role" class="form-control">
							<option <?php echo ($user->role === 'admin') ? 'selected' : ''; ?> value="admin">Admin</option>
                  <option <?php echo ($user->role === 'operator') ? 'selected' : ''; ?> value="operator">Operator</option>
                  <option <?php echo ($user->role === 'user') ? 'selected' : ''; ?> value="user">User</option>
						</select>
						</div>
					</div>
          <div class="col-md-4"></div>
          <button type="submit" name="submit" value="<?php echo $user->id; ?>"
							class="btn btn-primary col-md-4">Edit</button>
          </div>

				</form>
			</div>

		</div>
	</div>
</div>
