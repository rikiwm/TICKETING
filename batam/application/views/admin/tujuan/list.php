<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
	          	<div class="x_title">
	            	<h2>Data Tujuan</h2>
	            	<ul class="nav navbar-right panel_toolbox">
	              		<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
	              		<li><a href="<?php echo base_url() ?>admin/tujuan/tambah" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalKapal">Add Data</a></li>
	            	</ul>
	            	<div class="clearfix"></div>
	          	</div>
	          	<?php
					if($this->session->flashdata('sukses')){
						echo '<p class="alert alert-success">';
						echo $this->session->flashdata('sukses');
					}
				?>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box table-responsive">
			                    <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
			                    	<thead>
			                          	<tr class="headings">
				                            <th class="column-title text-center">No</th>
				                            <th class="column-title text-center">Kode Tujuan</th>
				                            <th class="column-title text-center">Kota Tujuan</th>
				                            <th class="column-title text-center">Nama Pelabuhan</th>
				                            <th class="column-title no-link last text-center"><span class="nobr">Action</span>
				                            </th>
				                            <th class="bulk-actions" colspan="7">
				                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
				                            </th>
			                          	</tr>
			                        </thead>

                  					<tbody>
				                        <?php $no= 1; foreach ($tujuan as $tujuan) {?>
				                        <tr>
											<td align="center"><?php echo $no++ ?></td>
											<td align="center"><?php echo $tujuan->kd_tujuan?></td>
											<td align="center"><?php echo $tujuan->kota_tujuan?></td>
											<td align="center"><?php echo $tujuan->nama_pelabuhan?></td>
											<td align="center">
												<a href="<?= base_url('admin/tujuan/edit/' .$tujuan->kd_tujuan) ?>" class="btn btn-secondary btn-sm rounded-pill">Edit</a>
												<a href="<?= base_url('admin/tujuan/delete/' .$tujuan->kd_tujuan) ?>" onclick="return confirm('Data ini akan dihapus? ')" class="btn btn-danger btn-sm rounded-pill">Hapus</a>
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

<div class="modal fade" id="ModalKapal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			    <h5 class="modal-title" id="exampleModalLabel">Tambah Kapal</h5>
			    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			    </button>
			</div>
			<div class="modal-body">
			    <form action="<?= base_url()?>admin/tujuan/tambah" method="post">
			      	<div class="form-group">
			        	<label for="platbus" class="">Kode Tujuan</label>
			        	<input type="text" class="form-control" name="kd_kapal" value="<?php echo $kode; ?>" readonly>
			      	</div>
			      	<div class="form-group">
			        	<label for="platbus" class="">Nama Kota</label>
			        	<input type="text" class="form-control" name="kota_tujuan" placeholder="Kota Tujuan" required>
			      	</div>
			      	<div class="form-group">
			        	<label for="platbus" class="">Nama Pelabuhan</label>
			        	<input type="text" class="form-control" name="nama_pelabuhan" placeholder="Nama Pelabuhan" required>
			      	</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        	<button class="btn btn-primary">Simpan</button>
			      	</div>
			    </form>
			</div>
		</div>
	</div>
</div>

