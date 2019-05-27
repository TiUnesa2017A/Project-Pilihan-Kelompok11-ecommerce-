<?php if(empty($_GET['thisaction'])){header('location:../main');} ?>
<?php $pro=base64_decode($_GET['thispro']);$dukduk=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM produk where id_produk='$pro' ")); ?>
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="prosescon/hancon?thisposition=<?php echo base64_encode('editproduct'); ?>">
              <div class="box-body">
                <div class="form-group">
                  <label>Kode Produk</label>
                  <input type="text" name="id_produk" class="form-control" value="<?php echo $dukduk['id_produk']; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Kategori Produk</label>
                  <select name="id_kat_produk" class="form-control">
                    <option value="tidak ada">Pilih</option>
<?php $ktp=mysqli_query($con,"SELECT * FROM rkat_produk order by kat_produk asc");while($pkt=mysqli_fetch_array($ktp)){ ?>
                    <option value="<?php echo $pkt['id_kat_produk']; ?>" <?php if($dukduk['id_kat_produk']==$pkt['id_kat_produk']){echo "selected='selected'";} ?> ><?php echo $pkt['kat_produk']; ?></option>
<?php }?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama Produk</label>
                  <input type="text" name="nama" class="form-control" value="<?php echo $dukduk['nama']; ?>">
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="text" name="harga" class="form-control" onkeypress="return hanyaangka(event)" id="inputku" name="angkaa" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="<?php echo rp($dukduk['harga']); ?>">
                </div>
                <div class="form-group">
                  <label>Stok</label>
                  <input type="text" name="stok" class="form-control" onkeypress="return hanyaangka(event)" value="<?php echo $dukduk['stok']; ?>">
                </div>
                <div class="form-group">
                  <label>Berat (Kg)</label>
                  <input type="text" name="berat" class="form-control" onkeypress="return hanyaangka(event)" value="<?php echo $dukduk['berat']; ?>">
                </div>
                <div class="form-group">
                  <label>
                    <input type="checkbox" name="tetap"> Tetap Dengan Gambar Ini
                  </label>
                </div>
                <div class="form-group">
                  <label><img style="width:100px;height:120px;" src="<?php echo $dukduk['gambar']; ?>"></label>
                  <input type="file" name="gambar" class="form-control" >
                </div>
                <div class="form-group">
                  <label>Tanggal Post</label>
                  <input type="text" name="tanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea name="deskripsi" class="form-control"><?php echo $dukduk['deskripsi']; ?></textarea>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Simpan</button>&nbsp;&nbsp;<a href="main?thisaction=<?php echo base64_encode('listproduct'); ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-repeat"></i>  Batal</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>