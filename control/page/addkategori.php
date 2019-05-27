<?php if(empty($_GET['thisaction'])){header('location:../main');} ?>
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Kategori Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="prosescon/hancon?thisposition=<?php echo base64_encode('addkategori'); ?>">
              <div class="box-body">
                <div class="form-group">
                  <label>Kode Kategori</label>
                  <input type="text" name="id_kat_produk" class="form-control" readonly value="<?php echo substr(md5(rand()), 0,6); ?>">
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <input type="text" name="kat_produk" class="form-control" placeholder="Kategori Produk">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Simpan</button>&nbsp;&nbsp;<a href="main?thisaction=<?php echo base64_encode('kategoriproduct'); ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-repeat"></i>  Batal</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>