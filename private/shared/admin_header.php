<?php

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$tokens = explode('/', $actual_link);
$current_page = $tokens[sizeof($tokens)-1];

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
  
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = 0;
}

$site = "MOD - ";
if(!empty($page_title)){
  $page_title = $site.$page_title;
}else {
  $page_title = $site."Site";
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Javascript -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo url_for('/assets/bootstrap-4.0.0/css/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <link rel="stylesheet" href="<?php echo url_for('/assets/mod/css/sidebar_collapse.css');?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="<?php echo url_for("/assets/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo url_for('/assets/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
    
    <?php 

    // $_GET['username'])."&".$_GET['password']) 
     if( is_page( current_page(), SITE_NAME.url_for("/admin/login.php") ) || 
         is_page( current_page(), SITE_NAME.url_for("/admin/login.php?username=".$username."&password=".$password) )){
     ?> 
      <link rel="stylesheet" href="/public/assets/mod/css/signin.css">
    <?php } ?>    

    <?php 
        if($current_page == 'order-assign.php?id='.$id){ 
            // echo ' <link rel="stylesheet" href="'.url_for("/assets/bootstrap-datetimepicker-4.17/css/bootstrap-datetimepicker.min.css").'">';
        } elseif($actual_link === $site_name){
            echo '<link rel="stylesheet" href="<?php echo url_for("/assets/mod/css/signin.css");?>">';
        }
    ?> 
    <link rel="stylesheet" href="<?php echo url_for('/assets/mod/fonts/open-iconic/font/css/open-iconic-bootstrap.css');?>">
    <link rel="stylesheet" href="<?php echo url_for('/assets/mod/css/style.css');?>">
    <script data-require="angularjs@1.5.7" data-semver="1.5.7" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <?php    
    if($current_page == 'florist.php'){ ?>
      <script src="<?php echo url_for('/assets/mod/js/florist/delete.ajax.js'); ?>"></script>
    <?php
    }
    ?>
   <style type="text/css" media="print">
        @media print {
          * {
            display: none;
          }
          #printableTable {
            display: block;
          }
          #printableTableLogo{
            display: block;
          }      
        }
    </style>
      <title> 
        <?php echo $page_title; ?>
      </title>
  </head>
<body>
