<?php
//notifikasi erorr
echo validation_errors('<div class="alert alert-warning">', '</div>');
//notifikasi erorr
echo form_open_multipart(base_url('admin/pemesanan/tambah/'),' class="form-horizontal"');

?>
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Order <small>Tambah Order</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Kode Order<span class="readonly"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="text" name="kd_order"  value="<?php echo $kode; ?>" readonly="readonly"></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Pemesan<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="text" name="nama_order" value="<?php echo set_value('nama_order'); ?>" required="required"></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Umur<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control" name="umur" placeholder="Umur" value="<?php echo set_value('umur'); ?>" required="required"></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="text" name="alamat_order" value="<?php echo set_value('alamat_order'); ?>" required="required"></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Kota Asal<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="text" name="kota_order" value="<?php echo set_value('kota_order'); ?>" required="required"></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">No Hp<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="text" name="no_hp" value="<?php echo set_value('no_hp'); ?>" required="required"></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Berangkat<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='text' type="date" name="tgl_berangkat" value="<?php echo set_value('tgl_berangkat'); ?>" required="required"></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Tujuan<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="kode_tujuan_order">
                                       <option value="" selected disabled="">-Pilih Tujuan-</option>
                                    <?php foreach ($tujuan as $row ) {?>
                                        <option value="<?= $row['kd_jadwal']; ?>">
                                            <?= strtoupper($row['kota_tujuan']
                                            ." - ".$row['nama_kapal']
                                            ." - ".$row['nama_kelas']
                                            ." - ".$row['jam_berangkat']); ?> </option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>

                        <div class="ln_solid">
                                <div class="form-group">
                                    <div class="text-center">
                                        <button type="submit" name="submit"class="btn btn-outline-success rounded-pill">
                                            <i class="fa fa-save"></i>Simpan</button>
                                        <button type="button" class="btn btn-outline-info rounded-pill">
                                            <i class="fa fa-times"></i><a href="<?php echo base_url() ?>admin/pemesanan">Reset</a></button>
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
