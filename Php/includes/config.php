<?php
    define("DB_SERVER", "localhost");
    define("DB_USERNAME", "root");
    define('DB_PASSWORD', "");
    define('DB_DATABASE', 'mApplication');
    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    if (!$db) {

        die("Database is currently unreachable <br> Please Try again later <br>" . mysql_error());

    }

?>