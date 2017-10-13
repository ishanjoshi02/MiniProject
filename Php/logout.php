<?php 

    session_start();
    unset($_SESSION['login_email']);
    header("Location: /MiniProject/index.php");

?>