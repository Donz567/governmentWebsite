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

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Signup</h3>
            <div class="row">
               &nbsp; &nbsp;
              <div class="form-outline col-md-5 mb-4">
                <input type="text" id="form2Example18" class="form-control form-control-lg" name="firstn" required="" />
                <label class="form-label" for="form2Example18">Firstname</label>
              </div>
              &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="form-outline col-md-5 mb-4">
                <input type="text" id="form2Example18" class="form-control form-control-lg" name="lastn" required="" />
                <label class="form-label" for="form2Example18">Lastname</label>
              </div>
            </div>
            
            <div class="form-outline mb-4">
              <input type="text" id="form2Example18" class="form-control form-control-lg" name="usern" required=""  />
              <label class="form-label" for="form2Example18">Username</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example28" class="form-control form-control-lg" name="passw" required="" />
              <label class="form-label" for="form2Example28">Password</label>
            </div>

            <div class="pt-1 mb-4">
              <button class="btn btn-info btn-lg btn-block" type="submit" name="signup">Login</button>
            </div>

            
            <p>Already have an Account? <a href="admin_login.php" class="link-info">Login here</a></p>

          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="img/slide3.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>



    
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script src="lightbox/lightbox.min.js"></script>
   
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>