<?php if(empty($_GET['thisaction'])){header('location:../main');} ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Komentar Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID User</th>
                  <th>ID Produk</th>
                  <th>Tanggal</th>
                  <th>Komentar</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
<?php $sqli=mysqli_query($con,"SELECT * FROM komentar order by id_komentar desc");$vr=1;while($val=mysqli_fetch_array($sqli)){ ?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $val['id_user']; ?></td>
                  <td><?php echo $val['id_produk']; ?></td>
                  <td><?php echo tgl($val['tanggal']); ?></td>
                  <td><?php echo substr($val['komentar'], 0,50); ?>...</td>
                  <td align="center"><a href="prosescon/hancon?thisposition=<?php echo base64_encode('hapuskomentar'); ?>&thiskomentar=<?php echo base64_encode($val['id_komentar']); ?>" class="btn btn-circle btn-danger btn-sm tip-top" data-toggle="tooltip" data-original-title="Hapus" onclick="return confirm('Yakin Menghapus Data Ini')"><i class="glyphicon glyphicon-remove"></i></a></td>
                </tr>
<?php $vr++; } ?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->