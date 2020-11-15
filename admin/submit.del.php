<?php
$id = $_POST["id"];

require("../php/connections/comeg.php");

if (!empty($_POST) && !empty($_POST["id"])) {
   $sth = $pdo->prepare("DELETE FROM `comeg` WHERE `comeg`.`id` =:id");
   $sth->bindParam(":id", $id, PDO::PARAM_STR);
   $sth->execute();
}
header("Location : index.php");
die();
