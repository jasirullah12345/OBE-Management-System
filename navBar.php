<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a id="barofnav" class="nav-link" data-widget="pushmenu" href="./index" role="button"><i
                        class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="./index" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="logout" class="nav-link">Logout</a>
        </li>
    </ul>

</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index" class="brand-link courser homePageclass d-flex align-items-center">
        <img src="assets/images/logo.ico" style="width: 30px;" alt="OBE System"
             class="brand-image img-circle elevation-3" style="opacity: 1">
        <span class="brand-text font-bold">OBE - System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <?php
                    echo $_SESSION['name'];
                    ?>
                </a>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div id="upper_spinner" style="display: none;" class="spinner-border" role="status"></div>
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
                    <a href="./index" class="nav-link courser homePageclass">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <?php
                if ($_SESSION['role'] == "admin") {
                    echo '<li class="nav-item">
                    <a href="./user" class="nav-link" id="">
                        <i class="nav-icon fa fa-user-plus"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>';
                }
                ?>

                <li class="nav-item">
                    <a href="./department" class="nav-link" id="">
                        <i class="nav-icon fa fa-building-o"></i>
                        <p>
                            Departments
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./program" class="nav-link courser" id="">
                        <i class="nav-icon fa fa-tasks"></i>
                        <p>
                            Programs
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./session" class="nav-link courser" id="">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>
                            Sessions
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./teacher" class="nav-link courser">
                        <i class="nav-icon 	fa fa-child"></i>
                        <p>
                            Teachers
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./course" class="nav-link courser">
                        <i class="nav-icon fa fa-book"></i>
                        <p>
                            Courses
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="./course-to-teacher" class="nav-link courser" id="">
                        <i class="nav-icon fa fa-exchange"></i>
                        <p>
                            Assigned Course
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./document" class="nav-link courser">
                        <i class="nav-icon fa fa-file"></i>
                        <p>
                            Documents
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./plo" class="nav-link courser ViewClientBtnLink">
                        <i class="nav-icon fa fa-check-square-o"></i>
                        <p>
                            PLOs
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./clo" class="nav-link courser ViewClientBtnLink">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>
                            CLOs
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./bt-level" class="nav-link">
                        <i class="nav-icon fas fa fa-level-up"></i>
                        <p>
                            BT Level
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./logout" class="nav-link">
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