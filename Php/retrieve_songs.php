<?php

    $directory = dirname(__FILE__) . "/music/";

    $results_array = array();

    $empty_list = FALSE;

    if (is_dir($directory)) {

        if ($handle = opendir($directory)) {

            while(($file = readdir($handle)) != FALSE) {

                if ($file !== '.' && $file !== '..') {
                    $results_array[] = "/MiniProject/Php" . "/music/" . $file;
                    // $results_array[] = 'https:localhost/MiniProject/Php' . "/music/" . $file;
                }

            }

            closedir($handle);

        }

    } else {
        
        $empty_list = TRUE;
        
    }

?>