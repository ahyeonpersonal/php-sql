<?php

    $serverName="localhost";
    $dbUsername ="root";
    $dbPassword="";
    $dbName="loginsystemtut";

    $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

    if(!$conn){
        die("Error:".mysqli_connect_error());
    }
