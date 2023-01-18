<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
	          	<div class="x_title">
	            	<h2>Data Jadwal</h2>

	            	<div class="clearfix"></div>
	          	</div>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box table-responsive">
			                    <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
			                    	<thead>
			                          	<tr class="headings">
				                            <th class="column-title text-center">No</th>
				                            <th class="column-title text-center">Kode Kapal </th>
				                            <th class="column-title text-center">Nama Kapal </th>
				                            <th class="column-title text-center">Kota Tujuan</th>
				                            <th class="column-title text-center">Jam Berangkat</th>
				                            <th class="column-title text-center">Tanggal Berangkat </th>
				                            <th class="column-title text-center">Kelas</th>
				                            <th class="column-title text-center">Jumlah Kursi</th>
				                            <th class="bulk-actions" colspan="7">
				                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
				                            </th>
			                          	</tr>
			                        </thead>

                  					<tbody>
				                        <?php $no= 1; foreach ($jadwal as $jadwal) {?>
				                        <tr>
											<td align="center"><?php echo $no++ ?></td>
											<td align="center"><?php echo $jadwal->kd_jadwal ?></td>
											<td align="center"><?php echo $jadwal->nama_kapal ?></td>
											<td align="center"><?php echo $jadwal->kota_tujuan ?></td>
											<td align="center"><?php echo $jadwal->jam_berangkat ?></td>
											<td align="center"><?php echo $jadwal->tgl_berangkat ?></td>
											<td align="center"><?php echo $jadwal->nama_kelas ?></td>
											<td align="center"><?php echo $jadwal->jml_kursi ?></td>
										</tr>
										<?php } ?>
                					</tbody>
                				</table>
              				</div>
            			</div>
          			</div>
        		</div>
            </div>
        </div>
    </div>
</div>