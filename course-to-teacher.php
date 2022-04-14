<?php
require "php/sessionCheck.php";
require "php/database.php";
include("header.php");
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
                        <h1><strong>Assign Course</strong></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Validation</li>
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
                        <?php
                        if (isset($_GET['edit']) && $_GET['edit'] == "true") {
                            echo '<div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Edit Course</h3>
                            </div>
                            <!-- Edit form start -->
                            <form id="" method="post" action="php/course-to-teacher/update.php">
                                <div class="card-body">
                                <input type="text" hidden name="id" value="' . $_GET["id"] . '">
                                <input type="text" hidden name="teacherID" value="' . $_GET["teacher_id"] . '">
                                <div class="form-group">
                                    <label for="exampleInputUSerName">Selected Teacher</label>
                                    <input readonly required type="text" name="teacherName"
                                           class="form-control" value="' . $_GET["Tname"] . '">
                                </div>

                                    <div class="form-group">
                                        <label for="exampleInputProgramName">Select Course</label>
                                        <select name="selectedCourseForCourse" class="form-control" id="" required>
                                            <option value="">Select Course</option>';
                                            $sql_depatrment = "select * from courses";
                                            $qr_depatrment = mysqli_query($conn, $sql_depatrment);
                                            if (mysqli_num_rows($qr_depatrment) > 0) {
                                                while ($data = mysqli_fetch_array($qr_depatrment)) {
                                                    echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                                }
                                            }
                                       echo' </select>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                    </div>';
                        } else {
                            echo '<div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Teacher</h3>
                            </div>
                            <!--New form start -->
                            <form id="" method="post" action="php/course-to-teacher/insert.php">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputProgramName">Select Teacher</label>
                                        <select name="selectedTeacherForCourse" class="form-control" id="" required>
                                            <option value="">Choese Teacher</option>';
                                            $sql_depatrment = "select * from teachers";
                                            $qr_depatrment = mysqli_query($conn, $sql_depatrment);
                                            if (mysqli_num_rows($qr_depatrment) > 0) {
                                                while ($data = mysqli_fetch_array($qr_depatrment)) {
                                                    echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                                }
                                            } 
                                      echo'  </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputProgramName">Select Course</label>
                                        <select name="selectedCourseForCourse" class="form-control" id="" required>
                                            <option value="">Select Course</option>';
                                            $sql_depatrment = "select * from courses";
                                            $qr_depatrment = mysqli_query($conn, $sql_depatrment);
                                            if (mysqli_num_rows($qr_depatrment) > 0) {
                                                while ($data = mysqli_fetch_array($qr_depatrment)) {
                                                    echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                                }
                                            }
                                       echo' </select>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            </div>';
                        } ?>
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
                    <h3 class="card-title">All Assign Courses </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body overflow-auto">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Sr #</th>
                            <th>Teacher</th>
                            <th>Course</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $sql = "SELECT * FROM course_to_teacher";
                        $result = $conn->query($sql);
                        $count = 1;
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            // Teacher Name Fetching 
                            $sql_taecher = "select * from teachers where id = '".$row['teacher_id']."'";
                            $qr_taecher = mysqli_query($conn,$sql_taecher);
                            if(mysqli_num_rows( $qr_taecher)>0)
                            {
                                $teacher_name  = mysqli_fetch_assoc($qr_taecher);
                            }
                           

                            //  Course Name Fetching
                            $sql_course = "select * from courses where id = '".$row['course_id']."'";
                            $qr_course = mysqli_query($conn,$sql_course);
                            if(mysqli_num_rows($qr_course)>0)
                            {
                                $course_name  = mysqli_fetch_assoc($qr_course);
                            }

                            
                            echo '<tr>
                            <td>' . $count . '</td>
                            <td>' . $teacher_name["name"] . '</td>
                            <td>' . $course_name["name"] . '</td>
                           
                            <td>
                            <a href="course-to-teacher?edit=true&id=' . $row["id"] . '&Tname=' . $teacher_name["name"] . '&Cname=' . $course_name["name"] . '&teacher_id=' . $row["teacher_id"] . '" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                            <a href="php/course-to-teacher/delete?id=' . $row["id"] . '" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>';
                            $count++;
                        }
                        ?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sr #</th>
                            <th>Teacher</th>
                            <th>Course</th>
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
