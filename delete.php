<?php
session_start();
if ($_SESSION['logIn'] === true && $_SESSION['type'] === 'admin') {
    require_once "./config/db_con.php";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $q = "DELETE FROM student where id=$id;";
        if (!$con->query($q)) echo $con->connect_error;
        else exit(header("location: ./view.php"));
    } else exit(header("location: ./login.php"));
}
