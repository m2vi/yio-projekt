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
                                <form class="contact-delete-form" action="./mail/event/delete.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo  $submit['id'] ?>">
                                    <button class="btn btn-link p-0" type="submit">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </a>
                        </td>
                    </tr>
                    <div class="modal fade" id="modal<?php echo htmlentities($submit['id']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
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
                                        <div class="d-flex justify-content-between mt-4">
                                            <button type="button" class="btn btn-success" id="save-<?php echo $Email_Id ?>">Save changes</button>
                                            <form class="contact-delete-form" action="./mail/event/delete.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo  $submit['id'] ?>">
                                                <button class="btn btn-link p-0" type="submit">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
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
</section>