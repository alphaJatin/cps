<?php require_once "./config/db_con.php";
$query = "SELECT name from company";
$result = $con->query($query);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1422ef591f.js" crossorigin="anonymous"></script>

    <title>Placement Managment System</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,500;1,200;1,400&display=swap");

        * {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
        }

        body,
        html {
            height: 100%;
        }

        html h1 {
            text-align: center;
        }

        html h2 {
            text-align: center;
            color: grey;
        }

        #exampleSlider {
            position: relative;
            border: 1px solid lightgrey;
            border-radius: 12px;
        }

        @media (max-width: 767px) {
            #exampleSlider {
                border-color: transparent;
            }
        }

        #exampleSlider .MS-content {
            margin: 15px 5%;
            overflow: hidden;
            white-space: nowrap;
        }

        @media (max-width: 767px) {
            #exampleSlider .MS-content {
                margin: 0;
            }
        }

        #exampleSlider .MS-content .item {
            display: inline-block;
            height: 100%;
            overflow: hidden;
            position: relative;
            vertical-align: top;
            /* border: 1px solid green; */
            border-right: none;
            width: 20%;
        }

        @media (max-width: 1200px) {
            #exampleSlider .MS-content .item {
                width: 25%;
            }
        }

        @media (max-width: 992px) {
            #exampleSlider .MS-content .item {
                width: 33.3333%;
            }
        }

        @media (max-width: 767px) {
            #exampleSlider .MS-content .item {
                width: 50%;
            }
        }

        #exampleSlider .MS-content .item p {
            font-size: 30px;
            text-align: center;
            line-height: 1;
            vertical-align: middle;
            margin: 0;
            padding: 10px 0;
        }

        #exampleSlider .MS-controls button {
            position: absolute;
            border: none;
            background: transparent;
            font-size: 30px;
            outline: 0;
            top: 35px;
        }

        @media (max-width: 767px) {
            #exampleSlider .MS-controls button {
                display: none;
            }
        }

        #exampleSlider .MS-controls button:hover {
            cursor: pointer;
        }

        #exampleSlider .MS-controls .MS-left {
            left: 30px;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        @media (max-width: 992px) {
            #exampleSlider .MS-controls .MS-left {
                left: -2px;
            }
        }

        #exampleSlider .MS-controls .MS-right {
            right: 30px;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        @media (max-width: 992px) {
            #exampleSlider .MS-controls .MS-right {
                right: -2px;
            }
        }

        /* ----------------------------- List Group Item ---------------------------- */

        .list-group {
            height: 280px;
            overflow: auto;
        }

        .list-group .list-group-item {
            display: flex;
            justify-content: space-between;
        }

        .text-style {
            letter-spacing: 2px;
        }

        @media only screen and (max-width: 600px) {
            .btn-style {
                outline: none;
                background-color: #dc3545;
                border-color: #dc3545;
            }
        }


        .hero-image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("./banner.jpg");
            height: 80%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .hero-text {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        .button {
            border: none;
            text-align: center;
            transition: all 0.5s;
            cursor: pointer;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }

        .nav-item a:hover {
            color: #dc3545 !important;
        }

        .active {
            color: #dc3545 !important;
        }
    </style>
</head>

<body>
    <?php include_once "./Header.php"; ?>

    <div class="hero-image">
        <div class="hero-text">
            <h1>M A I M T</h1>
            <p style="letter-spacing: 1px;">MAHARAJA AGRASEN
                INSTITUTE OF MANAGEMENT & TECHNOLOGY</p>
            <a class="btn btn-danger button" href="#goto"><span>Explore</span></a>
        </div>
    </div>

    <div class="container-fluid" id="goto">
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
            <div class="h1 text-center py-3 text-danger">Our Partners</div>
            <div class="MS-content">
                <div class="item">
                    <img src="./pages/Recruitments/img/debut_infotech.png" alt="c1">
                </div>
                <div class="item">
                    <img src="./pages/Recruitments/img/ashriya_infotech.png" alt="">
                </div>
                <div class="item">
                    <img src="./pages/Recruitments/img/tcs.png" alt="">
                </div>
                <div class="item">
                    <img src="./pages/Recruitments/img/ashriya_infotech.png" alt="">
                </div>
                <div class="item">
                    <img src="./pages/Recruitments/img/tcs.png" alt="">
                </div>
                <div class="item">
                    <img src="./pages/Recruitments/img/debut_infotech.png" alt="">
                </div>
            </div>
            <div class="MS-controls">
                <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <!-- Include jQuery -->
    <?php include_once 'Components/Footer/Footer.php' ?>
    <!-- <script src="js/jquery-2.2.4.min.js"></script> -->
    <script src="./pages/Recruitments/js/jquery-2.2.4.min.js"></script>

    <!-- Include Multislider -->
    <script src="./pages/Recruitments/js/multislider.min.js"></script>

    <!-- Initialize element with Multislider -->
    <script>
        $('#exampleSlider').multislider({
            interval: 4000,
            slideAll: true,
            duration: 1500
        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>