<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == 'true' && $_SESSION['type'] == 'student' && isset($_GET['cid'])) {
    $cid = $_GET['cid'];
    exit(header("Location: ./dashboard/student/apply.php?cid=$cid"));
} else {
    $_SESSION['redirect_cid'] = $_GET['cid'];
    header("Location: ./login.php");
}
