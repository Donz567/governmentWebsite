<?php 
include ('db_connection.php');
session_start();

$user = $_SESSION['User'];
if($user=="")
    {
        exit("Please Login!");
    }
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Admin-Covid Cases</title>
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
 	<link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
     <link href="lightbox/lightbox.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
 </head>
 <style type="text/css">
 	#profile{
 		background:transparent;
 	}
 	#profile-details{
 		position: absolute;
 		right: 0;
 		width: 25%;
 		height: 70%;
 		background-color: #fff;
 		overflow: hidden;
 		box-shadow: 0 0 30px #888;
 	}
 	.profileedit{
 		 position: fixed;
	   top:0; left:0;
	   min-height: 100vh;
	   width: 100%;
	   background: rgba(0,0,0,0.8);
	   display: none;
	   align-items: center;
	   justify-content: center;
	   z-index: 99999;
 	}
 	.profileedit .edit-details{
	   padding:2rem;
	   
	   background: #fff;
	   position: relative;
	   margin:2rem;
	   width: 50%;
	   height: 95vh;
	   font-size: 18px;
 	}
  .fa-times{
    cursor: pointer;
  }
 </style>
 <body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  	<a class="navbar-brand lows" href="#!" style="font-size: 20px;"><img src="img/logo.png" style="width: 50px;height: 50px;"><span class="cng">Municipality of Oslob</span></a>
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav d-flex align-items-center  ms-auto">
          <li class="nav-item"><a href="admin_main.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="admin_manage.php" class="nav-link">Manage</a></li>
          <li class="nav-item"><a href="jobhiring.php" class="nav-link">Job Hiring</a></li>
          <li class="nav-item"><a href="covidcasesinput.php" class="nav-link">Covid Cases</a></li>
		      <!-- Avatar -->
		      <li class="nav-item dropdown">
		        <a
		          class="nav-link dropdown-toggle d-flex align-items-center"
		          href="#"
		          id="navbarDropdownMenuLink"
		          role="button"
		          data-mdb-toggle="dropdown"
		          aria-expanded="false"
		        >
		         <i class="fas fa-user-circle" loading="lazy" style="font-size: 2rem;color:#a902fd"></i>
		        </a>
		        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		          <li>
		            <a class="dropdown-item" type="button" id="modal1">My profile</a>
		          </li>
		          
		          <li>
		            <a class="dropdown-item" href="logout.php?Logout=<?php echo $user;?>">Logout</a>
		          </li>
		        </ul>
		      </li>
		      
		    </ul>
	</div>
  </div>
</nav>

<!-- moda here -->
<div class="products-preview" id="profile">

   <div class="preview" id="profile-details">
      <i class="fas fa-times" style="color:#000; z-index: 999999;font-size: 1.5rem;" id="close"></i>
      <br>
      <div class="container h-70">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 ">

        <div class="card" style="border-radius: 15px;">
          <div class="card-body text-center">
            <div class="mt-3 ">
              <img src="img/profile.png"
                class="rounded-circle img-fluid" style="width: 100px;height: 100px;" />
            </div>
            <h4 class="mb-2"><?php 
           		 $_SESSION['User'];
            	$query = mysqli_query($con,"SELECT * FROM adminaccount");
            	 while($res = mysqli_fetch_assoc($query)){
            	 	echo $res['firstname']." ".$res['lastname'];
            	 }



             ?></h4>
            <p class="text-muted mb-4" style="font-size: 14px;">@<?php echo $_SESSION['User']; ?></p>
            <div class="mb-4 pb-2">
              <button type="button" class="btn btn-primary" id="edit-profile">
                EDIT PROFILE
              </button>
             
            </div>
           
          </div>
        </div>

      </div>
    </div>
  </div>


   </div>

</div>

<!-- modal end here -->

<!-- modal edit profile -->

<div class="profileedit justify-content-center">
	<div class="edit-details">
		<i class="fas fa-times" style="color:#000; z-index: 999999;font-size: 1.5rem;" id="close"></i>
		<div class="container-fluid d-flex justify-content-center flex-column">
			<?php 
			$user=$_SESSION['User'];

			$query=mysqli_query($con,"SELECT * FROM adminaccount WHERE username='$user'");
			while($res = mysqli_fetch_assoc($query))
            {

			?>
			
			
			<form method="post" action="admin_account.php">
			<h4>UPDATE PROFILE</h4>
			<br>
            <div class="row">
               &nbsp; &nbsp;
              <div class="form-outline col-md-5 mb-4">
                <input type="text" id="form2Example18" class="form-control form-control-lg" name="firstn" value="<?php echo $res['firstname']; ?>" required="" />
                <label class="form-label" for="form2Example18">Firstname</label>
              </div>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="form-outline col-md-5 mb-4">
                <input type="text"  value="<?php echo $res['lastname']; ?>" id="form2Example18" class="form-control form-control-lg" name="lastn" required="" />
                <label class="form-label" for="form2Example18">Lastname</label>
              </div>
            </div>
            
            <div class="form-outline mb-4">
              <input type="text"  value="<?php echo $res['username']; ?>" id="form2Example18"  class="form-control form-control-lg" name="usern" required=""  />
              <label class="form-label" for="form2Example18">Username</label>
            </div>

            
            <div class="pt-1 mb-4">
              <button class="btn btn-info btn-lg btn-block" type="submit" name="edit">Save Changes</button>
            </div>
             </form>

             <div class="pt-1 mb-4">
              <button class="btn btn-danger btn-lg btn-block" type="button" id="openmodal2">Change Password</button>
            </div>
          
          <form method="post" action="admin_account.php" >
             
          		<div class="open" id="openpass" style="display: none;">
    	      		<div class="form-outline mb-4">
    	              <input type="password" id="form2Example28" class="form-control form-control-lg" name="newpassw" />
    	              <label class="form-label" for="form2Example28">New Password</label>
    	            </div>
    	            <div class="form-outline mb-4">
    	              <input type="password" id="form2Example28" class="form-control form-control-lg" name="oldpassw" />
    	              <label class="form-label" for="form2Example28">Old Password</label>	
    		      	</div>
    		      	<div class="pt-1 mb-4">
    	              <button class="btn btn-danger btn-lg btn-block" type="submit" name="changepass">Submit</button>
    	            </div>
    	      	</div>
            
          </form>

      <?php } ?>
      	
		</div>
	</div>
</div>

<!-- modal edit profile end -->









<!-- main content -->

<div class="container">
	<br><br>
	<h4 class="mb-5 text-center"><strong>Enter Cases</strong></h4>
<br><br>
        <div class="row d-flex justify-content-center">
          <div class="row mb-3">
            <div class="col-md-6 text-center" style="font-size: 1.5rem;font-weight: bold;">
              Covid Cases
            </div>
            <div class="col-md-6 text-center" style="font-size: 1.5rem;font-weight: bold;">
              Dengue Cases
            </div>
          </div>
          <form action="" method="post">
            <div class="row">
          <?php
    $brgynames = array("Alo","Bangcogon","Bonbon","Calumpang","Cañang","Canangcaan","Cansaloay","Can-ukban","Daanlungsod","Gawi","Hagdan","Lagunde","Looc","Luka","Mainit","Manlum","Nueva Caceres","Poblacion","Pungtod","Tan-awan","Tumalog");
    $li = count($brgynames);
     
      
    for($j=0;$j<$li;$j++)
    {
      $bnames = $brgynames[$j];
      $in = $j+1;
      echo '<div class="col-md-2 mb-2">';
      echo '<input class="form-control" name="rec'.$in.'"  type="number" placeholder="Enter covid cases of '.$bnames.'" aria-label="default input example"></div>';
     
      echo '<div class="col-md-2 mb-2"><input class="form-control" name="tot'.$in.'"  type="number" placeholder="Enter death cases of '.$bnames.'" aria-label="default input example"></div>';
      echo '<div class="col-md-2 mb-2"><input class="form-control" name="recs'.$in.'"  type="number" placeholder="Enter recovered cases of '.$bnames.'" aria-label="default input example"></div>';
      echo '<div class="col-md-3 mb-2">';
      echo '<input class="form-control" name="recc'.$in.'"  type="number" placeholder="Enter dengue cases of '.$bnames.'" aria-label="default input example"></div>';
     
      echo '<div class="col-md-3 mb-2"><input class="form-control" name="tott'.$in.'"  type="number" placeholder="Enter dengue death cases of '.$bnames.'" aria-label="default input example"></div>';
       
    }
   
  ?>
  </div>
  <div class="row">
    <button class="submit" class="btn btn-primary mt-5" name="submit">SUBMIT</button>
    </div>
  </form>

  <hr class="my-4">
  <div class="row">
    <div class="col-md-6">
      <form action="" method="post">
        <div class="form-outline mb-4">
                  <input type="number" id="form2Example18"  class="form-control form-control-lg" name="active" required=""  />
                  <label class="form-label" for="form2Example18">Active Case</label>
        </div>
        <button class="btn btn-danger" type="submit" name="activecases">submit</button>
      </form>
      <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
                  <input type="text" id="form2Example18"  class="form-control form-control-lg" name="brgyname" required=""  />
                  <label class="form-label" for="form2Example18">BRGY NAME</label>
        </div>
        <div class="form-outline mb-4">
                  <input type="number" id="form2Example18"  class="form-control form-control-lg" name="recover" required=""  />
                  <label class="form-label" for="form2Example18">Recovery</label>
        </div>
        <button class="btn btn-info" type="submit" name="newrecovery">submit</button>
      </form>
      <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
                  <input type="text" id="form2Example18"  class="form-control form-control-lg" name="brgyname" required=""  />
                  <label class="form-label" for="form2Example18">BRGY NAME</label>
        </div>
        <div class="form-outline mb-4">
                  <input type="number" id="form2Example18"  class="form-control form-control-lg" name="deaths" required=""  />
                  <label class="form-label" for="form2Example18">Death</label>
        </div>
        <button class="btn btn-warning" type="submit" name="newdeath">submit</button>
      </form>
    </div>
    <div class="col-md-6">
      <h4>BRGY NEW CASE</h4>
      <form action="" method="post">
        <div class="form-outline mb-4">
                  <input type="text" id="form2Example18"  class="form-control form-control-lg" name="brgyname" required=""  />
                  <label class="form-label" for="form2Example18">BRGY NAME</label>
        </div>
        <div class="form-outline mb-4">
                  <input type="number" id="form2Example18"  class="form-control form-control-lg" name="newcase" required=""  />
                  <label class="form-label" for="form2Example18">New Case</label>
        </div>
        <button class="btn btn-danger" type="submit" name="newcasebtn">submit</button>
      </form>
    </div>
  </div>
  
  
        </div>
</div>



<?php 

include "db_connection.php";

if(isset($_POST['submit']))
{
    $rec1 = $_POST['rec1'];
    $rec2 = $_POST['rec2'];
    $rec3 = $_POST['rec3'];
    $rec4 = $_POST['rec4'];
    $rec5 = $_POST['rec5'];
    $rec6 = $_POST['rec6'];
    $rec7 = $_POST['rec7'];
    $rec8 = $_POST['rec8'];
    $rec9 = $_POST['rec9'];
    $rec10 = $_POST['rec10'];
    $rec11 = $_POST['rec11'];
    $rec12 = $_POST['rec12'];
    $rec13 = $_POST['rec13'];
    $rec14 = $_POST['rec14'];
    $rec15 = $_POST['rec15'];
    $rec16 = $_POST['rec16'];
    $rec17 = $_POST['rec17'];
    $rec18 = $_POST['rec18'];
    $rec19 = $_POST['rec19'];
    $rec20 = $_POST['rec20'];
    $rec21 = $_POST['rec21'];


    $tot1 = $_POST['tot1'];
    $tot2 = $_POST['tot2'];
    $tot3 = $_POST['tot3'];
    $tot4 = $_POST['tot4'];
    $tot5 = $_POST['tot5'];
    $tot6 = $_POST['tot6'];
    $tot7 = $_POST['tot7'];
    $tot8 = $_POST['tot8'];
    $tot9 = $_POST['tot9'];
    $tot10 = $_POST['tot10'];
    $tot11 = $_POST['tot11'];
    $tot12 = $_POST['tot12'];
    $tot13 = $_POST['tot13'];
    $tot14 = $_POST['tot14'];
    $tot15 = $_POST['tot15'];
    $tot16 = $_POST['tot16'];
    $tot17 = $_POST['tot17'];
    $tot18 = $_POST['tot18'];
    $tot19 = $_POST['tot19'];
    $tot20 = $_POST['tot20'];
    $tot21 = $_POST['tot21'];

    $recs1 = $_POST['recs1'];
    $recs2 = $_POST['recs2'];
    $recs3 = $_POST['recs3'];
    $recs4 = $_POST['recs4'];
    $recs5 = $_POST['recs5'];
    $recs6 = $_POST['recs6'];
    $recs7 = $_POST['recs7'];
    $recs8 = $_POST['recs8'];
    $recs9 = $_POST['recs9'];
    $recs10 = $_POST['recs10'];
    $recs11 = $_POST['recs11'];
    $recs12 = $_POST['recs12'];
    $recs13 = $_POST['recs13'];
    $recs14 = $_POST['recs14'];
    $recs15 = $_POST['recs15'];
    $recs16 = $_POST['recs16'];
    $recs17 = $_POST['recs17'];
    $recs18 = $_POST['recs18'];
    $recs19 = $_POST['recs19'];
    $recs20 = $_POST['recs20'];
    $recs21 = $_POST['recs21'];

    $recc1 = $_POST['recc1'];
    $recc2 = $_POST['recc2'];
    $recc3 = $_POST['recc3'];
    $recc4 = $_POST['recc4'];
    $recc5 = $_POST['recc5'];
    $recc6 = $_POST['recc6'];
    $recc7 = $_POST['recc7'];
    $recc8 = $_POST['recc8'];
    $recc9 = $_POST['recc9'];
    $recc10 = $_POST['recc10'];
    $recc11 = $_POST['recc11'];
    $recc12 = $_POST['recc12'];
    $recc13 = $_POST['recc13'];
    $recc14 = $_POST['recc14'];
    $recc15 = $_POST['recc15'];
    $recc16 = $_POST['recc16'];
    $recc17 = $_POST['recc17'];
    $recc18 = $_POST['recc18'];
    $recc19 = $_POST['recc19'];
    $recc20 = $_POST['recc20'];
    $recc21 = $_POST['recc21'];


    $tott1 = $_POST['tott1'];
    $tott2 = $_POST['tott2'];
    $tott3 = $_POST['tott3'];
    $tott4 = $_POST['tott4'];
    $tott5 = $_POST['tott5'];
    $tott6 = $_POST['tott6'];
    $tott7 = $_POST['tott7'];
    $tott8 = $_POST['tott8'];
    $tott9 = $_POST['tott9'];
    $tott10 = $_POST['tott10'];
    $tott11 = $_POST['tott11'];
    $tott12 = $_POST['tott12'];
    $tott13 = $_POST['tott13'];
    $tott14 = $_POST['tott14'];
    $tott15 = $_POST['tott15'];
    $tott16 = $_POST['tott16'];
    $tott17 = $_POST['tott17'];
    $tott18 = $_POST['tott18'];
    $tott19 = $_POST['tott19'];
    $tott20 = $_POST['tott20'];
    $tott21 = $_POST['tott21'];

    $brgynames = array("Alo","Bangcogon","Bonbon","Calumpang","Cañang","Canangcaan","Cansaloay","Can-ukban","Daanlungsod","Gawi","Hagdan","Lagunde","Looc","Luka","Mainit","Manlum","Nueva Caceres","Poblacion","Pungtod","Tan-awan","Tumalog");
    $limit = count($brgynames);

     for($i=0;$i<$limit;$i++)
    {

    $bname = $brgynames[$i];
    $b = $i+1;
    $activec = ${"rec$b"};
    $totdeath = ${"tot$b"};
    $recover = ${"recs$b"};
     $denactive = ${"recc$b"};
    $dendeath = ${"tott$b"};
    $query = mysqli_query($con,"INSERT INTO covidanddenguecases(brgy_name,brgy_covidcases,brgy_deathcases,brgy_recovered,brgy_denguecases,brgy_denguedeath) VALUES('$bname','$activec','$totdeath','$recover','$denactive','$dendeath')");
    }


    if($query)
    {
    echo '<script>alert("Success");window.location.href="covidcasesinput.php";</script>';
   }
  else{
    echo '<script>alert("Error");window.location.href="covidcasesinput.php";</script>';  
    }

}

if(isset($_POST['activecases']))
{
  $active = $_POST['active'];


  $query = mysqli_query($con,"INSERT INTO activecases (activeCase)VALUES('$active')");

 

   if($query)
    {
    echo '<script>alert("Success");window.location.href="covidcasesinput.php";</script>';
   }
  else{
    echo '<script>alert("Error");window.location.href="covidcasesinput.php";</script>';  
    }
}

if(isset($_POST['newcasebtn']))
{
  $brgyname = $_POST['brgyname'];
  $newcase = $_POST['newcase'];



  $query = mysqli_query($con,"SELECT * FROM covidanddenguecases WHERE brgy_name='$brgyname'"); 
  while ($re = mysqli_fetch_assoc($query)) {
    $brgya = $re['brgy_covidcases'];
  }
  $upnewcase = $brgya + $newcase;

  $secq = mysqli_query($con,"UPDATE covidanddenguecases SET brgy_covidcases='$upnewcase' WHERE brgy_name='$brgyname'");

  if($secq)
  {

  $query = mysqli_query($con,"INSERT INTO activecases (activeCase)VALUES('$newcase')");
  echo '<script>alert("Success");window.location.href="covidcasesinput.php";</script>';
   }
  else{
    echo '<script>alert("Error");window.location.href="covidcasesinput.php";</script>';  
    }
}

if(isset($_POST['newrecovery']))
{
  $brgyname = $_POST['brgyname'];
  $newrecover = $_POST['recover'];

  $query = mysqli_query($con,"SELECT * FROM covidanddenguecases WHERE brgy_name='$brgyname'"); 
  while ($re = mysqli_fetch_assoc($query)) {
    $brgya = $re['brgy_recovered'];
  }
  $upnewcase = $brgya + $newrecover;

  $secq = mysqli_query($con,"UPDATE covidanddenguecases SET brgy_recovered='$upnewcase' WHERE brgy_name='$brgyname'");

  if($secq)
  {
    $negats = -1 * $newrecover;
    $query = mysqli_query($con,"INSERT INTO activecases (activeCase)VALUES('$negats')");
  echo '<script>alert("Success");window.location.href="covidcasesinput.php";</script>';
   }
  else{
    echo '<script>alert("Error");window.location.href="covidcasesinput.php";</script>';  
    }
}
if(isset($_POST['newrecovery']))
{
  $brgyname = $_POST['brgyname'];
  $newd = $_POST['newdeath'];

  $query = mysqli_query($con,"SELECT * FROM covidanddenguecases WHERE brgy_name='$brgyname'"); 
  while ($re = mysqli_fetch_assoc($query)) {
    $brgya = $re['brgy_deathcases'];
  }
  $upnewcase = $brgya + $newd;

  $secq = mysqli_query($con,"UPDATE covidanddenguecases SET brgy_deathcases='$upnewcase' WHERE brgy_name='$brgyname'");

  if($secq)
  {
    $negats = -1 * $newrecover;
    $query = mysqli_query($con,"INSERT INTO activecases (activeCase)VALUES('$negats')");
  echo '<script>alert("Success");window.location.href="covidcasesinput.php";</script>';
   }
  else{
    echo '<script>alert("Error");window.location.href="covidcasesinput.php";</script>';  
    }
}

 ?>


<!-- main content -->

<br><br><br>
<!--Footer-->
  <footer class="bg-light text-lg-start">
    

    <hr class="m-0" />



    <div class="text-center py-4 align-items-center">
      <p>Follow us on social media</p>
      <a href="https://www.facebook.com/mdbootstrap" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://twitter.com/MDBootstrap" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="https://github.com/mdbootstrap/mdb-ui-kit" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-instagram"></i>
      </a>
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Copyright:
      <img src="img/logo.png" style="width: 30px;height: 30px;"><a class="text-dark" href="#" style="margin-left: 5px;"><b>Municipality of Oslob</b></a>
    </div>
    <!-- Copyright -->

  </footer>
  <!--Footer-->



<script type="text/javascript" src="js/mdb.min.js"></script>
<script src="lightbox/lightbox.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="js/script.js"></script>


<script>
	   var modal = document.getElementById("profile");
    var btn = document.getElementById("modal1");
    var span = document.getElementsByClassName("fa-times")[0];

    var modal2 = document.querySelector('.profileedit');
    var span2 = document.getElementsByClassName("fa-times")[1];
    var btn2 = document.getElementById("edit-profile");

    btn.onclick = function() {
      modal.style.display = "block";
     document.getElementById("profile-details").style.display="block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
      document.getElementById("profile-details").style.display="none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
        document.getElementById("profile-details").style.display="none";
      }
    }


    btn2.onclick = function() {
      modal2.style.display = "flex";
      modal.style.display = "none";
    }
    span2.onclick = function() {
      modal2.style.display = "none";
      
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal2.style.display = "none";
        
      }
    }

       $(document).ready(function(){
		  $("#openmodal2").click(function(){
		    $("#openpass").toggle();
		  });
		});




    function countChar(val) {
    var len = val.value.length;
    if (len >= 600) {
      val.value = val.value.substring(0, 600);
    } else {
      $('#charNum').text(600 - len);
    }
  };

</script>
 </body>
 </html>