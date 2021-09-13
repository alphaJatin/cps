<?php
session_start();
if ($_SESSION['logIn'] === true && $_SESSION['type'] === 'student') {
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
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        th,
        td {
            text-align: center !important;
        }

        .row>* {
            padding: 0 !important;
        }
    </style>
</head>

<body class="sb-nav-fixed">

    <!-- ----------------------------- Admin-Panel ----------------------------- -->

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
                        <a class="nav-link " href="index.html">
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
            <main>
                <div class="container px-5">
                    <h2 class="my-4">Latest Recruiters</h2>
                    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3"">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <div class="col card mb-4">
                                <div class="card-header fs-5 fw-bold text-center">
                                    <?php echo $row['name']; ?>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6 fs-6">
                                            <span class="text-primary" style="font-weight: 500;">Location:</span> <?php echo $row['location']; ?>
                                        </div>
                                        <div class="col-md-6 fs-6">
                                            <span class="text-primary" style="font-weight: 500;">Package:</span> <?php echo $row['package']; ?>
                                        </div>
                                        <div class="col-md-12 fs-6">
                                            <span class="text-primary" style="font-weight: 500;">Coming Date:</span> <?php echo $row['date'] ?>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-dark">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>