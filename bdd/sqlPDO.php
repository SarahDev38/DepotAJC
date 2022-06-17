<?php

$host = 'localhost';
$port = 3308;
$user = 'root';
$password = 'root';
$dbname = 'db_produits';

$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8; port=' . $port;

$cnx = new PDO(
    $dsn,
    $user,
    $password
);

if (!$cnx) {
    die("<br/> problème BDD PDO !!");
}