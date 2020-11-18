<?php
require("../../../php/connections/comeg.php");

$id = strval($_POST['id']);
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$text = $_POST["text"];
if (isset($_POST['newsletter'])) {
   $newsletter = "true";
} else {
   $newsletter = "false";
}

try {
   $sql = "UPDATE `comeg` 
SET `firstname` = :firstname,
 `lastname` = :lastname,
  `email` = :email,
   `text` = :txt,
    `newsletter` = :newsletter
     WHERE `comeg`.`id` = :id";
   $query = $pdo->prepare($sql);
   $query->bindValue(":id", $id);
   $query->bindValue(':firstname', $firstname);
   $query->bindValue(':lastname', $lastname);
   $query->bindValue(':email', $email);
   $query->bindValue(':txt', $text);
   $query->bindValue(':newsletter', $newsletter);
   $query->bindValue(":id", $id);
   $query->execute();
} catch (Exception $exc) {
   die($exc->getMessage());
}

header('location:../../?target=mails&s=1 ');
