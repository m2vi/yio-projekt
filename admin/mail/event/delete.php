<?php

if (!empty($_POST) && !empty($_POST["id"])) {
   $id = strval($_POST["id"]);

   require("../../../php/connections/comeg.php");
   $sth = $pdo->prepare("DELETE FROM `comeg` WHERE `comeg`.`id` =:id");
   $sth->bindParam(":id", $id, PDO::PARAM_STR);
   $sth->execute();
   header('location:../../?target=mails&s=1 ');
} else {
   header('location:../?target=mails&s=0 ');
}

die();
