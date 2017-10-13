<?php 
    
        include("includes/config.php");
        session_start();
        if (isset($_SESSION["login_email"])) {
            header("location: /MiniProject/index.php");
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $email = mysqli_real_escape_string($db, $_POST["inputEmail"]);
            $password = md5(mysqli_real_escape_string($db, ($_POST["inputPassword"])));            
            $sql_query = "Select * From UserTable where UserEmail = '$email' and UserPassword = '$password'";

            $result = mysqli_query($db, $sql_query) or die ("Error occured while processing query " . mysql_errno());
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          //  $active = $row['active'];

            if (mysqli_num_rows($result) == 1) {

               $_SESSION['login_email'] = $email;
               header("location: /MiniProject/index.php");

            } else {

                $sql_query = "Select * From UserTable where UserEmail = '$email'";
                
                $result = mysqli_query($db, $sql_query) or die ("Error occured while processing query " . mysql_errno());
                $active = mysqli_fetch_array($result, MYSQLI_ASSOC)['active'];

                if (mysqli_num_rows($result) == 1) {

                    echo "Wrong Password";

                } else {

                    header("Location: /signup.html");

                }

            }

        }

    ?>