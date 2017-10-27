<?php
    
    include("includes/config.php");
    session_start();

    if(isset($_POST['search'])) {
        // if(preg_match("/[a-z]+/", $_POST['song_title'])){
            if(isset($_POST['SongTitle'])){ 
            $song_title=$_POST['SongTitle'];
                
            $sql_query = "SELECT * from SongTable where SongTitle like '%$song_title%'";
            $count = mysqli_num_rows($sql_query);
            $song_result = mysqli_query($db, $sql_query) or die("Error!" + mysql_errno);

            if($count == 0) {
                echo "No result found!";
            } else {
                    while ($row = mysqli_fetch_array($sql_query)) {
                        $SongTitle = $row['SongTitle'];
                        $SongAlbum = $row['SongAlbum'];
                        $SongGenre = $row['SongGenre'];
                        echo '<h4> Song Title           : '.$row['SongTitle'];
                        echo '<br> Song Album           : '.$row['SongAlbum']; 
                        echo '</h4>';
                    }
                }
            }
        // }
    }

    else {
        echo "Please enter a search query";
    }
?>