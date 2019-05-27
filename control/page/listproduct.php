<?php if(empty($_GET['thisaction'])){header('location:../main');} ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="main?thisaction=<?php echo base64_encode('addproduct'); ?>" class="btn btn-circle btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah</a></span>&nbsp;Semua Produk</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Gambar</th>
                  <th>Kode</th>
                  <th>Kategori</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>S</th>
                  <th>B</th>
                  <th>Tanggal</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
<?php $pro=mysqli_query($con,"SELECT * FROM produk order by tanggal desc");$vr=1;while($duk=mysqli_fetch_array($pro)){ ?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><img style="width:60px;height:60px;" src="<?php echo $duk['gambar']; ?>"></td>
                  <td><?php echo $duk['id_produk']; ?></td>
  <?php $ktpo=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rkat_produk where id_kat_produk='$duk[id_kat_produk]' ")); ?>
                  <td><?php echo $ktpo['kat_produk']; ?></td>
                  <td><?php echo $duk['nama']; ?></td>
                  <td><?php echo rp($duk['harga']); ?></td>
                  <td><?php echo $duk['stok']; ?></td>
                  <td><?php echo $duk['berat']; ?> Kg</td>
                  <td><?php echo tgl($duk['tanggal']); ?></td>
                  <td align="center"><a href="main?thisaction=<?php echo base64_encode('editproduct'); ?>&thispro=<?php echo base64_encode($duk['id_produk']); ?>" class="btn btn-circle btn-success btn-sm tip-top" data-toggle="tooltip" data-original-title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;<a href="prosescon/hancon?thisposition=<?php echo base64_encode('hapusproduct'); ?>&thispro=<?php echo base64_encode($duk['id_produk']); ?>" class="btn btn-circle btn-danger btn-sm tip-top" data-toggle="tooltip" data-original-title="Hapus" onclick="return confirm('Yakin Menghapus Data Ini')"><i class="glyphicon glyphicon-remove"></i></a></td>
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