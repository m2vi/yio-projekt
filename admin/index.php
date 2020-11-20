<?php
session_start();

// hash = root
$hash = '$2y$10$V9.VFT2Ul8bVy420GdJ7X.RGC0qBcJ6KUv/yYigjCmeJwXKtbuY4K';

if (!empty($_POST) and isset($_POST['input'])) {
   if (password_verify($_POST['input'], $hash)) {
      $_SESSION["access"] = "okay";
   }
}

if (isset($_GET['logout']) and session_status() != PHP_SESSION_NONE) {
   session_destroy();
   setcookie("PHPSESSID", "", time() - 3600, "/");
   header('Location: ../admin/');
}

require("../../../lib/IP/ip.php");
require("../../../lib/OS/array.php");

if (isset($_GET['load']) == "all") {
   $stop = 250;
} else {
   $stop = null;
}

function maxInt($x)
{
   $ini = parse_ini_file("../lang/settings/global.ini");
   if ($x == "log") {
      return (int)$ini['MaxLog'];
   } else if ($x == "submits") {
      return
         (int)$ini['MaxContact'];
   }
}
$log_directory = getcwd() . "/../log/";
$log_count = count(glob($log_directory . "*.log"));

$ipapi = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));

if ($ip != $localhost and isset($ipapi)) {
   $country = $ipapi->country;
   $region = $ipapi->region;
} else {
   $country = "-";
   $region = "-";
}

require("../php/connections/comeg.php");
$sth = $pdo->prepare("SELECT * FROM `comeg`");
$sth->execute();
$submits = $sth->fetchAll();

require("../php/connections/profiles.php");
$sth = $pdo->prepare("SELECT * FROM `profiles`");
$sth->execute();
$profiles = $sth->fetchAll();
?>
<!DOCTYPE HTML>
<html lang="de-DE">

<?php

if (isset($_SESSION["access"])) {
   if ($_SESSION["access"] == "okay") {
      require("./layout/admin.php");
   } else {
      require("./layout/login.php");
   }
} else {
   require("./layout/login.php");
}

?>

</html>