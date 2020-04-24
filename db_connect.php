<?php
    error_reporting(0);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cc";

    $db_connected = false;
    $_SESSION['db_connect_error'] = false;

    date_default_timezone_set("Asia/Kolkata");

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) 
    {
        $_SESSION['db_connect_error']=true;
        header('location:index.php');
    }
    else
    {
        $db_connected =true;
    }

?>