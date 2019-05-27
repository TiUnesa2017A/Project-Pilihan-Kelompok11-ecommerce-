<?php if(empty($_GET['thisaction'])){header('location:../main');} ?>
<?php $sqli=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM carabayar where id_carabayar='1' ")); ?>
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Cara Pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="prosescon/hancon?thisposition=<?php echo base64_encode('carabayar'); ?>">
              <div class="box-body">
                <input type="hidden" name="id_carabayar" value="<?php echo $sqli['id_carabayar']; ?>">
                <div class="form-group">
                  <label>Rekening Transfer</label>
                    <input onkeypress="return hanyaangka(event)" type="text" name="rek" class="form-control" value="<?php echo $sqli['rek']; ?>">
                </div>
                <div class="form-group">
                  <label>KOnfirmasi Phone</label>
                    <input onkeypress="return hanyaangka(event)" type="text" name="phone" class="form-control" value="<?php echo $sqli['phone']; ?>">
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