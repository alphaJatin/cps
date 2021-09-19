<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] === true && $_SESSION['type'] == 'admin' && isset($_GET['sid'])) {
    require_once "../../config/db_con.php";
    $id = $_GET['sid'];
    $q = "DELETE FROM student where id=$id";
    if ($con->query($q)) exit(header("Location: ./view.php"));
    else exit(print("Error: " . $con->error));
    $con->close();
} else exit(header("Location ../../login.php"));
