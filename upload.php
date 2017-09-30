<!DOCTYPE>
<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <script src="Scripts/index.js"></script>
    <link rel="stylesheet" type="text/css" href="styleUpload.css">
</head>

<body>
        <?php
        include_once("Php/session.php");
        include_once("Php/config.php");
        include("Php/extensions.php");
        $target_dir = dirname(__FILE__) . "/music/" . $_SESSION['login_user'];

        if (!file_exists($target_dir)) {

            if (!mkdir($target_dir)) {

                echo "ERROR creating directory";
            }

        }
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_FILES["fileToUpload"])) {
    
            $errors = array();
    
            $file_name = $_FILES["fileToUpload"]['name'];
            $file_type = $_FILES["fileToUpload"]['type'];
            $file_tmp = $_FILES["fileToUpload"]['tmp_name'];
    
            if (empty($errors)) {
    
                if (move_uploaded_file($_FILES["fileToUpload"]['tmp_name'], $target_dir . "/" . $file_name)) {

                    header("Location: index.php"); 

                } else {

                    echo "File not uploaded";

                }
                
    
            } else {

                print_r($errors);

            }
             
    
        } else {

            header("Location: login.php")  ;

        }
    }
    
    ?>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topNavBar">
                     
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                <a class="navbar-brand" href="index.php">GaanaCloud</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="upload-box">
            <div class="form-row">
            <div class="form-group col-md-12">
            <label for="inputfname" class="col-form-label">Song Name</label>
            <input type="text" class="form-control" name="inputSong" placeholder="Song Name">
        </div>

        <div class="form-group col-md-12">
            <label for="inputAlbum" class="col-form-label">Album</label>
            <input type="text" class="form-control" name="inputAlbum" placeholder="Album Name">
        </div>

        <div class="form-group col-md-12">
            <label for="inputArtist" class="col-form-label">Artist</label>
            <input type="text" class="form-control" name="inputArtist" placeholder="Artist Name">
        </div>

        <div class="form-group col-md-12">
            <label for="inputGenre" class="col-form-label">Genre</label>
            <input type="text" class="form-control" name="inputGenre" placeholder="Genre">
        </div>

        <div class="form-group col-md-12">
            <label for="inputRelease" class="col-form-label">Release Year</label>
            <input type="number" class="form-control" name="inputGenre" placeholder="Release Year">
        </div>

        <label id="choose1" class="btn btn-default" for="my-file-selector">
            <input id="my-file-selector" name="fileToUpload" type="file" style="display:none;">
                Choose your song
        </label>
    
    </div>
    <button id="submit1" class="btn btn-primary">Upload</button>
    </div>
			
</form>
    </div>
    
</body>
</html>