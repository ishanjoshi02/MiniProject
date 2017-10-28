<?php

    include_once("includes/config.php");
    $results_array = [];

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $sql_query = "SELECT FilePath from SongTable where SongTitle like '%". $_POST['song_name'] . "%'";

    } else {
        $sql_query = "SELECT FilePath from SongTable";
    }
    $result = mysqli_query($db, $sql_query) or die("ABC");
    
    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_array($result)) {
            $results_array[] = "Php/" . $row['FilePath'];
        }

    }

?>