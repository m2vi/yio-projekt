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
   <link rel="stylesheet" href="../../../lib/bootstrap-4.5.3/css/bootstrap.min.css">
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

   require("../php/connections/comeg.php");
   $sth = $pdo->prepare("SELECT * FROM `comeg`");
   $sth->execute();
   $submits = $sth->fetchAll();
   ?>
   <section id="contact">
      <div class="container">
         <h2 class="title">Email submits</h2>
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Datum</th>
                  <th scope="col">Vorname</th>
                  <th scope="col">Nachname</th>
                  <th scope="col">Email</th>
                  <th scope="col">Aktion</th>
               </tr>
            </thead>

            <tbody>
               <?php $Email_Id = 1;
               foreach ($submits as $submit) : ?>
                  <tr>
                     <th scope="row" title="<?php echo htmlentities($submit['id']) ?>"><?php echo $Email_Id ?></th>
                     <td><?php echo htmlentities($submit['timestamp']) ?></td>
                     <td><?php echo htmlentities($submit['firstname']) ?></td>
                     <td><?php echo htmlentities($submit['lastname']) ?></td>
                     <td><?php echo htmlentities($submit['email']) ?></td>
                     <td><a href="javascript:void(0)" data-toggle="modal" data-target="#modal<?php echo htmlentities($submit['id']) ?>">Anzeigen</a>&nbsp;&nbsp;<a href="#">
                           <form class="contact-delete-form" action="submit.del.php" method="post">
                              <input type="hidden" name="id" value="10">
                              <button class="btn btn-link" type="submit">
                                 <i class="fas fa-trash-alt"></i>
                              </button>
                           </form>
                        </a></td>
                  </tr>
                  <div class="modal fade" id="modal<?php echo htmlentities($submit['id']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel" title="<?php echo htmlentities($submit['id']) ?>">ID: <?php echo $Email_Id ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <?php echo htmlentities($submit['text']) ?>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php $Email_Id++;
               endforeach; ?>
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
   <script src="http://localhost/lib/jqeury-3.5.1/jquery-3.5.1.min.js"></script>
   <script src="http://localhost/lib/popper/popper.min.js"></script>
   <script src="http://localhost/lib/bootstrap-4.5.3/dist/js/bootstrap.min.js"></script>
</body>

</html>