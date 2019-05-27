<div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-xs-6">
                        <ul class="socials">
                            <li><a href="#"><img src="images/elements/socials/facebook.png" alt="facebook"/>Facebook</a></li>
                            <li><a href="#"><img src="images/elements/socials/twitter.png" alt="twitter"/>Twitter</a></li>
                            <li><a href="#"><img src="images/elements/socials/youtube.png" alt="youtube"/>Youtube</a></li>
                            <li><a href="#"><img src="images/elements/socials/googleplus.png" alt="google"/>Google+</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-xs-6">
                        <ul class="menu-item">
<?php //kategori produk
$tkp=mysqli_query($con,"SELECT * from rkat_produk order by kat_produk asc limit 7");
while($rtkp=mysqli_fetch_array($tkp)) { $jp=mysqli_num_rows(mysqli_query($con,"SELECT * FROM produk where id_kat_produk='$rtkp[id_kat_produk]' and stok>0 ")); ?>
    <li><a href="product?thiscategory=<?php echo base64_encode($rtkp['id_kat_produk']); ?>"><?php echo $rtkp['kat_produk'].' ('.$jp.')'; ?></a></li>
    <?php }
?>                            
                        </ul>
                    </div>
                    <div class="col-md-2 col-xs-6">
                        <ul class="menu-item">
<?php // produk
$pp=mysqli_query($con,"SELECT * from produk where stok>0 order by id_produk asc limit 7");
while($rpp=mysqli_fetch_array($pp)) { ?>
    <li><a href="detailproduct?thisproduct=<?php echo base64_encode($rpp['id_produk']) ?>&nameproduct=<?php echo $rpp['nama']; ?>"><?php echo $rpp['nama']; ?></a></li>
    <?php }
?>
                        </ul>
                    </div>
                    <div class="col-md-4 pull-right">
                        <div class="subscription">
                            <div class="subscription-title">Newsletter subscribe</div>
                            <form class="subscription" id="newsletter" method="post">
                                <input type="text" name="newsletter-name" placeholder="Name" class="subscription-line">
                                <input type="text" name="newsletter-email" placeholder="E-mail" class="subscription-line">
                                <input type="submit" value="send" class="button-5">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="mini-footer">
                    <div class="row">
                        <div class="col-md-6">
                            
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                <img src="images/elements/payment.png" alt="payment systems" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ======================================================================
                                        END FOOTER
        ======================================================================= -->

        <!-- ======================================================================
                                        START SCRIPTS
        ======================================================================= -->
        <script src="js/modernizr.custom.63321.js" type="text/javascript"></script>
        <script src="js/jquery-1.10.0.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/placeholder.js" type="text/javascript"></script>
        <script src="js/imagesloaded.pkgd.min.js" type="text/javascript"></script>
        <script src="js/masonry.pkgd.min.js" type="text/javascript"></script>
        <script src="js/jquery.swipebox.min.js" type="text/javascript"></script>
        <script src="js/farbtastic/farbtastic.js" type="text/javascript"></script>
        <script src="js/options.js" type="text/javascript"></script>
        <script src="js/plugins.js" type="text/javascript"></script>
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- ======================================================================
                                        END SCRIPTS
        ======================================================================= -->
        <!-- Select2 -->
        <script src="control/theme/plugins/select2/select2.full.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.select2').select2();
            });
        </script>
    </body>
</html>