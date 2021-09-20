<?php
session_start();
include './config/db_con.php';
if (isset($_POST['submit'])) {
     $name = $_POST['name'];
     $email = $_POST['email'];
     $msg = $_POST['message'];

     $sql = "INSERT INTO `query`(`name`, `email`, `message`) 
     VALUES ('$name','$email','$msg')";

     if (!$con->query($sql)) echo "Error:" . $con->error;
     $con->close();
}
?>



<!DOCTYPE html>

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Contact</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="./css/contactstyle.css">
     <style>
          .nav-item a:hover {
               color: #dc3545 !important;
          }

          .active {
               color: #dc3545 !important;
          }

          #contact button#submit {
               background: #dc3545;
               color: white;
          }
     </style>
</head>

<body>
     <nav class="navbar navbar-expand-lg navbar-light shadow-sm p-1 mb-3 rounded">
          <div class="container-fluid">
               <a class="navbar-brand px-4" href="./index.php"><img src="./img/logo.png" alt="MAIMT" width="50px"></a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 d-flex justify-content-evenly">
                         <li class="nav-item px-3 py-2">
                              <a class="nav-link fw-bold" aria-current="page" href="./index.php">Home</a>
                         </li>
                         <li class="nav-item px-3 py-2">
                              <a class="nav-link fw-bold" href="./about.php">About Us</a>
                         </li>
                         <li class="nav-item px-3 py-2">
                              <a class="nav-link fw-bold active" href="./contact.php">Contact Us</a>
                         </li>
                         <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true) { ?>
                              <li class="nav-item px-3 py-2">
                                   <a class="nav-link fw-bold" href="./dashboard/<?php echo ($_SESSION['type'] === "admin") ? "admin/" : "student/"; ?>">Dashboard</a>
                              </li>
                              <li class="nav-item px-3 py-2">
                                   <a class="nav-link fw-bold" href="./logout.php">Logout</a>
                              </li>
                         <?php } else {  ?>
                              <li class="nav-item px-3 py-2">
                                   <a class="nav-link fw-bold" href="./login.php">Login</a>
                              </li>
                         <?php } ?>
                    </ul>
               </div>
          </div>
     </nav>
     <section id="contact" class="parallax-section py-3">
          <div class="container-fluid">
               <div class="row justify-content-evenly">

                    <div class="col-12 py-3">
                         <div class="text-center" data-wow-delay="0.2s">
                              <h1 style="letter-spacing: 2px;">GET IN TOUCH</h1>
                         </div>
                    </div>

                    <div class="col-md-5 px-5 px-sm-0">
                         <h3 class="py-3 text-dark text-center">Any query ?</h3>
                         <div class="wow fadeInUp " data-wow-delay="0.4s">
                              <form id="contact-form" class="row justify-content-center" action="" method="POST">
                                   <div class="col-sm-12">
                                        <input type="text" class="form-control" name="name" placeholder="Name" required="">
                                   </div>
                                   <div class="col-sm-12">
                                        <input type="email" class="form-control" name="email" placeholder="Email" required="">
                                   </div>
                                   <div class="col-sm-12 ">
                                        <textarea class="form-control" rows="5" name="message" placeholder="Message" required=""></textarea>
                                   </div>
                                   <div class="w-100"></div>
                                   <div class="col-md-5">
                                        <button id="submit" type="submit" class="form-control btn btn-sm" name="submit">Send Message</button>
                                   </div>
                              </form>
                         </div>
                    </div>

                    <div class="col-md-5 py-sm-5 py-md-0">
                         <!-- CONTACT INFO -->
                         <h3 class="py-3 text-dark text-center">Contact Info:</h3>
                         <div class="detail">
                              <h5 class="fw-bold">Mailling Address</h5>
                              <p class="text-muted"> Maharaja Agrasen Institute of Management and Technology,
                                   Near Agrasen Chowk, Old Saharanpur Road,
                                   (Adjacent to Sector-15, HUDA)
                                   Jagadhri-135003.
                              <p>
                              <h5 class="fw-bold">Office Tel. No.</h5>
                              <p class="text-muted"> +91-82229-48277
                                   <br>01732-235255
                              </p>
                              <h5 class="fw-bold">Email Directory</h5>
                              <ul class="text-muted">
                                   <li>Director: director@maimt.com</li>
                                   <li>Placement Cell: placement@maimt.com</li>
                                   <li>Department of Management: hodmgt@maimt.com</li>
                                   <li>Department of Computer Application: hodca@maimt.com </li>
                                   <li>Librarian: library@maimt.com</li>
                              </ul>
                         </div>
                    </div>
               </div>
          </div>
     </section>

     <?php include './Components/Footer/Footer.php' ?>
     <script src="https://kit.fontawesome.com/1422ef591f.js" crossorigin="anonymous"></script>
</body>

</html>