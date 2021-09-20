<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] === true && $_SESSION['type'] === 'admin') {
    require_once "../../config/db_con.php";
    if (isset($_GET['sid'])) {
        $id = $_GET['sid'];
        $q = "DELETE FROM student where id=$id";
        if ($con->query($q)) exit(header("Location: ./view.php"));
    } else if (isset($_GET['cid'])) {
        $id = $_GET['cid'];
        $q = "DELETE FROM company where id=$id";
        if ($con->query($q)) exit(header("Location: ./view-comp.php"));
    } else exit(header("Location: ./index.php"));
    $con->close();
} else exit(header("Location ../../login.php"));
