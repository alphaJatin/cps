<?php include "../../config/db_con.php";
$query = 'SELECT name FROM company';
$result = $con->query($query);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Latest Recruitments</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/slick.css">
    <link rel="stylesheet" type="text/css" href="./css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <style type="text/css">
        html,
        body {
            margin: 0;
            padding: 0;
        }

        * {
            box-sizing: border-box;
        }

        .slider {
            width: 50%;
            margin: 0 auto;
        }

        .slick-slide {
            margin: 0px 20px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-prev:before,
        .slick-next:before {
            color: black;
        }


        .slick-slide {
            transition: all ease-in-out .3s;
        }

        .slick-current {
            opacity: 1;
        }
    </style>
</head>

<body>
    <?php include "../../Components/Header/Header.php" ?>
    <div class="container my-3">
        <ul class="list-group">

            <?php if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo $row['name'] ?>
                        <span class="badge bg-primary">New</span>
                    </li>
            <?php }
            } else $error = "Currently no company is recuritmenting";
            ?>


        </ul>
        <h1 class="text-center my-5 font-monospace text-dark fw-bold">OUR PARTNERS</h1>
        <section class="regular slider mb-5">
            <div>
                <img src="images/debut_infotech.png">
            </div>
            <div>
                <img src="images/ashriya_infotech.png">
            </div>
            <div>
                <img src="images/tcs.png">
            </div>
            <div>
                <img src="images/wipro.png">
            </div>
            <div>
                <img src="images/debut_infotech.png">
            </div>
            <div>
                <img src="images/ashriya_infotech.png">
            </div>
        </section>
    </div>
    <?php include '../../Components/Footer/Footer.php' ?>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="./js/slick.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).on('ready', function() {
            $(".vertical-center-4").slick({
                dots: true,
                vertical: true,
                centerMode: true,
                slidesToShow: 4,
                slidesToScroll: 2
            });
            $(".vertical-center-3").slick({
                dots: true,
                vertical: true,
                centerMode: true,
                slidesToShow: 3,
                slidesToScroll: 3
            });
            $(".vertical-center-2").slick({
                dots: true,
                vertical: true,
                centerMode: true,
                slidesToShow: 2,
                slidesToScroll: 2
            });
            $(".vertical-center").slick({
                dots: true,
                vertical: true,
                centerMode: true,
            });
            $(".vertical").slick({
                dots: true,
                vertical: true,
                slidesToShow: 3,
                slidesToScroll: 3
            });
            $(".regular").slick({
                dots: true,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3
            });
            $(".center").slick({
                dots: true,
                infinite: true,
                centerMode: true,
                slidesToShow: 5,
                slidesToScroll: 3
            });
            $(".variable").slick({
                dots: true,
                infinite: true,
                variableWidth: true
            });
            $(".lazy").slick({
                lazyLoad: 'ondemand', // ondemand progressive anticipated
                infinite: true
            });
        });
    </script>
    <script src="js/scroll.js"></script>
</body>

</html>