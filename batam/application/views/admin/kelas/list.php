<div class="right_col" role="main">
	<div class="">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
	          	<div class="x_title">
	            	<h2>Data Kelas</h2>
	            	<ul class="nav navbar-right panel_toolbox">
	              		<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
	              		<button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#ModalKelas">Add Data</button>
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
							<div class="table-responsive">
			                    <table id="datatable" class="table table-bordered" style="width:100%">
			                    	<thead>
			                          	<tr>
				                            <th class="text-center">No</th>
				                            <th class="text-center">Kode Kelas</th>
				                            <th class="text-center">Nama Kelas</th>
				                            <th class="text-center">Harga Kelas</th>
				                            <th class="text-center">Action</th>
			                          	</tr>
			                        </thead>

                  					<tbody>
				                        <?php $no= 1; foreach ($kelas as $kelas) {?>
				                        <tr>
											<td align="center"><?php echo $no++ ?></td>
											<td align="center"><?php echo $kelas->kd_kelas?></td>
											<td align="center"><?php echo $kelas->nama_kelas?></td>
											<td align="center"><?php echo $kelas->kelas_harga?></td>
											<td align="center">
												<a href="<?= base_url('admin/kelas/edit/' .$kelas->kd_kelas) ?>" class="btn btn-secondary btn-sm rounded-pill">Edit</a>
												<a href="<?= base_url('admin/kelas/delete/' .$kelas->kd_kelas) ?>"  onclick="return confirm('Yakin data ini akan dihapus? ')" class="btn btn-danger btn-sm rounded-pill">Hapus</a>
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

<div class="modal fade" id="ModalKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			    <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
			    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			    </button>
			</div>
			<div class="modal-body">
			    <form action="<?= base_url()?>admin/kelas/tambah" method="post">
			      	<div class="form-group">
			        	<label for="platbus" class="">Kode Kelas</label>
			        	<input type="text" class="form-control" name="kd_kelas" value="<?php echo $kode; ?>" readonly>
			      	</div>
			      	<div class="form-group">
			        	<label for="platbus" class="">Nama Kelas</label>
			        	<input type="text" class="form-control" name="nama_kelas" placeholder="Nama Kelas" required>
			      	</div>
			      	<div class="form-group">
			        	<label for="platbus" class="">Harga Kelas</label>
			        	<input type="int" class="form-control" name="kelas_harga" placeholder="Harga Kelas" required>
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
