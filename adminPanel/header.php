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

  <title>ADMİNPANEL</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- datatable CDN -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.css"/>

  <!-- font-awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!-- according css -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">

</head>

<body id="page-top">

  <div id="wrapper">

    <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #12343b">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./">
        <div class="sidebar-brand-text mx-12">
          <?php 
          $id= $_SESSION["id"];
          $query4Admin=$conn->prepare("SELECT * FROM users WHERE id=?");
          $query4Admin->execute([$id]);
          $rows4Admin=$query4Admin->fetchall(PDO::FETCH_ASSOC);
          $count4Admin=count($rows4Admin);
          if($count4Admin==1)
          {
            echo $rows4Admin[0]["name"];
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
        <a class="nav-link" href="index.php?id=38">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>STATİSTİKA</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#account" aria-expanded="true" aria-controls="account">
          <i class="fas fa-fw fa-pen"></i>
          <span>HESABATLAR</span>
        </a>
        <div id="account" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Mübasibat Sistemi:</h6>
            <a class="collapse-item" href="index.php?id=46">Partnyorlar üzrə</a>
            <a class="collapse-item" href="index.php?id=50">Kredit üzrə</a>
            <a class="collapse-item" href="index.php?id=52">Əmək haqqı üzrə</a>
          </div>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#permit" aria-expanded="true" aria-controls="permit">
          <i class="fas fa-fw fa-hand-paper"></i>
          <span>İCAZƏLƏR</span>
        </a>
        <div id="permit" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">İcazə Sistemi:</h6>
            <a class="collapse-item" href="index.php?id=47">Keçmiş tarixi qeyd et üzrə</a>
            <a class="collapse-item" href="index.php?id=48">Limitləndirilmiş kredit günü</a>
            <a class="collapse-item" href="index.php?id=49">İşçilərin fərdi bloklanması</a>
          </div>
        </div>
      </li>
      <!-- <li class="nav-item active">
        <a class="nav-link" href="index.php?id=37">
          <i class="fas fa-fw fa-map-marked-alt"></i>
          <span>Məhsul xəritəsi(ARXİV)</span></a>
      </li> -->

      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-warehouse"></i>
          <span>Anbar</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Anbar Sistemi:</h6>
            <a class="collapse-item" href="index.php?id=1">Anbar&nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
            <a class="collapse-item" href="index.php?id=2">Mövcüd anbarlar</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-store"></i>
          <span>Mağaza</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Mağaza sistemi:</h6>
            <a class="collapse-item" href="index.php?id=3">Mağaza&nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
            <a class="collapse-item" href="index.php?id=4">Mövcüd mağazalar</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#job" aria-expanded="true" aria-controls="job">
          <i class="fa fa-briefcase" aria-hidden="true"></i>
          <span>Vəzifə</span>
        </a>
        <div id="job" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Vəzifə sistemi:</h6>
            <a class="collapse-item" href="index.php?id=5">Vəzifə&nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
            <a class="collapse-item" href="index.php?id=6">Mövcud vəzifələr</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#worker" aria-expanded="true" aria-controls="worker">
          <i class="fa fa-user-plus" aria-hidden="true"></i>
          <span>İşçi</span>
        </a>
        <div id="worker" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">İşçi sistemi:</h6>
            <a class="collapse-item" href="index.php?id=7">İşçi&nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
            <a class="collapse-item" href="index.php?id=8">Mövcud işçilər</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#units" aria-expanded="true" aria-controls="units">
          <i class="fa fa-thermometer-empty" aria-hidden="true"></i>
          <span>Vahidlər</span>
        </a>
        <div id="units" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Vahid sistemi:</h6>
            <a class="collapse-item" href="index.php?id=35">Vahid&nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
            <a class="collapse-item" href="index.php?id=36">Mövcud vahidlər</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#category" aria-expanded="true" aria-controls="category">
          <i class="fa fa-puzzle-piece" aria-hidden="true"></i>
          <span>Kateqoriya</span>
        </a>
        <div id="category" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kateqoriya sistemi:</h6>
            <a class="collapse-item" href="index.php?id=15">Kateqoriya&nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
            <a class="collapse-item" href="index.php?id=16">Mövcud kateqoriyalar</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#manufacturer" aria-expanded="true" aria-controls="manufacturer">
          <i class="fas fa-industry"></i>
          <span>İstehsalçı</span>
        </a>
        <div id="manufacturer" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">İstehsalçı sistemi:</h6>
            <a class="collapse-item" href="index.php?id=10">İstehsalçı&nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
            <a class="collapse-item" href="index.php?id=11">Mövcud istehsalçılar</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#model" aria-expanded="true" aria-controls="model">
          <i class="fa fa-window-restore" aria-hidden="true"></i>
          <span>Model</span>
        </a>
        <div id="model" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Model sistemi:</h6>
            <a class="collapse-item" href="index.php?id=12">Model&nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
            <a class="collapse-item" href="index.php?id=13">Mövcud modellər</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#partnor" aria-expanded="true" aria-controls="partnor">
          <i class="fa fa-link" aria-hidden="true"></i>
          <span>Partnyor</span>
        </a>
        <div id="partnor" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Partnyor sistemi:</h6>
            <a class="collapse-item" href="index.php?id=18">Partnyor&nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
            <a class="collapse-item" href="index.php?id=19">Mövcud Partnyorlar</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#product" aria-expanded="true" aria-controls="product">
          <i class="fa fa-puzzle-piece" aria-hidden="true"></i>
          <span>Məhsullar</span>
        </a>
        <div id="product" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Məhsul sistemi:</h6>
            <a class="collapse-item" href="index.php?id=14">Məhsul&nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
            <a class="collapse-item" href="index.php?id=17">Mövcud məhsullar</a>
            <a class="collapse-item" href="index.php?id=32">Serialı paylaşım</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#debbe" aria-expanded="true" aria-controls="debbe">
          <i class="fa fa-percent" aria-hidden="true"></i>
          <span>Dəbbə </span>
        </a>
        <div id="debbe" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Dəbbə sistemi:</h6>
            <a class="collapse-item" href="index.php?id=22">Dəbbə&nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
          </div>
        </div>
      </li>
        
      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#credit" aria-expanded="true" aria-controls="credit">
          <i class="fa fa-credit-card" aria-hidden="true"></i>
          <span>Kredit</span>
        </a>
        <div id="credit" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kredit sistemi:</h6>
            <a class="collapse-item" href="index.php?id=23">İlkin kredit tarixi&nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#hotCall" aria-expanded="true" aria-controls="hotCall">
          <i class="fa fa-phone" aria-hidden="true"></i>
          <span>Qaynar xətt</span>
        </a>
        <div id="hotCall" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Qaynar xətt sistemi:</h6>
            <a class="collapse-item" href="index.php?id=29">Qaynar xətt&nbsp<i class="fa fa-plus" aria-hidden="true"></i></a>
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
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?php 
                  $id= $_SESSION["id"];
                  $query4Admin=$conn->prepare("SELECT * FROM users WHERE id=?");
                  $query4Admin->execute([$id]);
                  $rows4Admin=$query4Admin->fetchall(PDO::FETCH_ASSOC);
                  $count4Admin=count($rows4Admin);
                  if($count4Admin==1)
                  {
                    echo $rows4Admin[0]["name"];
                  }
                  else
                  {
                    ob_start();
                    header("location:../");
                  }
                  ?>
                </span>
                <img class="img-profile rounded-circle" src="img/admin.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="index.php?id=9">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <a class="dropdown-item" href="index.php?id=28">
                  <i class="fa fa-book fa-sm fa-fw mr-2 text-gray-400" aria-hidden="true"></i>
                  Qaimələr
                </a>
                <?php  
                $query4Key=$conn->prepare("SELECT * FROM users WHERE id>? AND status!=?");
                $query4Key->execute([0,"admin"]);
                $rows4Key=$query4Key->fetchall(PDO::FETCH_ASSOC);
                $count4Key=count($rows4Key);
                $menuKey='';
                if($count4Key!=0)
                {
                  if($rows4Key[0]["doorKey"]==0)
                  {
                    $menuKey="Mağazanı bağla";
                  }
                  else
                  {
                    $menuKey="Mağazanı aç";
                  }
                }
                else
                {
                  $menuKey="İşçilər əlavə edilməyib";
                }
                ?>
                <a class="dropdown-item" href="index.php?id=31">
                  <i class="fa fa-key fa-sm fa-fw mr-2 " style="color:orange;" aria-hidden="true"></i>
                  <?php
                    echo $menuKey; 
                  ?>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascrip:;" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Çıxış
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->