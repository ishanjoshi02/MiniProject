<?php
   include('config.php');
   session_start();
      
   if(!isset($_SESSION['login_email'])) {

      header("location:base.html");
   
    }
?>