<?php
    //notifikasi erorr
    echo validation_errors('<div class="alert alert-warning">', '</div>');

    //notifikasi erorr
    echo form_open(base_url('admin/user/edit/'.$user->kd_admin),'class="form-horizontal"');
?>


<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>User <small>Edit User</small></h2>
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
                                    <input class="form-control" class='text' type="text" name="nama_admin"  value="<?php echo $user->kd_admin; ?>" readonly></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Pengguna</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="text" name="nama_admin"  value="<?php echo $user->nama_admin; ?>"></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Username</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="text" name="username"  value="<?php echo $user->username; ?>"></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Email</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="email" name="email_admin" value="<?php echo $user->email_admin; ?>" ></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Password</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="password" name="password" value="<?php echo $user->password; ?>"></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Konfirmasi Password</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="password" name="password_confirm" value="<?php echo $user->password; ?>"></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Level Akses</label>
                                <div class="col-md-6 col-sm-6">
                                    <select name="level_admin" class="form-control">
                                        <option value="1" <?php if($user->level_admin=="1") { echo "selected";}?> >Admin</option>
                                        <option value="2" <?php if($user->level_admin=="2") { echo "selected";}?> >Kasir</option>
                                        <div class="dropdown-divider"></div>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="text-center">
                                        <button type='submit' class="btn btn-primary rounded-pill">Submit</button>
                                        <button type="button" class="btn btn-outline-info rounded-pill">
                                            <a href="<?php echo base_url() ?>admin/user">Reset</a>
                                        </button>
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