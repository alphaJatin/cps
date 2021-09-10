<?php include "../../config/db_con.php";
$query = "SELECT name from company";
$result = $con->query($query);
?>
<!DOCTYPE html>
<html lang="en">

<!-- merge in index.php -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Recruitments</title>
    <link href="css/custom.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1422ef591f.js" crossorigin="anonymous"></script>

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
                        <a class="nav-link fw-bold" aria-current="page" href="index.php">Home</a>
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

    <div class="container-fluid">
        <h1 class="my-4 text-danger text-style">Latest Recruitments</h1>

        <ul class="list-group mx-3 mb-4" id="listGroup">
            <?php if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <li class="list-group-item">
                        <span><?php echo $row['name'] ?> <span class="fw-bold text-danger">is hiring !!</span></span>
                        <button class="btn btn-danger btn-style">Apply</button>
                    </li>
                <?php }
            } else { ?>
                <li class="list-group-item">
                    <span>No Data to show.</span>
                </li>
            <?php } ?>
        </ul>

        <div id="exampleSlider">
            <div class="h1 text-center py-2 text-danger">Our Partners</div>
            <div class="MS-content">
                <div class="item">
                    <img src="img/debut_infotech.png" alt="c1">
                </div>
                <div class="item">
                    <img src="img/ashriya_infotech.png" alt="">
                </div>
                <div class="item">
                    <img src="img/tcs.png" alt="">
                </div>
                <div class="item">
                    <img src="img/ashriya_infotech.png" alt="">
                </div>
                <div class="item">
                    <img src="img/tcs.png" alt="">
                </div>
                <div class="item">
                    <img src="img/debut_infotech.png" alt="">
                </div>
            </div>
            <div class="MS-controls">
                <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <?php include "../../Components/Footer/Footer.php" ?>

    <!-- Include jQuery -->
    <script src="js/jquery-2.2.4.min.js"></script>

    <!-- Include Multislider -->
    <script src="js/multislider.min.js"></script>

    <!-- Initialize element with Multislider -->
    <script>
        $('#exampleSlider').multislider({
            interval: 4000,
            slideAll: true,
            duration: 1500
        });
    </script>
</body>

</html>