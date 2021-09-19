<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    require_once "../../config/db_con.php";
    $id = $_SESSION['id'];
    $cid = $_GET['cid'];
    $q = "DELETE FROM applied where student_id=$id and company_id=$cid;";
    if ($con->query($q)) exit(header("Location: ./index.php"));
    else exit(print("Error: " . $con->error));
    // $con->close();
} else exit(header("Location ../../login.php"));
