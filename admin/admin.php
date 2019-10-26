 <?php ob_start()
 //include("./permission.php")?>
<?php include_once './layouts/menu.php'?>
<?php include_once './layouts/header.php'?>
<?php include_once '../DBConnect.php'?>
<?php include_once './language.php'?>
   <?php
   error_reporting(0);

    $page = isset($_GET['page']) ? $_GET['page'] : "quanly";
	
    $page = "content/".$page . ".php";
    include $page;
    ?>
 
<?php 
include_once './layouts/footer.php'; 
 ob_end_flush()
 ?>