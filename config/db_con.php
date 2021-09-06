<?php
define('HOSTNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DB_NAME', 'cps');
$con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DB_NAME);
if ($con->connect_errno) die("Connection failed: " . $con->connect_errno);
