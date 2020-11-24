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
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="./login.css" rel="stylesheet">
    <link rel="shortcut icon" href="edit.png" type="image/x-icon">
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
                    ?>
                        <option value="<?php echo $username["user"] ?>"><?php echo $username["user"] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <input type="text" class="pass" placeholder="new password" name="password" />
                <p class="message">Use <a href="javascript:void(0)" class="toggle-hash">Hash</a> instead</p>
                <button type="submit">Edit user</button>
                <button type="button" class="delete">Delete</button>
                <a class="toggle-other" href="?target=add">Add user</a>
            </form>
        </div>
    </div>
    <script src="http://localhost/lib/jqeury-3.5.1/jquery-3.5.1.min.js"></script>
    <script src="./login.js"></script>
</body>