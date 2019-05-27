<?php if(empty($_GET['thisaction'])){header('location:../main');} ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><span><a href="main?thisaction=<?php echo base64_encode('addkategori'); ?>" class="btn btn-circle btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah</a></span>&nbsp;Kategori Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Kategori</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
<?php $sqli=mysqli_query($con,"SELECT * FROM rkat_produk order by kat_produk asc");$vr=1;while($val=mysqli_fetch_array($sqli)){ ?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $val['id_kat_produk']; ?></td>
                  <td><?php echo $val['kat_produk']; ?></td>
                  <td align="center"><a href="main?thisaction=<?php echo base64_encode('editkategori'); ?>&thiscat=<?php echo base64_encode($val['id_kat_produk']); ?>" class="btn btn-circle btn-success btn-sm tip-top" data-toggle="tooltip" data-original-title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;<a href="prosescon/hancon?thisposition=<?php echo base64_encode('hapuskategori'); ?>&thiscat=<?php echo base64_encode($val['id_kat_produk']); ?>" class="btn btn-circle btn-danger btn-sm tip-top" data-toggle="tooltip" data-original-title="Hapus" onclick="return confirm('Yakin Menghapus Data Ini')"><i class="glyphicon glyphicon-remove"></i></a></td>
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