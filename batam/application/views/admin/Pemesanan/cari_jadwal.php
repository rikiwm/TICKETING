<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
	          	<div class="x_title">
	            	<h2>Data Jadwal</h2>
	            	<ul class="nav navbar-right panel_toolbox">
	              		<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
	            	</ul>
	            	<div class="clearfix"></div>
	            	<?php
						if($this->session->flashdata('sukses')){
							echo '<p class="alert alert-success">';
							echo $this->session->flashdata('sukses');
						}
					?>
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
				                            <th class="column-title no-link last text-center"><span class="nobr">Action</span>
				                            </th>
				                            <th class="bulk-actions" colspan="7">
				                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
				                            </th>
			                          	</tr>
			                        </thead>

                  					<tbody>
				                        <?php $no= 1; foreach ($check as $c) {?>
				                        <tr>
											<td align="center"><?php echo $no++ ?></td>
											<td align="center"><?php echo $c->kd_jadwal ?></td>
											<td align="center"><?php echo $c->nama_kapal ?></td>
											<td align="center"><?php echo $c->kota_tujuan ?></td>
											<td align="center"><?php echo $c->jam_berangkat ?></td>
											<td align="center"><?php echo $c->tgl_berangkat ?></td>
											<td align="center"><?php echo $c->nama_kelas ?></td>
											<td align="center"><?php echo $c->jml_kursi ?></td>
											<td align="center">
												<a href="<?= base_url('admin/pemesanan/pesan/' .$c->kd_jadwal) ?>" onclick="return confirm('Yakin pilih jadwal ini ')"class="btn btn-success btn-sm rounded-pill">Pesan</a>
											</td>
											
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