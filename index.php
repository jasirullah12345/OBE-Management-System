<?php
include("header.php");
?>


  
</head>
<body id="bodyStart" class="hold-transition sidebar-mini layout-fixed">
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a id="barofnav" class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a id="dashboardNotificationBtn" class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">44</span>
        </a>
        <div  class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        
            <!-- Message Start --> <div id="dashboardNotification_upper_spinner" style="display: none;"  class="spinner-border" role = "status"></div>
            <div id="dashboardNotification">
           
            <?php foreach($_SESSION['client_name_array'] as $nameOfCustomer)
            {                       
              
                          
                          echo ' <a class="dropdown-item courser NewOrders">
                          <div id="" class="media">
                        <img src="dist/img/orderreceiverimg.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                        
                          <h3 class="dropdown-item-title">
                          
                            '.$nameOfCustomer.'
                        </div>
                      </div></a>';
            }
                        
                        ?>
            
            <!-- Message End -->
            </div>
          
          <div class="dropdown-divider"></div>
         
         
          <a class="dropdown-item dropdown-footer courser NewOrders">See All Orders</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index" class="brand-link courser homePageclass">
      <img src="assets/images/logo.ico" style="width: 30px;" alt="OBE System" class="brand-image img-circle elevation-3" style="opacity: 1">
      <span class="brand-text font-weight-light">ISP OBE SYSTEM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar5.png" class="img-circle"  alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Kanwer Kaleem</a>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div id="upper_spinner" style="display: none;"  class="spinner-border" role = "status"></div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li style="display: none;" class="nav-item menu-open">
            <a href="index" class="nav-link active courser homePageclass">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p id="headers_mid">
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
             </ul>
             
             </li>
             <li class="nav-item">
                <a href="index" class="nav-link courser homePageclass" >
                  <i class="nav-icon fa fa-home"></i>
                  <p>
                    Home
                  </p>
                </a>
              </li>
             <li class="nav-item">
              <a href="#" class="nav-link" id="">
                <i class="nav-icon fa fa-user-plus"></i>
                <p>
                  Add User
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" id="" >
                <i class="nav-icon fa fa-dropbox"></i>
                <p>
                  Department
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a  class="nav-link courser" id="" >
                <i class="nav-icon fa fa-bar-chart"></i>
                <p>
                Programs 
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link courser" id="" >
                <i class="nav-icon fas fa-comment-dollar"></i>
                <p>
                 Session
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a id="" class="nav-link courser" >
                <i class="nav-icon 	fas fa-envelope-open-text"></i>
                <p>
                  Teacher
                </p>
              </a>
            </li>
            <li class="nav-item">
            <a class="nav-link courser" id="" >
                <i class="nav-icon fas fa-coins"></i>
                <p>
                  Add Course
                </p>
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link courser" id="">
                <i class="nav-icon fa fa-rss"></i>
                <p>
                  Assign Course
                </p>
                </a>
            </li>
            <li class="nav-item">
              <a  class="nav-link courser ViewClientBtnLink">
                <i class="nav-icon fa fa-street-view"></i>
                <p>
                  PLO
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="logout" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  BT Level
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="logout" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
             </ul>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" id="headers_Left">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Home</a></li>
              <li class="breadcrumb-item active" id="headers_Right">ISP OBE System</li>
            </ol>
          </div><!-- /.col -->
        
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div id="loader" style="display: none;"></div>
        <div class="row"  id="body">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>45</h3>
                <p>Total Course</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a class="small-box-footer courser NewOrders">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3>12</h3>

                <p>Active Session</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 >40</h3>
                <p>Total Teachers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a class="small-box-footer courser ViewClientBtnLink">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>70</h3>

                <p>Courses</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- <div id="loaderr" style="display: none;"></div> -->
          
        </div>
        </div>
        <!-- <div id="newordersDashboardHome"></div> -->
        <!-- /.row -->
        <!-- Main row -->
        
  <!-- /.content-wrapper -->
  

 
</div>
<!-- ./wrapper -->

</div>

<?php
include("footer.php");
?>