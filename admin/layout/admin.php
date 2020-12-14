<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin</title>
   <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../../../lib/fontawesome-free-5.14.0-web/css/all.min.css">
   <link rel="stylesheet" href="../../../lib/bootstrap-4.5.3/css/bootstrap.min.css">
   <link rel="stylesheet" href="./css/style.css">
   <link rel="stylesheet" href="../../../lib/aos-master/aos.css">
</head>

<body style="padding-right: 0;">
   <!-- Admin -->
   <section id="#admin">
      <div class="button-group row m-0">
         <a class="btn btn-1 col-lg-3 col-md-6 col-12" onclick="openModal(1)"><span data-aos="fade-up"><i class="fas fa-envelope"></i>Mails</span></a>
         <a class="btn btn-2 col-lg-3 col-md-6 col-12" onclick="openModal(2)"><span data-aos="fade-up"><i class="fas fa-list-alt"></i>Logs</a>
         <a class="btn btn-3 col-lg-3 col-md-6 col-12" onclick="openModal(3)"><span data-aos="fade-up"><i class="fas fa-chart-line"></i>Statistik</a>
         <a class="btn btn-4 col-lg-3 col-md-6 col-12" onclick="openModal(4)"><span data-aos="fade-up"><i class="fas fa-crosshairs"></i>Ziele</a>
      </div>
      <div class="button-group row m-0">
         <a class="btn btn-5 col-lg-3 col-md-6 col-12" onclick="openModal(5)"><span data-aos="fade-up"><i class="fab fa-github"></i>Git Repository</a>
         <a class="btn btn-6 col-lg-3 col-md-6 col-12" onclick="openModal(6)"><span data-aos="fade-up"><i class="fas fa-file-code"></i>Source Code</a>
         <a class="btn btn-7 col-lg-3 col-md-6 col-12" onclick="openModal(7)"><span data-aos="fade-up"><i class="fas fa-database"></i>Datenbank</a>
         <a class="btn btn-8 col-lg-3 col-md-6 col-12" onclick="openModal(8)"><span data-aos="fade-up"><i class="fas fa-user"></i>Profile</a>
      </div>
      <div class="button-lg">
         <button class="btn" onclick="window.location.href='?logout'">log out</button>
      </div>
      <footer>
         <div>
            <span>Eingeloggt als: </span><?php echo $_SESSION["user"] ?>
         </div>
         <div>
            <span>Client IP: </span><?php echo $ip ?>
         </div>
         <div>
            <span>Erstellungsdatum: </span><?php echo $profile['timestamp'] ?>
         </div>
         <div>
            <span>Letzter Login: </span><?php echo $_SESSION['last'] ?>
         </div>
      </footer>
   </section>

   <div class="modal mainmodal fade p-0" id="area" data-backdrop="false" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm">
         <div class="modal-content content-sm area-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
               </svg>
            </button>
            <div class="inner">
               <span id="icon"></span>
               <span id="text"></span>
            </div>
         </div>
      </div>
   </div>
   <!-- Mails -->
   <div class="modal submodal fade p-0" id="mails" data-backdrop="false" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm">
         <div class="modal-content content-sm btn-1">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
               </svg>
            </button>
            <div class="container">
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
                     foreach ($submits as $submit) :
                        if ($Email_Id >= maxInt("submits") + 1) {
                           break;
                        }
                     ?>
                        <tr id="submit-tr-<?php echo $Email_Id ?>">
                           <th scope="row" title="<?php echo htmlentities($submit['id']) ?>"><?php echo $Email_Id ?></th>
                           <td><?php echo htmlentities($submit['timestamp']) ?></td>
                           <td><?php echo htmlentities($submit['firstname']) ?></td>
                           <td><?php echo htmlentities($submit['lastname']) ?></td>
                           <td><?php echo htmlentities($submit['email']) ?></td>
                           <td>
                              <a href="javascript:void(0)" data-toggle="modal" data-target="#modal<?php echo htmlentities($submit['id']) ?>">Anzeigen</a>&nbsp;&nbsp;
                              <a href="#">
                              </a>
                           </td>
                        </tr>
                        <div class="modal fade text-black-50 text-left" id="modal<?php echo htmlentities($submit['id']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-scrollable">
                              <div class="modal-content" id="take-photo-<?php echo $Email_Id ?>">
                                 <div class="modal-header text-center">
                                    <h5 class="modal-title" id="exampleModalLabel" title="<?php echo htmlentities($submit['id']) ?>">ID: <?php echo $Email_Id ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="mx-auto">
                                       <form method="POST" action="./mail/event/change.php" id="form-<?php echo $Email_Id ?>">
                                          <input type="hidden" name="id" value="<?php echo  $submit['id'] ?>">
                                          <div class="form-row">
                                             <div class="col-lg-6 mb-3">
                                                <input type="text" class="form-control" placeholder="Vorname" name="firstname" value="<?php echo htmlentities($submit['firstname']) ?>" required>
                                             </div>
                                             <div class="col-lg-6 mb-3">
                                                <input type="text" class="form-control" placeholder="Nachname" name="lastname" value="<?php echo htmlentities($submit['lastname']) ?>" required>
                                             </div>
                                          </div>
                                          <div class="form-row">
                                             <div class="col-lg-12 mb-3">
                                                <input type="email" class="form-control" placeholder="E-mail" name="email" value="<?php echo htmlentities($submit['email']) ?>" required>
                                             </div>
                                          </div>
                                          <div class="form-row">
                                             <div class="col-lg-12 mb-2">
                                                <textarea class="form-control" rows="3" placeholder="Nachricht" name="text" required><?php echo htmlentities($submit['text']) ?></textarea>
                                             </div>
                                          </div>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" name="newsletter" value="true" value="<?php echo htmlentities($submit['newsletter']) ?>" checked>
                                             <label class="form-check-label">
                                                Newsletter
                                             </label>
                                          </div>
                                       </form>
                                       <div class="d-flex mt-4">
                                          <div class="d-flex justify-content-start">
                                             <button type="button" class="btn btn-purple" id="save-<?php echo $Email_Id ?>"><i class="far fa-save"></i></button>
                                             <div class="dropdown">
                                                <a type="button" class="btn btn-purple" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   <i class="fas fa-share"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                   <a class="dropdown-item" href="#" onclick="takePhoto(<?php echo $Email_Id ?>, 1)">Save as PDF</a>
                                                   <a class="dropdown-item" href="#" onclick="takePhoto(<?php echo $Email_Id ?>, 0)">Save as PNG</a>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- ./mail/event/share.php -->

                                          <div class="d-flex justify-content-end w-100">
                                             <form class="contact-delete-form" action="./mail/event/delete.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo  $submit['id'] ?>">
                                                <button class="btn btn-purple" type="submit">
                                                   <i class="fas fa-trash-alt"></i>
                                                </button>
                                             </form>
                                          </div>
                                          <form id="hiddenform-<?php echo $Email_Id ?>" method="POST" action="./mail/event/share.php">
                                             <input type="hidden" name="id" value="<?php echo $Email_Id ?>">
                                             <input type="hidden" name="base64" value=`` id="image-<?php echo $Email_Id ?>">
                                          </form>
                                       </div>
                                       <?php
                                       if (strpos($_SERVER['REQUEST_URI'], '?target=mails')) {
                                          echo '
      <script>
         document.getElementById("save-' . $Email_Id . '").addEventListener("click", function() {
            document.getElementById("form-' . $Email_Id . '").submit();
         });
      </script>';
                                       }
                                       ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     <?php $Email_Id++;
                     endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <!-- Logs -->
   <div class="modal submodal fade p-0" id="logs" data-backdrop="false" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm">
         <div class="modal-content content-sm btn-2">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
               </svg>
            </button>
            <div class="container">
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
                        <th scope="row"><?php echo $log_count + 1 ?></th>
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

                     for ($x = $log_count - 1 and $i = 0; $x >= 0 and $i <= maxInt("log"); $x-- and $i++) {
                        $user = parse_ini_file($log_directory . "log-" . $x . ".log");
                     ?>
                        <tr id="log-tr-<?php echo $user['ID'] ?>">
                           <th scope='row'><?php echo $user['ID'] ?></th>
                           <td><?php echo $user['Date'] ?></td>
                           <td><?php echo $user['IP'] ?></td>
                           <td><?php echo $user['Platform'] ?></td>
                           <td><?php echo $user['Touchdevice'] ?></td>
                           <td><?php echo $user['Language'] ?></td>
                           <td><?php echo $user['Country'] ?></td>
                           <td><?php echo $user['Region'] ?></td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>


   <!-- Sourcecode -->
   <div class="modal submodal fade p-0" id="sourcecode" data-backdrop="false" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm">
         <div class="modal-content content-sm btn-6">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
               </svg>
            </button>
            <div class="container">
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ordner</th>
                        <th scope="col">Zuletzt geändert</th>
                        <th scope="col">Veröffentlichung</th>
                        <th scope="col">Download</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $dir    = '../files/src/';
                     $files = scandir($dir);
                     array_shift($files);
                     array_shift($files);
                     if (($key = array_search("compiled", $files)) !== false) {
                        unset($files[$key]);
                     }
                     $filescount = count($files);
                     for ($i = 1; $i <= $filescount; $i++) {

                        $folder = $files[$i];
                        $folderZip = $folder . ".zip";
                        if (!is_dir($dir . $folder)) {
                           continue;
                        }
                        $newdirscan = scandir($dir . $folder);
                        array_shift($newdirscan);
                        array_shift($newdirscan);

                        if (file_exists($dir . $folder . "/release.ini")) {
                           $dir_release = parse_ini_file($dir . $folder . "/release.ini")['date'];
                        } else {
                           $dir_release = "-";
                        }
                     ?>
                        <tr>
                           <th scope="row"><?php echo $i ?></th>
                           <td><?php echo $folder ?></td>
                           <td><?php echo date("j.n.Y", filemtime($dir . $folder)) ?></td>
                           <td><?php echo $dir_release ?></td>
                           <td><a href="<?php echo $dir . $folderZip ?>" download><?php echo $folderZip ?></a></td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <!--Profile Editor -->
   <div class="modal submodal fade p-0" id="profiles" data-backdrop="false" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm">
         <div class="modal-content content-sm btn-8">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
               </svg>
            </button>
            <div class="container">
               <div class="row profiles">
                  <div class="profile profile-1 col-lg-6 col-12">
                     <div class="profile-header">
                        <p>user: root</p>
                     </div>
                     <div class="profile-body">
                        <div>
                           <p><span>id: </span>1</p>
                           <p><span>user: </span>root</p>
                           <p><span>password: </span>
                              <a href="javascript:void(0)">
                                 hidden <small>(edit)</small>
                              </a>
                              <input type="password">
                           </p>
                        </div>
                        <div>
                           <p><span>Client IP:</span> 1.1.1.1</p>
                           <p><span>Created:</span> 21.01.2001</p>
                           <p><span>Last login:</span> 21.01.2001</p>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- <?php
                     // $user = "hello";
                     // $pass = "root";

                     // require("../php/connections/profiles.php");
                     // $sql = "INSERT INTO `profiles` (`user`, `pass`) VALUES (:user, :pass)";
                     // $query = $pdo->prepare($sql);
                     // $query->bindParam(':user', $user);
                     // $query->bindParam(':pass', $pass);
                     // $query->execute();
                     ?> -->
            </div>
         </div>
      </div>
   </div>
   <div class="control">
      <?php
      if (isset($_GET['delete'])) {
         $log_files = $log_directory . "log-";

         for ($i = 0; $i <= count(scandir($log_directory)); $i++) {
            $target = $log_files . $i . ".log";
            echo $target . "\n";
            if (file_exists($target)) {
               unlink($target);
            } else {
               // File not found.
            }
         }
      }
      ?>
   </div>
   <script>
      var logH = <?php echo $log_count ?>;
      var logM = <?php echo maxInt("log") ?>;
   </script>
   <script src="../../../lib/aos-master/aos.js"></script>
   <script src="http://localhost/lib/jqeury-3.5.1/jquery-3.5.1.min.js"></script>
   <script src="http://localhost/lib/popper/popper.min.js"></script>
   <script src="http://localhost/lib/bootstrap-4.5.3/dist/js/bootstrap.min.js"></script>
   <script src="http://localhost/lib/html2canvas/html2canvas.js"></script>
   <script src="./js/app.js"></script>
</body>