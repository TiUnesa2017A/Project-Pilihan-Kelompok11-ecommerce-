<?php if(empty($_GET['thisaction'])){header('location:../main');} ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><span><a href="#" class="btn btn-circle btn-info btn-sm" data-target="#ModalAdd" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Tambah</a></span>&nbsp;&nbsp;Admin</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
<?php $sqli=mysqli_query($con,"SELECT * FROM control order by user asc");$vr=1;while($val=mysqli_fetch_array($sqli)){ ?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $val['user']; ?></td>
                  <td><?php echo $val['pass']; ?></td>
                  <td align="center"><a href="prosescon/hancon?thisposition=<?php echo base64_encode('deleteadmin'); ?>&thiscontrol=<?php echo base64_encode($val['id_control']); ?>" class="btn btn-circle btn-danger btn-sm tip-top" data-toggle="tooltip" data-original-title="Hapus" onclick="return confirm('Yakin Menghapus Data Ini')"><i class="glyphicon glyphicon-remove"></i></a></td>
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
<div id="ModalAdd" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Tambah Akun Admin</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" enctype="multipart/form-data" action="prosescon/hancon?thisposition=<?php echo base64_encode('addadmin'); ?>">
            <div class="form-group">
              <label>Username</label>
                <input type="text" name="user" class="form-control">
            </div>
            <div class="form-group">
              <label>Password</label>
                <input type="text" name="pass" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Simpan</button> 
          </form>
        </div>
        </div>
    </div>
</div>