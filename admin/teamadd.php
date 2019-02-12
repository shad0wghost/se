#!/usr/bin/php
<?php

    require('../class/db.class.php');
    require('../sql.php');

	// Connect to the DB
    $DB = new DB($config);

	// Find the file name dynamically
	$prog =  basename($_SERVER['argv'][0]);

	// Check if arguments were passed
	if($_SERVER['argc'] == 2)

	{
		// Find our team name passed by the user
		$teamname = $_SERVER['argv'][1];

		// Find if the team name already exists
        $DB->Query("SELECT COUNT(name) as count FROM teams where name = '$teamname'");
		$query = $DB->Get('count');
        //echo $query;


		// If it does, don't add it again.
		if ($query >= 1)
		{
			print "Error: $teamname already exists.\n";
		}
		// Otherwise, add away!
		else
		{
            $DB->Query("INSERT INTO teams VALUES ('','$teamname')");
            $DB->Query("SELECT id FROM teams WHERE name = '$teamname'");
            $teamid = $DB->Get('id');
			print "Added team id $teamid: $teamname\n";
		}
	}

	// If we are here, we were not passed the proper args.
	else

	{
		print "Usage: $prog teamname\n";
	}

?>
