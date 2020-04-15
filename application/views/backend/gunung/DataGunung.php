<div class="row">
	<div class="col">
		<div class="card">
			<!-- Card header -->
			<div class="card-header border-0">
				<h3 class="mb-0"><?=$title1?>
				<div class="col-lg-6 col-5 text-right mb-0 float-xl-right">
                <a href="<?=site_url($url.'/form/tambah')?>" class="btn btn-sm btn-neutral"><i
							class="fas fa-plus"></i> Add</a>
				<a href="<?=site_url($url.'/pdf')?>" class="btn btn-sm btn-neutral"><i
							class="fas fa-file-pdf"></i> Export PDF</a>
            </div>
					
				</h3>
			</div>

			<!-- Light table -->

			<div class="table-responsive">
				<table class="table align-items-center table-flush">

					<thead class="thead-light">
						<tr>
							<th style="text-align:center; font-weight:bold; "><h4>No</h4></th>
							<th style="text-align:center; font-weight:bold; "><h4>Nama Gunung</h4></th>
							<th style="text-align:center; font-weight:bold; "><h4>Lokasi</h4></th>
							<th style="text-align:center; font-weight:bold; "><h4>Keterangan</h4></th>
							<th style="text-align:center; font-weight:bold; "><h4>latitude</h4></th>
							<th style="text-align:center; font-weight:bold; "><h4>Longitude</h4></th>
							<th style="text-align:center; font-weight:bold; "><h4>Status</h4></th>
							<th style="text-align:center; font-weight:bold; "><h4>GeoJSON</h4></th>
							<th style="text-align:center; font-weight:bold; "><h4>Aksi</h4></th>
						</tr>
					</thead>
					<tbody class="list">
						<?php
                    $no=1;
			foreach ($datatable->result() as $row) {
				?>
						<tr>
							<td style="text-align:center; font-weight:bold"><?=$no?></td>
							<td style="text-align:center; font-weight:bold"><?=$row->nm_gunung?></td>
							<td style="text-align:center; font-weight:bold"><?=$row->lokasi?></td>
							<td style="text-align:center; font-weight:bold"><?=$row->keterangan?></td>
							<td style="text-align:center; font-weight:bold"><?=$row->lat?></td>
							<td style="text-align:center; font-weight:bold"><?=$row->lng?></td>
							<td class="text-center">
								<?=($row->status==''?'-':'<img src="'.assets('unggah/status/'.$row->status).'" width="40px">')?>
							</td>
							<td style="text-align:center; font-weight:bold"><a href="<?=assets('unggah/geojson/'.$row->geojson_gunung)?>"
									target="_BLANK"><?=$row->geojson_gunung?></a></td>

							<!-- <td style="background: <?=$row->warna_gunung?>"></td> -->
							<td style="text-align:center; font-weight:bold">
							<a href="<?=site_url($url.'/form/ubah/'.$row->id_gunung)?>" class="btn btn-sm btn-neutral"><i
							class="fas fa-pencil-alt"></i> Edit</a>
							<a href="<?=site_url($url.'/hapus/'.$row->id_gunung)?>" class="btn btn-sm btn-neutral"><i
							class="fas fa-trash-alt"></i> Delete</a>
							</td>
						</tr>
						<?php
                $no++;
                                }
                ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


</html>
