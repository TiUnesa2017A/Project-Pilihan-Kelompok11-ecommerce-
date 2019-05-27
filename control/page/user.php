<?php if(empty($_GET['thisaction'])){header('location:../main');} ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>ID User</th>
                  <th>Usename</th>
                  <th>Password</th>
                  <th>Email</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
<?php $sqli=mysqli_query($con,"SELECT * FROM user order by username asc");$vr=1;while($val=mysqli_fetch_array($sqli)){ ?>
                <tr>
                  <td><?php echo $vr; ?></td>
      <?php if($val['gambar']==NULL){ ?>
                  <td><img style="width:70px;height:70px;" src="../images/user/default.png" alt="avatar" /></td>
      <?php } else { ?>
                  <td><img style="width:70px;height:70px;" src="<?php echo $val['gambar']; ?>" alt="avatar" /></td>
      <?php } ?>
                  <td><?php echo $val['id_user']; ?></td>
                  <td><?php echo $val['username']; ?></td>
                  <td><?php echo $val['password']; ?></td>
                  <td><?php echo $val['email']; ?></td>
                  <td align="center"><a href="#" class="btn btn-circle btn-danger btn-sm tip-top" data-toggle="tooltip" data-original-title="Hapus" onclick="return confirm('Yakin Menghapus Data Ini')"><i class="glyphicon glyphicon-remove"></i></a></td>
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