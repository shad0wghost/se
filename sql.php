<?php

function print_r_html ($arr) {
    ?><pre><?php
    print_r($arr);
    ?></pre><?php
}

// A Config array should be setup from a config file with these parameters:
$config = array();
$config['host'] = 'localhost';
$config['user'] = 'root';
$config['pass'] = 'password';
$config['table'] = 'ccdc';

// Then simply connect to your DB this way:
//$DB = new DB($config);

// Run a Query:
//$DB->Query('SELECT * FROM someplace');

// Get an array of items:
//$DB->Get();

// Get a single item:
//$DB->Get('field');
?>
