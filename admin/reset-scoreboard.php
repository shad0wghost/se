#!/usr/bin/php
<?php
    require('sql.php');
    $mysqli = new mysqli($config['host'], $config['user'], $config['pass']);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query = "use ccdc"; 
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

    $query = "UPDATE services SET attempts ='0' FROM ccdc"; 
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

    $query = "UPDATE services SET success ='0'";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    echo "Database Reset... <br>"
?>
