<?php
//notifikasi erorr
echo validation_errors('<div class="alert alert-warning">', '</div>');
//notifikasi erorr
echo form_open_multipart(base_url('admin/user/tambah/'),' class="form-horizontal"');

?>
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Pengguna<small>Tambah Pengguna</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Kode Admin<span class="readonly"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="text" name="kd_admin"  value="<?php echo $kode; ?>" readonly="readonly"></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="text" name="nama_admin" value="<?php echo set_value('nama_admin'); ?>" required="required"></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Username<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="text" name="username" value="<?php echo set_value('username'); ?>" required="required"></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="email" name="email_admin" value="<?php echo set_value('email_admin'); ?>" required="required"></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Password<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="password" name="password" value="<?php echo set_value('password'); ?>" required="required"></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Konfirmasi Password</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="password" name="password_confirm" value=""></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Level Akses<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select name="level_admin" class="form-control" required="required">
                                    <option value="1">Admin</option>
                                    <option value="2">Kasir</option>
                                    <div class="dropdown-divider"></div>
                                </select>
                                </div>
                            </div>
                        
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="text-center">
                                        <button type="submit" name="submit"class="btn btn-outline-success rounded-pill">
                                            <i class="fa fa-save"></i>Simpan</button>
                                        <button type="button" class="btn btn-outline-info rounded-pill">
                                            <i class="fa fa-times"></i><a href="<?php echo base_url() ?>admin/user">Reset</a></button>
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