<?php
session_start();
if ($_SESSION['login'] === true && $_SESSION['type'] === 'admin') {
    include '../../config/db_con.php';
    $q = "SELECT * FROM company";
    $result = $con->query($q);
    $con->close();
} else exit(header("Location: ../../login.php")) ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Company - MAIMT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        .list-group-item {
            cursor: pointer;
        }
    </style>
</head>

<body class="sb-nav-fixed">

    <!-- ----------------------------- Admin-Panel ----------------------------- -->

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
                        <a class="nav-link" href="./index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-check"></i>
                            </div>
                            Applied Students
                        </a>
                        <a class="nav-link" href="./view.php">
                            <div class="sb-nav-link-icon "><i class="fas fa-user-graduate"></i>
                            </div>
                            View Students
                        </a>
                        <a class="nav-link bg-light text-dark" href="./add-comp.php">
                            <div class="sb-nav-link-icon text-dark"><i class="fas fa-calendar"></i>
                            </div>
                            View Companies
                        </a>
                        <a class="nav-link" href="./add-comp.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-building"></i>
                            </div>
                            Add Company
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container px-5">
                    <h1 class="py-4">All companies</h1>
                    <div class="list-group">
                        <?php while ($row = $result->fetch_array()) { ?>
                            <div class="list-group-item list-group-item-action d-flex justify-content-between align-content-center">
                                <div class="text-dark"><?php echo $row['name'] ?></div>
                                <div class="action d-flex">
                                    <div class="px-4"><a href="./edit-comp.php?cid=<?php echo $row['id'] ?>" class="text-dark"><i class="fas fa-pencil-alt"></i></a></div>
                                    <div><a href="./delete.php?cid=<?php echo $row['id']; ?>"><i class="fas fa-trash text-dark"></i></a></div>
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