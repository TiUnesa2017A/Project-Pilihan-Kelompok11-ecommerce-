<?php require 'header.php'; $idproduk=base64_decode($_GET['thisproduct']); $nama=$_GET['nameproduct']; ?>
<div class="modal" id="write-review" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-review">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>NOTIFIKASI</h3>
            <center><p>Maaf Anda Harus Login Terlebih Dahulu</p><br><a href="logreg" class="button-4">Login Disini</a></center>
        </div>
    </div>
</div>
<!-- ======================================================================
                                        START CONTENT
        ======================================================================= -->
<?php $det=mysqli_query($con,"SELECT * FROM produk where id_produk='$idproduk' and nama='$nama' ");$ail=mysqli_fetch_array($det);$kp=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rkat_produk where id_kat_produk='$ail[id_kat_produk]' ")) ?>
        <div class="content">
            <div class="product-one">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="the-slider product-big-image" data-tesla-plugin="slider" data-tesla-item=".slide" data-tesla-next=".product-image-arrows-right" data-tesla-prev=".product-image-arrows-left" data-tesla-container=".slide-wrapper">
                                <ul class="slide-wrapper">
                                    <li class="slide"><img style="width:600px;height:400px;" src="control/<?php echo $ail['gambar']; ?>" alt="product image" /></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2><?php echo $ail['nama']; ?></h2>
                            <div class="product-rate">
                                <i class="icon-423" title="full"></i>
                                <i class="icon-423" title="full"></i>
                                <i class="icon-423" title="full"></i>
                                <i class="icon-423" title="full"></i>
                                <i class="icon-421" title="empty"></i>
                            </div>
                            <div class="col-md-12">
                                <div class="product-price" style="margin-left:-15px;">HARGA : <span><?php echo rp($ail['harga']+10000); ?></span> <?php echo rp($ail['harga']);?></div>
                            </div>
                            <p>Tag : <?php echo $kp['kat_produk']; ?></p>
                            <hr/>
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="#" class="button-3"><span style="font-color:#333;">Tersedia : <?php echo $ail['stok']; ?></span></a>
                                </div>
<?php $juml=mysqli_fetch_array(mysqli_query($con,"SELECT sum(jumlah) as jumlah from cart where id_produk='$ail[id_produk]' ")); ?>
                                <div class="col-md-4">
                                    <a href="#" class="button-3"><span style="font-color:#333;">Dipesan : <?php echo $juml['jumlah']; ?></span></a>
                                </div>
<?php if(isset($_SESSION['id_user'])){
    $cekcart=mysqli_query($con,"SELECT * FROM cart where id_user='$_SESSION[id_user]' and  id_produk='$ail[id_produk]' ");$ro=mysqli_num_rows($cekcart);$fet=mysqli_fetch_array($cekcart);$ty=mysqli_query($con,"SELECT * FROM checkout where id_user='$_SESSION[id_user]' and status='pending' ");$tyu=mysqli_num_rows($ty);
    if($ro>0){
        if($tyu>0){ ?>
                                <div class="col-md-6">
                                    <a href="checkout" class="button-2">Anda Sudah CheckOut</a>
                                </div>
        <?php }else { ?>
                                <div class="col-md-6">
                                    <a href="cart" class="button-2">Keranjang Belanja</a>
                                </div>
        <?php } ?>
<?php } else {
        if($tyu>0){ ?>
                                <div class="col-md-6">
                                    <a href="checkout" class="button-2">Anda Sudah CheckOut</a>
                                </div>
        <?php }else { ?>
                                <div class="col-md-6">
                                    <form action="prosesuser/hanuser?thisposition=<?php echo base64_encode('addcart'); ?>" method="post">
                                        <input type="hidden" name="thisproduk" value="<?php echo base64_encode($ail['id_produk']); ?>">
                                        <input type="hidden" name="thisuser" value="<?php echo base64_encode($_SESSION['id_user']); ?>">
                                        <button class="button-2">Beli Sekarang </button->
                                    </form>
                                </div>
        <?php } ?>
<?php }  } else {?>
                                <div class="col-md-6">
                                    <a href="#" data-toggle="modal" data-target="#write-review" class="button-2">Beli Sekarang</a>
                                </div>
<?php } ?>
                            </div>
                            <div class="clear"></div>
                            <div class="row">
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#description" data-toggle="tab">Deskripsi</a></li>
                                <li class=""><a href="#reviews" data-toggle="tab">Respons</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="description">
                                    <p><?php echo $ail['deskripsi'];?></p>
                                    <ul class="social-share">
                                        <li><span>Share</span></li>
                                        <li><a href="#"><i class="icon-160" title="161"></i></a></li>
                                        <li><a href="#"><i class="icon-138" title="161"></i></a></li>
                                        <li><a href="#"><i class="icon-106" title="161"></i></a></li>
                                        <li><a href="#"><i class="icon-169" title="161"></i></a></li>
                                        <li><a href="#"><i class="icon-163" title="161"></i></a></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="reviews">
<?php $kom=mysqli_query($con,"SELECT * FROM komentar where id_produk='$idproduk' order by id_komentar desc limit 3");while($tar=mysqli_fetch_array($kom)){
    $usr=mysqli_fetch_array(mysqli_query($con,"SELECT * from user where id_user='$tar[id_user]' "));
    //$acc=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user where id_user='$_SESSION[id_user]' ")); ?>
                                    <div class="product-review">
                                        <div class="product-review-avatar">
                    <?php if($usr['gambar']==NULL){ ?>
                                            <img style="width:50px;height:50px;" src="images/user/default.png" alt="avatar" />
                    <?php } else { ?>
                                            <img style="width:50px;height:50px;" src="control/<?php echo $usr['gambar']; ?>" alt="avatar" />
                    <?php } ?>
                                        </div>
                                        <div class="product-review-author"><?php echo $usr['username']; ?> <span></span><?php echo tgl($tar['tanggal']); ?></div>
                                        <p><?php echo $tar['komentar']; ?></p>
                                    </div>
            <?php } ?>
            <?php if(isset($_SESSION['id_user'])){ ?>
                                    <a href="#" class="button-6" data-target="#komentar" data-toggle="modal">Komentar</a>
            <?php } ?>
                                </div>
<div id="komentar" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Beri Komentar</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" enctype="multipart/form-data" action="prosesuser/hanuser?thisposition=<?php echo base64_encode('komentar'); ?>">
          <input type="hidden" name="product" value="<?php echo base64_encode($idproduk); ?>">
          <input type="hidden" name="user" value="<?php echo base64_encode($_SESSION['id_user']); ?>">
            <div class="form-group">
              <label>Atas Nama : <?php echo $_SESSION['username']; ?></label>
            </div>
            <div class="form-group">
              <label>Tulis Komentar</label>
                <textarea name="komentar" class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-circle">Kirim</button> 
          </form>
        </div>
        </div>
    </div>
</div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
<?php $ckatpro=mysqli_query($con,"SELECT * FROM produk where id_kat_produk='$ail[id_kat_produk]' and stok>0 ");$numck=mysqli_num_rows($ckatpro);
    if($numck>1){?>
                <div class="container">
                <div class="tesla-carousel" data-tesla-plugin="carousel" data-tesla-container=".tesla-carousel-items" data-tesla-item=">div" data-tesla-autoplay="false" data-tesla-rotate="false">
                    <div class="site-title">
                        
                        <div class="site-inside"><span>Produk Terkait</span></div></div> 
                    <div class="row">
                        <div class="tesla-carousel-items">
    <?php $pr=mysqli_query($con,"SELECT * FROM produk where stok>0 and id_kat_produk='$ail[id_kat_produk]' order by tanggal desc limit 5");while($dui=mysqli_fetch_array($pr)){ if($dui['id_produk']==$ail['id_produk']){}else{ ?>                
                            <div class="col-md-3 col-xs-6">
                                <div class="product">
                                    <div class="product-cover">
                                        <div class="product-cover-hover"><span><a href="detailproduct?thisproduct=<?php echo base64_encode($dui['id_produk']) ?>&nameproduct=<?php echo $dui['nama']; ?>">Detail</a></span></div>
                                        <img style="width:300px;height:300px;" src="control/<?php echo $dui['gambar']; ?>" alt="product name" />
                                    </div>    
                                    <div class="product-details">  
                                        <a href="detailproduct?thisproduct=<?php echo base64_encode($dui['id_produk']) ?>&nameproduct=<?php echo $dui['nama']; ?>"><h1 style="font-size:75%;"><?php echo $dui['nama']; ?></h1></a>
                                        <p><?php echo substr($dui['deskripsi'], 0,50); ?>...</p>
                                        <div class="product-price">
                                            <i class="icon-257" title="add to cart"></i>
                                            <div style="font-size:18px;"><?php echo 'Rp. '. rp($dui['harga']); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    <?php } } ?>
                        </div>
                    </div>
                </div>
              </div>
    <?php } else {} ?>
            
            </div>
        </div>
        <!-- ======================================================================
                                        END CONTENT
        ======================================================================= -->

        <!-- ======================================================================
                                        START FOOTER
        ======================================================================= -->
<?php require 'footer.php'; ?>