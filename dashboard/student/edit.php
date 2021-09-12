<?php
session_start();
if ($_SESSION['logIn'] === true && $_SESSION['type'] === 'student') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once '../../config/db_con.php';
        $id = $_SESSION['id'];
        $q = "SELECT * FROM student WHERE id = '$id';";
        $result = ($con->query($q))->fetch_assoc();
        $con->close();
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once '../../config/db_con.php';
        $id = $_SESSION['id'];
        $name = $_POST['name'];
        $phoneNumber = $_POST['number'];
        $email = $_POST['email'];
        $department = $_POST['department'];
        $marks12 = $_POST['marks12'];
        $graduation = $_POST['graduation'];
        $password = $_POST['password'];
        $sql = "UPDATE student SET name='$name', department='$department', phoneNumber='$phoneNumber',
    12th=$marks12, graduation=$graduation, email='$email', password='$password' WHERE id=$id";
        if (!$con->query($sql)) exit(print "Error:" . $con->error);
        else exit(header('location:./index.php'));
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
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        th,
        td {
            text-align: center !important;
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
                        <a class="nav-link" href="./index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-check"></i>
                            </div>
                            Applied Company
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i>
                            </div>
                            View Company
                        </a>
                        <a class="nav-link bg-light text-dark" href="./edit.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-building text-dark"></i>
                            </div>
                            Edit Profile
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main class="bg-light mb-4">
                <div id="layoutAuthentication">
                    <div id="layoutAuthentication_content">
                        <main>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7">
                                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                                            <div class="card-header">
                                                <h3 class="text-center font-weight-light my-1">Edit Profile</h3>
                                            </div>
                                            <div class="card-body">
                                                <form action="<?php $_SERVER['PHP_SELF'] ?>" name="update" method="POST">
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input name="name" class="form-control" id="inputName" type="text" placeholder="Enter your name...." value="<?php echo $result['name']; ?>" />
                                                                <label for="inputName">Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <input name="number" class="form-control" id="inputNumber" type="text" placeholder="Enter your Contact Number..." value="<?php echo $result['phoneNumber']; ?>" />
                                                                <label for="inputNumber">Contact Number</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-floating">
                                                                <input name="email" class="form-control" id="inputEmail" type="email" placeholder="name@example.com" value="<?php echo $result['email']; ?>" />
                                                                <label for="inputEmail">Email address</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-floating">
                                                                <select class="form-control" name="department">
                                                                    <option value="">Select your department</option>
                                                                    <option value="BCA" <?php if ($result["department"] == 'BCA') echo 'selected';  ?>>BCA</option>
                                                                    <option value="MCA" <?php if ($result["department"] == 'MCA') echo 'selected'; ?>>MCA</option>
                                                                    <option value="BBA" <?php if ($result["department"] == 'BBA') echo 'selected'; ?>>BBA</option>
                                                                    <option value="MBA" <?php if ($result["department"] == 'MBA') echo 'selected'; ?>>MBA</option>
                                                                    <option value="OTHER" <?php if ($result["department"] == 'OTHER') echo 'selected'; ?>>OTHER</option>
                                                                </select>
                                                                <label class="form-label" for="form3Example3">Department</label>
                                                            </div>
                                                        </div>
                                                        <!-- <small class="error-msg">Please select a option.</small> -->
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" name="marks12" id="input12thMarks" type="text" placeholder="Enter your 12th Marks..." value="<?php echo $result['12th']; ?>" />
                                                                <label for="input12thMarks">12th Marks</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" name="graduation" id="inputGraduationMarks" type="text" placeholder="Enter your graduation marks..." value="<?php echo $result['graduation']; ?>" />
                                                                <label for="inputGraduationMarks">Graduation Marks</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" name="password" id="inputPass" type="password" placeholder="Enter your password...." value="<?php echo $result['password']; ?>" />
                                                                <label for="inputPass">Password</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mt-4 mb-0 text-center">
                                                        <input type="submit" class="btn btn-dark" value="Update">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </main>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>