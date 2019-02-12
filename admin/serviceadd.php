#!/usr/bin/php
<?php
// Requires pwgen
require('../class/db.class.php');
require('../sql.php');
$pollerdir = '../pollers/';
$DB = new DB($config);

// Check if arguments were passed
if ($_SERVER['argc'] != 3) {
    $dh = opendir($pollerdir);
    print "\n========== Available Pollers ==========\n";
    while ($poller = readdir($dh)) {
        if (filetype($pollerdir . $poller) != "dir") {
            print "$poller\n";
        }
    }
    print "\nUsage: addservice teamname poller\n\n";
} else {
    $teamname = $_SERVER['argv'][1];
    $service = $_SERVER['argv'][2];

    $DB->Query("SELECT COUNT(name) as count FROM teams where name = '$teamname'");
    $count = $DB->Get('count');
    if ($count == 1) {
        $DB->Query("SELECT * FROM teams WHERE name = '$teamname'");
        $query = $DB->Get();
        foreach ($query as $row) {
            $teamid = $row['id'];
            $user = exec('pwgen 8 1');
            $pass = exec('pwgen 8 1');

            $sql = "INSERT INTO `ccdc`.`services` (
                        `id`,`name`,`teamid`,`attempts`,`success`,`lastcheck`,`active`,`useauth`,`host`,`user`,`pass`,`poller`
                        ) VALUES (
                        NULL,'$teamname','$teamid',0,0,NULL,0,0,'localhost','$user','$pass','$service')";
            $DB->Query($sql);

            echo "$teamname: $service added\n";
        }
    } else {
        echo "$teamname does not exist." . "\n";
    }

    /*		while($team = mysql_fetch_assoc($teamresults))
            {

                mysql_query($query);
            }*/
}

?>
