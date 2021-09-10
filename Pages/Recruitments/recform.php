<html>

<head>
    <!-- <link rel="stylesheet" href="./css/recform.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <style>
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-1">
        <div class="container-fluid">
            <a class="navbar-brand px-4" href="../../index.php"><img src="../../logo.png" alt="MAIMT" width="50px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 d-flex justify-content-evenly">
                    <li class="nav-item px-3 py-2">
                        <a class="nav-link fw-bold" aria-current="page" href="../../index.php">Home</a>
                    </li>
                    <li class="nav-item px-3 py-2">
                        <a class="nav-link fw-bold active" href="../Contact/Contact.php">Drives</a>
                    </li>
                    <li class="nav-item px-3 py-2">
                        <a class="nav-link fw-bold" href="../Contact/Contact.php">About Us</a>
                    </li>
                    <li class="nav-item px-3 py-2">
                        <a class="nav-link fw-bold" href="../Contact/Contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item px-3 py-2">
                        <a class="nav-link fw-bold" href="../../login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card m-4 p-3">
            <h2 class="text-center rec-title">ADD COMPANY</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="inputbox my-3"> <span>Company Name </span>
                            <input type="text" placeholder="Name" name="cname" class="form-control">
                        </div>
                        <div class="inputbox my-3"> <span>Experience Required </span>
                            <input type="text" placeholder="0-5" name="expe" class="form-control">
                        </div>
                        <div class="inputbox my-3"> <span>Anual Pakage </span>
                            <input type="text" placeholder="2.4 " name="anual" class="form-control">
                        </div>
                        <div class="inputbox my-3"> <span>Location </span>
                            <input type="text" placeholder="Chandigrh" class="form-control" name="location">
                        </div>
                        <div class="inputbox my-3"> <span>Date of campus</span>
                            <input type="date" name="date" class="form-control">
                        </div>
                        <div class="form-check my-3"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> I agree to the terms and conditions of <a href="" class="login">Privacy & Policy</a> </label> </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-2">
                        <div class="text-right"> <button class="btn theme-color register btn-block">Register</button> </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center mt-5"> <img src="https://i.imgur.com/98GXnDD.png" width="400"> </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../Components/Footer/Footer.php'; ?>
</body>

</html>