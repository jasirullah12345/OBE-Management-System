<?php
require "php/sessionCheck.php";
require "php/database.php";
include("header.php");
if ($_SESSION['role'] != "admin")
    header("Location:index");
?>

<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <?php include('navBar.php');
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><strong>User</strong></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card <?php
                        if (isset($_GET['edit']) && $_GET['edit'] == "true") {
                            echo "card-warning";
                        } else {
                            echo "card-primary";
                        }
                        ?>">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <?php
                                    if (isset($_GET['edit']) && $_GET['edit'] == "true") {
                                        echo "Edit User";
                                    } else {
                                        echo "Add New User";
                                    }
                                    ?>
                                </h3>
                            </div>
                            <?php
                            if (isset($_GET['edit']) && $_GET['edit'] == "true") {
                                echo '<!-- Edit form start -->
                            <form id="quickForm" method="post" action="php/user/update.php">
                                <div class="card-body">
                                    <input type="text" hidden name="userId" value="' . $_GET["id"] . '">
                                    <div class="form-group">
                                        <label for="exampleInputUSerName">User Name</label>
                                        <input required type="text" name="userName" autocomplete="off"
                                               class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter USer Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input required type="email" autocomplete="off" name="userEmail"
                                               class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input required type="password" autocomplete="off" name="userPassword"
                                               class="form-control"
                                               id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Submit</button>
                                </div>
                            </form>';
                            } else {
                                echo '<!--New form start -->
                            <form id="quickForm" method="post" action="php/user/insert.php">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputUSerName">User Name</label>
                                        <input required type="text" name="userName" autocomplete="off"
                                               class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter USer Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input required type="email" autocomplete="off" name="userEmail"
                                               class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input required type="password" autocomplete="off" name="userPassword"
                                               class="form-control"
                                               id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>';
                            } ?>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

        <div class="card-body">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">All Users </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body overflow-auto">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Sr #</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $sql = "SELECT * FROM users where role = 'user'";
                        $result = $conn->query($sql);
                        $count = 1;
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>
                            <td>' . $count . '</td>
                            <td>' . $row["name"] . '</td>
                            <td>' . $row["email"] . '</td>
                            <td>
                            <a href="user?edit=true&id=' . $row["id"] . '" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                            <a href="php/user/delete?id=' . $row["id"] . '" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>';
                            $count++;
                        }
                        ?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sr #</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </div>
    </div>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- Page specific script -->
<script>
    $(function () {
        $.validator.setDefaults({
            submitHandler: function () {
                alert("Form successful submitted!");
            }
        });
        $('#quickForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 5
                },
                terms: {
                    required: true
                },
            },
            messages: {
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a valid email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                terms: "Please accept our terms"
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
<?php
include("footer.php");
require "php/alerts.php";
?>
