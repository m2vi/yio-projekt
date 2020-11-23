<head>
   <script>
      window.history.replaceState(null, null, window.location.pathname);
   </script>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link href="./login/login.css" rel="stylesheet">
   <link rel="shortcut icon" href="./login/login.png" type="image/x-icon">
</head>

<body>
   <div class="login-page">
      <div class="form">
         <form class="login-form" method="post" action="">
            <input type="text" class="username" placeholder="username" name="user" autocomplete="on" required />
            <div class="user-code"></div>
            <input type="password" class="password" placeholder="password" name="input" autocomplete="on" required />
            <div class="password-code"></div>
            <button type="button" class="submit">login</button>
            <p class="message">Want to apply? <a href="mailto:apply@m2z.com">Apply now!</a></p>
            <?php if (isset($_GET['code'])) { ?>
               <hr>
               <div class="error">
                  Login failed
                  <span class="code"><?php echo $_GET['code'] ?></span>
               </div>
            <?php } ?>
         </form>
      </div>
   </div>
   <script src="./login/login.js"></script>
</body>