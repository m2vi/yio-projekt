<!DOCTYPE html>
<html lang="de-DE">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Menü</title>
   <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../../../lib/fontawesome-free-5.14.0-web/css/all.min.css">
   <link rel="stylesheet" href="../../../lib/bootstrap-4.5.3/css/bootstrap.min.css">
   <link rel="stylesheet" href="./css/style.css">
</head>

<body>
   <?php
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


   $target = isset($_GET['target']);

   require("./content/navbar.php");


   if (empty($_GET['target'])) {
      header("location:?target=none");
   } else if ($_GET['target'] == 'mails') {
      require('./mail/email.php');
   } else if ($_GET['target'] == 'logs') {
      require("./log/log.php");
   }

   ?>

   <script>
      var logH = <?php echo $log_count ?>;
      var logM = <?php echo maxInt("log") ?>;
   </script>
   <script src="http://localhost/lib/jqeury-3.5.1/jquery-3.5.1.min.js"></script>
   <script src="http://localhost/lib/popper/popper.min.js"></script>
   <script src="http://localhost/lib/bootstrap-4.5.3/dist/js/bootstrap.min.js"></script>
   <script src="./js/app.js"></script>
</body>

</html>