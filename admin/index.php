<!DOCTYPE html>
<html lang="de-DE">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Logs</title>
   <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="../../../lib/fontawesome-free-5.14.0-web/css/all.min.css">
</head>

<body>
   <?php
   require("../../../lib/IP/ip.php");
   require("../../../lib/OS/array.php");

   $ipapi = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));

   if ($ip != $localhost and isset($ipapi)) {
      $country = $ipapi->country;
      $region = $ipapi->region;
   } else {
      $country = "-";
      $region = "-";
   }
   ?>
   <section id="contact">
      <div class="container">
         <h2 class="title">Email submits</h2>
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Datum</th>
                  <th scope="col">Email</th>
                  <th scope="col">Betreff</th>
                  <th scope="col">Aktion</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <th scope="row">0</th>
                  <td><?php echo date("j.n.Y") ?></td>
                  <td>max@mustermann.com</td>
                  <td>Musterbetreff</td>
                  <td><a href="#">Anzeigen</a>&nbsp;&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
               </tr>
            </tbody>
         </table>
      </div>
   </section>
   <section id="log">
      <div class="container">
         <h2 class="title">Logs</h2>
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Datum</th>
                  <th scope="col">IP-Adresse</th>
                  <th scope="col">Plattform</th>
                  <th scope="col">Touchdevice</th>
                  <th scope="col">Sprache</th>
                  <th scope="col">Region</th>
                  <th scope="col">Land</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <th scope="row">0</th>
                  <td><?php echo date("j.n.Y") ?></td>
                  <td><?php echo $ip ?></td>
                  <td><?php echo $OS  ?></td>
                  <td>
                     <script>
                        try {
                           document.createEvent("TouchEvent");
                           document.writeln(true);
                        } catch (e) {
                           document.writeln(false);
                        }
                     </script>
                  </td>
                  <td><?php echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) ?></td>
                  <td><?php echo $country ?></td>
                  <td><?php echo $region ?></td>
               </tr>
               <?php
               $log_directory = getcwd() . "/../log/";
               $log_count = count(glob($log_directory . "*.log"));

               for ($x = 0; $x <= $log_count - 1; $x++) {
                  $user = parse_ini_file($log_directory . "log-" . $x . ".log");
                  echo "<tr>";
                  echo "<th scope='row'>" . $user['ID'] . "</th>";
                  echo "<td>" . $user['Date'] . "</td>";
                  echo "<td>" . $user['IP'] . "</td>";
                  echo "<td>" . $user['Platform'] . "</td>";
                  echo "<td>" . $user['Touchdevice'] . "</td>";
                  echo "<td>" . $user['Language'] . "</td>";
                  echo "<td>" . $user['Country'] . "</td>";
                  echo "<td>" . $user['Region'] . "</td>";
                  echo "</tr>";
               }
               ?>
            </tbody>
         </table>
      </div>
   </section>
</body>

</html>