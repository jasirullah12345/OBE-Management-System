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
                        <h1><strong>Document</strong></h1>
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
                                <h3 class="card-title">Edit Documents </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="documentForm" method="post" action="php/documents/update.php">
                        <div class="card-body">
                        <input type="hidden" name = "id" value = "'.$_GET['id'].'">

                        <div class="form-group">
                        <label for="exampleInputTitle">Document #</label>
                        <input readonly type="text" value = "'.$_GET['counter'].'" name="titleOfDocumentForAddition"
                               class="form-control" id=""
                               placeholder="Enter Title">
                         </div>
                            <div class="form-group">
                                <label required for="exampleInputProgramName">Select Document Type</label>
                                <select name="selectedDocumentType" class="form-control" id="" required>
                                    <option value="">Choose Document Type</option>
                                    <option value="Paper">Paper</option>
                                    <option value="Assignment">Assignment</option>
                                    <option value="Quiz">Quiz</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputTitle">Title</label>
                                <input required type="text" value = "'.$_GET['title'].'" name="titleOfDocumentForAddition"
                                       class="form-control" id=""
                                       placeholder="Enter Title">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputCLO">Select CLO</label>
                                <select required name="selectedCLOForDocument" class="form-control" id=""
                                        required>
                                    <option value="">Choose CLO</option>';
                                    $sql_depatrment = "select * from clo";
                                    $qr_depatrment = mysqli_query($conn, $sql_depatrment);
                                    if (mysqli_num_rows($qr_depatrment) > 0) {
                                        while ($data = mysqli_fetch_array($qr_depatrment)) {
                                            echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                        }
                                    } 
                              echo'  </select>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPLO">Select PLO</label>
                                <select required name="selectedPLOForDocument" class="form-control" id=""
                                        required>
                                    <option value="">Choose PLO</option>';
                                     $sql_depatrment = "select * from plo";
                                    $qr_depatrment = mysqli_query($conn, $sql_depatrment);
                                    if (mysqli_num_rows($qr_depatrment) > 0) {
                                        while ($data = mysqli_fetch_array($qr_depatrment)) {
                                            echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                        }
                                    } 
                               echo' </select>
                            </div>
                    </form>
                        </div>'; 
                       }
                       else
                       {
                        echo '<div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Session </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="documentForm" method="post" action="php/documents/insert.php">
                        <div class="card-body">
                            <div class="form-group">
                                <label required for="exampleInputProgramName">Select Document Type</label>
                                <select name="selectedDocumentType" class="form-control" id="" required>
                                    <option value="">Choose Document Type</option>
                                    <option value="Paper">Paper</option>
                                    <option value="Assignment">Assignment</option>
                                    <option value="Quiz">Quiz</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputTitle">Title</label>
                                <input required type="text" name="titleOfDocumentForAddition"
                                       class="form-control" id=""
                                       placeholder="Enter Title">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputCLO">Select CLO</label>
                                <select required name="selectedCLOForDocument" class="form-control" id=""
                                        required>
                                    <option value="">Choose CLO</option>';
                                    $sql_depatrment = "select * from clo";
                                    $qr_depatrment = mysqli_query($conn, $sql_depatrment);
                                    if (mysqli_num_rows($qr_depatrment) > 0) {
                                        while ($data = mysqli_fetch_array($qr_depatrment)) {
                                            echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                        }
                                    } 
                              echo'  </select>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPLO">Select PLO</label>
                                <select required name="selectedPLOForDocument" class="form-control" id=""
                                        required>
                                    <option value="">Choose PLO</option>';
                                     $sql_depatrment = "select * from plo";
                                    $qr_depatrment = mysqli_query($conn, $sql_depatrment);
                                    if (mysqli_num_rows($qr_depatrment) > 0) {
                                        while ($data = mysqli_fetch_array($qr_depatrment)) {
                                            echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                        }
                                    } 
                               echo' </select>
                            </div>
                    </form>
                    </div>'; 
                       }
                      
                        ?>


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
                <h3 class="card-title">All Documents </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body overflow-auto">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Sr #</th>
                            <th>Type</th>
                            <th>Title</th>
                            <th>PLO</th>
                            <th>CLO</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                        
                        <?php
                        $sql = "select * from documents";
                        $result = $conn->query($sql);
                        $count = 1;
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {

                            $sql_plo = "select * from plo where id = '".$row['plo_id']."'";
                            $qr_plo = mysqli_query($conn,$sql_plo);
                            if(mysqli_num_rows( $qr_plo)>0)
                            {
                                $plo_name  = mysqli_fetch_assoc($qr_plo);
                            }
                           

                            //  Course Name Fetching
                            $sql_clo = "select * from clo where id = '".$row['clo_id']."'";
                            $qr_clo = mysqli_query($conn,$sql_clo);
                            if(mysqli_num_rows($qr_clo)>0)
                            {
                                $clo_name  = mysqli_fetch_assoc($qr_clo);
                            }

                            echo '<tr>
                            <td>' . $count . '</td>
                            <td>' . $row["type"] . '</td>
                            <td>' . $row["title"] . '</td>
                            <td>' . $plo_name["name"] . '</td>
                            <td>' . $clo_name["name"] . '</td>';
                           
                            
                          echo '<td>
                            <a href="document?edit=true&id=' . $row["id"] . '&type=' . $row["type"] . '&title=' . $row["title"] . '&plo_name=' . $plo_name["name"] . '&clo_name=' . $clo_name["name"] . '&plo_id=' . $row["plo_id"] . '&clo_id=' . $row["clo_id"] . '&counter=' . $count . ' " class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                            <a href="php/documents/delete?id=' . $row["id"] . '" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>';
                            $count++;
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sr #</th>
                            <th>Document Type</th>
                            <th>Title</th>
                            <th>PLO</th>
                            <th>CLO</th>
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

</body>
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
