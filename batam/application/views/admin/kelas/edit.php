<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Kelas <small>Edit Kelas</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="" action="<?= base_url('admin/kelas/edit/'.$kelas->kd_kelas) ?>" method="post">
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Kode Kelas<span class="readonly"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="text" name="kd_kelas"  value="<?php echo $kelas->kd_kelas; ?>" readonly="readonly"></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Kelas<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="text" name="nama_kelas" value="<?php echo $kelas->nama_kelas; ?>" required="required"></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Harga Kelas<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="int" name="kelas_harga" value="<?php echo $kelas->kelas_harga; ?>" required="required"></div>
                            </div>

                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="text-center">
                                        <button type="submit" name="submit"class="btn btn-outline-success rounded-pill"><i class="fa fa-save"></i>Simpan</button>
                                        <button type="button" class="btn btn-outline-info rounded-pill">
                                            <a href="<?php echo base_url() ?>admin/kelas">Reset</a>
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