<?php
//Check is user is logged in or not
session_start();
if (!isset($_SESSION['id']))
    header("Location:../../login");
