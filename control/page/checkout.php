<?php if(empty($_GET['thisaction'])){header('location:../main');} ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">&nbsp;Semua Checkout</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Checkout</th>
                  <th>ID User</th>
                  <th>Atas Nama</th>
                  <th>Alamat</th>
                  <th>Total Bayar</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
<?php $pro=mysqli_query($con,"SELECT * FROM checkout order by tanggal desc");$vr=1;while($duk=mysqli_fetch_array($pro)){ ?>
                  <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $duk['id_checkout']; ?></td>
                  <td><?php echo $duk['id_user']; ?></td>
                  <td><?php echo $duk['an']; ?></td>
                  <td><a class="btn btn-circle btn-success btn-xs" data-target="#tujuan<?php echo $duk['id_checkout']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-eye-open"></i> Lihat</a></td>
                  <td><a class="btn btn-primary btn-xs" data-target="#bayar<?php echo $duk['id_checkout']; ?>" data-toggle="modal">Rp. <?php echo rp($duk['ongcart']+$duk['ongwil']+$duk['ongberat']); ?></a></td>
                  <td><?php echo $duk['status']; ?></td>
                  <td><a class="btn btn-primary btn-sm tip-top" data-toggle="tooltip" data-original-title="Detail" href="main?thisaction=<?php echo base64_encode('detailveri'); ?>&thischeckout=<?php echo base64_encode($duk['id_checkout']); ?>&for=qwerty"><i class="glyphicon glyphicon-search"></i></a>&nbsp;<a href="prosescon/hancon?thisposition=<?php echo base64_encode('deletecheckout'); ?>&thischeckout=<?php echo base64_encode($duk['id_checkout']); ?>" class="btn btn-danger btn-sm tip-top" data-toggle="tooltip" data-original-title="Hapus" onclick="return confirm('Yakin Menghapus Data Ini')"><i class="glyphicon glyphicon-remove"></i></a></td>
                </tr>
<!-- /.alamat tujuan -->
<div id="tujuan<?php echo $duk['id_checkout']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Alamat Pengiriman</h4>
        </div>
        <div class="modal-body">
          <p>Provinsi <b><?php echo $duk['prov']; ?></b></p>
          <p>Kota/Kabupaten <b><?php echo $duk['kab']; ?></b></p>
          <p>Kecamatan <b><?php echo $duk['kec']; ?></b></p>
          <p>Desa/Kelurahan <b><?php echo $duk['kel']; ?></b></p>
          <p>Kode Pos <b><?php echo $duk['kodepos']; ?></b></p>
          <p>Konfirmasi Phone <b><?php echo $duk['phone']; ?></b></p>
        </div>
      </div>
    </div>
</div>
<div id="bayar<?php echo $duk['id_checkout']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Total Pembayaran</h4>
        </div>
        <div class="modal-body">
          <p>Total Cart <b>Rp. <?php echo rp($duk['ongcart']); ?></b></p>
          <p>Ongkir Wilayah <b>Rp. <?php echo rp($duk['ongwil']); ?></b></p>
          <p>Ongkir Berat <b>Rp. <?php echo rp($duk['ongberat']); ?></b></p>
          <br>
          <p>Total Keseluruhan <b>Rp. <?php echo rp($duk['ongcart']+$duk['ongwil']+$duk['ongberat']); ?></b></p>
        </div>
      </div>
    </div>
</div>
<!-- /.total bayar -->
<?php $vr++; } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->