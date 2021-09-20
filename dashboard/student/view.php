<?php
session_start();
if (isset($_SESSION) && $_SESSION['login'] === true && $_SESSION['type'] === 'student') {
    require_once '../../config/db_con.php';
    $id = $_SESSION['id'];
    $q = "SELECT * FROM company order by date desc";
    $result = $con->query($q);

    $q = "SELECT company_id as cid FROM applied where student_id=$id";
    $result2 = $con->query($q);
    $applied = array();
    while ($row = $result2->fetch_assoc()) {
        array_push($applied, $row['cid']);
    }
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
    <title>Companies - MAIMT</title>
    <link href="./css/styles.css" rel="stylesheet" />
    <style>

    </style>
</head>

<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex justify-content-between px-4">
        <a style="font-weight: 600;" class="navbar-brand ps-3" href="../../index.php"><i class="fas fa-home"></i> &nbsp; M A I M T</a>
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

                                    <?php $flag = false;
                                    foreach ($applied as $aid) {
                                        if ($row['id'] == $aid) {
                                            $flag = true;
                                            break;
                                        }
                                    } ?>
                                    <?php if ($flag) { ?>
                                        <a href="#" class="btn btn-dark btn-sm disabled">Applied <i class="fas fa-check"></i></a>
                                    <?php } else { ?>
                                        <a href="./apply.php?cid=<?php echo $row['id']; ?>" class="btn btn-dark btn-sm">Apply Now</a>
                                    <?php } ?>

                                </div>

                                <div class="card-body row justify-content-between">
                                    <div class="col-sm-6 col-lg-4 fs-6 text-center">
                                        <span class="text-primary" style="font-weight: 500;">Location:</span> <?php echo $row['location']; ?>
                                    </div>
                                    <div class="col-sm-6 col-lg-4 fs-6 text-center">
                                        <span class="text-primary" style="font-weight: 500;">Package:</span> <?php echo $row['package']; ?>
                                    </div>
                                    <div class="col-sm-6 col-lg-4 fs-6 text-center">
                                        <span class="text-primary" style="font-weight: 500;">On:</span> <?php echo $row['date'] ?>
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
    <script src="js/scripts.js"></script>
</body>

</html>