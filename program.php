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
                        <h1><strong>Program</strong></h1>
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
                        if(isset($_GET['edit']) && $_GET['edit'] == "true")
                        {
                         echo '<div class="card card-warning">
                             <div class="card-header">
                                 <h3 class="card-title">Add New Program </h3>
                             </div>
                             <!-- /.card-header -->
                             <!-- form start -->
                             <form id="" method="post" action="php/program/update.php">
                             <input type="hidden" name = "id" value = "'.$_GET['id'].'">
                                 <div class="card-body">
                                     <div class="form-group">
                                         <label for="exampleInputProgramName">Select Department</label>
                                         
                                         <select name="selectedDepartmentForSession" class="form-control" id="" required>
                                             <option value="">Choose Program</option>';
                                              $sql_depatrment = "select * from department";
                                             $qr_depatrment = mysqli_query($conn, $sql_depatrment);
                                             if (mysqli_num_rows($qr_depatrment) > 0) {
                                                 while ($data = mysqli_fetch_array($qr_depatrment)) {
                                                    
                                                     if($data['id']==$_GET['depart_id'])
                                                     {
                                                         echo '<option selected value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                                     }
                                                     else
                                                     {
                                                         echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                                     }
                                                    
                                                 }
                                             } else {
                                                 echo '<option value="">Error</option>';
                                             } 
                                        echo ' </select>
                                     </div>
                                     <div class="form-group">
                                         <label for="exampleSessionName">Program Name</label>
                                         <input required type="text" name="ProgramtNameForAddition" class="form-control" id=""
                                                placeholder="Enter Session Name" value = "'.$_GET['name'].'">
                                     </div>
      
      
                                 </div>
                                 <!-- /.card-body -->
                                 <div class="card-footer">
                                     <button type="submit" class="btn btn-primary">Submit</button>
                                 </div>
                             </form>
                         </div>'; 
                        }
                        else
                        {
                            echo '<div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Program </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="" method="post" action="php/program/insert.php">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputProgramName">Select Department</label>
                                        <select name="selectedDepartment" class="form-control" id="" required>
                                            <option value="">Choose Department</option>';
                                             $sql_depatrment = "select * from department";
                                            $qr_depatrment = mysqli_query($conn, $sql_depatrment);
                                            if (mysqli_num_rows($qr_depatrment) > 0) {
                                                while ($data = mysqli_fetch_array($qr_depatrment)) {
                                                    echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                                }
                                            } else {
                                                echo '<option value="">Error</option>';
                                            } 
                                      echo '</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleProgramName">Program Name</label>
                                        <input required type="text" name="programNameForAddtition" class="form-control"
                                               id=""
                                               placeholder="Enter Program Name">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>';
                        }
                        ?>
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
                    <h3 class="card-title">All Programs </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body overflow-auto">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Sr #</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "select * from programs";
                        $result = $conn->query($sql);
                        $count = 1;
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>
                            <td>' . $count . '</td>
                            <td>' . $row["name"] . '</td>';
                            $sql_department = "select * from department where id = '".$row["depart_id"]."' ";
                            $qr_depatrment_ = mysqli_query($conn, $sql_department);
                           
                            if(mysqli_num_rows($qr_depatrment_)>0)
                            {
                                
                                $qr_depatrment_fetch = mysqli_fetch_assoc($qr_depatrment_);
                                echo '<td>' . $qr_depatrment_fetch["name"] . '</td>';
                            }
                            else
                            {
                                echo '<td></td>';
                            }
                            
                          echo '  <td>
                            <a href="program?edit=true&id=' . $row["id"] . '&name=' . $row["name"] . '&depart_id=' . $row["depart_id"] . ' " class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                            <a href="php/program/delete?id=' . $row["id"] . '" class="btn btn-danger">Delete</a>
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
                            <th>Department</th>
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
