<?php
$error = $email  = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  session_start();
  require_once './config/db_con.php';
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "SELECT id,name,email,password FROM users where email='$email'";
  $result = $con->query($query);
  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if ($row['password'] === $password) {
      $_SESSION['id'] = $row['id'];
      $_SESSION['loggedIn'] = true;
      exit(header("Location: ./dashboard/index.php"));
    } else $error = 'Wrong password.';
  } else $error = 'Email is not registered.';
  $con->close();
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script>
    function validateLogin() {
      const ERROR = document.getElementsByClassName("error-msg");
      const email = login.email;
      const pass = login.password;

      if (email.value === "" || email.validity.patternMismatch) {
        ERROR[0].style.display = "inline-block";
        return false;
      } else ERROR[0].style.display = "none";
      if (pass.value === "") {
        ERROR[1].style.display = "inline-block";
        return false;
      } else ERROR[1].style.display = "none";

      return true;
    }
  </script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/1422ef591f.js" crossorigin="anonymous"></script>

  <title>Login Page</title>
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


    input:valid,
    textarea:valid {
      border: 2px solid lightgrey !important;
      border-radius: 5px;
    }

    small {
      display: none;
      color: #dc3545;
    }

    input:invalid {
      border: 2px solid #dc3545 !important;
      border-radius: 6px;
    }

    input:focus,
    select:focus,
    textarea:focus {
      box-shadow: none !important;
    }

    @media (max-width: 450px) {
      .h-custom {
        height: 100%;
      }
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
  <nav class="navbar navbar-expand-lg navbar-light shadow-sm p-1 mb-3 bg-body rounded">
    <div class="container-fluid">
      <a class="navbar-brand px-4" href="./index.php"><img src="./logo.png" alt="MAIMT" width="50px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 d-flex justify-content-evenly">
          <li class="nav-item px-3 py-2">
            <a class="nav-link fw-bold " aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item px-3 py-2">
            <a class="nav-link fw-bold " href="about.php">About Us</a>
          </li>
          <li class="nav-item px-3 py-2">
            <a class="nav-link fw-bold" href="Contact.php">Contact Us</a>
          </li>
          <li class="nav-item px-3 py-2">
            <a class="nav-link fw-bold active" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <section class="vh-100 py-5">
          <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center alig h-100">
              <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid" alt="Sample image">
              </div>
              <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" name="login" method="post" onsubmit="return validateLogin();">
                  <div class="text-center text-danger">
                    <h1>Log in </h1>
                  </div>
                  <div class="divider d-flex align-items-center my-4">
                  </div>

                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Email</label>
                    <input type="text" id="form3Example3" class="form-control form-control" placeholder="Enter a Your email" name="email" pattern="[0-9A-Za-z\._-]{3,}@[A-Za-z]{2,}\.[A-Za-z]{2,}" value="<?php echo $email ?>" />
                    <small class="error-msg">Please enter your email.</small>
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-3">
                    <label class="form-label" for="form3Example4">Password</label>
                    <input type="password" id="form3Example4" class="form-control" placeholder="Enter password" name="password" />
                    <small class="error-msg">Please enter your password.</small>
                  </div>

                  <div class="d-flex justify-content-between align-items-center">
                    <!-- Checkbox -->
                    <div class="form-check mb-0">
                      <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" checked />
                      <label class="form-check-label" for="form2Example3" checked>
                        Remember me
                      </label>
                    </div>
                    <a href="recover.php" class="text-body">Forgot password?</a>
                  </div>

                  <small class="error-msg w-100 d-block text-center pt-2"><?php echo $error ?></small>
                  <div class="text-center text-center mt-4 pt-2">
                    <input type="submit" class="btn btn-danger btn-md" value="LOGIN" style="padding-left: 2.5rem; padding-right: 2.5rem;" />
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="signup.php" class="link-danger">Register</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <?php include_once "./Components/Footer/Footer.php" ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>