<?php
session_start();
session_unset();
session_destroy();
exit(header("location: ./index.php"))
?>