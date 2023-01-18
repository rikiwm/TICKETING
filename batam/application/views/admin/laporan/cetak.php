<!DOCTYPE>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body onload="window.print()">
        <div align="center">
            <table style="border-collapse: collapse; width: 96%" border="0">
                <tr>
                    <td align="center">
                        <table style="border-collapse: collapse; width: 90%;" border="0">
                            <tr>
							<!-- <td width="140" rowspan="4"><img src="<?php echo base_url() ?>assets/admin/public/img/dispora.png" alt="" width="100" height="100"></td> -->
                                <td style="text-align: center;">
                                    <span style="font-size: 24pt; font-weight: bold">Kapal Ferry Nusantara</span><br>
                                        <span style="font-size: 18pt; font-weight: bold;">Indonesia</span><br>
                                            <span style="font-size: 12pt; font-weight: bold; font-style:italic;">
                                                Jl.Prof. Mardoni Efendi No.17, dirumah
                                    </span>
                                    <hr>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <br>
                        <table style="border-collapse: collapse; width: 90%; font-weight: bold;"border="0">
                            <tr>
                                <td style="width: 5%;">Keterangan</td>
                                    <td style="width: 2%;">:</td>
                                        <td style="width: 31%;">Laporan Tiket</td>
                            </tr>
                            <tr>
                                <td style="width: 5%;">Periode</td>
                                    <td style="width: 2%;">:</td>
                                        <td style="width: 31%;">
                                            <?php 
                                            echo "Bulan";
                                            echo " ";
                                            echo $bulan;
                                            echo " ";
                                            echo "Tahun";
                                            echo " ";
                                            echo $tahun;
                                            ?>
                                        </td>
                            </tr>
                        </table>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                    <br>
                    <table style="border-collapse: collapse; width: 90%;" border="1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No.Tiket</th>
                                <th>Kd.Jadwal</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>No.Hp</th>
    							<th>Tgl.pergi</th>
                                <th>Tgl.pesan</th>
                                <th>Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            foreach ($tampil as $t) {
                                $no++;                               
                                ?>

                            <tr>
                                <td align="center"><?php echo $no ?></td>
                                <td align="center"><?php echo $t->kd_tiket ?></td>
                                <td align="center"><?php echo $t->kode_jadwal ?></td>
                                <td align="center"><?php echo $t->nama_order ?></td>
                                <td align="center"><?php echo $t->umur ?></td>
                                <td align="center"><?php echo $t->no_hp ?></td>
                                <td align="center"><?php echo $t->tgl_berangkat ?></td>
                                <td align="center"><?php echo $t->tgl_pesan ?></td>
                                <td align="center"><?php echo "Rp. "; echo number_format($t->total_bayar) ?></td>                                
                            </tr>
                            <?php } ?>
                            <tr>
                                <th colspan="8">Total Keseluruhan Tiket</th>
                                    <td align="center"><strong><?php echo $jumlah; ?></strong></td>
                            </tr>
                            <tr>
                                <th colspan="8">Total Dana Masuk</th>
                                    <td align="center"><strong><?php echo "Rp. "; echo number_format($dana); ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center">
                        <table style="border-collapse: collapse; width: 90%;" border="0">
                            <tr>
                                <td width="70%"></td>
                                    <td width="26%">Mardoni Efendi, <br><?php echo date('d-m-Y'); ?>
<br>
<br>
<br>
<br>
<br>
<strong>(<?php echo "Mardoni Efendi";?>)</strong>
</td>
</tr>
</table>
</div>
</td>
</tr>
</table>
</div>
</body>
</html>