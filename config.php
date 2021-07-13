<?php
$baseDir = dirname(__FILE__).'/';
$dbHost = 'localhost';
$dbName = 'stocksearch';
$dbUser = 'root';
$dbPass = '';
$domain = 'http://localhost/searchStock/';
$datetime = date('Y-m-d H:i:s');
$basedir = $baseDir;
$currency = '₹ ';


$db = new PDO('mysql:host='.$dbHost.';dbname='.$dbName, $dbUser, $dbPass);
?>
