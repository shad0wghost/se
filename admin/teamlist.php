#!/usr/bin/php
<?php
    require('../class/db.class.php');
    require('../sql.php');
    $DB = new DB($config);

    $DB->Query("SELECT id, name FROM teams");
    $query = $DB->Get();

	print "\n\n========== Team Listing ==========\n";

    foreach ($query as $row)
	{
		$teamnum = $row['id'];
		$teamname = $row['name'];
		print "$teamnum: $teamname\n";
	}
?>


