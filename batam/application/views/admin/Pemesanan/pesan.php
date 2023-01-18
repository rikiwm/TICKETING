<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Pemesanan<small>Booking</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="" action="<?= base_url('admin/pemesanan/pesan/'. $jadwal->kd_jadwal) ?>" method="post" novalidate>
                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Kode Order</label>
                                    <input type="text" class="form-control" name="kd_order" placeholder="" value="<?php echo $kode; ?>" readonly>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Kode Jadwal</label>
                                    <input type="text" class="form-control" name="kd_jadwal" placeholder="" value="<?php echo $jadwal->kd_jadwal; ?>" readonly>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="nama_order" placeholder="Nama Pemesan" >
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Umur</label>
                                    <input type="int" class="form-control" name="umur" placeholder="Umur Pemesan" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">No Hp</label>
                                    <input type="text" class="form-control" name="no_hp" placeholder="No Hp" >
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Tanggal Berangkat</label>
                                    <input type="date" class="form-control" name="tgl_berangkat" placeholder="" value="<?php echo $jadwal->tgl_berangkat; ?>" readonly>
                                </div>
                            </div>


                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="text-center">
                                        <button type='submit' class="btn btn-primary rounded-pill">Submit</button>
                                        <button type="button" class="btn btn-outline-info rounded-pill">
                                            <a href="<?php echo base_url() ?>admin/pemesanan">Reset</a>
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

                            


