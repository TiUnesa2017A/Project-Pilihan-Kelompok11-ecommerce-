<?php if(empty($_GET['thisaction'])){header('location:../main');} ?>
<?php $cat=base64_decode($_GET['thiscat']);$sqli=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rkat_produk where id_kat_produk='$cat' ")); ?>
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Kategori Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="prosescon/hancon?thisposition=<?php echo base64_encode('editkategori'); ?>">
              <div class="box-body">
                <div class="form-group">
                  <label>Kode Kategori</label>
                  <input type="text" name="id_kat_produk" class="form-control" readonly value="<?php echo $sqli['id_kat_produk']; ?>">
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <input type="text" name="kat_produk" class="form-control" placeholder="Kategori Produk" value="<?php echo $sqli['kat_produk']; ?>">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Edit</button>&nbsp;&nbsp;<a href="main?thisaction=<?php echo base64_encode('kategoriproduct'); ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-repeat"></i>  Batal</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>