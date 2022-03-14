<?php
//Check is user is logged in or not
if (!isset($_SESSION['id']))
    header("Location:login");
