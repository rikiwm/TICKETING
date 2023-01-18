<div class="right_col" role="main">
  <div class="">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Tiket</h2>
          <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <?php
          if($this->session->flashdata('sukses')){
            echo '<p class="alert alert-success">';
            echo $this->session->flashdata('sukses');
          }
        ?>
        <div class="x_content">
          <div class="row">
            <div class="col-sm-12">
              <div class="table-responsive">
                <table id="datatable" class="table table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Kode Tiket</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Tujuan</th>
                      <th class="text-center">Nama Kapal</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $no= 1; foreach ($tiket as $p) {?>
                      <tr>
                        <td align="center"><?php echo $no++ ?></td>
                        <td align="center"><?php echo $p->kd_tiket; ?></td>
                        <td align="center"><?php echo $p->nama_order; ?></td>
                        <td align="center"><?php echo $p->kota_tujuan; echo " - "; echo $p->nama_kapal; echo " - "; echo $p->nama_kelas;?></td>
                        <td align="center"><?php echo $p->nama_kapal; ?></td>
                        <td align="center">
                          <a href="<?= base_url('admin/tiket/view/' .$p->kd_tiket) ?>" class="btn btn-info btn-sm rounded-pill">View</a>
                        </td>
                        
                      </tr>
                    <?php } ?>
                          </tbody>
                        </table>
                      </div>
                  </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>