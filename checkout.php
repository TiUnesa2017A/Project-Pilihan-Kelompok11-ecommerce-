<?php require 'header.php'; ?>
<?php if(isset($_SESSION['id_user'])){ ?>
<!-- ======================================================================
                                        START CONTENT
        ======================================================================= -->
        <div class="content">
            <div class="container">
<?php $cecart=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM cart where id_user='$_SESSION[id_user]' "));if($cecart!=NULL){ ?>
              <div class="site-title"><div class="site-inside"><span>Checkout</span></div></div> 
                <div class="row">                    
                    <div class="col-md-6">
                      <div class="forms-separation">
<?php $cc=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM checkout where id_user='$_SESSION[id_user]' and status='pending' ")); if($cc==NULL) { ?>
                        <form class="register-form" method="post" action="prosesuser/hanuser?thisposition=<?php echo base64_encode('insertcheckout'); ?>">
<?php } else { ?>
                        <form class="register-form" method="post" action="prosesuser/hanuser?thisposition=<?php echo base64_encode('updatecheckout'); ?>">
<?php } ?>
                        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                            <h3>Form Pengiriman Barang</h3>
                            <div class="row">
                                <div class="col-md-6">
<?php if($cc==NULL) { ?>
                                    <p>Kode CheckOut <span class="neccesary">*</span></p>
                                    <input class="input-line" type="text" name="id_checkout" value="<?php echo substr(md5(rand()), 0,9); ?>" readonly>
<?php } else { ?>
                                    <p>Kode CheckOut <span class="neccesary">*</span></p>
                                    <input class="input-line" type="text" name="id_checkout" value="<?php echo $cc['id_checkout']; ?>" readonly>
<?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <p>Atas Nama <span class="neccesary">*</span></p>
                                    <input type="text" name="an" class="input-line" value="<?php echo $cc['an']; ?>" autocomplete="off">
                                </div>
                            </div>
                            <p>Provinsi <span class="neccesary">*</span></p>
                            <select class="input-line" name="prov" id="prop" onchange="ajaxkota(this.value)">
    <?php if($cc!=NULL){ $idp=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM provinsi where nama='$cc[prov]' ")); ?>
                              <option value="$idp['id_prov']"><sapn style="font-color:#428bca;"><?php echo $cc['prov']; ?></sapn></option><?php } ?>
					          <option value="">Pilih Provinsi</option>
					          <?php 
                              require 'php/config.php';
					          $query=$db->prepare("SELECT id_prov,nama FROM provinsi ORDER BY nama");
					          $query->execute();
					          while ($data=$query->fetchObject()){
					          echo '<option value="'.$data->id_prov.'">'.$data->nama.'</option>';
					          }
					          ?>
					        <select>
					        <p>Kabupaten / Kota <span class="neccesary">*</span></p>
                            <select class="input-line" name="kab" id="kota" onchange="ajaxkec(this.value)">
    <?php $idk=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kabupaten where nama='$cc[kab]' ")); ?>
                              <option value="$idk['id_kab']"><sapn style="font-color:#428bca;"><?php echo $cc['kab']; ?></sapn></option>
          
        					</select>
					        <p>Kecamatan <span class="neccesary">*</span></p>
                            <select class="input-line" name="kec" id="kec" onchange="ajaxkel(this.value)">
    <?php $idke=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kecamatan where nama='$cc[kec]' ")); ?>
                              <option value="$idke['id_kec']"><sapn style="font-color:#428bca;"><?php echo $cc['kec']; ?></sapn></option>
          
        					</select>
					        <p>Desa / Kelurahan <span class="neccesary">*</span></p>
                            <select class="input-line" name="kel" id="kel">
    <?php $idl=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelurahan where nama='$cc[kel]' ")); ?>
                              <option value="$idl['id_kel']"><sapn style="font-color:#428bca;"><?php echo $cc['kel']; ?></sapn></option>
          
        					</select>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Kode Pos <span class="neccesary">*</span></p>
                                    <input type="text" name="kodepos" class="input-line" onkeypress="return hanyaangka(event)" value="<?php echo $cc['kodepos']; ?>" autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <p>Nomor Phone Konfirmasi <span class="neccesary">*</span></p>
                                    <input type="text" name="phone" class="input-line" onkeypress="return hanyaangka(event)" value="<?php echo $cc['phone']; ?>" autocomplete="off">
                                </div>
                            </div>
<?php if($cc==NULL) { ?>
                            <p><button class="btn btn-success">Proses</button></p>
<?php } else { ?>
                            <p><button class="btn btn-success">Update</button>&nbsp;&nbsp;<a class="btn btn-danger" href="prosesuser/hanuser?thisposition=<?php echo base64_encode('deletecheckout'); ?>&thischeckout=<?php echo base64_encode($cc['id_checkout']); ?>" class="button-6">Batal CheckOut</a></p>
<?php } ?>
                        </form>
                      </div>
                    </div>
<?php if($cc!=NULL) { ?>
                    <div class="col-md-6">
                            <div class="login-form-box" style="background-color:#fff;border:3px solid#eee;>
                                <form class="login-form">
                                    <h3>Pembayaran</h3>
                                    <p style="font-size:15px;">Total Cart : Rp. <?php echo rp($cc['ongcart']); ?></p>
                                    <p style="font-size:15px;">OngKir Wilayah : Rp. <?php echo rp($cc['ongwil']); ?></p>
                                    <p style="font-size:15px;">OngKir Berat : Rp. <?php echo rp($cc['ongberat']); ?></p>
                                    <p style="font-size:20px;">Total Pembayaran<br> Rp. <?php echo rp($cc['ongcart']+$cc['ongwil']+$cc['ongberat']); ?></p>
                                </form>
                            </div>
                    </div><br>
                    <div class="col-md-6">
                            <div class="login-form-box" style="background-color:#fff;border:3px solid#eee;">
                                <form class="login-form" method="post" action="prosesuser/hanuser?thisposition=<?php echo base64_encode('verifikasi'); ?>&thisuser=<?php echo base64_encode($_SESSION['id_user']);?>&thischeckout=<?php echo base64_encode($cc['id_checkout']);?>">
                                    <h3>Verifikasi CheckOut</h3>
                                    <input type="text" name="kode_veri" class="input-line" placeholder="Kode Verifikasi..">
                                    <p><button class="btn btn-primary">Verifikasi</button></p>
                                </form>
                            </div>
                    </div>
<?php } else { ?>
                    <div class="col-md-6">
                            <div class="login-form-box" style="background-color:#fff;border:3px solid#eee;">
                                <form class="login-form">
                                    <h3>Menunggu Proses CheckOut...</h3>
                                </form>
                            </div>
                    </div>
<?php } ?>
<?php } else { ?>

<?php } ?>
<?php $cara=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM carabayar where id_carabayar='1' ")); ?>
                    <div class="clear"></div>
                    <div class="col-md-12">
                        <div class="order-title">Cara Pembayaran</div>
                        <div class="row">
                            <div class="col-md-9">
                                   <ul>
                                        <li>
1. Pastikan Anda Sudah Memilih Alamat Pengiriman Barang
                                        </li>
                                        <li>
2. Perhatikan Kode CheckOut Anda
                                        </li>
                                        <li>
3. Kirim Pembayaran Anda Melalu Transfer Ke Rekening BRI - <?php echo $cara['rek']; ?> Sesuai Total Pembayaran
                                        </li>
                                        <li>
4. Kemudian Kirim Bukti Pembayaran Ke <?php echo $cara['phone']; ?> 
                                        </li>
                                        <li>
5. Tunggu Sampai Kami Memberikan Kode Verifikasi CheckOut
                                        </li>
                                        <li>
6. Setelah Anda Mendapatkan Kodenya Silahkan Melakukan Verifikasi CheckOut 
                                        </li>
                                        <li>
7. Selesai
                                        </li>
                                    </ul>
                                    <!-- CART DETAILS -->
                            </div>
                            <div class="col-md-3">
                            Format Konfirmasi Pembayaran :<br>
                            Kode CheckOut<br>
                            Atas Nama<br>
                            Bukti Transfer Berupa Gambar<br><br>
                            Kirim Ke <?php echo $cara['phone']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ======================================================================
                                        END CONTENT
        ======================================================================= -->
<?php } else { ?>
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
<?php } ?>
<?php require 'footer.php'; ?>