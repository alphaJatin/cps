<?php
session_start();
if (isset($_SESSION['login']) && isset($_GET['cid']) && $_SESSION['login'] === true && $_SESSION['type'] === 'student') {
    require_once "../../config/db_con.php";
    $sid = $_SESSION['id'];
    $cid = $_GET['cid'];
    $q = "INSERT INTO applied (student_id, company_id) VALUES ($sid, $cid);";
    $result = $con->query($q);
    exit(header("Location: ./view.php"));
} else exit(header("Location: ../../login.php"));
