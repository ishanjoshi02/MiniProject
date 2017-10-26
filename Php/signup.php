<?php
    
    include("includes/config.php");
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (
            $_POST["inputName"] &&
            $_POST["inputPassword"] &&
            $_POST["inputConfirmPassword"] &&
            $_POST["inputEmail"]
        ) {

            $username = $_POST["inputName"];
            $password = md5($_POST["inputPassword"]);
            $confirm_password = md5($_POST["inputConfirmPassword"]);
            $email = $_POST["inputEmail"];

            if ($password == $confirm_password) {
                
                $sql_query = "Insert into UserTable (UserName, UserEmail, UserPassword) values('$username', '$email', '$password')";
                
                $result = $db->query($sql_query)or die("ERROR " + mysql_errno);
                
                if ($result) {
                
                    session_start();
                    $_SESSION['login_user'] = $username;
                    $_SESSION['login_email'] = $email;
                    header("Location: /MiniProject/index.php");
                
                } 
                
            }

        }

        
        
    }

?>