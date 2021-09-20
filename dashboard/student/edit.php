<?php
session_start();
$alert = false;
if (isset($_SESSION['login']) && $_SESSION['login'] === true && $_SESSION['type'] === 'student') {
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
        $department = $_POST['department'];
        $marks12 = $_POST['marks12'];
        $graduation = $_POST['graduation'];
        $password = $_POST['password'];
        $sql = "UPDATE student SET name='$name', department='$department', phoneNumber='$phoneNumber',
    12th=$marks12, graduation=$graduation, password='$password' WHERE id=$id";
        if (!$con->query($sql)) exit(print "Error:" . $con->error);
        else {
            $q = "SELECT * FROM student WHERE id = '$id';";
            $result = ($con->query($q))->fetch_assoc();
            $con->close();
            $alert = true;
        }
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
    <title>Edit Data - MAIMT</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        .alert {
            padding: 0.5rem 1rem;
        }

        .btn-close {
            height: 0;
        }

        small {
            display: none;
            color: #dc3545;
        }

        input:invalid {
            border: 2px solid #dc3545 !important;
            border-radius: 6px;
        }

        input:focus,
        select:focus {
            box-shadow: none !important;
        }

        .card-body {
            padding: 1rem 2rem !important;
        }
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
                        <a class="nav-link" href="./index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-check"></i>
                            </div>
                            Applied Company
                        </a>
                        <a class="nav-link" href="./view.php">
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
            <div class="position-relative" id="alertBox" style="display: none;">
                <div class="alert alert-primary alert-dismissible fade show position-absolute w-100" role="alert" style="z-index:5">
                    <strong>Profile Updated</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
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

                                            <div class="card-body px-3">
                                                <form action="<?php $_SERVER['PHP_SELF'] ?>" name="update" method="POST" onsubmit="return validateStudentUpdate();" novalidate>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input name="name" class="form-control" id="inputName" oninvalid="" type="text" pattern="[A-Za-z\s]{3,25}" placeholder="Enter your name...." value="<?php echo $result['name']; ?>" />
                                                                <label for="inputName">Name</label>
                                                            </div>
                                                            <small class="error-msg">First name should be 3 to 10 characters long.</small>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <input name="number" class="form-control" id="inputNumber" type="text" placeholder="Enter your Contact Number..." value="<?php echo $result['phoneNumber']; ?>" pattern="\d{10}" />
                                                                <label for="inputNumber">Contact Number</label>
                                                            </div>
                                                            <small class="error-msg">Please, enter a valid phone number.</small>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-floating">
                                                                <input name="email" class="form-control" id="inputEmail" type="text" placeholder="name@example.com" value="<?php echo $result['email']; ?>" pattern="[0-9A-Za-z\._-]{3,}@[A-Za-z]{2,}\.[A-Za-z]{2,}" disabled />
                                                                <label for="inputEmail">Email address</label>
                                                            </div>
                                                            <small class="error-msg">Enter a valid email.</small>
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
                                                            <small class="error-msg">Please select a option.</small>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" pattern="\d{3}" name="marks12" id="input12thMarks" type="text" placeholder="Enter your 12th Marks..." value="<?php echo $result['12th']; ?>" />
                                                                <label for="input12thMarks">12th Marks</label>
                                                            </div>
                                                            <small class="error-msg">Please enter a valid 12th marks.</small>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" pattern="\d{4}" name="graduation" id="inputGraduationMarks" type="text" placeholder="Enter your graduation marks..." value="<?php echo $result['graduation']; ?>" />
                                                                <label for="inputGraduationMarks">Graduation Marks</label>
                                                            </div>
                                                            <small class="error-msg">Please enter your graduation marks.</small>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" name="password" pattern=".{5,}" id="inputPass" type="password" placeholder="Enter your password...." value="<?php echo $result['password']; ?>" />
                                                                <label for="inputPass">Password</label>
                                                            </div>
                                                            <small class="error-msg">Password should be minimum 5 character long.</small>
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
    <script src="js/scripts.js"></script>
    <?php if ($alert === true) { ?>
        <script>
            let alertBox = document.getElementById("alertBox").style;
            alertBox.display = "block";
            setTimeout(() => {
                alertBox.display = "none";
            }, 3000);
        </script>
    <?php } ?>
    <script>
        function validateStudentUpdate() {
            const ERROR = document.getElementsByClassName("error-msg");
            const name = update.name;
            const number = update.number;
            const email = update.email;
            const department = update.department;
            const marks12 = update.marks12;
            const graduation = update.graduation;
            const pass = update.password;

            if (name.value === "" || name.validity.patternMismatch) {
                ERROR[0].style.display = "inline-block";
                return false;
            } else ERROR[0].style.display = "none";
            if (number.value === "" || number.validity.patternMismatch) {
                ERROR[1].style.display = "inline-block";
                return false;
            } else ERROR[1].style.display = "none";
            if (email.value === "" || email.validity.patternMismatch) {
                ERROR[2].style.display = "inline-block";
                return false;
            } else ERROR[2].style.display = "none";
            if (department.value === "") {
                ERROR[3].style.display = "inline-block";
                return false;
            } else ERROR[3].style.display = "none";
            if (marks12.value === "" || marks12.validity.patternMismatch) {
                ERROR[4].style.display = "inline-block";
                return false;
            } else ERROR[4].style.display = "none";
            if (graduation.value === "" || graduation.validity.patternMismatch) {
                ERROR[5].style.display = "inline-block";
                return false;
            } else ERROR[5].style.display = "none";
            if (pass.value === "" || pass.validity.patternMismatch) {
                ERROR[6].style.display = "inline-block";
                return false;
            } else ERROR[6].style.display = "none";

            return true;
        }
    </script>
</body>

</html>