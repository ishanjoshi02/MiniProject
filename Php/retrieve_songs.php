<?php

    $directory = "music/" . $_SESSION['login_user'];

    $results_array = array();

    if (is_dir($directory)) {

        if ($handle = opendir($directory)) {

            while(($file = readdir($handle)) != FALSE) {

                $results_array[] = $file;

            }

            closedir($handle);

        }

    } else {
        
        header("Location: upload.php");
        
    }

?>