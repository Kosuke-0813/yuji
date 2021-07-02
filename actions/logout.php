<?php
session_start();
session_unset();  #remove all session variables
session_destroy();  #delete all data related to session

header("location: ../views"); # go to index.php of Views folder

exit;


?>