<?php
//Sweet Alert 2 CDN
echo "<script src=''//cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
//Display Errors
if (isset($_GET["error"])) {
    echo "<script>
        Swal.fire({
          icon: 'error',
          title: '" . $_GET["error"] . "'
        })
    </script>";
//Display Success
} else if (isset($_GET["msg"])) {
    echo "<script>
        Swal.fire({
          icon: 'success',
          title: '" . $_GET["msg"] . "'
        })
    </script>";
}