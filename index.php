<!DOCTYPE html>
<html>
    <head>
        <title>
            Home
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="Stylesheets/styleIndex.css">
        <link rel="shortcut icon" type="image/png" href="Stylesheets/Images/favicon1.png">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jsmediatags/3.7.0/jsmediatags.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <script type='text/javascript'>
            <?php
                include("Php/includes/session.php");
                include("Php/retrieve_songs.php");
                $js_array = json_encode($songs_array);
                echo "var songList = ".$js_array.";\n";
            ?>
        </script>
        <script src="Javascript/Player.js"></script>
        <script src="Javascript/Song.js"></script>
        <script src="Javascript/index.js"></script>
    </head>
    <body>
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

                <div class="collapse navbar-collapse" id="topNavBar">
                    <ul class="nav navbar-nav">
                        <li class="">
                            <a href="#">
                            </a>
                        </li>
                    </ul>

                    <form action="" method="POST" class="navbar-form navbar-left" role="search" style="margin-left: 12.5%;">
                        <div class="form-group">
                            <input type="text" class="form-control" name="song_name" placeholder="Search" style="width: 250px;" required>
                        </div>

                        <button id="search" type="submit" name="search" class="btn btn-warning">Search</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                            <a href="upload.html">
                                <span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
                                     &nbsp;Upload
                            </a>
                    </li>

                    <li>
                            <a href="Php/logout.php">
                                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                     &nbsp;Logout
                            </a>
                    </li>
                    
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid" id="container">
            
        </div>

    </body>

    <footer style=" align: center; margin-left: 40px;position: absolute; height: 55px; width: 50%; bottom: 0px; right: 0px; left: 300px; margin-bottom: 40px;" class="footer-player">
    
            <div class="panel panel-default footer-player" style="margin: 0; text-align: center; height: 80px;">
                
    
                <div style="float: left; width: 25%;">
                    <button id="prevButton" class="btn">
                        <span class="glyphicon glyphicon-backward"></span>
                    </button>
                </div>

                <div style="float: left; width: 10%; margin-top: 2%;">
                    <button id="library_button" class="btn">
                        <span id="library_span" class="glyphicon glyphicon-plus-sign"></span>
                    </button>
                </div>
    
                <div style="float: left; width: 30%; margin-top: 2%;">
                    <button id="play_pause_button" class="btn">
                        <span id="play_pause_icon" class="glyphicon glyphicon-play"></span>
                    </button>
                </div>
    
                <div style="float: right; width: 20%; margin-top: 0.5%;">
                    <button id="nextButton" class="btn">
                        <span class="glyphicon glyphicon-forward"></span>
                    </button>
                </div>

                <div style="float: right; width: 15%; margin-top: 2%;">
                    <button id="like_button" class="btn">
                        <span id="like_span" class="glyphicon glyphicon-heart-empty"></span>
                    </button>
                </div>
                    <p id="song_title"></p>
            </div>
    
        </footer>

</html>