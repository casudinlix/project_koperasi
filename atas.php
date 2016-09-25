<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Koperasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo $url;?>bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/datepicker.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/jquery.dataTables.css">
  <script type="text/javascript" language="javascript" src="<?php echo $url;?>js/jquery.js"></script>
  <script src="<?php echo $url;?>js/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="<?php echo $url;?>js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="<?php echo $url;?>js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="<?php echo $url;?>css/dataTables.bootstrap.css"/>
  <!-- Font Awesome -->
  <script language="javascript" src="modul/simpanan/ajax.js"></script>
  <script language="javascript" src="modul/pengambilan/ajax.js"></script>
  <link rel="stylesheet" href="<?php echo $url;?>css/font-awesome.min.css">
  <!-- Ionicons -->

  <script type="text/javascript" src="<?php echo $url;?>js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/jquery.easyui.min.js"></script>

<script type="text/javascript" src="<?php echo $url;?>js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/jquery.ui.core.js"></script>
   <link rel="stylesheet" href="<?php echo $url;?>css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="shortcut icon" href="img/pp.jpg"/>
  <link rel="stylesheet" href="<?php echo $url;?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>bootstrap/css/bootstrap.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo $url;?>dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->
  <script type="text/javascript" src="<?php echo $url;?>js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/jquery.easyui.min.js"></script>

<script type="text/javascript" src="<?php echo $url;?>js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/ui.datepicker-id.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/jquery.ui.datepicker.js"></script>

<script type="text/javascript">
$(document).ready(function(){

});
</script>
  <link rel="stylesheet" href="<?php echo $url;?>plugins/datepicker/datepicker3.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="media.php?page=home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>K</b>SP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Koperasi</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">




          <!-- User Account: style can be found in dropdown.less -->

    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="img/<?php echo $_SESSION['foto'];?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nama_kita'];?></p>
          <a href="logut.php"><i class="fa fa-sign-out"></i> Sign out</a>

        </div>
      </div>

<?php include "server/all.php";?>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i>
            <span>Konfigurasi</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=jenis-simpanan"><i class="fa fa-money"></i> Simpanan</a></li>
            <li><a href="?page=jenis-pinjaman"><i class="fa fa-gift"></i> Pinjaman</a></li>
            <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Form</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=anggota"><i class="fa fa-users"></i> Pendaftaran Anggota Baru</a></li>
            </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-truck"></i>
            <span>Transaksi</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=transaksi-simpanan"><i class="fa fa-money"></i> Simpananan</a></li>
            <li><a href="?page=transaksi-penarikan"><i class="fa fa-gift"></i> Penarikan</a></li>
            <li><a href="../layout/fixed.html"><i class="fa fa-credit-card"></i> Pinjaman</a></li>
            <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-cc-amex"></i> Bayar Pinjaman</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=laporan-tabungan"><i class="fa fa-money"></i> Tabungan</a></li>
            <li><a href="?page=jenis-pinjaman"><i class="fa fa-gift"></i> Hutang</a></li>
            <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Pinjaman</a></li>
            <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Bayar Pinjaman</a></li>
          </ul>
        </li>
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
