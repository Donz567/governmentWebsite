<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Municipality of Oslob | Contact Us</title>
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
      #intro {
        background-image: url("img/bgoslob.jpg");
        height: 90vh;
      }

      /* Height for devices larger than 576px */
      @media (min-width: 992px) {
        #intro {
          margin-top: -58.59px;
        }
      }
      .reveal{
      	position: relative;
      	transform: translateY(150px);
      	opacity: 0;
      	transition: all 1s ease;
      }
      .reveal.active{
      	transform: translateY(0px);
      	opacity: 1;
      }
      /*****************************
      * horizontal news ticker
      ******************************/

      .ticker-wrapper-h{
        display: flex;  
        position: relative;
        overflow: hidden;
        border: 1px solid #1c6547;
      }

      .ticker-wrapper-h .heading{
        background-color: blue;
        color: #fff;
        padding: 5px 10px;
        flex: 0 0 auto;
        z-index: 1000;
      }
      .ticker-wrapper-h .heading:after{
        content: "";
        position: absolute;
        top: 0;
        border-left: 20px solid blue;
        border-top: 17px solid transparent;
        border-bottom: 15px solid transparent;
      }


      .news-ticker-h{
        display: flex;
        margin:0;
        padding: 0;
        padding-left: 90%;
        z-index: 999;
        
        animation-iteration-count: infinite;
        animation-timing-function: linear;
        animation-name: tic-h;
        animation-duration: 30s;
        
      }
      .news-ticker-h:hover { 
        animation-play-state: paused; 
      }

      .news-ticker-h li{
        display: flex;
        width: 100%;
        align-items: center;
        white-space: nowrap;
        padding-left: 20px;
      }

      .news-ticker-h li a{
        color: #212529;
        font-weight: bold;
      }

      @keyframes tic-h {
        0% {
          -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
          visibility: visible;
        }
        100% {
          -webkit-transform: translate3d(-100%, 0, 0);
          transform: translate3d(-100%, 0, 0);
        }
      }
      
    </style>
<body>
	<!--Main Navigation-->
  <header>
    

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-scroll text-dark">
    <div class="container">
       <a class="navbar-brand lows" href="#!" style="font-size: 25px;"><img class="logos" src="img/logo.png" style="width: 80px;height: 80px;"><span class="cng">Municipality of Oslob</span></a>
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tourism.php">Tourism</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="government.php">Government</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="transparency.php">Transparency</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="covidcases.php">Health Bulletin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active"  style="color:#CFD2CF;" href="contactus.php">Contact Us</a>
          </li>
        </ul>
        <ul class="navbar-nav d-flex flex-row">
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" target="_blank" href="https://www.facebook.com/bangonoslob">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" target="_blank" href="https://instagram.com/municipalityofoslob?igshid=YmMyMTA2M2Y=">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- Navbar -->
</header>

 <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="container d-flex align-items-center justify-content-center text-center h-100">
          <div class="text-white">
            <h1 class="mb-3">Feel free to message us.</h1>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Background image -->
<div class="ticker-wrapper-h">
  <div class="heading">Latest Post</div>

  <ul class="news-ticker-h">
      <?php 
include "db_connection.php";

$dateToday = date("Y-m-d");
$dateYesterday = date("Y-m-d",strtotime("-1 days"));


$q = mysqli_query($con,"SELECT * FROM newsupdates WHERE status='active' AND  DATE(dateTime)='$dateToday' OR DATE(dateTime) ='$dateYesterday' ORDER BY dateTime DESC");
if(mysqli_num_rows($q) > 0)
{

while($res = mysqli_fetch_array($q))
{


 ?>
    <li><a href="<?php echo $res['link']; ?>" target="_blank"><i class="fab fa-facebook"></i>&nbsp;<?php echo $res['title']; ?></a></li>
      <?php }

}else{

 ?>
  <li><a href="#"><i class="fas fa-times-circle"></i>&nbsp;No Lastest Post</a></li>
<?php } ?>
  </ul>

</div>
<main class="mt-5 reveal">
    <div class="container">
    	
    	<div class="row">
    		<div class="col-md-8 gx-5 mb-4">
	    		 <br><br>
      <!--Section: Content-->
            <section class="mb-5">
              <h4 class="text-center"><strong>Concerns</strong></h4>
              <br><br>
              <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                  <form method="post">
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-4">
                      <div class="col">
                        <div class="form-outline">
                          <input type="text" id="form3Example1" name="fname" class="form-control" />
                          <label class="form-label" for="form3Example1">First name</label>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-outline">
                          <input type="text" id="form3Example2" name="lname" class="form-control" />
                          <label class="form-label" for="form3Example2">Last name</label>
                        </div>
                      </div>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <input type="email" id="form3Example3" name="emailadd" class="form-control" />
                      <label class="form-label" for="form3Example3">Email address</label>
                    </div>

                    <div class="form-outline">
                      <textarea class="form-control" name="message" id="textAreaExample" rows="4"></textarea>
                      <label class="form-label" for="textAreaExample">Message</label>
                    </div>

                    <br><br>

                    <!-- Submit button -->
                    <button type="submit" name="email" class="btn btn-primary btn-block mb-4">
                      Submit
                    </button>

                    
                  </form>
                </div>
              </div>
            </section>
     
    		</div>
    		<div class="col-md-4 gx-5 mb-4">
    			<br><br>

    		
   		 	<dl class="row d-flex justify-content-center">
			  <dt class="col-sm-3"><i class="fas fa-envelope" style="font-size: 2rem;"></i></dt>
			  <dd class="col-sm-9" style="font-size: 1rem;">oslob.cebu.gov@gmail.com</dd>
			  
			  <dt class="col-sm-3"><i class="fas fa-map-marker-alt" style="font-size: 2rem;"></i></dt>
			  <dd class="col-sm-9" style="font-size: 1rem;">Poblacion,Oslob,Cebu,Philippines 6025</dd>
			  
			</dl>
            <div id="latest"></div>
            <hr class="my-5">
            <h5 class="titleSlant" style="position: relative;display: inline-block;padding: .5em 3em .5em  .5em;-webkit-clip-path: polygon(0 0, 100% 0%, 80% 100%, 0% 100%);clip-path: polygon(0 0, 100% 0%, 80% 100%, 0% 100%);background-color:#610C63;color:#fff;">LATEST POST:</h5>
            <div class="news" style="background-color: #FCF8E8;box-shadow:2px 5px 10px 0 gray;padding:2rem;">

            <?php
            include 'db_connection.php';
             $limit = 1;  
             $dateToday = date("Y-m-d");
             $dateYesterday = date("Y-m-d",strtotime("-1 days"));
            $getQuery = "SELECT * FROM newsupdates  WHERE status='active' AND DATE(dateTime) ='$dateToday' OR DATE(dateTime) ='$dateYesterday'  ORDER BY dateTime DESC ";
            $result = mysqli_query($con, $getQuery);      
            $total_rows = mysqli_num_rows($result); 
             $total_pages = ceil ($total_rows / $limit); 

             if (!isset ($_GET['page']) ) {  

                  $page_number = 1;  

              } else {  

                  $page_number = $_GET['page'];  

              }    

              $initial_page = ($page_number-1) * $limit;  
              $getQuery = "SELECT * FROM newsupdates  WHERE status='active'  AND DATE(dateTime) ='$dateToday' OR DATE(dateTime) ='$dateYesterday' ORDER BY dateTime DESC LIMIT " . $initial_page . ',' . $limit;  
              $result = mysqli_query($con,$getQuery);
              
            while($res = mysqli_fetch_array($result))
            {
             


           ?>
           <section>
              <div class="row">
                
               
                  <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
                    <img src="<?php echo $res['img']; ?>" class="img-fluid" style="width: 100%;height: 100%;" />
                    <a href="#!" class="tooltip-test" title="Tooltip">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                  </div>
                  <h5 style="word-wrap:break-word;"><strong><?php echo $res['title']; ?></strong></h5>
                  <p class="text-muted text-truncate">
                    <?php echo $res['description']; ?>
                    </p>
                    <a href="<?php echo $res['link']; ?>" target="_blank">
                    <button type="button" class="btn btn-outline-info" data-mdb-ripple-color="dark">Visit Source</button></a>
                    <br><br>
                    <figure class="text-end">
                      <figcaption class="blockquote-footer">
                        <cite title="Source Title"><i class="far fa-clock"></i>&nbsp;<?php echo date("F j, Y  g:i a",strtotime($res['dateTime'])); ?></cite>
                      </figcaption>
                    </figure>
                </div>      
  
            </section>
          <?php  } 

           echo '<div class="out-pagination  d-flex flex-wrap">';
           echo '<p>Page Number:&nbsp;&nbsp</p>';
           for($page_number = 1; $page_number<= $total_pages; $page_number++) {  

              echo '<a class="pagination" href = "contactus.php?page=' . $page_number . '#latest">&nbsp;' . $page_number . ' &nbsp;</a>';  

          }   

          echo '</div>';
           ?>


        


   		 </div>
   		</div>
   		
    </div>

</main>
<br><br><br>


  <!-- Send email -->

  <?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'db_connection.php';

    if(isset($_POST['email']))
    {
        $fn = $_POST['fname'];
        $ln = $_POST['lname'];
        $emails = $_POST['emailadd'];
        $mess = $_POST['message'];


        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
        //Server setting
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'municipality.oslob@gmail.com';                     // SMTP username
        $mail->Password   = 'iwczwwosryrpyoqz';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        $fulln = $fn." ".$ln;
        //Recipients
        $mail->setFrom($emails,$fulln);
        $mail->addAddress('municipality.oslob@gmail.com');     // Add a recipient
        $mail->addReplyTo($emails);

        // Content
        
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Message From: '.$fulln.' via WEBSITE';
        $mail->Body    = "<h1>Hello Municipality of Oslob</h1> <br><br><br><p style='font-size: 15px;'>".$mess."</p>";
        $mail->AltBody = '<p>Hi I am '.$fulln.',<br><br>'.$mess.'</p>';

        $mail->send();
        echo '<script type="text/javascript">Swal.fire({

                    icon: "success",
                    title: "Thank you",
                    showConfirmButton: false,
                    timer: 1800
                })</script>';
                
            } catch (Exception $e) {
                exit("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            }
            
        }
        


    ?>

  <!-- send email -->

<!--Footer-->
  <footer class="bg-light text-lg-start">
    

    <hr class="m-0" />

    <div class="text-center py-4 align-items-center">
      <p>Follow us on social media</p>
      <a href="https://www.facebook.com/bangonoslob" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="https://instagram.com/municipalityofoslob?igshid=YmMyMTA2M2Y=" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-instagram"></i>
      </a>
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Copyright:
      <img src="img/logo.png" style="width: 30px;height: 30px;"><a class="text-dark" href="#" style="margin-left: 5px;">
      <b>Municipality of Oslob</b></a>
    </div>
    <!-- Copyright -->
  </footer>
  <!--Footer-->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script src="lightbox/lightbox.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
    <script>
      
     
    var nav = document.querySelector('nav');
    var navlink = document.querySelector('li');
    window.addEventListener('scroll',function(){
      if(window.pageYOffset > 100){
        nav.classList.add('navbar-scrolled');
        navlink.classList.add('text-dark');
      }else{
        nav.classList.remove('navbar-scrolled');
      }
    });

    window.addEventListener('scroll', reveal);

	function reveal(){
	var reveals= document.querySelectorAll('.reveal');

		for(var i=0;i < reveals.length;i++)
		{
			var windowheight = window.innerHeight;
			var revealTop = reveals[i].getBoundingClientRect().top;
			var revealpoint = 150;

			if(revealTop < windowheight - revealpoint)
			{
				reveals[i].classList.add('active');
			}else{
				reveals[i].classList.remove('active');
			}
		}
	}	


    </script>
</body>
</html>