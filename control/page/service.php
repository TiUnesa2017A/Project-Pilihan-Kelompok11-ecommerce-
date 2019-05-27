<?php if(empty($_GET['thisaction'])){header('location:../main');} ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Customer Service</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Pertanyaan</th>
                  <th>Jawaban</th>
                  <th>Tampil</th>
                  <th width="15%">Opsi</th>
                </tr>
                </thead>
                <tbody>
<?php $sqli=mysqli_query($con,"SELECT * FROM service order by id_service desc");$vr=1;while($val=mysqli_fetch_array($sqli)){ ?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo substr($val['tanya'], 0,50); ?>...</td>
                  <td><?php echo substr($val['jawab'], 0,50); ?>...</td>
                  <td><?php if($val['status']=='YES'){ echo $val['status']; ?>&nbsp;<a class="btn btn-danger btn-xs" href="prosescon/hancon?thisposition=<?php echo base64_encode('tutup'); ?>&thisservice=<?php echo base64_encode($val['id_service']); ?>"><i class="glyphicon glyphicon-ban-circle"></i></a><?php }else { echo $val['status']; ?>&nbsp;<a href="prosescon/hancon?thisposition=<?php echo base64_encode('tampilkan'); ?>&thisservice=<?php echo base64_encode($val['id_service']); ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-ok"></i></a><?php }?></td>
                  <td align="center"><a href="#" class="btn btn-circle btn-primary btn-xs" data-target="#lihat<?php echo $val['id_service']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;<a href="#" class="btn btn-circle btn-success btn-xs" data-target="#jawab<?php echo $val['id_service']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-arrow-up"></i></a>&nbsp;<a href="prosescon/hancon?thisposition=<?php echo base64_encode('hapusservice'); ?>&thisservice=<?php echo base64_encode($val['id_service']); ?>" class="btn btn-circle btn-danger btn-xs tip-top" data-toggle="tooltip" data-original-title="Hapus" onclick="return confirm('Yakin Menghapus Data Ini')"><i class="glyphicon glyphicon-remove"></i></a></td>
                </tr>
<div class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="lihat<?php echo $val['id_service']; ?>">
<div class="modal-dialog" style="width:60%;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Detail</h4>
        </div>
        <div class="modal-body">
        <h4>Pertanyaan :</h4>
          <p><?php echo $val['tanya']; ?></p>
        <h4>Jawaban :</h4>
          <p><?php echo $val['jawab']; ?></p>
        </div>
        <div class="modal-footer">
        </div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="jawab<?php echo $val['id_service']; ?>">
<div class="modal-dialog" style="width:60%;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Balas Pertanyaan</h4>
        </div>
        <div class="modal-body">
        <label>Pertanyaan : </label><p><?php echo $val['tanya']; ?></p>
          <form role="form" method="post" enctype="multipart/form-data" action="prosescon/hancon?thisposition=<?php echo base64_encode('jawab'); ?>">
          <input type="hidden" name="id_service" value="<?php echo base64_encode($val['id_service']); ?>">
            <div class="form-group">
              <label>Tulis Jawaban</label>
                <textarea name="jawab" class="form-control"><?php echo $val['jawab']; ?></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-circle">Kirim</button> 
          </form>
        </div>
        </div>
    </div>
</div>
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