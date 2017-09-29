<!DOCTYPE html>
<html>

    <head>
        <title>
            Home
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
        <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
        <script src="Scripts/profile.js"></script>  
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

                    <form class="navbar-form navbar-left" role="search" method="get" action="">
                
                        <div class="form-group">
                            <input type="text" class="form-control" name="q" placeholder="Search" style="-webkit-text-fill-color: #263238;width: 250px; ">
                        </div>
                
                        <button id="search" type="submit" class="btn btn-default">Search</button>
                
                    </form>

                    <ul class="nav navbar-nav navbar-right">
        
                        <li class="">
        
                            <a href="#">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                &nbsp;Your Profile
                            </a>
        
                        </li>
        
                        <li>
        
                            <a href="#">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                     &nbsp;Logout
        
                            </a>

                        </li>
        
                    </ul>

                </div>

            </div>

        </nav>

        <div class="container-fluid">

            <div id="body" class="row">



            </div>
        </div>

    </body>

</html>