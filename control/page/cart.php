<?php if(empty($_GET['thisaction'])){header('location:../main');} ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">&nbsp;Semua Cart</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID User</th>
                  <th>Kode Produk</th>
                  <th>Nama Produk</th>
                  <th>Jumlah</th>
                  <th>Subtotal</th>
                  <th>Ongkir Berat</th>
                  <th>Tanggal</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
<?php $pro=mysqli_query($con,"SELECT * FROM cart order by tanggal desc");$vr=1;while($duk=mysqli_fetch_array($pro)){ ?>
  <?php $ty=mysqli_query($con,"SELECT * FROM checkout where id_user='$duk[id_user]' and status='pending' ");$tyu=mysqli_num_rows($ty);?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $duk['id_user']; ?></td>
                  <td><?php echo $duk['id_produk']; ?></td>
  <?php $ktpo=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM produk where id_produk='$duk[id_produk]' ")); ?>
                  <td><?php echo $ktpo['nama']; ?></td>
                  <td><?php echo $duk['jumlah']; ?></td>
                  <td>Rp. <?php echo rp($duk['subtotal']); ?></td>
                  <td>Rp. <?php echo rp($duk['ongberat']); ?></td>
                  <td><?php echo tgl($duk['tanggal']); ?></td>
    <?php if($tyu>0){ ?>
                  <td align="center"><a href="#" class="btn btn-circle btn-danger btn-sm" disabled="disabled"><i class="glyphicon glyphicon-remove"></i></a></td>
    <?php }else {?>
                  <td align="center"><a href="prosescon/hancon?thisposition=<?php echo base64_encode('deletecart'); ?>&thisuser=<?php echo base64_encode($duk['id_user']); ?>&thisproduct=<?php echo base64_encode($duk['id_produk']); ?>" class="btn btn-circle btn-danger btn-sm tip-top" data-toggle="tooltip" data-original-title="Hapus" onclick="return confirm('Yakin Menghapus Data Ini')"><i class="glyphicon glyphicon-remove"></i></a></td>
    <?php } ?>
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