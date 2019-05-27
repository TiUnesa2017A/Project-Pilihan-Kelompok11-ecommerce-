<?php require 'header.php'; ?>
<?php if(isset($_SESSION['id_user'])){ ?>

<!-- ======================================================================
                                        START CONTENT
======================================================================= -->
<?php
$BatasAwal = 10;
    if (!empty($_GET['page'])) {
        $hal = $_GET['page'] - 1;
        $MulaiAwal = $BatasAwal * $hal;
    } else if (!empty($_GET['page']) and $_GET['page'] == 1) {
        $MulaiAwal = 0;
    } else if (empty($_GET['page'])) {
        $MulaiAwal = 0;
    } 
$ac=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user where id_user='$_SESSION[id_user]' ")); 
$loo=mysqli_query($con,"SELECT * FROM log where id_user='$_SESSION[id_user]' ");?>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2>ACCOUNT</h2>
                        
                        <div class="the-form">
                            <form action="prosesuser/hanuser?thisposition=<?php echo base64_encode('updateaccount'); ?>" method="post">
                            <input type="hidden" name="id_user" value="<?php echo base64_encode($ac['id_user']); ?>">
                                <div class="row">
                                    <div class="col-md-4"><p>Email</p>
                                        <input type="text" name="email" class="the-line" value="<?php echo $ac['email']; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-4"><p>Username</p>
                                        <input type="text" name="username" class="the-line" value="<?php echo $ac['username']; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-4"><p>Password</p>
                                        <input type="password" name="password" class="the-line" value="<?php echo $ac['password']; ?>" autocomplete="off">
                                    </div>
                                </div>
                                <button class="btn btn-success">Update Account</button>
                            </form>
                        </div>
                    </div>
<?php $acc=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user where id_user='$_SESSION[id_user]' ")); ?>
                    <div class="col-md-4">
                        <div class="main-sidebar">
                            <div class="row">
                                <div class="col-md-12 col-xs-6">
                                    <div class="widget">
                                    <div class="widget-title">Foto Account</div>
                <?php if($acc['gambar']==NULL){ ?>
                <a href="#" title="Ganti Foto" data-target="#gantifoto" data-toggle="modal"><img style="width:150px;height:150px;margin-left:10px;" src="images/user/default.png"></a>
                <?php } else { ?>
                <a href="#" title="Ganti Foto" data-target="#gantifoto" data-toggle="modal"><img style="width:150px;height:150px;border-radius:150px;margin-left:10px;" src="control/<?php echo $acc['gambar']; ?>"></a>
                <?php } ?>          <br><br>
                <a style="margin-left:10px;" href="#" class="btn btn-primary" data-target="#gantifoto" data-toggle="modal">Ganti Foto</a>&nbsp;
                <a class="btn btn-danger" href="prosesuser/hanuser?thisposition=<?php echo base64_encode('hapusfoto'); ?>&thisuser=<?php echo base64_encode($_SESSION['id_user']); ?>">Hapus Foto</a>         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--modal foto profile-->
<div id="gantifoto" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Ganti Foto</h4>
        </div>
        <div class="modal-body">
<?php if($acc['gambar']==NULL){ ?>
          <form role="form" method="post" enctype="multipart/form-data" action="prosesuser/hanuser?thisposition=<?php echo base64_encode('gantidaridefault'); ?>">
<?php } else { ?>
          <form role="form" method="post" enctype="multipart/form-data" action="prosesuser/hanuser?thisposition=<?php echo base64_encode('gantisudahada'); ?>">
<?php } ?>
            <input type="hidden" name="user" value="<?php echo base64_encode($_SESSION['id_user']); ?>" >
            <div class="form-group">
                <label>Pilih Foto</label>
                <input type="file" name="gambar" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-circle">Update</button> 
          </form>
        </div>
        </div>
    </div>
</div>
                <div class="row">
                <div class="site-title"><div class="site-inside"><span>History Cart</span></div></div>
                    <div class="col-md-12">
                      <table id="example1" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Gambar</th>
                          <th>Nama Produk</th>
                          <th>Jumlah</th>
                          <th>Subtotal</th>
                          <th>Tanggal</th>
                        </tr>
                        </thead>
                        <tbody>
<?php $pro=mysqli_query($con,"SELECT * FROM log where id_user='$_SESSION[id_user]' order by tanggal desc  LIMIT $MulaiAwal , $BatasAwal "); $vr=1;while($duk=mysqli_fetch_array($pro)){ ?>
                        <tr>
                          <td><?php echo $vr; ?></td>
          <?php $ktpo=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM produk where id_produk='$duk[id_produk]' ")); ?>
                          <td><img style="width:100px;height:80px;" src="control/<?php echo $ktpo['gambar']; ?>"></td>
                          <td><?php echo $ktpo['nama']; ?></td>
                          <td><?php echo $duk['jumlah']; ?></td>
                          <td>Rp. <?php echo rp($duk['subtotal']); ?></td>
                          <td><?php echo tgl($duk['tanggal']); ?></td>
                        </tr>
        <?php $vr++; } ?>
                        </tbody>
                      </table>
                    </div>
                      <ul class="page-numbers">
<?php $cekQuery = $loo;
    $jumlahData = mysqli_num_rows($cekQuery);
    if ($jumlahData > $BatasAwal) {
        echo '<br/><center><div style="font-size:10pt;">Halaman : ';
        $a = explode(".", $jumlahData / $BatasAwal);
        $b = $a[0];
        $c = $b + 1;
        for ($i = 1; $i <= $c; $i++) {
            echo '<li><a class="page-numbers" style="';
            if ($_GET['page'] == $i) {
                echo 'color:red';
            }
            echo '" href="?page=' . $i . '">' . $i . '</a> /</li>';
        }
    }
?>
                        </ul>
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