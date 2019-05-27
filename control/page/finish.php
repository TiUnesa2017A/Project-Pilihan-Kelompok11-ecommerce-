<?php if(empty($_GET['thisaction'])){header('location:../main');} ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">&nbsp;Verifikasi Checkout</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Checkout</th>
                  <th>Kode Verifikasi</th>
                  <th>Total Bayar</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
<?php $pro=mysqli_query($con,"SELECT * FROM finish order by tanggal desc");$vr=1;while($duk=mysqli_fetch_array($pro)){ ?>
                  <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $duk['id_checkout']; ?></td>
                  <td><?php echo $duk['kode_veri']; ?></td>
                  <td>Rp. <?php echo rp($duk['totalbayar']); ?></td>
                  <td><?php echo $duk['status']; ?></td>
                  <td><?php echo tgl($duk['tanggal']); ?></td>
                  <td><a class="btn btn-primary btn-sm tip-top" data-toggle="tooltip" data-original-title="Detail" href="main?thisaction=<?php echo base64_encode('detailveri'); ?>&thischeckout=<?php echo base64_encode($duk['id_checkout']); ?>"><i class="glyphicon glyphicon-search"></i></a></td>
                </tr>
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