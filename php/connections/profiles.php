<?php
$dbuser = 'noone';
$dbpass = '12345';
$dbname = 'user';
$dbhost = '...';
try {
    $pdo = new PDO("mysql:host=localhost; dbname=$dbname", $dbuser, $dbpass, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
} catch (PDOException $e) {
    die("Database error");
}
