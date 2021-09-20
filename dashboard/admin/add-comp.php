<?php
session_start();
$alert = false;
if (isset($_SESSION['login']) && $_SESSION['login'] === true && $_SESSION['type'] === 'admin') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once "../../config/db_con.php";
        $name = $_POST['name'];
        $package = $_POST['package'];
        $location = $_POST['location'];
        $date = $_POST['date'];
        $query = "INSERT INTO company (name, package, location, date) VALUES('$name','$package','$location','$date');";
        if (!$con->query($query))  echo "Error: " . $conn->error;
        $alert = true;
        $con->close();
    }
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
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .rec-title {
            font-family: sans-serif;
            letter-spacing: 1px;
            font-weight: 600;
        }

        input:valid {
            border: 2px solid lightgrey !important;
            border-radius: 5px;
        }


        input:invalid {
            border: 2px solid #dc3545 !important;
            border-radius: 6px;
        }

        input:focus {
            box-shadow: none !important;
        }

        .error-msg {
            width: 100%;
            display: none;
            color: #dc3545;
        }

        .alert {
            padding: 0.5rem 1rem;
        }

        .btn-close {
            height: 0;
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
                            <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i>
                            </div>
                            View Students
                        </a>
                        <a class="nav-link" href="./view-comp.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i>
                            </div>
                            View Companies
                        </a>
                        <a class="nav-link bg-light text-dark" href="./add-comp.php">
                            <div class="sb-nav-link-icon text-dark"><i class="fas fa-building"></i>
                            </div>
                            Add Company
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <div class="position-relative" id="alertBox" style="display: none;">
                <div class="alert alert-primary alert-dismissible fade show position-absolute w-100" role="alert" style="z-index:5">
                    <strong>Company Added</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>

            <main class="bg-light mb-4 px-4 px-sm-5 row justify-content-center py-4 me-0">
                <div class="card shadow-lg col-md-7 p-0">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-2">Add Company</h3>
                    </div>
                    <div class="card-body">
                        <form class="col-md-12" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" name="addCompany" onsubmit="return validateAddCompany();">
                            <div class="row">
                                <div class="form">
                                    <div class="inputbox my-3">
                                        <span>Company Name</span>
                                        <input type="text" placeholder="Name" name="name" class="form-control" pattern="[a-zA-Z\.-_@\s]{3,}">
                                        <small class="error-msg">Please, enter your company name.</small>
                                    </div>
                                    <div class="inputbox input-group my-3">
                                        <span class="d-block w-100">Anual Package </span>
                                        <input type="text" placeholder="2.4" name="package" class="form-control d-flex" pattern="[\d\.]{1,}">
                                        <span class="input-group-text" id="basic-addon2">LPA</span>
                                        <small class="error-msg">Please enter your annual package.</small>
                                    </div>

                                    <div class="inputbox my-3"> <span>Location</span>
                                        <input type="text" placeholder="Chandigrah" class="form-control" name="location" pattern="[a-zA-Z0-9\.-_()\s]{2,}">
                                        <small class="error-msg">Please enter your location.</small>
                                    </div>
                                    <div class="inputbox my-3"> <span>Date of campus</span>
                                        <input type="date" name="date" class="form-control">
                                        <small class="error-msg">Please enter your campus date.</small>
                                    </div>
                                    <div class="form-check my-3"> <input class="form-check-input" type="checkbox" value="checked" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> I agree to the terms and conditions of <a href="#" class="login">Privacy & Policy</a> </label> </div>
                                </div>
                                <div class="text-center"> <input type="submit" class="btn btn-dark px-4" value="ADD" /> </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
    <script src="js/scripts.js"></script>
    <script>
        const validateAddCompany = () => {
            const ERROR = document.getElementsByClassName("error-msg");
            const name = addCompany.name;
            const package = addCompany.package;
            const location = addCompany.location;
            const date = addCompany.date;

            if (name.value === "" || name.validity.patternMismatch) {
                ERROR[0].style.display = "inline-block";
                return false;
            } else ERROR[0].style.display = "none";
            if (package.value === "" || package.validity.patternMismatch) {
                ERROR[1].style.display = "inline-block";
                return false;
            } else ERROR[1].style.display = "none";
            if (location.value === "" || location.validity.patternMismatch) {
                ERROR[2].style.display = "inline-block";
                return false;
            } else ERROR[2].style.display = "none";
            if (date.value === "") {
                ERROR[3].style.display = "inline-block";
                return false;
            } else ERROR[3].style.display = "none";
            return true;
        };
    </script>
    <?php if ($alert === true) { ?>
        <script>
            let alertBox = document.getElementById("alertBox").style;
            alertBox.display = "block";
            setTimeout(() => {
                alertBox.display = "none";
            }, 2500);
        </script>
    <?php } ?>
</body>

</html>