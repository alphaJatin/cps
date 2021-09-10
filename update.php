<?php
{
    include './config/db_con.php';
 $id=$_GET['id'];
$sql="SELECT * FROM login WHERE id = '$id';";
$data=$con->query($sql);

$show = $data->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once './config/db_con.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['number'];
    $department = $_POST['department'];
    $marks = $_POST['marks12'];
    $degree = $_POST['degreeMarks'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE `login` SET `name`='$name',`email`='$email',`department`='$department',`contact`='$contact',
    `username`='$username',`password`='$password',
    `12th`='$marks',`graduation`='$degree' WHERE id=$id";
    
    if (!$con->query($sql)) echo "Error:" . $conn->error;
    header('location:view.php');
  }
  
    

}
?>








<!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,500;1,200;1,400&display=swap");


      .font-sansSerif {
        font-family: sans-serif;
      }

      title {
        font-family: "Poppins", sans-serif;
      }

      input:valid {
        border: 2px solid lightgrey !important;
        border-radius: 5px;
      }

      small {
        display: none;
        color: red;
      }

      input:invalid {
        border: 2px solid red !important;
        border-radius: 6px;
      }

      input:focus,
      select:focus {
        box-shadow: none !important;
      }
    </style>

    <title>Signup Page</title>
  </head>

  <body>

    <?php include "./Header.php" ?>

    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center mb-4">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form action="" name="signup" method="post" onsubmit="return validateSignUp();">

            <div class="text-center text-primary .font-sansSerif">
              <h1 class="mt-3">Update Student Infomation</h1>
            </div>

            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example3">Name</label>
              <input type="text" name="name" id="form3Example3" class="form-control form-control" 
              placeholder=" Enter Your Full Name" pattern="[A-Za-z\s]{3,25}" minlength="3" maxlength="25" value="<?php echo $show['name'] ?>"/>
              <small class="error-msg">First name should be 3 to 10 characters long.</small>
            </div>

            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example3">Email</label>
              <input type="email" name="email" id="form3Example3" class="form-control form-control" placeholder=" Enter Your Email" 
              pattern="[0-9A-Za-z\._-]{3,}@[A-Za-z]{2,}\.[A-Za-z]{2,}" value="<?php echo $show['email'] ?>"/>
              <small class="error-msg">Enter a valid email.</small>
            </div>

            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example3">Department</label>
              <select class="form-control" name="department" value="<?php echo $show['department'] ?>">
                <option value="BCA" selected>BCA</option>
                <option value="MCA">MCA</option>
                <option value="BBA">BBA</option>
                <option value="MBA">MBA</option>
                <option value="OTHER">OTHER</option>
              </select>
              <small class="error-msg">Please select a option.</small>
            </div>

            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example3">Contact Number </label>
              <input type="text" pattern="\d{10}" id="form3Example3" name="number" 
              class="form-control form-control" placeholder="Enter your Contact Number" value="<?php echo $show['contact'] ?>"/>
              <small class="error-msg">Please, enter a valid phone number.</small>
            </div>

            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example3">12th Marks</label>
              <input type="text" name="marks12" id="form3Example3" 
              pattern="\d{3}" class="form-control form-control" placeholder=" Enter 12th  Mark" value="<?php echo $show['12th'] ?>"/>
              <small class="error-msg">Please enter your 12th marks.</small>
            </div>
            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example3"> Graduation Marks</label>
              <input type="text" name="degreeMarks" id="form3Example3" pattern="\d{4}" 
              class="form-control form-control" placeholder=" Enter Graduation Marks" value="<?php echo $show['graduation'] ?>"/>
              <small class="error-msg">Please enter your graduation marks.</small>
            </div>
            <!-- Username input -->
            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example3">Username</label>
              <input type="text" id="form3Example3" name="username" class="form-control form-control" 
              placeholder="Enter a Your Username" pattern="[a-zA-z\._-]{3,15}" value="<?php echo $show['username'] ?>"/>
              <small class="error-msg">Please enter a valid username.</small>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example4">Password</label>
              <input type="password" id="form3Example4" name="password" class="form-control 
              form-control" placeholder="Enter password" pattern=".{5,}" value="<?php echo $show['password'] ?>"/>
              <small class="error-msg">Password should be minimum 5 character long.</small>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" name="signup" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="./js/validation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php include_once "./Components/Footer/Footer.php" ?>
  </body>

  </html>