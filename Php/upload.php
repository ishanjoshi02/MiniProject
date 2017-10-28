<?php

    include_once("includes/session.php");
    include_once("includes/config.php");
    include_once("includes/extensions.php");

    $target_dir = "music/";
    $errors = array();

    if (!isset($_POST["inputSong"])) {
        die ("Do not keep any Song Title Empty");
    } else {
        $song_title = $_POST["inputSong"];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!file_exists($target_dir)) {

            if (!mkdir($target_dir)) {

                $errors[] = "Error occured while creating Directory";

            }

        }

        if (isset($_FILES["fileToUpload"])) {


            $song_title = $_POST["inputSong"];
            $file_path = $target_dir . $song_title;

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file_path)) {

                    # Adding Entering of song to SongTable'
                $song_release_date = $_POST["inputReleaseDate"];
                $song_album = $_POST["inputAlbum"];
                $song_genre = $_POST["inputGenre"];
                $user_email = $_SESSION["login_email"];
                $sql_query = "Select UserID From UserTable where UserEmail = '$user_email'";

                $result = mysqli_query($db, $sql_query) or die("Error");

                $var = mysqli_fetch_assoc($result);
                $son_artist = $var["UserID"];

                $sql_query = "Insert into SongTable ".
                "(SongTitle, SongReleaseDate, SongAlbum, SongGenre, FilePath, SongArtist) ".
                "values('$song_title', '$song_release_date', '$song_album', '$song_genre',".
                "'$file_path', '$son_artist')";

                $result = mysqli_query($db, $sql_query) or die("Could not Upload Song " . mysqli_error($db));

                header("Location: /MiniProject/index.php");

            } else {

                die ("Error moving file<br>");

            }

        } else {

            die ( "File not chosen<br>");

        }

    }

?>