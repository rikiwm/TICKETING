<div class="right_col" role="main">
	<div class="">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
	          	<div class="x_title">
	            	<h2>Data Order</h2>
	            	<ul class="nav navbar-right panel_toolbox">
	              		<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
	              		<!-- <li><a href="<?php echo base_url() ?>admin/pemesanan/tambah" class="btn btn-sm btn-primary">Add Data</a></li> -->
	              		<button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#ModalOrder">Add Data</button>
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
				                            <th class="text-center">No</th>
				                            <th class="text-center">Kode Order</th>
				                            <th class="text-center">Tanggal Pesan</th>
				                            <th class="text-center">Nama Pemesan</th>
				                            <th class="text-center">Nama Kapal</th>
				                            <th class="text-center">Kelas Tiket</th>
				                            <th class="text-center">Jam Berangkat</th>
				                            <th class="text-center">Tujuan</th>
				                            <th class="text-center">Action</th>
			                          	</tr>
			                        </thead>

                  					<tbody>
				                        <?php $no= 1; foreach ($order as $p) {?>
				                        <tr>
											<td align="center"><?php echo $no++ ?></td>
											<td align="center"><?php echo $p->kd_order?></td>
											<td align="center"><?php echo $p->tgl_pesan?></td>
											<td align="center"><?php echo $p->nama_order?></td>
											<td align="center"><?php echo $p->nama_kapal ?></td>
											<td align="center"><?php echo $p->nama_kelas?></td>
											<td align="center"><?php echo $p->jam_berangkat?></td>
											<td align="center"><?php echo $p->kota_tujuan?></td>
											<td align="center">
												<a href="<?= base_url('admin/pemesanan/view/' .$p->kd_order) ?>" class="btn btn-info btn-sm rounded-pill">View</a>
												<!-- <a href="<?= base_url('admin/pemesanan/delete/' .$p->kd_order) ?>"  onclick="return confirm('Data ini akan dihapus? ')" class="btn btn-danger btn-sm rounded-pill">Hapus</a> -->
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

<div class="modal fade" id="ModalOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			    <h5 class="modal-title" id="exampleModalLabel">Tambah Order</h5>
			    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			    </button>
			</div>
			<div class="modal-body">
			    <form action="<?= base_url()?>admin/pemesanan/cari_jadwal" method="post">
			    	<div class="form-row">
                        <div class="form-group col-12 col-md-18">
                            <label for="tgl_berangkat" class="">Tanggal Berangkat</label>
			        		<input type="date" class="form-control" name="tgl_berangkat" placeholder="Tanggal Berangkat" required="">
                        </div>
                    </div>
			      	
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        	<button class="btn btn-primary">Cari Jadwal</button>
			      	</div>
			    </form>
			</div>
		</div>
	</div>
</div>
