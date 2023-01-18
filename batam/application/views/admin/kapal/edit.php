<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Kapal <small>Edit Kapal</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="" action="<?= base_url('admin/kapal/edit/'.$kapal->kd_kapal) ?>" method="post" novalidate>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Kode Kapal<span class="readonly"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="text" name="kd_kapal"  value="<?php echo $kapal->kd_kapal; ?>" readonly="readonly"></div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Kapal<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="text" name="nama_kapal" value="<?php echo $kapal->nama_kapal; ?>" required="required"></div>
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="text-center">
                                        <button type='submit' class="btn btn-primary rounded-pill">Submit</button>
                                        <button type="button" class="btn btn-outline-info rounded-pill">
                                            <a href="<?php echo base_url() ?>admin/kapal">Reset</a>
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