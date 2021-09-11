<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../../config/db_con.php";
    $name = $_POST['name'];
    $package = $_POST['package'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $query = "INSERT INTO company (name, package, location, date) VALUES('$name','$package','$location','$date');";
    if (!$con->query($query))  echo "Error: " . $conn->error;
    else
        echo "Success";
    $con->close();
}
?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1422ef591f.js" crossorigin="anonymous"></script>
    <style>
        .nav-item a:hover {
            color: #dc3545 !important;
        }

        .card {
            box-shadow: 1px 1px 3px black;
        }

        .rec-title {
            font-family: sans-serif;
            letter-spacing: 1px;
            color: #f50057;
            font-weight: 500;
        }

        .theme-color {
            color: white;
            background-color: #f50057;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm p-1 mb-3 bg-body rounded">
        <div class="container-fluid">
            <a class="navbar-brand px-4" href="./index.php"><img src="../../logo.png" alt="MAIMT" width="50px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 d-flex justify-content-evenly">
                    <li class="nav-item px-3 py-2">
                        <a class="nav-link fw-bold active" aria-current="page" href="../../index.php">Home</a>
                    </li>
                    <li class="nav-item px-3 py-2">
                        <a class="nav-link fw-bold" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item px-3 py-2">
                        <a class="nav-link fw-bold" href="Contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item px-3 py-2">
                        <a class="nav-link fw-bold" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card m-4 p-3">
            <h2 class="text-center rec-title">ADD COMPANY</h2>
            <div class="row">
                <form class="col-md-6" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <div class="form">
                        <div class="inputbox my-3"> <span>Company Name </span>
                            <input type="text" placeholder="Name" name="name" class="form-control">
                        </div>
                        <div class="inputbox input-group my-3"> <span>Anual Package </span>
                            <input type="text" placeholder="2.4" name="package" class="form-control d-flex">
                            <span class="input-group-text" id="basic-addon2">LPA</span>
                        </div>

                        <div class="inputbox my-3"> <span>Location </span>
                            <input type="text" placeholder="Chandigrh" class="form-control" name="location">
                        </div>
                        <div class="inputbox my-3"> <span>Date of campus</span>
                            <input type="date" name="date" class="form-control">
                        </div>
                        <div class="form-check my-3"> <input class="form-check-input" type="checkbox" value="checked" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> I agree to the terms and conditions of <a href="#" class="login">Privacy & Policy</a> </label> </div>
                    </div>
                    <div class="text-center"> <input type="submit" class="btn btn-danger px-4" value="ADD" /> </div>

                </form>
                <div class="col-md-6">
                    <div class="text-center mt-5"> <img src="https://i.imgur.com/98GXnDD.png" width="400"> </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../Components/Footer/Footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>