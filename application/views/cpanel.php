<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $assets_dir = base_url().'assets/';
   $admin_dir = base_url().'cpanel/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control';
      $this->load->view('templates/meta', $data);
   ?>
</head>

<body>

<div class="admin-body">
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
