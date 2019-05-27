<?php session_start(); date_default_timezone_set('Asia/Jakarta'); require 'php/config.php'; require 'php/function.php'; $contact=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM contact where id_contact='1' ")); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>O-Sport</title>
        <link rel="icon" href="favicon.ico">
        <link rel="shortcut icon" href="logo2.png">
    
        <meta name="description" content="Here goes description" />
        <meta name="author" content="author name" />
        <link rel="stylesheet" href="control/theme/bootstrap/css/bootstrap.min.css">
        <!-- ======================================================================
                                    Mobile Specific Meta
        ======================================================================= -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- ======================================================================
                                    Style CSS + Google Fonts
        ======================================================================= 
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400italic,700italic,400,600,700,800" rel="stylesheet" type="text/css"> -->
        <link rel="stylesheet" href="css/bootstrap.css" />    
        <link rel="stylesheet" href="css/style.css" />
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
        <script type="text/javascript" src="php/ajax_daerah.js"></script>
    </head>
    <body class="home-blog-show">
<div class="modal" id="login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-review">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>NOTIFIKASI</h3>
            <center><p>Maaf Anda Harus Login Terlebih Dahulu</p><br><a href="logreg" class="button-4">Login Disini</a></center>
        </div>
    </div>
</div>
    <script src="php/olahangka.js"></script>
        <!-- ======================================================================
                                        START SCRIPTS
        ======================================================================= -->
        <div class="header">
            <div class="container">
                <div class="header-top-info">
                    <ul class="header-top-socials">
                        <li><a href="#"><i class="icon-160" title="161"></i></a></li>
                        <li><a href="#"><i class="icon-138" title="161"></i></a></li>
                        <li><a href="#"><i class="icon-106" title="161"></i></a></li>
                        <li><a href="#"><i class="icon-169" title="161"></i></a></li>
                        <li><a href="#"><i class="icon-163" title="161"></i></a></li>
                    </ul>
                    Phone: <?php echo $contact['phone']; ?>
                </div>
                <div class="header-middle-info">
                    <div class="col-md-4">
                        <div class="logo">
                            <a href="">
                                <img src="images/elements/logo2.png" alt="site logo" /></a>
                            
                        </div>

                    </div>
<?php
if(isset($_SESSION['id_user'])){ $c=mysqli_query($con,"SELECT * FROM cart where id_user='$_SESSION[id_user]' ");$ca=mysqli_num_rows($c);?>
                    <div class="col-md-8">
                        <ul class="header-middle-account">
                            <li><a href="account"><i class="icon-330" title="My account"></i> <?php echo $_SESSION['username']; ?></a></li>
                            <li><a href="prosesuser/hanuser?thisposition=<?php echo base64_encode('logout'); ?>"><i class="icon-351" title="Login"></i> Logout</a></li>
                            <li><a href="cart"><i class="icon-259" title="Checkout"></i> Cart <?php echo $ca; ?></a></li>
                        </ul>
                    </div>
<?php } else{ ?>
                    <div class="col-md-8">
                        <ul class="header-middle-account">
                            <li><a href="#" data-toggle="modal" data-target="#login"><i class="icon-330" title="My account"></i> My account</a></li>
                            <li><a href="logreg"><i class="icon-351" title="Login"></i> Login / Register</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#login"><i class="icon-259" title="Checkout"></i>Cart</a></li>
                        </ul>
                    </div>
                    <div></div>
<?php } 
?>
                    <div class="clear"></div>
                </div>
                <div class="menu">
                    <div class="search-cart">
                        
<?php if(isset($_SESSION['id_user'])){ $total=mysqli_fetch_array(mysqli_query($con,"SELECT sum(subtotal) as total from cart where id_user='$_SESSION[id_user]' ")); ?>
            <?php $ty=mysqli_query($con,"SELECT * FROM checkout where id_user='$_SESSION[id_user]' and status='pending' ");$tyu=mysqli_num_rows($ty);
                if($tyu>0){ $cc=mysqli_fetch_array($ty);?>
                        <a href="checkout"><div class="cart-all">
                            <i class="icon-37"></i><?php if($total!=NULL){ echo 'Rp. '.number_format($cc['ongcart']+$cc['ongwil']+$cc['ongberat']); }?>
                        </div></a>
                <?php } else {?>
                        <a href="checkout"><div class="cart-all">
                            <i class="icon-37"></i><?php if($total!=NULL){ echo 'Rp. '.number_format($total['total']); }?>
                        </div></a>
                <?php } ?>
<?php } else { ?>
                        <div class="cart-all">
                            <i class="icon-37"></i>
                        </div>
<?php } ?>
                        <div class="clear"></div>
                    </div>
                    <div class="repsonsive-menu"><i class="icon-406" title="406"></i> Menu</div>
                    <ul>
                        <li class="active"><a href="homefirst">Home</a>
                        </li>
                        <li class="menu-item-has-children" style="background-color: #ff9900"><a href="#">Kategori</a>
                            <ul>
<?php //kategori produk
$tkp=mysqli_query($con,"SELECT * from rkat_produk order by kat_produk asc ");
while($rtkp=mysqli_fetch_array($tkp)) { $jp=mysqli_num_rows(mysqli_query($con,"SELECT * FROM produk where id_kat_produk='$rtkp[id_kat_produk]' and stok>0 ")); ?>
    <li><a href="product?thiscategory=<?php echo base64_encode($rtkp['id_kat_produk']); ?>"><?php echo $rtkp['kat_produk'].' ('.$jp.')'; ?></a></li>
    <?php }
?>                             
                            </ul>
                        </li>
                        <li><a href="product">Produk</a></li>
                        
                        <li><a href="contact">Contact</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>