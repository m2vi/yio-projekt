<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link href="./login/login.css" rel="stylesheet">
   <style>

   </style>
   <link rel="shortcut icon" href="./login/login.png" type="image/x-icon">
</head>

<body>
   <div class="login-page">
      <div class="form">
         <form class="login-form" method="post" action="">
            <input type="text" placeholder="username" name="user" />
            <input type="password" placeholder="password" name="input" />
            <button type="submit">login</button>
            <p class="message">Want to apply? <a href="mailto:apply@m2z.com">Apply now!</a></p>


            <?php
            if (isset($_POST['user'])) { ?>
               <hr>
               <div class="error">
                  Login failed
                  <span class="code">401</span>
               </div>
            <?php }
            ?>
         </form>
      </div>
   </div>
</body>