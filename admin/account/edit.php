<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming soon...</title>
    <link href="./edit.css" rel="stylesheet">
    <link rel="shortcut icon" href="edit.png" type="image/x-icon">
    <link rel="stylesheet" href="../../../../lib/fontawesome-free-5.14.0-web/css/all.min.css">
</head>

<body>
    <div class="login-page">
        <div class="form edit">
            <form class="login-form" method="post" action="">
                <select name="user">
                    <option disabled selected>Choose user</option>
                    <?php
                    $sth = $pdo->prepare("SELECT * FROM `profiles`");
                    $sth->execute();
                    $usernames = $sth->fetchAll();
                    $userall = array();
                    foreach ($usernames as $username) {
                        array_push($userall, $username['user']); ?>
                        <option value="<?php echo $username["user"] ?>"><?php echo $username["user"] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <input type="text" placeholder="name" name="name" />
                <input type="text" class="pass" placeholder="new password" name="password" />
                <p class="message">Use <a href="javascript:void(0)" class="toggle-hash">Hash</a> instead</p>
                <div class="button-group">
                    <button type="submit">Edit user</button>
                    <button type="button" class="delete"><i class="fas fa-trash"></i></button>
                </div>
                <a class="toggle-other" href="?target=add">Add user</a>
            </form>
        </div>
    </div>
    <script src="http://localhost/lib/jqeury-3.5.1/jquery-3.5.1.min.js"></script>
    <script src="./login.js"></script>
</body>