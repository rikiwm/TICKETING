<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
	          	<div class="x_title">
	            	<h2>Data User</h2>
	            	<ul class="nav navbar-right panel_toolbox">
	              		<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
	              		<li><a href="<?php echo base_url() ?>admin/user/tambah" class="btn btn-sm btn-primary">Add Data</a></li>
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
			                          	<tr class="headings text-center">
				                            <th class="column-title">No</th>
				                            <th class="column-title">Nama</th>
				                            <th class="column-title">Email</th>
				                            <th class="column-title">Level</th>
				                            <th class="column-title no-link last"><span class="nobr">Action</span>
				                            </th>
				                            <th class="bulk-actions" colspan="7">
				                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
				                            </th>
			                          	</tr>
			                        </thead>

                  					<tbody>
				                        <?php $no= 1; foreach ($user as $user) {?>
				                        <tr align="center">
											<td><?php echo $no++ ?></td>
											<td><?php echo $user->nama_admin?></td>
											<td><?php echo $user->email_admin?></td>
											<td><?php echo $user->level_admin?></td>
											<td>
												<a href="<?= base_url('admin/user/edit/' .$user->kd_admin) ?>" class="btn btn-secondary btn-sm rounded-pill">Edit</a>
												<a href="<?= base_url('admin/user/delete/' .$user->kd_admin) ?>"  onclick="return confirm('Data ini akan dihapus? ')" class="btn btn-danger btn-sm rounded-pill">Hapus</a>
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


