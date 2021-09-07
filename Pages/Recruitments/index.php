<?php include "../../config/db_con.php";
$query = "SELECT name from company";
$result = $con->query($query);
?>
<!DOCTYPE html>
<html lang="en">

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
    <?php include "../../Components/Header/Header.php" ?>

    <div class="container-fluid">
        <h1 class="my-4 text-danger text-style">Latest Recruitments</h1>

        <ul class="list-group mx-3 mb-4" id="listGroup">
            <?php if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <li class="list-group-item">
                        <span><?php echo $row['name'] ?> <span class="fw-bold text-danger">is hiring !!</span></span>
                        <button class="btn btn-danger">Apply Now</button>
                    </li>
                <?php }
            } else { ?>
                <li class="list-group-item">
                    <span>No Data to show.</span>
                </li>
            <?php } ?>
        </ul>

        <div id="exampleSlider">
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
    <script type="application/javascript">
        // const element = document.getElementById("listGroup");
        // var Height = element.scrollHeight;
        // var currentHeight = 0;
        // var bool = true;
        // var step = 5;
        // var speed = 200;
        // var interval = setInterval(scrollpage, speed)

        // function scrollpage() {
        //     if (currentHeight < 0 || currentHeight > Height)
        //         bool = !bool;
        //     if (bool) {
        //         element.scrollTo(0, currentHeight += step);
        //     } else {
        //         element.scrollTo(0, currentHeight -= step);
        //     }
        // }
    </script>
</body>

</html>