<?php

$dbuser = 'noone';
$dbpass = '12345';
$dbname = 'contact_form';
$dbhost = '...';
$pdo = new PDO("mysql:host=localhost; dbname=$dbname", $dbuser, $dbpass);

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$txt = $_POST["text"];
if (isset($_POST['newsletter'])) {
    $newsletter = "true";
} else {
    $newsletter = "false";
}
$timestamp = date("d/m/Y");

$sql = "INSERT INTO comeg " . "(firstname, lastname, email, text, timestamp, newsletter) VALUES " . "(:firstname, :lastname, :email, :text, :timestamp, :newsletter)";
$query = $pdo->prepare($sql);
$query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
$query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->bindParam(':text', $txt, PDO::PARAM_STR);
$query->bindParam(':newsletter', $newsletter, PDO::PARAM_STR);
$query->bindParam(':timestamp', $timestamp, PDO::PARAM_STR);
$query->execute();

if ($pdo->lastInsertID()) {
    header('location: ../?success=1#contact');
} else {
    header('location: ../?success=0#contact');
}
