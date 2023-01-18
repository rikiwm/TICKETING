<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Jadwal <small>Edit Jadwal</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="" action="<?= base_url('admin/jadwal/edit/'. $jadwal->kd_jadwal) ?>" method="post" novalidate>
                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Kode Jadwal</label>
                                    <input type="text" class="form-control" name="kd_jadwal" placeholder="" value="<?php echo $jadwal->kd_jadwal; ?>" readonly>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Kode Kapal</label>
                                        <select class="form-control" name="kd_kapal">
                                            <option value="">-Pilih Kapal-<?php echo $jadwal->nama_kapal; ?></option>
                                                <?php foreach ($kapal as $data ) {?>
                                                    <option  value="<?= $data->kd_kapal ?>" ><?= strtoupper($data->nama_kapal); ?> </option>
                                                <?php } ?>
                                        </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Kota Tujuan</label>
                                        <select class="form-control" name="kode_tujuan">
                                            <option value="">-Pilih Tujuan-<?php echo $jadwal->kota_tujuan; ?></option>
                                                <?php foreach ($tujuan as $data ) {?>
                                                    <option value="<?= $data->kd_tujuan ?>" ><?= strtoupper($data->kota_tujuan); ?> </option>
                                                <?php } ?>
                                        </select>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Harga Dewasa</label>
                                    <input type="int" class="form-control" name="harga_dewasa" placeholder="" value="<?php echo $jadwal->harga_dewasa; ?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Jam Berangkat</label>
                                    <input type="time" class="form-control" name="jam_berangkat" placeholder="" value="<?php echo $jadwal->jam_berangkat; ?>">
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Harga Anak-Anak</label>
                                    <input type="int" class="form-control" name="harga_anak" placeholder="" value="<?php echo $jadwal->harga_anak; ?>">
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Tanggal Berangkat</label>
                                    <input type="date" class="form-control" name="tgl_berangkat" placeholder="" value="<?php echo $jadwal->tgl_berangkat; ?>" required>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Jumlah Kursi</label>
                                    <input type="int" class="form-control" name="jml_kursi" placeholder="" value="<?php echo $jadwal->jml_kursi; ?>" required>
                                </div>
                            </div>

                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="text-center">
                                        <button type='submit' class="btn btn-primary rounded-pill">Submit</button>
                                        <button type="button" class="btn btn-outline-info rounded-pill">
                                            <a href="<?php echo base_url() ?>admin/jadwal">Reset</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                            


