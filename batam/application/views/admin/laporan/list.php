<div class="right_col" role="main">
	<div class="">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
	          	<div class="x_title">
	            	<h2>Data Laporan</h2>
	            	<ul class="nav navbar-right panel_toolbox">
	              		<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
	            	</ul>
	            	<div class="clearfix"></div>
	          	</div>
	          	<?php
					//notifikasi erorr
					echo validation_errors('<div class="alert alert-warning">', '</div>');
					//notifikasi erorr
					echo form_open_multipart(base_url('admin/laporan/cetak_lap/'),' class="form-horizontal"');
				?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Bulan</label>
                            <select name="bulan" class="col-md-6 col-sm-6 form-horizontal">
                                <?php 
                                    $mulai = 1;
                                    for ($i = $mulai; $i < $mulai + 12; $i++) { 
                                        echo '<option value="'. $i. '">'. $i. '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Tahun</label>
                            <select name="tahun" class="col-md-6 col-sm-6 form-horizontal">
                                <?php 
                                    $mulai = date('Y');
                                    for ($i = $mulai; $i < $mulai + 6; $i++) { 
                                        echo '<option value="'. $i. '">'. $i. '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" name="submit"class="btn btn-outline-success rounded-pill">
                                    <i class="fa fa-check"></i>Cetak</button>
                                <button type="button" class="btn btn-outline-info rounded-pill">
                                    <i class="fa fa-times"></i><a href="<?php echo base_url() ?>admin/laporan">Kembali</a></button>
                            </div>
                        </div>
                    </div>
                </div>
<!-- 	          	<form>                        
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Mulai<span class="required"></span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" class='text' type="date" name="tgl_mulai" value="<?php echo set_value('tgl_mulai'); ?>" required="required"></div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Akhir<span class="required"></span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" class='text' type="date" name="tgl_akhir" value="<?php echo set_value('tgl_akhir'); ?>" required="required"></div>
                    </div>

                	<div class="ln_solid">
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" name="submit"class="btn btn-outline-success rounded-pill">
                                    <i class="fa fa-check"></i>Cetak</button>
                                <button type="button" class="btn btn-outline-info rounded-pill">
                                    <i class="fa fa-times"></i><a href="<?php echo base_url() ?>admin/laporan">Kembali</a></button>
                            </div>
                        </div>
                    </div>                        
                </form> -->
				<?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
