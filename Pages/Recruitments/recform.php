<html>
    <head>
        <link rel="stylesheet" href="./css/recform.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
     <?php include '../../Components/Header/Header.php';?>
    </head>
   <body>
<div class="container d-flex justify-content-center align-items-center">
    <div class="card">
        <div class="row">
            <div class="col-md-6">
                <div class="form">
                    <h2>ADD COMPANY</h2>
                    <div class="inputbox mt-3"> <span>Company Name </span> 
                    <input type="text" placeholder="Name" name="cname" class="form-control"> </div>
                    <div class="inputbox mt-3"> <span>Experience Required </span> 
                    <input type="text" placeholder="0-5" name="expe" class="form-control"> </div>
                    <div class="inputbox mt-3"> <span>Anual Pakage </span> 
                    <input type="text" placeholder="2.4 " name="anual" class="form-control"> </div>
                   <div class="inputbox mt-3"> <span>Location </span>
                   <input type="text" placeholder="Chandigrh" class="form-control" name="location"></div>
                   <div class="inputbox mt-3"> <span>Date of campus</span>
                   <input type="date" name="date" class="form-control"> </div>
                   <div class="form-check mt-2"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> I agree to the terms and conditions of <a href="" class="login">Privacy & Policy</a> </label> </div>
                </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-right"> <button class="btn btn-success register btn-block">Register</button> </div></div>
                    
            </div>
            <div class="col-md-6">
                <div class="text-center mt-5"> <img src="https://i.imgur.com/98GXnDD.png" width="400"> </div>
            </div>
        </div>
    </div>
</div>
<?php include '../../Components/Footer/Footer.php';?>
</body>
</html>