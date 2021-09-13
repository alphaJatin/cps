<?php
$i = 1;
include '../../config/db_con.php';
$q = "SELECT * FROM student";
$result = $con->query($q);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student information data</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="table.css">
</head>

<body>
     <!-- ----------------------------- Admin-Panel ----------------------------- -->

     <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex justify-content-between px-4">
        <a class="navbar-brand ps-3" href="../../index.php">M A I M T</a>
        <div class="w-100 text-end">
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 " id="sidebarToggle" href="#!">
                <i class="fas fa-bars"></i>
            </button>
            <a class="text-decoration-none text-light" href="../logout.php">Logout</a>
        </div>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">MENU</div>
                        <a class="nav-link" href="./index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-check"></i>
                            </div>
                            Applied Students
                        </a>
                        <a class="nav-link" href="./view.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i>
                            </div>
                            View Students
                        </a>
          
                        <a class="nav-link bg-light text-dark" href="./addCompany.php">
                            <div class="sb-nav-link-icon text-dark"><i class="fas fa-building"></i>
                            </div>
                            Add Company
                        </a>
                    </div>
                </div>
            </nav>  
        </div>
    </div>
    <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="my-4">Student</h1>
                    <div class="card mb-4">
                        <!-- <div class="card-header"> <i class="fas fa-table me-1"></i> Students </div> -->
                        <div class="card-body">
                            <table id="datatablesSimple">
                                < <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Mobile Number</th>
                                <th>12th</th>
                                <th>Graduation</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>

                        <?php if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['department']; ?></td>
                                    <td><?php echo $row['phoneNumber']; ?></td>
                                    <td><?php echo $row['12th']; ?></td>
                                    <td><?php echo $row['graduation']; ?></td>
                                    <td><a href="update.php?id=<?php echo  $row['id']; ?>" class="view" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a></td>
                                    <td><button><a href="./delete.php?id=<?php echo $row['id']; ?>" class="delete" data-toggle="tootip"><i class="material-icons">&#xE872;</i></a></button></td>
                                </tr>
                            <?php }
                        } else { ?>
                        <tr>
                            <td class="text-center" colspan="8">No Data to Show.</td>
                        </tr>
                        <?php } ?>
                    </table>
                 </div>
            </div>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>