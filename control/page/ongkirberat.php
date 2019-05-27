<?php if(empty($_GET['thisaction'])){header('location:../main');} ?>
<?php $sqli=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM ongkirberat where id_berat='1' ")); ?>
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Ongkos Kirim Berat (Kg)</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="prosescon/hancon?thisposition=<?php echo base64_encode('editkategori'); ?>">
              <div class="box-body">
                <input type="hidden" name="id_berat" value="<?php echo $sqli['id_berat']; ?>">
                <div class="form-group">
                  <label>Ongkir (Rp.)</label>
                    <input onkeypress="return hanyaangka(event)" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" type="text" name="ongkirberat" class="form-control" value="<?php echo rp($sqli['ongkir']); ?>">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Edit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>