<?php
session_start();
if (isset($_SESSION) && $_SESSION['login'] === true && $_SESSION['type'] === 'student') {
    require_once '../../config/db_con.php';
    $id = $_SESSION['id'];
    $q = "SELECT * FROM company order by date desc";
    $result = $con->query($q);
    $con->close();
} else exit(header("Location: ../../login.php")); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->
    <link href="./css/styles.css" rel="stylesheet" />
    <style>

    </style>
</head>

<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex justify-content-between px-4">
        <a class="navbar-brand ps-3" href="../../index.php">M A I M T</a>
        <div class="w-100 text-end">
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 " id="sidebarToggle" href="#!">
                <i class="fas fa-bars"></i>
            </button>
            <a class="text-decoration-none text-light" href="../../logout.php">Logout</a>
        </div>
    </nav>

    <div id="layoutSidenav">

        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">MENU</div>
                        <a class="nav-link " href="./index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-check"></i>
                            </div>
                            Applied Company
                        </a>
                        <a class="nav-link bg-light text-dark" href="#">
                            <div class="sb-nav-link-icon text-dark"><i class="fas fa-building"></i>
                            </div>
                            View Company
                        </a>
                        <a class="nav-link" href="./edit.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i>
                            </div>
                            Edit Profile
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main class="p-3">
                <div class="container-fluid">
                    <h1>Latest Recruiters</h1>
                    <div class="row my-3">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <div class="card col-12 my-2">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div class="fs-6 fw-bold"><?php echo $row['name']; ?></div>
                                    <a href="#" class="btn btn-dark btn-sm">Apply Now</a>
                                </div>
                                <div class="card-body row justify-content-between">
                                    <div class="col-md-6 col-lg-4 fs-6 text-center">
                                        <span class="text-primary" style="font-weight: 500;">Location:</span> <?php echo $row['location']; ?>
                                    </div>
                                    <div class="col-md-6 col-lg-4 fs-6 text-center">
                                        <span class="text-primary" style="font-weight: 500;">Package:</span> <?php echo $row['package']; ?>
                                    </div>
                                    <div class="col-md-6 col-lg-4 fs-6 text-center">
                                        <span class="text-primary" style="font-weight: 500;">Coming Date:</span> <?php echo $row['date'] ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>