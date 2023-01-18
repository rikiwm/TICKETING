<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Jadwal <small>Tambah Jadwal</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="" action="<?= base_url('admin/jadwal/tambah/') ?>" method="post" novalidate>
                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Kode Jadwal</label>
                                    <input type="text" class="form-control" name="kd_jadwal" placeholder="" value="<?php echo $kode; ?>" readonly>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Kode Kapal</label>
                                        <select class="form-control" name="kd_kapal">
                                            <option value="" selected disabled="">-Pilih Kapal-</option>
                                                <?php foreach ($kapal as $row ) {?>
                                                    <option value="<?= $row['kd_kapal'] ?>"><?= strtoupper($row['nama_kapal']); ?> </option>
                                                <?php } ?>
                                        </select>
                                </div>
                            </div>

                        <div class="form-row">
                            <div class="form-group col-12 col-md-6">
                                <label for="name">Kota Tujuan</label>
                                    <select class="form-control" name="kode_tujuan">
                                        <option value="" selected disabled="">-Pilih Tujuan-</option>
                                            <?php foreach ($tujuan as $row ) {?>
                                                <option value="<?= $row['kd_tujuan'] ?>" ><?= strtoupper($row['kota_tujuan']); ?> </option>
                                            <?php } ?>
                                    </select>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="name">Harga Dewasa</label>
                                <input type="int" class="form-control" name="harga_dewasa" placeholder="Rp. " value="<?php echo set_value('harga_dewasa'); ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12 col-md-6">
                                <label for="name">Jam Berangkat</label>
                                <input type="time" class="form-control" name="jam_berangkat" placeholder="" value="<?php echo set_value('jam_berangkat'); ?>">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="name">Harga Anak-Anak</label>
                                <input type="int" class="form-control" name="harga_anak" placeholder="Rp. " value="<?php echo set_value('harga_anak'); ?>">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="name">Jam Tiba</label>
                                <input type="time" class="form-control" name="jam_tiba" placeholder="" value="<?php echo set_value('jam_tiba') ?>" required>
                            </div>
                        </div>

                        <div class="ln_solid">
                                <div class="form-group">
                                    <div class="text-center">
                                        <button type="submit" name="submit"class="btn btn-outline-success rounded-pill">
                                            <i class="fa fa-save"></i>Simpan</button>
                                        <button type="button" class="btn btn-outline-info rounded-pill">
                                            <i class="fa fa-times"></i><a href="<?php echo base_url() ?>admin/jadwal">Reset</a></button>
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
            <!-- /page content -->