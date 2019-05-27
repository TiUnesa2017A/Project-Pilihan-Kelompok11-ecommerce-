<?php require 'header.php'; ?>
        <!-- ======================================================================
                                        END HEADER
        ======================================================================= -->  

        <!-- ======================================================================
                                        START CONTENT
        ======================================================================= -->
        <div class="content">
            <!-- =====================================================================
                                             START THE SLIDER
            ====================================================================== -->
            <div class="container">
                <div class="the-slider" data-tesla-plugin="slider" data-tesla-item=".slide" data-tesla-next=".slide-right" data-tesla-prev=".slide-left" data-tesla-container=".slide-wrapper">
                    <div class="slide-arrows">
                        <div class="slide-left"></div>
                        <div class="slide-right"></div>
                    </div>
                    <ul class="slide-wrapper">
<?php $sli=mysqli_query($con,"SELECT * FROM slider order by id_slider desc limit 3");while($der=mysqli_fetch_array($sli)){ ?>
                        <li class="slide"><img style="width:1140px;height:450px;" st src="control/<?php echo $der['gambar']; ?>" alt="slider image"></li>
<?php } ?>
                    </ul>
                    <ul class="the-bullets-dots" data-tesla-plugin="bullets">
                        <li><span></span></li>
                        <li><span></span></li>
                        <li><span></span></li>
                    </ul>
                </div>
            </div>
            <!-- =====================================================================
                                             END THE SLIDER
            ====================================================================== -->

            <!-- =====================================================================
                                             START SERVICES
            ====================================================================== -->
            <div class="box layanan">
                <div class="container">
                    <div class="tesla-carousel" data-tesla-plugin="carousel" data-tesla-container=".tesla-carousel-items" data-tesla-item=">div" data-tesla-autoplay="false" data-tesla-rotate="false">
                        
                        <div class="row">
                            <div class="tesla-carousel-items"> 
                                <div class="col-md-4">
                                    <div class="service-1">
                                        <i class="icon-374" title="shipping"></i>
                                        <h4>Antar Sampai Tujuan</h4>

                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="service-1 service-color-1">
                                        <i class="icon-271" title="time"></i>
                                        <h4>Online 24 Jam</h4>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="service-1 service-color-2">
                                        <i class="icon-260" title="cash"></i>
                                        <h4>Harga Murah Meriah</h4>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- =====================================================================
                                             END SERVICES
            ====================================================================== -->
            <div class="container">
                <div class="tesla-carousel" data-tesla-plugin="carousel" data-tesla-container=".tesla-carousel-items" data-tesla-item=">div" data-tesla-autoplay="false" data-tesla-rotate="false">
                    <div class="site-title">
                        <ul class="wrapper-arrows">
                            <li><i class="icon-517 prev" title="left arrow"></i></li>
                            <li><i class="icon-501 next" title="right arrow"></i></li>
                        </ul>
                        <div class="site-inside">
                            <span>Produk Baru</span>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="tesla-carousel-items">
<?php $pr=mysqli_query($con,"SELECT * FROM produk where stok>0 order by tanggal desc limit 6");while($dui=mysqli_fetch_array($pr)){ ?>                
                            <div class="col-md-3 col-xs-6">
                                <div class="product">
                                    <div class="product-cover">
                                        <div class="product-cover-hover"><span><a href="detailproduct?thisproduct=<?php echo base64_encode($dui['id_produk']) ?>&nameproduct=<?php echo $dui['nama']; ?>">Detail</a></span></div>
                                        <img style="width:300px;height:300px;" src="control/<?php echo $dui['gambar']; ?>" alt="product name" />
                                    </div>    
                                    <div class="product-details">  
                                        <a href="detailproduct?thisproduct=<?php echo base64_encode($dui['id_produk']) ?>&nameproduct=<?php echo $dui['nama']; ?>"><h1 style="font-size:80%;"><?php echo $dui['nama']; ?></h1></a>
                                        <p><?php echo substr($dui['deskripsi'], 0,50); ?>...</p>
                                        <div class="product-price">
                                            <button style="float:right;" class="btn btn-xs btn-info">Stok <?php echo rp($dui['stok']); ?></button>
                                            <div style="font-size:18px;"><?php echo 'Rp. '. rp($dui['harga']); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="container">
                    <div class="site-title">
                        <div class="site-inside">
                            <span>Promo</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="adds-2">
                                <a href="#"><img style="width:100%;height:120px;" src="images/ads/ads1.jpg" alt="adds"></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="adds-3">
                                <a href="#"><img style="width:100%;height:150px;" src="images/ads/ads2.png" alt="adds"></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="adds-3">
                                <a href="#"><img style="width:100%;height:150px;" src="images/ads/ads3.jpg" alt="adds"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--
            <div class="box">
                <div class="container">
                    <div class="site-title"><div class="site-inside"><span>Produk Terlaris</span></div></div> 
                    <div class="row">
<?php $lar=mysqli_query($con,"SELECT * from log order by id_log desc limit 2");while($na=mysqli_fetch_array($lar)){ $nana=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM produk where id_produk='$na[id_produk]' ")); ?>
                        <div class="col-md-6">
                            <div class="product">
                                <div class="product-cover">
                                    <div class="product-cover-hover"><span><a href="detailproduct?thisproduct=<?php echo base64_encode($nana['id_produk']) ?>&nameproduct=<?php echo $nana['nama']; ?>">Detail</a></span></div>
                                    <img style="width:590px;height:600px;" src="control/<?php echo $nana['gambar']; ?>" alt="product name" />
                                </div>    
                                <div class="product-details">  
                                        <a href="detailproduct?thisproduct=<?php echo base64_encode($nana['id_produk']) ?>&nameproduct=<?php echo $nana['nama']; ?>"><h1 style="font-size:100%;"><?php echo $nana['nama']; ?></h1></a>
                                        <div class="product-price">
                                            <i class="icon-257" title="add to cart"></i>
                                            <div style="font-size:20px;"><?php echo 'Rp. '. rp($nana['harga']); ?></div>
                                        </div>
                                    </div>
                            </div>
                        </div>
<?php } ?>
                    </div>
                </div>
            </div>-->
            <div class="box">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="site-title"><div class="site-inside"><span>Customer Service</span></div></div> 
                            <div class="panel-group panel-group-2" id="accordion">
<?php $ser=mysqli_query($con,"SELECT * FROM service where status='YES' order by id_service desc limit 4 ");while($vice=mysqli_fetch_array($ser)){ $ur=1; ?>                                                               
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" class="collapsed" href="#collapse-<?php echo $vice['id_service']; ?>">
                                                <i class="icon-473" title="473"></i><?php echo $vice['tanya']; ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-<?php echo $vice['id_service']; ?>" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php echo $vice['jawab']; ?>
                                        </div>
                                    </div>
                                </div>
                                
<?php $ur++; } ?>

                            </div>
                            <p><a href="#" class="btn btn-danger" data-target="#tanya" data-toggle="modal">Kirim Pertanyaan</a></p>
                        </div>
                        <div class="col-md-6">
                            <div class="site-title"><div class="site-inside"><span>Support</span></div></div> 
                            <div class="row">
                                <img style="width:90%;height:20%;margin-left:20px;" src="images/pendukung/support.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div id="tanya" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Kirim Pertanyaan</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" enctype="multipart/form-data" action="prosesuser/hanuser?thisposition=<?php echo base64_encode('kirimtanya'); ?>">
            <div class="form-group">
              <label>Tulis Pertanyaan</label>
                <textarea name="tanya" class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-circle">Kirim</button> 
          </form>
        </div>
        </div>
    </div>
</div>
        <!-- ======================================================================
                                        END CONTENT
        ======================================================================= -->

        <!-- ======================================================================
                                        START FOOTER
        ======================================================================= -->
<?php require 'footer.php'; ?>