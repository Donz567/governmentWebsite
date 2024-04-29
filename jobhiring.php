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
 	<title>Admin-Dashboard</title>
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
  	<a class="navbar-brand" href="#" style="font-size: 20px;"><img src="img/logo.png" style="width: 50px;height: 50px;">Municipality of Oslob</a>
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: ">
		    <ul class="navbar-nav d-flex align-items-center  ms-auto">
          <li class="nav-item"><a href="admin_main.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="admin_manage.php" class="nav-link">Manage</a></li>
          <li class="nav-item"><a href="admin_manage.php" class="nav-link">Job Hiring</a></li>
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
	<h4 class="mb-5 text-center"><strong>POST JOBS</strong></h4>
<br><br>
        <div class="row d-flex justify-content-center">
          <div class="col-md-6">
            <form method="post" action="newsUpdates.php" enctype="multipart/form-data">

              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                   <input type="file" name="file" class="form-control"  id="customFile" />
                  </div>
                </div>
              </div>
              <div class="row mb-4">
              <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form3Example1" name="jobtitle" class="form-control" />
                    <label class="form-label" for="form3Example1">Enter Job Title</label>
                  </div>

                </div>

             </div>
             <div class="form-outline  mb-4">
                    <input type="text" id="form3Example1" name="link" class="form-control" />
                    <label class="form-label" for="form3Example1">Enter Link Source</label>
              </div>
              <div class="form-outline">
                <textarea class="form-control" id="textAreaExample" onkeyup="countChar(this)" name="jobdesc" rows="4"></textarea>
                <label class="form-label" for="textAreaExample">Enter Job Description</label>
                
              </div>
              <div id="charNum" class="d-flex justify-content-end">600</div>
              <br><br>

              <!-- Submit button -->
              <button type="submit" name="submits" class="btn btn-primary btn-block mb-4">
                Submit
              </button>

              
            </form>
          </div>
        </div>
</div>


<div class="container">
  <br><br>
  
<br><br>
      <h5>JOB HIRING:</h5><br>
      <div class="row">
        <div class="col-md-12 gx-5 mb-4 d-flex flex-column">
          <!-- code here  -->





            <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
              <tr>
                <th>Img</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php 

              include 'db_connection.php';

              $query = mysqli_query($con,"SELECT * FROM jobhiring");
              if(mysqli_num_rows($query) > 0)
              {

              while($res = mysqli_fetch_assoc($query))
              {
                


             ?>
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img
                        src="<?php echo $res['img']; ?>"
                        alt=""
                        style="width: 45px; height: 45px"
                        
                        />
                    
                    </div>
                  </div>
                </td>
                <td>
                  <p class="fw-normal mb-1"><?php echo $res['jobtitle']; ?></p>
                  
                </td>
                <td><p class="fw-normal mb-1"><?php echo $res['jobdescription']; ?></p></td>
                <td>
                  <span class="badge badge-success rounded-pill d-inline"><?php echo $res['status']; ?></span>
                </td>
                
                <td>
                  <form method="post">
                    <input type="hidden" value="<?php echo $res['id']; ?>" name="id">
                    <button type="submit" name="stat" class="btn btn-link btn-sm btn-rounded">
                      REMOVE
                    </button>
                  </form>
                </td>
              </tr>
            <?php } }else{
              echo "<td colspan='5'>No jobs available</td>";
            } ?>
              
            </tbody>
          </table>
        </div>
      </div>
</div>

<?php 
include "db_connection.php";

if(isset($_POST['stat']))
{
  $id = $_POST['id'];
  $query = mysqli_query($con,"UPDATE jobhiring SET status='inactive' WHERE id='$id'");
  if($query)
  {
    echo '<script>alert("Successfully Updated");window.location.href="jobhiring.php";</script>';
  }else{
      echo '<script>alert("Failed to Update");window.location.href="jobhiring.php";</script>';
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