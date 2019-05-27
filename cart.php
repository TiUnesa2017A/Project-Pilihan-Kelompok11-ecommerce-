<?php require 'header.php'; ?>
<?php if(isset($_SESSION['id_user'])){ ?>
        <!-- ======================================================================
                                        START CONTENT
        ======================================================================= -->
<?php $ty=mysqli_query($con,"SELECT * FROM checkout where id_user='$_SESSION[id_user]' and status='pending' ");$tyu=mysqli_num_rows($ty);?>
        <div class="content">
            <div class="container">
                <h2>Keranjang Belanja</h2>

                <div class="shopping-cart">
                    <div class="shopping-cart-products">
                        <ul class="shopping-product-detail">
                            <li class="shopping-1">Gambar Produk</li>
                            <li class="shopping-2">Nama</li>
                            <li class="shopping-3">Jumlah Pesan</li>
                            <li class="shopping-4">PerUnit</li>
                            <li class="shopping-5">Sub Total</li>
                        </ul>
<?php $ca=mysqli_query($con,"SELECT * FROM cart where id_user='$_SESSION[id_user]' order by tanggal desc ");while($rt=mysqli_fetch_array($ca)){
    $gp=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM produk where id_produk='$rt[id_produk]' ")); ?>

                        <!-- REPEAT BY PRODUCT -->
                        <ul class="shopping-product-detail">
                            <li class="shopping-1">
                                <img style="width:100px;height:100px;" src="control/<?php echo $gp['gambar']; ?>" alt="product image" />
                            </li>
                            <li class="shopping-2">
                                <a href="detailproduct?thisproduct=<?php echo base64_encode($rt['id_produk']) ?>&nameproduct=<?php echo $gp['nama']; ?>"><span style="font-size:15px;"><?php echo $gp['nama']; ?></span></a>
                                <?php $kl=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rkat_produk where id_kat_produk='$gp[id_kat_produk]' ")); ?>
                                <p>Tag : <?php echo $kl['kat_produk']; ?></p>
                                <p>Pesan : <?php echo tgl($rt['tanggal']); ?></p>
                                <p>Berat : <?php echo $gp['berat']; ?> Kg</p>
                            </li>
                            <li class="shopping-3">
                                <form  method="post" action="prosesuser/hanuser?thisposition=<?php echo base64_encode('updatecart'); ?>">
                                <input type="hidden" name="thisuser" value="<?php echo base64_encode($rt['id_user']); ?>">
                                <input type="hidden" name="thisproduk" value="<?php echo base64_encode($rt['id_produk']); ?>">
                    <?php if($tyu>0){ ?>
                                <p><?php echo $rt['jumlah'];?></p>
                    <?php }else {?>
                                <input type="number" step="1" min="1" name="jumlah" value="<?php echo $rt['jumlah'];?>" class="input-text qty text">
                                &nbsp;&nbsp;&nbsp;<button class="btn btn-circle btn-success btn-sm">Update</button>
                    <?php }?>
                                </form>
                            </li>
                            <li class="shopping-4">
                                Rp. <?php echo rp($gp['harga']); ?>
                            </li>
                            <li class="shopping-5">
                                Rp. <?php echo rp($rt['subtotal']); ?>
                            </li>
                            <li class="shopping-6">
                    <?php if($tyu>0){ ?>
                                
                    <?php }else {?>
                                <a class="btn btn-circle btn-danger btn-sm" href="prosesuser/hanuser?thisposition=<?php echo base64_encode('cancelcart'); ?>&thisuser=<?php echo base64_encode($rt['id_user']); ?>&thisproduk=<?php echo base64_encode($rt['id_produk']); ?>">Batal</a>
                    <?php }?>
                            </li>
                        </ul>
                        <!-- REPEAT BY PRODUCT -->
<?php } ?>
                    </div>
<?php $numca=mysqli_num_rows($ca);if($numca>0){ $total=mysqli_fetch_array(mysqli_query($con,"SELECT sum(subtotal) as total from cart where id_user='$_SESSION[id_user]' ")); ?>
                    <div class="row">
        <?php if($tyu>0){ ?>
                                <div class="col-md-6">
                                    <a href="checkout" class="button-2">Anda Sudah CheckOut</a>
                                </div>
                        <div class="col-md-5 pull-right">
                            Total : Rp. <?php echo rp($total['total']); ?> <span class="pull-right"><a href="checkout"><button class="button-3">Verifikasi Checkout</button></a></span>
                        </div>
        <?php }else { ?>
                                <div class="col-md-6">
                                    <a href="product" class="button-2">Lanjutkan Belanja</a>
                                </div>
                        <div class="col-md-5 pull-right">
                            Total : Rp. <?php echo rp($total['total']); ?> <span class="pull-right"><a href="checkout"><button class="button-3">Checkout</button></a></span>
                        </div>
        <?php } ?>
                    </div>  
<?php } else {}?>
                </div>             
            </div>
        </div>
<?php } else {?>
         <div class="content">

            <div class="container">
               <div class="error-404">
                    <img src="images/elements/error-404.png" alt="error-404">
                    <h3>Error</h3>

                    <form class="error-404-search">
                        <a href="homefirst" class="btn btn-danger">Kembali Ke Halaman Utama</a>
                    </form>

                    <h1>Are you lost?</h1>
                    <h2>SORRY, the page you asked for couldn't be found.</h2>
                    <p>Please try using the search form below</p>

                </div>
            </div>

        </div>
<?php }?>
        <!-- ======================================================================
                                        END CONTENT
        ======================================================================= -->
<?php require 'footer.php'; ?>