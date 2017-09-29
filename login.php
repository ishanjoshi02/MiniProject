<!DOCTYPE>
<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <script src="Script/index.js"></script>
</head>

<body>

    <?php 

        include('Php/config.php');
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $mUserName = mysqli_real_escape_string($db, $_POST['inputfname']);

        }


    ?>

    <fieldset>
        <legend> Sign Up Details</legend>

        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputfname" class="col-form-label">First Name</label>
                    <input type="text" class="form-control" name="inputfname" placeholder="First Name">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputlname" class="col-form-label">Last Name</label>
                    <input type="text" class="form-control" id="inputlname" placeholder="Last Name">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4" class="col-form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4" class="col-form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                </div>
            </div>

            <button id="submit1" role="submit" class="btn btn-default">Register</button>
        </form>
    </fieldset>
</body>

</html>