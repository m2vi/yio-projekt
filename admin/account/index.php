<?php
if (isset($_GET['target']) and $_GET['target'] == "add") {
    require("add.php");
} else if (isset($_GET['target']) and $_GET['target'] == "edit") {
    require("edit.php");
} else if (!isset($_GET['e'])) {
    header('Location: ../account/?target=add');
}
