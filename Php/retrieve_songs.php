<?php

    $directory = dirname(__FILE__) . "/music/";

    $results_array = array();

    $empty_list = FALSE;

    if (is_dir($directory)) {

        if ($handle = opendir($directory)) {

            while(($file = readdir($handle)) != FALSE) {

                $results_array[] = $file;

            }

            closedir($handle);

        }

    } else {
        
        $empty_list = TRUE;
        
    }

?>