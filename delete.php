<?php
session_start();
if ($_SESSION['logIn'] === true && $_SESSION['type'] === 'admin') {
    require_once "./config/db_con.php";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $q = "DELETE FROM student WHERE id=$id";
        if (!$con->query($q)) {
            echo "Hi";
            echo $con->connect_error;
        } else exit(header("location: ./view.php"));
    } else exit(header("location: ./login.php"));
} else exit(header("location: ./login.php"));
