<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
	          	<div class="x_title">
	            	<h2>Data Jadwal</h2>
	            	<ul class="nav navbar-right panel_toolbox">
	              		<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
	              		<button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#Modaljadwal">Add Data</button>
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
											<td align="center">
												<a href="<?= base_url('admin/jadwal/edit/' .$jadwal->kd_jadwal) ?>" class="btn btn-secondary btn-sm rounded-pill">Edit</a>
												<a href="<?= base_url('admin/jadwal/delete/' .$jadwal->kd_jadwal) ?>" onclick="return confirm('Data ini akan dihapus? ')" class="btn btn-danger btn-sm rounded-pill">Hapus</a>
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
<div class="modal fade" id="Modaljadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			    <h5 class="modal-title" id="exampleModalLabel">Tambah Kapal</h5>
			    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			    </button>
			</div>
			<div class="modal-body">
			    <form action="<?= base_url()?>admin/jadwal/tambah" method="post">
			      	<div class="form-group">
			        	<label>Kode Jadwal</label>
			        	<input type="text" class="form-control" name="kd_jadwal" value="<?php echo $kode; ?>" readonly>
			      	</div>
			      	<div class="form-group">
			        	<label>Kapal</label>
			        	<select class="form-control" name="kd_kapal">
                            <option value="" selected disabled="">-Pilih Kapal-</option>
                                <?php foreach ($kapal as $row ) {?>
                                    <option value="<?= $row['kd_kapal'] ?>"><?= strtoupper($row['nama_kapal']); ?> </option>
                                <?php } ?>
                        </select>
			      	</div>
			      	<div class="form-group">
			        	<label>Tujuan</label>
			        	<select class="form-control" name="kode_tujuan">
                            <option value="" selected disabled="">-Pilih Tujuan-</option>
                                <?php foreach ($tujuan as $row ) {?>
                                    <option required value="<?= $row['kd_tujuan'] ?>" ><?= strtoupper($row['kota_tujuan']); ?> </option>
                                <?php } ?>
                        </select>
			      	</div>
			      	<div class="form-group">
			        	<label>Kelas</label>
			        	<select class="form-control" name="kode_kelas">
                            <option value="" selected disabled="">-Pilih Kelas-</option>
                                <?php foreach ($kelas as $row ) {?>
                                    <option required value="<?= $row['kd_kelas'] ?>" ><?= strtoupper($row['nama_kelas']); ?> </option>
                                <?php } ?>
                        </select>
			      	</div>
			      	<div class="form-group">
			        	<label>Harga Tiket Dewasa</label>
			        	<input type="int" class="form-control" name="harga_dewasa" placeholder="Rp. " required>
			      	</div>
			      	<div class="form-group">
			        	<label>Harga Tiket Anak-Anak</label>
			        	<input type="int" class="form-control" name="harga_anak" placeholder="Rp. " required>
			      	</div>
			      	<div class="form-group">
			        	<label>Jam Berangkat</label>
			        	<input type="time" class="form-control" name="jam_berangkat" required>
			      	</div>
			      	<div class="form-group">
			        	<label>Tanggal Berangkat</label>
			        	<input type="date" class="form-control" name="tgl_berangkat" required>
			      	</div>
			      	<div class="form-group">
			        	<label>Jumlah Kursi</label>
			        	<input type="int" class="form-control" name="jml_kursi" required>
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