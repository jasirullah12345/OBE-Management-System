<?php
require "php/sessionCheck.php";
require "php/database.php";
include("header.php");
?>


    <div class="wrapper">

        <?php include('navBar.php');
        ?>

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
                                <li class="breadcrumb-item active" id="headers_Right">Home</li>
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
                <div class="row" id="body">
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php $sql = "select count(id) as total_course from courses";
                                    $qr = mysqli_query($conn, $sql);
                                    $data = mysqli_fetch_assoc($qr);
                                    if ($data['total_course'] == NULL) {
                                        echo "0";
                                    } else {
                                        echo $data['total_course'];
                                    } ?></h3>
                                <p>Total Course</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="course" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php $sql = "select count(id) as total_session from sessions";
                                    $qr = mysqli_query($conn, $sql);
                                    $data = mysqli_fetch_assoc($qr);
                                    if ($data['total_session'] == NULL) {
                                        echo "0";
                                    } else {
                                        echo $data['total_session'];
                                    } ?></h3>

                                <p>Total Session</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="session" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php $sql = "select count(id) as total_teacher from teachers";
                                    $qr = mysqli_query($conn, $sql);
                                    $data = mysqli_fetch_assoc($qr);
                                    if ($data['total_teacher'] == NULL) {
                                        echo "0";
                                    } else {
                                        echo $data['total_teacher'];
                                    } ?></h3>
                                <p>Total Teachers</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="teacher" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php $sql = "select count(id) as total_department from department";
                                    $qr = mysqli_query($conn, $sql);
                                    $data = mysqli_fetch_assoc($qr);
                                    if ($data['total_department'] == NULL) {
                                        echo "0";
                                    } else {
                                        echo $data['total_department'];
                                    } ?></h3>

                                <p>Total Departments</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="department" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./wrapper -->
    </div>

<?php
include("footer.php");
require "php/alerts.php";
?>