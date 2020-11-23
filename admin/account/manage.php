<?php
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

   $timestamp = date("j.n.Y");

   $sth = $pdo->prepare("INSERT INTO `profiles` (`timestamp`, `last`, `user`, `pass`) VALUES (:timestamp, '-', :user, :pass)");
   $sth->bindParam(':timestamp', $timestamp, PDO::PARAM_STR);
   $sth->bindParam(':user', $user, PDO::PARAM_STR);
   $sth->bindParam(':pass', $pass, PDO::PARAM_STR);
   $sth->execute();
}

?>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link href="./login.css" rel="stylesheet">
   <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
</head>

<body>
   <div class="login-page">
      <div class="form add">
         <form class="login-form" method="post" action="">
            <input type="text" placeholder="username" name="user" />
            <input type="text" class="pass" placeholder="password" name="password" />
            <p class="message">Use <a href="javascript:void(0)" class="toggle-hash">Hash</a> instead</p>
            <button type="submit">add user</button>
            <p class="toggle-other">Edit user</p>
         </form>
      </div>
      <div class="form edit">
         <form class="login-form" method="post" action="">
            <input type="text" placeholder="username" name="user" />
            <input type="text" class="pass" placeholder="password" name="password" />
            <p class="message">Use <a href="javascript:void(0)" class="toggle-hash">Hash</a> instead</p>
            <button type="submit">Edit user</button>
            <p class="toggle-other">Add user</p>
         </form>
      </div>
   </div>
   <script src="http://localhost/lib/jqeury-3.5.1/jquery-3.5.1.min.js"></script>
   <script src="./login.js"></script>
</body>