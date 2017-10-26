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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jsmediatags/3.7.0/jsmediatags.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type='text/javascript'>
            <?php
                include("Php/includes/session.php");
                include("Php/retrieve_songs.php");
                $js_array = json_encode($results_array);
                echo "var files = ".$js_array.";\n";
            ?>
        </script>
        <script src="Javascript/Player.js"></script>
        <script src="Javascript/index.js"></script>
    </head>
    <body>
        <?php 
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

                <div class="collapse navbar-collapse" id="topNavBar">
                    <ul class="nav navbar-nav">
                        <li class="">
                            <a href="#">
                            </a>
                        </li>
                    </ul>

                    <form class="navbar-form navbar-left" role="search" method="get" action="" style="margin-left: 12.5%;">
                        <div class="form-group">
                            <input type="text" class="form-control" name="q" placeholder="Search" style="width: 250px; ">
                        </div>
                        <button id="search" type="submit" class="btn btn-default">Search</button>
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

    <footer style="position: fixed; height: 55px; width: 100%; background-color: white-space; bottom: 0px; right: 0px; left: 0px; margin-bottom: 0px;">

        <div class="panel panel-default" style="margin: 0;background-color: white; text-align: center;">
            

            <div style="float: left; width: 25%;">
                <button id="prevButton">
                    <span class="glyphicon glyphicon-backward"></span>
                </button>
            </div>

            <div style="float: left; width: 50%;">
                <button id="play_pause_button">
                    <span id="play_pause_icon" class="glyphicon glyphicon-play"></span>
                </button>
            </div>

            <div style="float: right; width: 25%;">
                <button id="nextButton">
                    <span class="glyphicon glyphicon-forward"></span>
                </button>
            </div>
        
                <p id="song_title"></p>
        </div>

    </footer>

</html>