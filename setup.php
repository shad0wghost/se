<?php

	// Add system commands here that we need to check
	$commands = array('dig', 'pwgen', 'smbclient');

	foreach ($commands as &$command) {
		exec($command . ' --help 2>&1',$output,$status);
		if ($status == '127') {
			print "You are missing the following dependency: $command\n";
			exit;
		}
	}

	// Check for php modules we need
	$phpmods = array('mysql');

	foreach ($phpmods as &$module) {
		if (!extension_loaded("$module")) {
			print "You are missing the following PHP module: $module\n";
			exit;
		}
	}

	// Check for python modules we need
	$pymods = array('paramiko');

	foreach ($pymods as &$module) {
		$command = "python -c 'import $module' 2>&1";
		exec($command,$output,$status);
		if ($status == '1') {
			print "You are missing the following Python module: $module\n";
			exit;
		}
	}

	// We have everything we need. Start doing some work.

    require('sql.php');
    $mysqli = new mysqli($config['host'], $config['user'], $config['pass']);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    // Create database
    $query = 'CREATE DATABASE IF NOT EXISTS ccdc';
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    echo "Database created... <br>";

    /*$query = 'DROP TABLE IF EXISTS services';
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $query = 'DROP TABLE IF EXISTS teams';
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);*/

    $query = "CREATE TABLE ccdc.services
                (`id` INT(10) NOT NULL AUTO_INCREMENT,
                `name` varchar(10) NOT NULL,
                `teamid` int(10) NOT NULL,
								`poller` VARCHAR(25) NOT NULL,
								`hostname` VARCHAR(50) NOT NULL,
                `attempts` INT(10) DEFAULT 0,
                `success` INT(10) DEFAULT 0,
                `lastcheck` INT(1) DEFAULT 0,
                `active` INT(1) DEFAULT 0,
                `useauth` INT(1) DEFAULT 0,
                `host` VARCHAR(50) NOT NULL,
                `user` VARCHAR(50),
                `pass` VARCHAR(50),
                PRIMARY KEY(id))";

    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$query = "CREATE TABLE ccdc.teams
	            ( id INT(10) NOT NULL AUTO_INCREMENT,
	            name VARCHAR(25) NOT NULL,
	            PRIMARY KEY(id) )";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	echo "Tables added... <br>";

?>
