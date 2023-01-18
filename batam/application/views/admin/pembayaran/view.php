<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail<small>detail tiket</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="" method="post" novalidate>
                            <p>Kode Tiket : <?= $kd_tiket ?></p>
                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Kode Order</label>
                                    <input type="text" class="form-control" name="kd_order" placeholder="" value="<?php echo $pesan->kd_order; ?>" readonly>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Nama Order</label>
                                    <input type="text" class="form-control" name="kd_order" placeholder="" value="<?php echo $pesan->nama_order; ?>" readonly>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Umur</label>
                                    <input type="text" class="form-control" name="umur" placeholder="" value="<?php echo $pesan->umur; ?>" readonly>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Tanggal Berangkat</label>
                                    <input type="date" class="form-control" name="tgl_berangkat" placeholder="" value="<?php echo $pesan->tgl_berangkat; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Tujuan</label>
                                    <input type="text" class="form-control" name="tujuan" placeholder="" value="<?php echo $pesan->kota_tujuan; echo " - "; echo $pesan->nama_kelas; ?>" readonly>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Total Bayar</label>
                                    <input type="int" class="form-control" name="total" placeholder="" value="<?php echo $total; ?>">
                                </div>
                            </div>

                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="text-center">
                                        <button type="button" class="btn btn-outline-info rounded-pill">
                                            <a href="<?php echo base_url() ?>admin/pemesanan">Kembali</a>
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