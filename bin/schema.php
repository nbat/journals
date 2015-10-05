<?php


$options = getopt("f:c:");

require __DIR__ ._(DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'dbconfig.php');

$filename = $options["f"];

system(sprintf("mysql --user=%s --password=%s %s < %s", $username, $password, $database, $filename));