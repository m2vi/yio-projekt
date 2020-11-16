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
                <?php
                $log_directory = getcwd() . "/../log/";
                $log_count = count(glob($log_directory . "*.log"));
                ?>
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
</section>
<script>
    var logH = <?php echo $log_count ?>;
    var logM = <?php echo maxInt("log") ?>;
</script>