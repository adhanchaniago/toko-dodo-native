<?php 
require_once 'config/functions.php';

if(!isset($_GET['p'])) {
  error_reporting(0);
}

$page = $_GET['p'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?= getprofileweb('meta_desc'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php 
    if($page) {
      switch ($page) {
        case 'detail':
          echo "Halaman Detail";
          break;
        
        default:
          # code...
          break;
      }
    } else {
      echo getprofileweb('site_url');
    }
    ?></title>

    <!-- Bootstrap -->
    <link href="<?= base_url('admin/') ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  </head>
  <body>

<div class="container" style="margin-top: 30px;">