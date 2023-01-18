 <div class="right_col" role="main">
	<div class="">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
	          	<div class="x_title">
	            	<h2>Data Order</h2>
	            	<ul class="nav navbar-right panel_toolbox">
	              		<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
	            	</ul>
	            	<div class="clearfix"></div>
	          	</div>
	          	<?php
					if($this->session->flashdata('sukses')){
						echo '<p class="alert alert-success">';
						echo $this->session->flashdata('sukses');
					}
					if($this->session->flashdata('warning')){
						echo '<p class="alert alert-warning">';
						echo $this->session->flashdata('warning');
					}
				?>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							<div class="table-responsive">
			                    <table id="datatable" class="table table-bordered" style="width:100%">
			                    	<thead>
			                          	<tr>
			                          		<th class="font-weight-semi-bold border-top-0 py-2">No</th>
								            <th class="font-weight-semi-bold border-top-0 py-2">Kode Order</th>
								            <th class="font-weight-semi-bold border-top-0 py-2">Tanggal pesan</th>
								            <th class="font-weight-semi-bold border-top-0 py-2">Nama Pemesan</th>
								            <th class="font-weight-semi-bold border-top-0 py-2">Nama Kapal</th>
								            <th class="font-weight-semi-bold border-top-0 py-2">Kelas Tiket</th>
								            <th class="font-weight-semi-bold border-top-0 py-2">Jam Berangkat</th>
								            <th class="font-weight-semi-bold border-top-0 py-2">Tujuan</th>
								            <th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
			                          	</tr>
			                        </thead>

                  					<tbody>
				                        <?php $no= 1; foreach ($order as $p) {?>
				                        <tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $p->kd_order?></td>
											<td><?php echo $p->tgl_pesan?></td>
											<td><?php echo $p->nama_order?></td>
											<td><?php echo $p->nama_kapal ?></td>
											<td><?php echo $p->nama_kelas?></td>
											<td><?php echo $p->jam_berangkat?></td>
											<td><?php echo $p->kota_tujuan?></td>
											<td>
												<a href="<?= base_url('admin/pembayaran/bayar/' .$p->kd_order) ?>" class="btn btn-info btn-sm rounded-pill">View</a>
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
