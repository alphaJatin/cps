  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once './config/db_con.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $department = $_POST['department'];
    $marks = $_POST['marks'];
    $degree = $_POST['degree'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO login (name, email, department, contact, username, password, 12th, graduation) 
          VALUES('$name','$email','$department','$contact','$username','$password','$marks','$degree')";

    if (!$con->query($query)) echo "Error:" . $conn->error;
  }
  ?>


  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Signup Page</title>
    <style>
      .divider:after,
      .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
      }

      .h-custom {
        height: calc(100% - 73px);
      }

      @media (max-width: 450px) {
        .h-custom {
          height: 100%;
        }
      }
    </style>
  </head>

  <body>

    <div class="container-fluid my-4">
      <?php include "Header.php" ?>
      <div class="row">
        <div class="col-md-12">

          <section class="vh-100">
            <div class="container-fluid h-custom">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                  <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                  <form action="" method="post">
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                      <p class="lead fw-normal mb-0 me-3">
                      <h1>Sign Up </h1>
                      </p>
                    </div>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example3">Name</label>
                      <input type="text" name="name" id="form3Example3" class="form-control form-control-lg" placeholder=" Enter Your Full Name" pattern="[A-Za-z]{3,10}" minlength="3" maxlength="25" />
                      <small>First name should be 3 to 10 characters long.</small>
                    </div>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example3">Email</label>
                      <input type="email" name="email" id="form3Example3" class="form-control form-control-lg" placeholder=" Enter Your Email" pattern="[0-9A-Za-z\._-]{3,}@[A-Za-z]{2,}\.[A-Za-z]{2,}" />
                      <small>Enter a valid email.</small>
                    </div>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example3">Department</label>
                      <select class="form-control" name="department">
                        <option>BCA</option>
                        <option>MCA</option>
                        <option>BBA</option>
                        <option>MBA</option>
                        <option>OTHER</option>
                      </select>

                    </div>
                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example3">Contact Number </label>
                      <input type="tel" id="form3Example3" name="contact" class="form-control form-control-lg" placeholder="Enter your Contact Number" />

                    </div>


                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example3">12th Marks</label>
                      <input type="text" name="marks" id="form3Example3" class="form-control form-control-lg" placeholder=" Enter 12th  Mark" />

                    </div>
                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example3"> Graduation Marks</label>
                      <input type="text" name="degree" id="form3Example3" class="form-control form-control-lg" placeholder=" Enter Graduation Marks" />

                    </div>
                    <!-- Username input -->
                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example3">Username</label>
                      <input type="text" id="form3Example3" name="username" class="form-control form-control-lg" placeholder="Enter a Your Username" />

                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example4">Password</label>
                      <input type="password" id="form3Example4" name="password" class="form-control form-control-lg" placeholder="Enter password" />

                    </div>

                    <!-- <div class="form-outline mb-3"> -->
                    <!-- <label class="form-label" for="form3Example4">ConfirmPassword</label> -->
                    <!-- <input type="password" id="form3Example4" name="repassword" class="form-control form-control-lg" placeholder="confirm password" /> -->

                    <!-- </div> -->

                    <!-- Password input -->

                    <div class="text-center text-lg-start mt-4 pt-2">
                      <button type="submit" name="signup" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Signup</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </section>
        </div>

      </div>
    </div>
    <?php include "components/Footer/Footer.php" ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>

  </html>