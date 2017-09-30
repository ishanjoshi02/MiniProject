<?php

    include_once("includes/session.php");
    include_once("includes/config.php");
    include_once("includes/extensions.php");

    $target_dir = dirname(__FILE__) . "/music/";
    $errors = array();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!file_exists($target_dir)) {

            if (!mkdir($target_dir)) {

                $errors[] = "Error occured while creating Directory";

            }

        }

        if (isset($_FILES["fileToUpload"])) {

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], 
            $target_dir . $_POST["inputSong"])) {

                    # Adding Entering of song to SongTable'
                $song_title = $_POST["inputSong"];
                $song_release_date = $_POST["inputReleaseDate"];
                $song_album = $_POST["inputAlbum"];
                $song_genre = $_POST["inputGenre"];
                $son_artist = $_POST["inputArtist"];
                $file_path = $target_dir . $song_title;

                $sql_query = "Insert into SongTable ".
                "(SongTitle, SongReleaseDate, SongAlbum, SongGenre, SongArtist, FilePath) ".
                "values('$song_title', '$song_release_date', '$song_album', '$song_genre',".
                " '$son_artist', '$file_path')";
                    
                $result = mysqli_query($db, $sql_query) or die("ERROR " + mysql_errno());

                if ($result) {

                    header("Location: /index.php");

                } 


            } else {

                die ("Error moving file<br>");

            }

        } else {

            die ( "File not chosen<br>");

        }

    }

?>