<?php
//notifikasi erorr
echo validation_errors('<div class="alert alert-warning">', '</div>');
//notifikasi erorr
echo form_open_multipart(base_url('admin/tujuan/tambah/'),' class="form-horizontal"');

?>
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tujuan <small>Tambah Tujuan</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Kode Tujuan<span class="readonly"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="text" name="kd_tujuan"  value="<?php echo $kode; ?>" readonly="readonly"></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Kota Tujuan<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="text" name="kota_tujuan" value="<?php echo set_value('kota_tujuan'); ?>" required="required"></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Pelabuhan<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="text" name="nama_pelabuhan" value="<?php echo set_value('nama_pelabuhan'); ?>" required="required"></div>
                            </div>
                        
                        <div class="ln_solid">
                                <div class="form-group">
                                    <div class="text-center">
                                        <button type="submit" name="submit"class="btn btn-outline-success rounded-pill">
                                            <i class="fa fa-save"></i>Simpan</button>
                                        <button type="button" class="btn btn-outline-info rounded-pill">
                                            <i class="fa fa-times"></i><a href="<?php echo base_url() ?>admin/tujuan">Reset</a></button>
                                    </div>
                                </div>
                            </div>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo form_close(); ?>