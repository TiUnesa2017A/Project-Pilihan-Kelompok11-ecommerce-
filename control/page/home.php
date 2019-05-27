        <div class="col-lg-12 col-md-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
<?php $dap=mysqli_fetch_array(mysqli_query($con,"SELECT sum(totalbayar) as tot from finish where status='success' ")); ?>
              <h3><?php if($dap['tot']==NULL){echo "0";}else{echo rp($dap['tot']);} ?></h3>

              <p>PENDAPATAN</p>
            </div>
            <div class="icon" style="margin-top:10px;">
              <i class="glyphicon glyphicon-usd"></i>
            </div>
            <a href="#" class="small-box-footer">Pendapatan Sementara</a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-12 col-md-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
<?php $pen=mysqli_fetch_array(mysqli_query($con,"SELECT sum(totalbayar) as tot from finish where status='pending' ")); ?>
              <h3><?php if($pen['tot']==NULL){echo "0";}else{echo rp($pen['tot']);} ?></h3>

              <p>PENDING</p>
            </div>
            <div class="icon" style="margin-top:10px;">
              <i class="glyphicon glyphicon-sort"></i>
            </div>
            <a href="#" class="small-box-footer">Belum Diterima</a>
          </div>
        </div>

      <div class="col-lg-3 col-md-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
<?php $user=mysqli_num_rows(mysqli_query($con,"SELECT * from user")); ?>
              <h3><?php if($user==NULL){echo "0";}else{echo rp($user);} ?></h3>

              <p>CUSTOMER</p>
            </div>
            <div class="icon" style="margin-top:10px;">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            <a href="#" class="small-box-footer">ZEON STORE</a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-md-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
<?php $pro=mysqli_num_rows(mysqli_query($con,"SELECT * from produk")); $ksl=mysqli_fetch_array(mysqli_query($con,"SELECT sum(stok) as stok from produk")); ?>
              <h3><?php if($pro==NULL){echo "0";}else{echo rp($pro);} ?></h3>

              <p>PRODUK</p>
            </div>
            <div class="icon" style="margin-top:12px;">
              <i class="glyphicon glyphicon-book"></i>
            </div>
            <a href="#" class="small-box-footer">Keseluruhan : <?php if($ksl['stok']==NULL){echo "0";}else{echo rp($ksl['stok']);} ?></a>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
<?php $cart=mysqli_num_rows(mysqli_query($con,"SELECT * from cart")); ?>
              <h3><?php if($cart==NULL){echo "0";}else{echo rp($cart);} ?></h3>

              <p>CART</p>
            </div>
            <div class="icon" style="margin-top:10px;">
              <i class="glyphicon glyphicon-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">Seluruh Cart</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
<?php $check=mysqli_num_rows(mysqli_query($con,"SELECT * FROM checkout")); ?>
              <h3><?php if($check==NULL){echo "0";}else{echo rp($check);} ?></h3>

              <p>CHECKOUT</p>
            </div>
            <div class="icon" style="margin-top:10px;">
              <i class="glyphicon glyphicon-heart-empty"></i>
            </div>
            <a href="#" class="small-box-footer">Seluruh Checkout</a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
<?php $cont=mysqli_num_rows(mysqli_query($con,"SELECT * FROM control")); ?>
              <h3><?php if($cont==NULL){echo "0";}else{echo rp($cont);} ?></h3>

              <p>ADMIN</p>
            </div>
            <div class="icon" style="margin-top:10px;">
              <i class="glyphicon glyphicon-cog"></i>
            </div>
            <a href="#" class="small-box-footer">Seluruh Admin</a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
<?php $log=mysqli_num_rows(mysqli_query($con,"SELECT * FROM log")); ?>
              <h3><?php if($log==NULL){echo "0";}else{echo rp($log);} ?></h3>

              <p>HISTORY</p>
            </div>
            <div class="icon" style="margin-top:10px;">
              <i class="glyphicon glyphicon-pause"></i>
            </div>
            <a href="#" class="small-box-footer">Seluruh Log</a>
          </div>
        </div>
        <!-- ./col -->
        


