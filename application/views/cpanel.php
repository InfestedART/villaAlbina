<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $assets_dir = base_url().'assets/';
   $admin_dir = base_url().'cpanel/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Espacio Simon I Patiño - Cpanel</title>

	<link rel="stylesheet" href=<?php  echo $assets_dir."css/bootstrap.css"; ?> />
   <link rel="stylesheet" href=<?php  echo $assets_dir."css/fa_all.min.css"; ?> />
   <link rel="stylesheet" href=<?php  echo $assets_dir."css/style.css"; ?> />
   <link rel="stylesheet" href=<?php  echo $assets_dir."css/admin_style.css"; ?> />
</head>

<body>

<div>
   <?php
      $this->load->view('templates/admin_header'); 
      $this->load->view('templates/admin_sidebar');
   ?>

   <div class='admin-container'>
      <div class="container">
         <div  class='row justify-content-md-center'>
            <span>
               <?php echo $this->session->flashdata('msg');?>
            </span>
            <h1>CPANEL</h1>
         </div>
      </div>
   </div>
    
</div>

   <?php
      $this->load->view('templates/admin_footer'); 
   ?>
