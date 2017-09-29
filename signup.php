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
    <script src="Script/index.js"></script>
    <link rel="stylesheet" type="text/css" href="styleSignUp.css">
</head>

<body>

    <?php
    
    
    include("Php/config.php");
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST["inputname"];
        $password = md5($_POST["inputpassword"]);
        $confirm_password = md5($_POST["inputconfirmpassword"]);
        $email = $_POST["inputemail"];

        if ($password == $confirm_password) {

            $sql_query = "Insert into UserTable (UserName, UserEmail, UserPassword) values('$username', '$email', '$password')";

            $result = $db->query($sql_query)or die("ERROR " + mysql_errno);

            if ($result) {

                $_SESSION['login_user'] = $username;

                header("Location: index.php");

            } else {

                echo "Fail0";

            }

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
    <form method="post">
        <div class="signup-box">
            <div class="form-row">
            <div class="form-group col-md-12">
            <label for="inputfname" class="col-form-label">Username</label>
            <input type="text" class="form-control" name="inputuname" placeholder="Username">
        </div>

        <div class="form-group col-md-12">
            <label for="inputEmail4" class="col-form-label">Email</label>
            <input type="email" class="form-control" name="inputEmail" placeholder="Email">
        </div>

        <div class="form-group col-md-12">
            <label for="inputPassword4" class="col-form-label">Password</label>
            <input type="password" class="form-control" name="inputPassword" placeholder="Password">
        </div>

        <div class="form-group col-md-12">
            <label for="inputPassword4" class="col-form-label">Confirm Password</label>
            <input type="password" class="form-control" name="inputPassword" placeholder="Password">
        </div>
    </div>
    <button id="submit1" class="btn btn-default">Register</button>
    </div>
</form>
    </div>
    
</body>
</html>