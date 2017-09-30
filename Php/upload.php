<?php

    include_once("Php/includes/session.php");
    include_once("Php/includes/config.php");
    include_once("Php/includes/extensions.php");

    $target_dir = dirname(__FILE__) . "/music/" . $_SESSION["login_user"];
    $errors = array();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!file_exists($target_dir)) {

            if (!mkdir($target_dir)) {

                $errors[] = "Error occured while creating Directory";

            }

        }

        if (isset($_FILES["fileToUpload"])) {
            
        }

    }

?>