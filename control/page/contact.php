<?php if(empty($_GET['thisaction'])){header('location:../main');} ?>
<?php $sqli=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM contact where id_contact='1' ")); ?>
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi Website</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="prosescon/hancon?thisposition=<?php echo base64_encode('editcontact'); ?>">
              <div class="box-body">
                <input type="hidden" name="id_contact" value="<?php echo $sqli['id_contact']; ?>">
                <div class="form-group">
                  <label>Jumlah Tampilan Produk</label>
                    <input onkeypress="return hanyaangka(event)" type="text" name="paging" class="form-control" value="<?php echo $sqli['paging']; ?>">
                </div>
                <div class="form-group">
                  <label>Phone Website</label>
                    <input type="text" name="phone" class="form-control" value="<?php echo $sqli['phone']; ?>">
                </div>
                <div class="form-group">
                  <label>Email Website</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $sqli['email']; ?>">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                    <textarea name="alamat" class="form-control" ><?php echo $sqli['alamat']; ?></textarea>
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