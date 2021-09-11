<!-- #delete post block varibles -->

<?php
session_start();
if (isset($_GET['id']) && $_SESSION['type'] == 'admin') {
  require_once './config/db_con.php';
  $id = $_GET['id'];
  $sql = "SELECT * FROM student WHERE id = '$id';";
  $result = ($con->query($sql))->fetch_assoc();
  $con->close();
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require_once './config/db_con.php';
  $name = $_POST['name'];
  $phoneNumber = $_POST['number'];
  $department = $_POST['department'];
  $marks12 = $_POST['marks12'];
  $graduation = $_POST['graduation'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "UPDATE users SET name='$name', email='$email', department='$department', phoneNumber='$phoneNumber', password='$password',
    12th='$marks12', graduation='$graduation' WHERE id=$id";
  if (!$con->query($sql)) echo "Error:" . $conn->error;
  else {
    $con->close();
    exit(header('location:./view.php'));
  }
} else exit(header("Location: ./login.php"));
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/1422ef591f.js" crossorigin="anonymous"></script>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,500;1,200;1,400&display=swap");

    .divider:after,
    .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
    }

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
      color: #dc3545;
    }

    input:invalid {
      border: 2px solid #dc3545 !important;
      border-radius: 6px;
    }

    input:focus,
    select:focus {
      box-shadow: none !important;
    }

    .nav-item a:hover {
      color: #dc3545 !important;
    }

    .active {
      color: #dc3545 !important;
    }
  </style>

  <title>update Page</title>
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
            <a class="nav-link fw-bold" href="about.php">About Us</a>
          </li>
          <li class="nav-item px-3 py-2">
            <a class="nav-link fw-bold" href="Contact.php">Contact Us</a>
          </li>
          <li class="nav-item px-3 py-2">
            <a class="nav-link fw-bold" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center mb-4">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" name="update" method="post" onsubmit="return validateUpdate();">

          <div class="text-center text-primary .font-sansSerif">
            <h1 class="mt-3 text-danger">Update Information</h1>
          </div>

          <div class="divider d-flex align-items-center my-4">
          </div>

          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example3">Name</label>
            <input type="text" name="name" id="form3Example3" class="form-control form-control" placeholder=" Enter Your Full Name" pattern="[A-Za-z\s]{3,25}" minlength="3" maxlength="25" value="<?php echo $result["name"]; ?>" />
            <small class="error-msg">First name should be 3 to 10 characters long.</small>
          </div>

          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example3">Department</label>
            <select class="form-control" name="department">
              <option value="">Select your department</option>
              <option value="BCA" <?php if ($result["department"] == 'BCA') echo 'selected';  ?>>BCA</option>
              <option value="MCA" <?php if ($result["department"] == 'MCA') echo 'selected'; ?>>MCA</option>
              <option value="BBA" <?php if ($result["department"] == 'BBA') echo 'selected'; ?>>BBA</option>
              <option value="MBA" <?php if ($result["department"] == 'MBA') echo 'selected'; ?>>MBA</option>
              <option value="OTHER" <?php if ($result["department"] == 'OTHER') echo 'selected'; ?>>OTHER</option>
            </select>
            <small class="error-msg">Please select a option.</small>
          </div>

          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example3">Contact Number </label>
            <input type="text" pattern="\d{10}" id="form3Example3" name="number" class="form-control form-control" placeholder="Enter your Contact Number" value="<?php echo $result["phoneNumber"]; ?>" />
            <small class="error-msg">Please, enter a valid phone number.</small>
          </div>

          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example3">12th Marks</label>
            <input type="text" value="<?php echo $result["12th"]; ?>" name="marks12" id="form3Example3" pattern="\d{3}" class="form-control form-control" placeholder=" Enter 12th  Mark" />
            <small class="error-msg">Please enter your 12th marks.</small>
          </div>
          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example3"> Graduation Marks</label>
            <input type="text" name="graduation" value="<?php echo $result["graduation"]; ?>" id="form3Example3" pattern="\d{4}" class="form-control form-control" placeholder=" Enter Graduation Marks" />
            <small class="error-msg">Please enter your graduation marks.</small>
          </div>

          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example3">Email</label>
            <input type="email" name="email" id="form3Example3" value="<?php echo $result["email"]; ?>" class="form-control form-control" placeholder=" Enter Your Email" pattern="[0-9A-Za-z\._-]{3,}@[A-Za-z]{2,}\.[A-Za-z]{2,}" />
            <small class="error-msg">Enter a valid email.</small>
          </div>

          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4">Password</label>
            <input type="password" id="form3Example4" name="password" class="form-control form-control" placeholder="Enter password" pattern=".{5,}" value="<?php echo $result["password"] ?>" />
            <small class="error-msg">Password should be minimum 5 character long.</small>
          </div>

          <div class="text-center text-center mt-4 py-2 ">
            <button type="submit" name="update" class="btn btn-danger" style="padding-left: 2.5rem; padding-right: 2.5rem;">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <?php include_once "./Components/Footer/Footer.php" ?>
  <script>
    function validateUpdate() {
      const ERROR = document.getElementsByClassName("error-msg");
      const name = update.name;
      const email = update.email;
      const department = update.department;
      const number = update.number;
      const marks12 = update.marks12;
      const graduation = update.graduation;
      const username = update.username;
      const pass = update.password;

      if (name.value === "" || name.validity.patternMismatch) {
        ERROR[0].style.display = "inline-block";
        return false;
      } else ERROR[0].style.display = "none";
      if (department.value === "") {
        ERROR[1].style.display = "inline-block";
        return false;
      } else ERROR[1].style.display = "none";
      if (number.value === "" || number.validity.patternMismatch) {
        ERROR[2].style.display = "inline-block";
        return false;
      } else ERROR[2].style.display = "none";
      if (marks12.value === "" || marks12.validity.patternMismatch) {
        ERROR[3].style.display = "inline-block";
        return false;
      } else ERROR[3].style.display = "none";
      if (graduation.value === "" || graduation.validity.patternMismatch) {
        ERROR[4].style.display = "inline-block";
        return false;
      } else ERROR[4].style.display = "none";
      if (email.value === "" || email.validity.patternMismatch) {
        ERROR[5].style.display = "inline-block";
        return false;
      } else ERROR[5].style.display = "none";
      if (pass.value === "" || pass.validity.patternMismatch) {
        ERROR[6].style.display = "inline-block";
        return false;
      } else ERROR[6].style.display = "none";

      return true;
    }
  </script>
</body>

</html>