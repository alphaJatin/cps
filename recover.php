<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/1422ef591f.js" crossorigin="anonymous"></script>
  <title>Login Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
    }

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
  <nav class="navbar navbar-expand-lg navbar-light shadow-sm p-1 mb-3 bg-body rounded">
    <div class="container-fluid">
      <a class="navbar-brand px-4" href="./index.php"><img src="./img/logo.png" alt="MAIMT" width="50px"></a>
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
            <a class="nav-link fw-bold active" href="./recover.php">Recover</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
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
                <form>
                  <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                    <p class="lead fw-normal mb-0 me-3">
                    <h1>Password Recovery </h1>
                    </p>
                  </div>
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Username</label>
                    <input type="Email" id="form3Example3" aria-describedby="emailHelp" class="form-control form-control-lg" placeholder="Enter a Your Email" />
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-3">
                    <label class="form-label" for="form3Example4">Enter the New Password</label>
                    <input type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" />
                  </div>

                  <div class="text-center text-lg-start mt-4 pt-2 text-center">
                    <button type="button" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">submit</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <?php include "./footer.php" ?>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>