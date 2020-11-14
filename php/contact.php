<?php

require("./connections/contact_form.php");

if ($pdo->lastInsertID()) {
    header('location: ../?success=1#contact');
} else {
    header('location: ../?success=0#contact');
}
