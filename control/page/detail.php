<?php if(empty($_GET['thisaction'])){header('location:../main');} $id_checkout=base64_decode($_GET['thischeckout']); $cs=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM finish where id_checkout='$id_checkout' "));
if(empty($_GET['for'])){
  $link='verifikasi';
}
else{
  $link='checkout';
}
if($cs['status']=='success'){
  $pro=mysqli_query($con,"SELECT * FROM log where id_checkout='$id_checkout' order by tanggal desc");
}
else{
  $aus=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM checkout where id_checkout='$id_checkout' "));
  $pro=mysqli_query($con,"SELECT * FROM cart where id_user='$aus[id_user]' order by tanggal desc");
} 
?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a class="btn btn-success btn-sm" href="main?thisaction=<?php echo base64_encode($link); ?>">Kembali</a>&nbsp;&nbsp;Detail Cart ID (<?php echo $id_checkout; ?>)</h3>
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
                </tr>
                </thead>
                <tbody>
<?php $vr=1;while($duk=mysqli_fetch_array($pro)){ ?>
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