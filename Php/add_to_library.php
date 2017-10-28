<?php 

    include_once("includes/session.php");
    include_once("includes/config.php");
    $added = $_POST['Added'];
    if ($added == "true") {

        $sql2 = "SELECT UserID from UserTable where UserEmail = '" . $_SESSION['login_email'] . "'";
        $result2 = mysqli_query($db, $sql2);
        $userID = mysqli_fetch_assoc($result2)['UserID'];
        $songID = $_POST['SongID'];

        $insert_query = "Insert into LibraryTable (UserID, SongID) values (" . $userID . ", " . $songID . ")"; 
        $result = mysqli_query($db, $insert_query);


    } else {
    
        $sql2 = "SELECT UserID from UserTable where UserEmail = '" . $_SESSION['login_email'] . "'";
        $result2 = mysqli_query($db, $sql2);
        $userID = mysqli_fetch_assoc($result2)['UserID'];
        $songID = $_POST['SongID'];
        
        $insert_query = "DELETE from LibraryTable where UserID = " . $userID . " and SongID = " . $songID .""; 
        $result = mysqli_query($db, $insert_query);

    }

    if ($result) {

        header("Location: /MiniProject/index.php");

    } else {
        echo "Error";
    }
    
?>