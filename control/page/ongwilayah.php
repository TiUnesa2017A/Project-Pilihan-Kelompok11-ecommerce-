<?php if(empty($_GET['thisaction'])){header('location:../main');} ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><span></span>Ongkos Kirim Wilayah</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Provinsi</th>
                  <th>Ongkir</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
<?php $sqli=mysqli_query($con,"SELECT * FROM provinsi order by id_prov asc");$vr=1;while($val=mysqli_fetch_array($sqli)){ ?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $val['nama']; ?></td>
                  <td>Rp. <?php echo rp($val['ongkir']); ?></td>
                  <td align="center"><a data-target="#ongkirwil<?php echo $val['id_prov']; ?>" data-toggle="modal" href="#" class="btn btn-circle btn-success btn-sm tip-top" data-toggle="tooltip" data-original-title="Edit"><i class="glyphicon glyphicon-pencil"></i></a></td>
                </tr>
<div id="ongkirwil<?php echo $val['id_prov']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Ongkir Provinsi <?php echo $val['nama']; ?></h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" enctype="multipart/form-data" action="prosescon/hancon?thisposition=<?php echo base64_encode('updateongkirwil'); ?>">
          <input type="hidden" name="id_prov" value="<?php echo $val['id_prov']; ?>">
            <div class="form-group">
              <label>Ongkir (Rp.)</label>
                <input onkeypress="return hanyaangka(event)" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" type="text" name="ongkirwil" class="form-control" value="<?php echo rp($val['ongkir']); ?>">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i> Edit</button> 
          </form>
        </div>
        </div>
    </div>
</div>
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
<div id="ongkirwil" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Tambah Slider</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" enctype="multipart/form-data" action="prosescon/hancon?thisposition=<?php echo base64_encode('updateongkirwil'); ?>">
            <div class="form-group">
              <label>Gambar</label>
                <input type="file" name="gambar" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Simpan</button> 
          </form>
        </div>
        </div>
    </div>
</div>