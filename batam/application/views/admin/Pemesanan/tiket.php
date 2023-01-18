<div class="right_col" role="main">

    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>E-Ticket <small>Ferry Nusantara</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>

          <div class="x_content">
            <section class="content invoice">
              <!-- title row -->
              <div class="row">
                <div class="invoice-header">
                  <img src="<?= BASE_URL('admin/tiket/barcode/' .$tiket->kd_tiket); ?>">
                </div>
                <br>
                <br>
              </div>
              <br>

                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    From
                    <address>
                      <strong>Admin, Inc.</strong>
                      <br>Jl. mardoni efendi, 25215
                      <br>Padang
                      <br>Phone: (+82) 823-123-9876
                      <br>Email: admin@ferry.com
                    </address>
                  </div>

                  <div class="col-sm-4 invoice-col-bordered">
                    To
                    <address>
                      <strong><?php echo $tiket->nama_order ?> </strong>
                      <br><b>Kode Tiket : </b><?= $tiket->kd_tiket ?>
                      <br><b>No Hp : </b><?= $tiket->no_hp ?>
                      <br>
                      <br><b>Tanggal Cetak : </b><?= date('Y-m-d') ?>
                    </address>
                  </div>

                  <div class="col-sm-4 invoice-col">
                    <b>Kode Order : </b><?= $tiket->kode_order ?>
                    <br>
                    <br>
                    <b>Jam Berangkat : </b><?= $tiket->jam_berangkat ?>
                    <br>
                    <b>Tanggal Berangkat : </b><?= $tiket->tgl_berangkat ?>
                  </div>
                </div>
                      <!-- Table row -->
                <div class="row">
                  <div class="  table">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">Qty</th>
                          <th class="text-center">Kota Tujuan</th>
                          <th class="text-center">Nama Kapal</th>
                          <th class="text-center">Tanggal Berangkat</th>
                          <th class="text-center">Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td align="center">1</td>
                          <td align="center"><?= $tiket->kota_tujuan ?></td>
                          <td align="center"><?= $tiket->nama_kapal ?></td>
                          <td align="center"><?= $tiket->tgl_berangkat ?></td>
                          <td align="center"><?php echo "Rp. "; echo number_format($tiket->total_bayar) ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                <!-- this row will not appear when printing -->
                <div class="row row-no-print">
                  <div>
                    <button class="btn btn-outline-secondary rounded-pill" pull-right style="margin-right: 5px;" onclick="window.print();"><i class="fa fa-print"></i> Cetak</button>
                    <button type="button" class="btn btn-outline-info rounded-pill">
                      <a href="<?php echo base_url() ?>admin/tiket"> Selesai</a>
                    </button>
                  </div>
                </div>
            </section>
          </div>
        </div>
      </div>
    </div>

</div>