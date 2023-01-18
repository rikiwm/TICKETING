        <div class="right_col" role="main">
          <div class="">
            <div class="row">
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
                        
                        <!-- /.col -->
                      </div>
                          <br>
                      
                      <!-- info row -->
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
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          To
                          <address>
                            <strong><?php echo $tiket->nama_order ?> </strong>
                            <br><b>Kode Tiket : </b><?= $tiket->kd_tiket ?>
                            <br><b>No Hp : </b><?= $tiket->no_hp ?>
                            <br>
                            <br><b>Tanggal Cetak : </b><?= date('Y-m-d') ?>
                          </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <b>Kode Order : </b><?= $tiket->kode_order ?>
                          <br>
                          <br>
                          <b>Jam Berangkat : </b><?= $tiket->jam_berangkat ?>
                          <br>
                          <b>Tanggal Berangkat : </b><?= $tiket->tgl_berangkat ?>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="  table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Qty</th>
                                <th>Kota Tujuan</th>
                                <th>Nama Kapal</th>
                                <th>Tanggal Berangkat</th>
                                <th>Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td><?= $tiket->kota_tujuan ?></td>
                                <td><?= $tiket->nama_kapal ?></td>
                                <td><?= $tiket->tgl_berangkat ?></td>
                                <td><?= $tiket->total_bayar ?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class=" ">
                          <button class="btn btn-outline-secondary rounded-pill" pull-right style="margin-right: 5px;" onclick="window.print();"><i class="fa fa-print"></i> Cetak</button>
                          <button type="button" class="btn btn-outline-info rounded-pill">
                            <a href="<?php echo base_url() ?>admin/pembayaran"> Selesai</a>
                          </button>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>