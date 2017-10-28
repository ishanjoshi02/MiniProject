<?php

    include_once("includes/config.php");
    $results_array = [];
    $songs_array = [];

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $sql_query = "SELECT FilePath from SongTable where SongTitle like '%". $_POST['song_name'] . "%' or " . 
        "SongGenre like '%" . $_POST['song_name'] . "%' or ".
        "SongAlbum like '%" . $_POST['song_name'] . "%' or ".
        "SongArtist like '%" . $_POST['song_name'] . "%' or "
        ;

    } else {
        $sql_query = "SELECT * from SongTable";
    }
    $result = mysqli_query($db, $sql_query) or die("ABC");
    
    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_array($result)) {

            $sql2 = "Select UserName from UserTable where UserID = " . $row['SongArtist'] . "";
            $result2 = mysqli_query($db, $sql2);

            $row['SongArtist'] = mysqli_fetch_assoc($result2)['UserName'];
            $results_array[] = "Php/" . $row['FilePath'];
            $songs_array[] = $row;
        }

    }

?>