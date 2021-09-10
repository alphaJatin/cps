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
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Student <b>Infomation</b></h2>
                    </div>
                       <div class="col-sm-7" align="right">
                       </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>                       
                        <th>Email</th>
                        <th>Department</th> 
                        <th>Mobile Number</th>
                        
                        <th>12th </th>
                        <th>Graduation</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>


        <?php
            include './config/db_con.php';
            $q="select * from login";
            
            $result=$con->query($q);
            while($res=$result->fetch_assoc())
            {

        ?>         


      <tr>
       
      <td> <?php echo $res['id'];?></td>
      <td> <?php echo $res['name'];?></td>
        <td><?php echo $res['email'];?></td>
        <td><?php echo $res['department'];?></td>
        <td><?php echo $res['contact'];?></td>
         <td><?php echo $res['12th'];?></td>
        <td><?php echo $res['graduation'];?></td>
        <td><?php echo $res['username'];?></td>
        <td><?php echo $res['password'];?></td>

        <td><a href="update.php?id=<?php echo  $res['id'];?>"class="view" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a><td>
        <td><button><a href="delete.php" class="delete" data-toggle="tootip"><i class="material-icons">&#xE872;</i></a></button></td>
        

       </tr>
    <?php
    }
    ?>
    
</body>
</html>