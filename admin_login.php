<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login</title>
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
     <link href="lightbox/lightbox.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<style>
  .forgot{
    position: absolute;
    display: none;
    justify-content: center;
    top:0;
    left:0;
    align-items: center;
    width: 100%;
    height: 100vh;
    background:rgba(0,0,0,0.8);
  }
  .itemforgot{
    
    padding:3rem;
    width: 40%;
    height: 45%;
    background-color: white;
  }
</style>
<body>
<?php
    if(@$_GET['Success']==true)
    {

      echo '<script type="text/javascript">Swal.fire({

        icon: "success",
        title: "Success",
        showConfirmButton: false,
        timer: 2800
      })</script>';


    }
    ?>
    <?php
    if(@$_GET['Error']==true)
    {



      echo '<script type="text/javascript">Swal.fire({

        icon: "error",
        title: "Error",
        showConfirmButton: false,
        timer: 2800
      })</script>';
      
    }
    if(@$_GET['Onetime']==true)
    {



      echo '<script type="text/javascript">Swal.fire({

        icon: "error",
        title: "You can only signup once.",
        showConfirmButton: false,
        timer: 2800
      })</script>';
      
    }
    if(@$_GET['Invalid']==true)
    {



      echo '<script type="text/javascript">Swal.fire({

        icon: "error",
        title: "Wrong Username or Password.",
        showConfirmButton: false,
        timer: 2800
      })</script>';
      
    }
    ?> 
<section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">
        <br><br>
        <div class="px-5 ms-xl-4 d-flex align-items-center">
          <img src="img/logo.png" alt="logo" style="width: 4rem;height: 4rem;">&nbsp;&nbsp;
          <span class="h1 fw-bold mb-0">Municipality of Oslob</span>
        </div>
        <br><br><br><br><br>
        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form method="post" action="admin_account.php" style="width: 23rem;">

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Welcome Admin</h3>

            <div class="form-outline mb-4">
              <input type="text" id="form2Example18" class="form-control form-control-lg" name="username" required="" />
              <label class="form-label" for="form2Example18">Username</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example28" class="form-control form-control-lg" name="password" required="" />
              <label class="form-label" for="form2Example28">Password</label>
            </div>

            <div class="pt-1 mb-4">
              <button class="btn btn-info btn-lg btn-block" type="submit" name="login">Login</button>
            </div>

            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#" id="btnfor">Forgot password?</a></p>
            <p>Don't have an account? <a href="admin_signup.php" class="link-info">Register here</a></p>

          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="img/slide3.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>

<div class="forgot">
  <div class="itemforgot">
    <i class="fas fa-times" style="color:#000; z-index: 999999;font-size: 1.5rem;position: absolute;right: 32%;top:30%;cursor: pointer;" id="close"></i>
     <h5>FORGOT PASSWORD</h5>
    

            <form method="post">
              <div class="form-outline mb-4">
                <input type="text" id="form2Example18" class="form-control form-control-lg" name="fname" required="" />
                <label class="form-label" for="form2Example18">Firstname</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" id="form2Example28" class="form-control form-control-lg" name="lname" required="" />
                <label class="form-label" for="form2Example28">Lastname</label>
              </div>
              <div class="pt-1 mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="forgot">Login</button>
              </div>
            </form>
  </div>
</div>
  
  <?php 



  include "db_connection.php";


  if(isset($_POST['forgot']))
  {

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];

  $query = mysqli_query($con,"SELECT * FROM adminaccount WHERE firstname='$fname' AND lastname='$lname'");

  if(mysqli_num_rows($query) > 0)
  {

      $getThepass = mysqli_query($con,"SELECT * FROM adminaccount");
      while($res=mysqli_fetch_array($getThepass))
      {
        $pass = $res['password'];
      }

      echo '<script>alert("Your pass: '.$pass.'"); </script>';
  }else{
    echo '<script>alert("Wrong input");</script>';
  }


  }
   ?>










    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script src="lightbox/lightbox.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
    <script>
      var btn2 = document.getElementById("btnfor");
       var modal2 = document.querySelector('.forgot');
       var span2 = document.getElementsByClassName("fa-times")[0];

       btn2.onclick = function() {
      modal2.style.display = "flex";
     
    }
      span2.onclick = function() {
      modal2.style.display = "none";
      
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal2.style.display = "none";
        
      }
    }
    </script>
</body>
</html>