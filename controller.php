#!/usr/bin/php
<?php

require('class/db.class.php');
$pollerdir = '/pollers/';
$basedir = dirname($_SERVER['PHP_SELF']) . $pollerdir;
// Change max execution time to 1 minute
set_time_limit(60);
require('sql.php');

//$DB->Query('SELECT COUNT(*) as count FROM team;');
//print_r($DB->Get('count'));
//echo "Number of teams: " . $DB->Get('count') . "<br>";

/*$DB->Query('SELECT COUNT(*) as count FROM services;');
print "Number of services: " . $DB->Get('count') . "\n";*/
$DB = new DB($config);
$DB->Query('SELECT * FROM services WHERE active = 1 ORDER BY `name`,`poller`;');
$activeservices = $DB->Get();

$sapi_type = php_sapi_name();
if (substr($sapi_type, 0, 3) == 'cgi') {
    $mode = "web"; //web
    $newline = "<br>";
} else {
    $mode = "cli"; //CLI
    $newline = "\n";
}

print "Poller Path: $basedir" . $newline;

//print_r_html($activeservices);

foreach ($activeservices as $row)
{
    $passFile = $row['user-pass-file'];
    if($passFile == NULL)
    {
        $exec = ".$pollerdir" . $row['poller'] . " " . $row['host'] . " " . $row['user'] . " " . $row['pass'];
        echo $exec . " ";
        $status = exec($exec);
        //echo $status;
    }    
    else{
        $file = "/var/www/html/se/user-pass/" . $passFile;
        // Convert the text fle into array and get text of each line in each array index
        $file_arr = file($file);
        // Total number of linesin file
        $num_lines = count($file_arr);
        // Getting the last array index number by subtracting 1 as the array index starts from 0
        $last_arr_index = $num_lines - 1;
        // Random index number
        $rand_index = rand(0, $last_arr_index);
        // random text from a line. The line will be a random number within the indexes of the array
        $rand_text = $file_arr[$rand_index];
       // echo $rand_text;
        $userAndPasswordArray = explode(',', $rand_text);
       // print_r($userAndPasswordArray);
       // echo $userAndPasswordArray[0];
       // echo " ";
       // echo $userAndPasswordArray[1];

        $exec = ".$pollerdir" . $row['poller'] . " " . $row['host'] . " " . $userAndPasswordArray[0] . " " . $userAndPasswordArray[1];
        echo $exec . " ";
        $status = exec($exec);
        //echo $status;
    }
    
    if(trim($status) == "SUCCESS")
    {
        echo trim($status) . $newline;
        $DB->Query("UPDATE services SET attempts = attempts + 1, success = success + 1, lastcheck = 1 WHERE id = " . $row['id']);
    }
    else
    {
        echo trim($status) . $newline;
        $DB->Query("UPDATE services SET attempts = attempts + 1, lastcheck = 0 WHERE id = " . $row['id']);
    }
}
?>
