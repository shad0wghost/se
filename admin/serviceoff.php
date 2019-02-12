#!/usr/bin/php
<?php
require('../class/db.class.php');
require('../sql.php');
$DB = new DB($config);

/*$DB->Query("SELECT id, name FROM teams");
$query = $DB->Get();*/

// Check if arguments were passed
if ($_SERVER['argc'] != 2) {
    print "\n========== Active Services ==========\n";

    $DB->Query('SELECT `id`,`name`,`poller`,`host` FROM services WHERE active = 1');
    $query = $DB->Get();
    //print_r($query);
    foreach ($query as $row) {
        echo "id: " . $row['id'] . ", name: " . $row['name'] . ", poller: " . $row['poller'] . "\n";
    }

    print "\nUsage: serviceoff id \n\n";
} else {
    $id = $_SERVER['argv'][1];
    $DB->Query("UPDATE `ccdc`.`services` SET `active`='0' WHERE `id`='$id' AND active = 1");
    $DB->Query("SELECT `id`,`name`,`poller`,`host` FROM services WHERE `id`='$id'");
    $query = $DB->Get();
    foreach ($query as $row) {
        echo "id: " . $row['id'] . ", name: " . $row['name'] . ", poller: " . $row['poller'] . " DEACTIVATED" . "\n";
    }
}

?>
