<?php

$driver = 'mysql';
$dbname = 'SE_357_Final';
$host = '127.0.0.1';
$port = 8889;
$charset = 'utf8';
$username = 'root';
$password = 'root';

$dsn = $driver . ':dbname=' . $dbname . ';host=' . $host . ';port=' . $port . ';charset=' . $charset;
//connection to the database
$db = new PDO($dsn, $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

?>
