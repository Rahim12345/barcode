<?php
ob_start(); 
include '../include/config.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="BARCODE,barcode.az,Saatlı,Saatlı rayonu">
  <meta name="author" content="Rahim Süleymanov">
  <meta name="keywords" content="BARCODE,barcode.az,Saatlı,Saatlı rayonu">
  <link rel="shortcut icon" type="image/x-icon" href="../logo.png">

  <title>
    <?php 
    $id= $_SESSION["id"];
    $query4Seller=$conn->prepare("SELECT * FROM users WHERE id=?");
    $query4Seller->execute([$id]);
    $rows4Seller=$query4Seller->fetchall(PDO::FETCH_ASSOC);
    $count4Seller=count($rows4Seller);
    if($count4Seller==1)
    {
      echo $rows4Seller[0]["status"];
    }
    else
    {
      ob_start();
      header("location:../");
    }
    ?>
  </title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- datatable CDN -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.css"/>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- according css -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/print.css" rel="stylesheet" type="text/css" media="print">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-12 blockquote" style="font-size: 1.2em">
          <?php 
          $id= $_SESSION["id"];
          $query4Seller=$conn->prepare("SELECT * FROM users WHERE id=?");
          $query4Seller->execute([$id]);
          $rows4Seller=$query4Seller->fetchall(PDO::FETCH_ASSOC);
          $count4Seller=count($rows4Seller);
          if($count4Seller==1)
          {
            echo $rows4Seller[0]["name"];
          }
          else
          {
            ob_start();
            header("location:../");
          }
          ?>
        </div>
      </a>

      <hr class="sidebar-divider my-0">

      <li class="nav-item active">
        <a class="nav-link" href="./">
          <i class="fas fa-fw fa-home"></i>
          <span>Əsas səhifə</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php?id=1">
          <i class="fa fa-puzzle-piece" aria-hidden="true"></i>
          <span>Məhsullar</span></a>
      </li>
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        
      </div>


      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#credit" aria-expanded="true" aria-controls="credit">
          <i class="fa fa-credit-card" aria-hidden="true"></i>
          <span>Kredit</span>
        </a>
        <div id="credit" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kredit sistemi:</h6>
            <a class="collapse-item" href="index.php?id=3">Kreditləşmə</a>
            <a class="collapse-item" href="index.php?id=17">Kreditləşmə-köhnə müştəri</a>
            <a class="collapse-item" href="index.php?id=8">Bugün krediti olanlar</a>
            <a class="collapse-item" href="index.php?id=14">Gecikmiş kreditlər</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#contract" aria-expanded="true" aria-controls="contract">
          <i class="fa fa-credit-card" aria-hidden="true"></i>
          <span>Müqavilə</span>
        </a>
        <div id="contract" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Müqavilə sistemi:</h6>
            <a class="collapse-item" href="index.php?id=41">Kredit</a>
          </div>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#express" aria-expanded="true" aria-controls="express">
          <i class="fa fa-money" aria-hidden="true"></i>
          <span>Nağd</span>
        </a>
        <div id="express" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Nağd sistemi:</h6>
            <a class="collapse-item" href="index.php?id=24">Nağd satış</a>
            <a class="collapse-item" href="index.php?id=25">Borclular</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#topdan" aria-expanded="true" aria-controls="topdan">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
          <span>Topdan</span>
        </a>
        <div id="topdan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Topdan sistemi:</h6>
            <a class="collapse-item" href="index.php?id=30">Topdan satış</a>
            <a class="collapse-item" href="index.php?id=28">Borclular</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#iane" aria-expanded="true" aria-controls="iane">
          <i class="fa fa-eject" aria-hidden="true"></i>
          <span>İadə</span>
        </a>
        <div id="iane" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">İadə sistemi:</h6>
            <a class="collapse-item" href="index.php?id=35">İadə et</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#kassa" aria-expanded="true" aria-controls="kassa">
          <i class="fa fa-bank"></i>
          <span>Kassa</span>
        </a>
        <div id="kassa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kassa sistemi:</h6>
            <a class="collapse-item" href="index.php?id=33">Kassaya pul &nbsp&nbsp&nbsp&nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
            <a class="collapse-item" href="index.php?id=34">Kassadan pul &nbsp<i class="fa fa-minus" aria-hidden="true"></i></a>
            <a class="collapse-item" href="index.php?id=39">Partnyorların borcun ver</a>
            <a class="collapse-item" href="index.php?id=40">Əmək haqqı</a>
          </div>
        </div>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" >

      <!-- Main Content -->
      <div id="content" >

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" id="navId">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <?php  
          if(isset($_POST["searchbtn"]))
          {
            $searchsmth=htmlspecialchars(trim($_POST["searchsmth"]));
            if(!empty($searchsmth))
            {
              include 'search.php';
            }
            else
            {
              include 'search.php';
            }
          }
          else
          {
            include 'search.php';
          }
          ?>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto" >

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <?php  
            include 'xsSearch.php';
            ?>

            <!-- Nav Item - Alerts -->

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?php 
                  $id= $_SESSION["id"];
                  $query4Seller=$conn->prepare("SELECT * FROM users WHERE id=?");
                  $query4Seller->execute([$id]);
                  $rows4Seller=$query4Seller->fetchall(PDO::FETCH_ASSOC);
                  $count4Seller=count($rows4Seller);
                  if($count4Seller==1)
                  {
                    echo $rows4Seller[0]["name"];
                  }
                  else
                  {
                    ob_start();
                    header("location:../");
                  }
                  ?>
                </span>
                <img class="img-profile rounded-circle" src="img/seller.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="index.php?id=2">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <a class="dropdown-item" href="index.php?id=5">
                  <i class="fa fa-shopping-cart fa-sm fa-fw mr-2 text-gray-400" aria-hidden="true" ></i>
                  Satdığım məhsullar
                </a>
                <a class="dropdown-item" href="index.php?id=6">
                  <i class="fa fa-truck fa-sm fa-fw mr-2 text-gray-400" aria-hidden="true"></i>
                  Göndəriləsi Məhsullar
                </a>
                <a class="dropdown-item" href="index.php?id=21">
                  <i class="fa fa-check fa-sm fa-fw mr-2 text-gray-400" aria-hidden="true"></i>
                  Qəbzlər
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Çıxış
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->