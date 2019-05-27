<?php date_default_timezone_set('Asia/Jakarta'); require '../php/config.php'; require '../php/function.php'; session_start(); if(empty($_SESSION['id_control'])){header('location:log');} ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin ZEON Store</title>
  <link rel="icon" href="favicon.ico">
  <link rel="shortcut icon" href="../logo.png">
    
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="theme/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <!-- Ionicons -->
  <!-- DataTables -->
  <link rel="stylesheet" href="theme/plugins/datatables/dataTables.bootstrap.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="theme/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="theme/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="theme/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<script src="../php/olahangka.js"></script>
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"><i class="glyphicon glyphicon-flash"></i>
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
<?php $cpen=mysqli_query($con,"SELECT * FROM checkout where status='pending' ");$jcpen=mysqli_num_rows($cpen); ?>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-globe"></i>
              <span class="label label-success"><?php echo $jcpen; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Anda Punya <?php echo $jcpen; ?> Checkout Pending</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
            <?php while($hcpen=mysqli_fetch_array($cpen)){ $gu=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user where id_user='$hcpen[id_user]' ")); ?>
                  <li><!-- start message -->
                    <a href="#">
                    <?php if($gu['gambar']==NULL){ ?>
                      <div class="pull-left">
                        <img src="../images/user/default.png" class="img-circle" alt="User Image">
                      </div>
                    <?php } else { ?>
                      <div class="pull-left">
                        <img src="<?php echo $gu['gambar']; ?>" class="img-circle" alt="User Image">
                      </div>
                    <?php } ?>
                      <h4>
                        <?php echo $hcpen['id_user']; ?>
                        <small><i class="fa fa-clock-o"></i> <?php echo tgl($hcpen['tanggal']); ?></small>
                      </h4>
                      <p>a.n : <?php echo $hcpen['an']; ?> (Rp. <?php echo rp($hcpen['ongcart']+$hcpen['ongwil']+$hcpen['ongberat']); ?>)</p>
                    </a>
                  </li>
            <?php } ?>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="main?thisaction=<?php echo base64_encode('checkout'); ?>">Lihat Semua</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
<?php $vtan=mysqli_query($con,"SELECT * FROM service where jawab='' order by id_service desc ");$mtan=mysqli_num_rows($vtan); ?>

          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-comment"></i>
              <span class="label label-danger"><?php echo $mtan; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header"><?php echo $mtan; ?> Pertanyaan Belum Dijawab</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
          <?php while($htan=mysqli_fetch_array($vtan)){ ?>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> <?php echo $htan['tanya']; ?>
                    </a>
                  </li>
          <?php } ?>
                </ul>
              </li>
              <li class="footer"><a href="main?thisaction=<?php echo base64_encode('service'); ?>">Lihat Semua</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="user.jpeg" class="user-image" alt="User Image">
              <span class="hidden-xs">ZEON STORE</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="user.jpeg" class="img-circle" alt="User Image">

                <p>
                  ZEON STORE - <?php echo $_SESSION['user']; ?>
                  <small><?php echo $_SESSION['pass']; ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="prosescon/hancon?thisposition=<?php echo base64_encode('logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="glyphicon glyphicon-cog"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="user.jpeg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Zeon Store - <?php echo $_SESSION['user']; ?></p>
          <i class="glyphicon glyphicon-time"></i> <?php echo tgl(date('d-m-Y')); ?>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="main">
            <i class="glyphicon glyphicon-th"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow"></small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-qrcode"></i>
            <span>Product</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="main?thisaction=<?php echo base64_encode('listproduct'); ?>"><i class="glyphicon glyphicon-align-justify"></i> List Product</a></li>
            <li><a href="main?thisaction=<?php echo base64_encode('addproduct'); ?>"><i class="glyphicon glyphicon-plus"></i> Add Product</a></li>
            <li><a href="main?thisaction=<?php echo base64_encode('komentar'); ?>"><i class="glyphicon glyphicon-bullhorn"></i> Komentar Product</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-plane"></i>
            <span>Ongkos Kirim</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="main?thisaction=<?php echo base64_encode('ongkirwilayah'); ?>"><i class="glyphicon glyphicon-map-marker"></i> Per Wilayah</a></li>
            <li><a href="main?thisaction=<?php echo base64_encode('ongkirberat'); ?>"><i class="glyphicon glyphicon-tint"></i> Berat</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-shopping-cart"></i>
            <span>Transaksi</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="main?thisaction=<?php echo base64_encode('cart'); ?>"><i class="glyphicon glyphicon-heart"></i> Cart</a></li>
            <li><a href="main?thisaction=<?php echo base64_encode('checkout'); ?>"><i class="glyphicon glyphicon-star"></i> Checkout</a></li>
          </ul>
        </li>
        <li>
          <a href="main?thisaction=<?php echo base64_encode('verifikasi'); ?>">
            <i class="glyphicon glyphicon-thumbs-up"></i> <span>Verifikasi CheckOut</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i>
            <span>Account</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="main?thisaction=<?php echo base64_encode('akunadmin'); ?>"><i class="glyphicon glyphicon-king"></i> Admin</a></li>
            <li><a href="main?thisaction=<?php echo base64_encode('akunuser'); ?>"><i class="glyphicon glyphicon-pawn"></i> User</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-cog"></i>
            <span>Setting</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="main?thisaction=<?php echo base64_encode('kategoriproduct'); ?>"><i class="glyphicon glyphicon-tags"></i> Kategori Product</a></li>
            <li><a href="main?thisaction=<?php echo base64_encode('slider'); ?>"><i class="glyphicon glyphicon-fast-forward"></i> Slider</a></li>
            <li><a href="main?thisaction=<?php echo base64_encode('carabayar'); ?>"><i class="glyphicon glyphicon-usd"></i> Cara Bayar</a></li>
            <li><a href="main?thisaction=<?php echo base64_encode('contact'); ?>"><i class="glyphicon glyphicon-option-horizontal"></i> Contact</a></li>
          </ul>
        </li>
        <li>
          <a href="main?thisaction=<?php echo base64_encode('service'); ?>">
            <i class="glyphicon glyphicon-eye-open"></i> <span>Customer Service</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Control Administrator</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<?php 
if(empty($_GET['thisaction'])){require 'page/home.php';}
else{
  $act=base64_decode($_GET['thisaction']);
  if($act=='listproduct'){
    require 'page/listproduct.php';
  }
  else if($act=='addproduct'){
    require 'page/addproduct.php';
  }
  else if($act=='kategoriproduct'){
    require 'page/catproduct.php';
  }
  else if($act=='addkategori'){
    require 'page/addkategori.php';
  }
  else if($act=='editkategori'){
    require 'page/editkategori.php';
  }
  else if($act=='editproduct'){
    require 'page/editproduct.php';
  }
  else if($act=='slider'){
    require 'page/slider.php';
  }
  else if($act=='ongkirwilayah'){
    require 'page/ongwilayah.php';
  }
  else if($act=='ongkirberat'){
    require 'page/ongkirberat.php';
  }
  else if($act=='akunuser'){
    require 'page/user.php';
  }
  else if($act=='akunadmin'){
    require 'page/admin.php';
  }
  else if($act=='cart'){
    require 'page/cart.php';
  }
  else if($act=='checkout'){
    require 'page/checkout.php';
  }
  else if($act=='verifikasi'){
    require 'page/finish.php';
  }
  else if($act=='detailveri'){
    require 'page/detail.php';
  }
  else if($act=='contact'){
    require 'page/contact.php';
  }
  else if($act=='carabayar'){
    require 'page/carabayar.php';
  }
  else if($act=='service'){
    require 'page/service.php';
  }
  else if($act=='komentar'){
    require 'page/komentar.php';
  }
}
?>
    </section>
    <!-- /.content -->
  </div>
</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>WA 081330707048</b>
    </div>
    <strong>Copyright &copy; 2017 <a href="#">Rino Oktavianto (081330707048)</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="theme/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="theme/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="theme/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="theme/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="theme/plugins/fastclick/fastclick.js"></script>
<!-- Sparkline -->
<script src="theme/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="theme/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="theme/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="theme/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="theme/plugins/chartjs/Chart.min.js"></script>

<!-- AdminLTE App -->
<script src="theme/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="theme/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
