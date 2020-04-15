<div class="row">
	<div class="col">
		<div class="card">
			<!-- Card header -->
			<div class="card-header border-0">
				<h3 class="mb-0"><?=$accountdata?>
				<div class="col-lg-6 col-5 text-right mb-0 float-xl-right">
              <a href="<?php echo base_url('admin/add'); ?>" class="btn btn-sm btn-neutral"><i
							class="fa fa-plus"></i> Add</a>
            </div>
				</h3>
			</div>

			<!-- Light table -->

			<div class="table-responsive">
				<table class="table align-items-center table-flush">

					<thead class="thead-light">
						<tr>
							<th style="text-align:center; font-weight:bold; "><h4>No</h4></th>
							<th style="text-align:center; font-weight:bold"><h4>Nama</h4></th>
							<th style="text-align:center; font-weight:bold"><h4>Username</h4></th>
							<th style="text-align:center; font-weight:bold"><h4>Role</h4></th>
							<th style="text-align: center; font-weight:bold"><h4>Action</h4></th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; foreach($akun as $row): ?>
						<tr>
							<td style="text-align:center; font-weight:bold">
								<div >
									<span class="name mb-0 text-sm"><?php echo ++$no; ?></span>
								</div>
							</td>
							<td style="text-align:center; font-weight:bold">
								<div >
									<span class="name mb-0 text-sm"><?php echo $row->nama; ?></span>
								</div>
							</td>
							<td style="text-align:center; font-weight:bold">
							<div >
									<span class="name mb-0 text-sm"><?php echo $row->username; ?></span>
								</div>
							</td>
							<td style="text-align:center; font-weight:bold">
							<div >
									<span class="name mb-0 text-sm"><?php echo $row->role; ?></span>
								</div>
								
							</td>
							<td style="text-align:center">
							<a href="<?php echo base_url('admin/edit/' . $row->id); ?>" class="btn btn-sm btn-neutral"><i
							class="fas fa-pencil-alt"></i> Edit</a>
							<a href="<?php echo base_url('admin/delete/' . $row->id); ?>" class="btn btn-sm btn-neutral"><i
							class="fas fa-trash-alt"></i> Delete</a>
								
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
