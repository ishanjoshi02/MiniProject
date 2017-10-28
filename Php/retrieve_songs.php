<?php

    include_once("includes/config.php");
    $results_array = [];
    $songs_array = [];
    $all_songs = [];

    $empty_search = false;

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $sql_query = "SELECT * from SongTable where SongTitle like '%". $_POST['song_name'] . "%'";

    } else {
        $sql_query = "SELECT * from SongTable";

        $sql2 = "SELECT UserID from UserTable where UserEmail = '" . $_SESSION['login_email'] . "'";
        $result2 = mysqli_query($db, $sql2);
        $userID = mysqli_fetch_assoc($result2)['UserID'];
        $empty_search = true;

    }
    $result = mysqli_query($db, $sql_query) or die("ABC");
    
    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_array($result)) {
            if ($empty_search) {

                $row['Liked'] = false;
                $add = false;

                $songID = $row['SongID'];
                $sql_query = "SELECT SongID from LibraryTable where UserID = '" . $userID . "'";
                $bool = mysqli_query($db, $sql_query);

                if ($bool->num_rows > 0) {

                    while ($res1 = mysqli_fetch_array($bool)) {

                        if ($songID == $res1['SongID']) {
                        $sql2 = "Select UserName from UserTable where UserID = " . $row['SongArtist'] . "";
                        $result2 = mysqli_query($db, $sql2);        
                        $row['SongArtist'] = mysqli_fetch_assoc($result2)['UserName'];
                        $add = true;
                        }
                    }

                }

                $sql_query = "SELECT SongID from LikesTable where UserID = '" . $userID . "'";
                $bool = mysqli_query($db, $sql_query);

                if ($bool->num_rows > 0) {
                    
                    if ($songID == mysqli_fetch_assoc($bool)['SongID']) {
                        $row['Liked'] = true;
                    }
                    
                }

                if ($add) {
                    $songs_array[] = $row;
                }

            } else {
                $row['Liked'] = false;
                $sql2 = "Select UserName from UserTable where UserID = " . $row['SongArtist'] . "";
                $result2 = mysqli_query($db, $sql2);        
                $row['SongArtist'] = mysqli_fetch_assoc($result2)['UserName'];
                $songs_array[] = $row;
            }

            $all_songs[] = $row;
        }

    }

?>