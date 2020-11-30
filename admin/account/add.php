<?php

// o6pmL9HabCdp

require("../../php/connections/profiles.php");

if (isset($_POST['user']) and isset($_POST['password']) or isset($_POST['hash'])) {
   $user = strtolower($_POST['user']);

   if (isset($_POST['password']) and !isset($_POST['hash'])) {
      $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
   } else if (isset($_POST['hash']) and !isset($_POST['password'])) {
      $pass = $_POST['hash'];
   } else {
      // error
   }

   if (isset($_POST['firstname']) and !empty($_POST['firstname'])) {
      $firstname = $_POST['firstname'];
   } else {
      // error
   }

   $sth = $pdo->prepare("SELECT user FROM `profiles` WHERE user = :user");
   $sth->bindParam(':user', $user, PDO::PARAM_STR);
   $sth->execute();
   $usernames = $sth->fetch();
   if (in_array($user, $usernames)) {
      header('Location: ../account/?e=uae');
      die("user already exists");
   }

   $sth = $pdo->prepare("INSERT INTO `profiles` (`timestamp`, `last`, `user`, `pass`, `firstname`) VALUES (:timestamp, '-', :user, :pass, :firstname)");
   $timestamp = date("j.n.Y");
   $sth->bindParam(':timestamp', $timestamp, PDO::PARAM_STR);
   $sth->bindParam(':user', $user, PDO::PARAM_STR);
   $sth->bindParam(':pass', $pass, PDO::PARAM_STR);
   $sth->bindParam(':firstname', $firstname, PDO::PARAM_STR);
   $sth->execute();
   header('Location: ../account/?target=add');
}

?>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add</title>
   <link href="./login.css" rel="stylesheet">
   <link rel="shortcut icon" href="add.png" type="image/x-icon">
</head>

<body>
   <div class="login-page">
      <div class="form add">
         <form class="login-form" method="post" action="">
            <input type="text" placeholder="firstname" name="firstname" />
            <input type="text" placeholder="username" name="user" />
            <input type="text" class="pass" placeholder="password" name="password" />
            <p class="message">Use <a href="javascript:void(0)" class="toggle-hash">Hash</a> instead</p>
            <button type="submit">add user</button>
            <a class="toggle-other" href="?target=edit">Edit user</a>
         </form>
      </div>
   </div>
   <script src="http://localhost/lib/jqeury-3.5.1/jquery-3.5.1.min.js"></script>
   <script src="./login.js"></script>
</body>