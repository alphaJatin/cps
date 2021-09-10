  <?php
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

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

    <?php include "./Header.php" ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <section class="vh-100">
            <div class="container-fluid h-custom">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                  <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                  <form action="" name="signup" method="post" onsubmit="return validateSignUp();">
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                      <p class="lead fw-normal text-center">
                      <h1 class="py-2">Sign Up </h1>
                      </p>
                    </div>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example3">Name</label>
                      <input type="text" name="name" id="form3Example3" class="form-control form-control" placeholder=" Enter Your Full Name" pattern="[A-Za-z\s]{3,25}" minlength="3" maxlength="25" />
                      <small class="error-msg">First name should be 3 to 10 characters long.</small>
                    </div>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example3">Email</label>
                      <input type="email" name="email" id="form3Example3" class="form-control form-control" placeholder=" Enter Your Email" pattern="[0-9A-Za-z\._-]{3,}@[A-Za-z]{2,}\.[A-Za-z]{2,}" />
                      <small class="error-msg">Enter a valid email.</small>
                    </div>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example3">Department</label>
                      <select class="form-control" name="department">
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
                      <input type="text" pattern="\d{10}" id="form3Example3" name="number" class="form-control form-control" placeholder="Enter your Contact Number" />
                      <small class="error-msg">Please, enter a valid phone number.</small>
                    </div>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example3">12th Marks</label>
                      <input type="text" name="marks12" id="form3Example3" pattern="\d{3}" class="form-control form-control" placeholder=" Enter 12th  Mark" />
                      <small class="error-msg">Please enter your 12th marks.</small>
                    </div>
                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example3"> Graduation Marks</label>
                      <input type="text" name="degreeMarks" id="form3Example3" pattern="\d{4}" class="form-control form-control" placeholder=" Enter Graduation Marks" />
                      <small class="error-msg">Please enter your graduation marks.</small>
                    </div>
                    <!-- Username input -->
                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example3">Username</label>
                      <input type="text" id="form3Example3" name="username" class="form-control form-control" placeholder="Enter a Your Username" pattern="[a-zA-z\._-]{3,15}" />
                      <small class="error-msg">Please enter a valid username.</small>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example4">Password</label>
                      <input type="password" id="form3Example4" name="password" class="form-control form-control" placeholder="Enter password" pattern=".{5,}" />
                      <small class="error-msg">Password should be minimum 5 character long.</small>
                    </div>

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
    <script src="./js/validation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>

  </html>