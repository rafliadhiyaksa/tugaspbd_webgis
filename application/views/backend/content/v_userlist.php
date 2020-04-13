<!-- 
  <!DOCTYPE html>
  <html>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card mb-0">
      <div class="card-body pt-0">
        <form>
          <div class="row justify-content-center">
            <div class="col-9 col-sm-4 pr-0">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Cari Akun</label>
                <div class="input-group">
                  <input type="text" id="filter-cari" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-auto pl-0 col-sm-auto">
              <div class="form-group mb-0 pb-0" style="margin-top: 20px">
                <button class="btn btn-white btn-round btn-just-icon" type="button" data-toggle="tooltip" data-placement="top" title="Halaman selanjutnya">
                  <i class="material-icons">search</i>
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> -->





<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<span class="card-title">Account Data</span>

			<a href="<?php echo base_url('admin/add'); ?>" class="float-xl-right"><i class="fa fa-plus"></i></a>
			<p class="card-description">
                    Data Akun
                  </p>
			<div class="card-content">
				<?php if($message = $this->session->flashdata('message')): ?>
				<div class="col s12">
					<div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
						<span class="white-text"><?php echo $message['message']; ?></span>
					</div>
				</div>
				<?php endif; ?>
				<table class="table table-striped">
					<thead class="">
						<tr style="">
							<th>No</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Role</th>
							<th class="center-align">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; foreach($akun as $row): ?>
						<tr>
							<td><?php echo ++$no; ?></td>
							<td><?php echo $row->nama; ?></td>
							<td><?php echo $row->username; ?></td>
							<td><?php echo $row->role; ?></td>
							<td class="center-align">
								<a href="<?php echo base_url('admin/edit/' . $row->id); ?>"
									class="btn-floating" data-position="top"
									><i class="material-icons">edit</i></a>
								<a href="<?php echo base_url('admin/delete/' . $row->id); ?>"
									class="btn-floating" data-position="top"
									><i class="material-icons">delete</i></a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
        </table>

			</div>
		</div>
	</div>
</div>


</html>
