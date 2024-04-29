<?php
  include ('db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Municipality of Oslob | Government</title>
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
<style>
  
      #intro {
        background-image: url("img/res1.jpg");
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
      .pagination{
        display: flex;
        align-self: center;
        flex-direction: row;
        font-size: 18px;
        padding:.6rem;
        
        width: 2.2rem;
        height:2.2rem;
      }
      .out-pagination{
        display: flex;
        justify-content:flex-start;
        align-self: flex-start;
        width: 20rem;
        
        padding: 1rem;
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
      
@media (max-width: 385px)
{
  .navbar-brand{
    font-size: 15px;
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
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
            <a class="nav-link"  style="color:#CFD2CF;"  href="government.php">Government</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="transparency.php">Transparency</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="covidcases.php">Health Bulletin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactus.php">Contact Us</a>
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
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.4);">
        <div class="container d-flex align-items-center justify-content-center text-center h-100">
          <div class="text-white">
            <h1 class="mb-3"></h1>

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

    	<h3 class=""><strong>Government</strong></h3><br>
      <div class="tags d-flex flex-row"><p class="text-muted" style="margin-right: 10px;"><strong>Tags: </strong></p><div class="tagsitem" style="font-size: 15px;font-weight: bold;display: flex;justify-content: flex-start;width: 100%;flex-wrap: wrap;"><a href="#mayor" id="mc">#Mayor's Corner</a>&nbsp; &nbsp;| &nbsp; &nbsp;<a href="#vice" id="vm">#Vice Mayor</a>&nbsp; &nbsp;| &nbsp; &nbsp;<a href="#sb" id="sm">#SB members</a>&nbsp; &nbsp;| &nbsp; &nbsp;<a href="#agri" id="ao">#Agriculture Office</a>&nbsp; &nbsp;| &nbsp; &nbsp;<a href="#engi" id="e">#Engineering</a>&nbsp; &nbsp;| &nbsp; &nbsp;<a href="#mpdc" id="mp">#MPDC</a>&nbsp; &nbsp;| &nbsp; &nbsp;<a href="#dswd" id="ds">#DSWD</a>&nbsp; &nbsp;| &nbsp; &nbsp;<a href="#budget" id="bo">#BUDGET OFFICE</a>&nbsp; &nbsp;| &nbsp; &nbsp;<a href="#ass" id="aso">#ASSESORS OFFICE</a>&nbsp; &nbsp;| &nbsp; &nbsp;<a href="#tre" id="to">#TREASURY OFFICE</a>&nbsp; &nbsp;| &nbsp; &nbsp;<a href="#acc" id="aco">#ACCOUNTING OFFICE</a>&nbsp; &nbsp;| &nbsp; &nbsp;<a href="#peso" id="po">#PESO OFFICE</a>&nbsp; &nbsp;| &nbsp; &nbsp;<a href="#rhu" id="rh">#RHU</a></div></div>
       
   		
    </div>

    <br><br><br><br>
    
        <div id="mayor" class="justify-content-center flex-column align-items-center" style="display: none;">
          <!-- code here -->
          
          <h5>MAYOR'S OFFICE</h5>
          <br><br><br>
          <img src="img/mayor.jpg" alt="profile" style="width: 12rem;height: 12rem;border-radius: 50%;box-shadow: 0 0 20px #888;">
          <br><br>
          <p class="text-muted"><strong>Atty. Ronald Guaren</strong></p>
        </div>
        <div id="vice" class="justify-content-center flex-column align-items-center"  style="display: none;">
          <!-- code here -->

           <h5>VICE MAYOR</h5>
           <br><br><br>
          <img src="img/logo.png" alt="profile" style="width: 12rem;height: 12rem;border-radius: 50%;box-shadow: 0 0 20px #888;">
          <br><br>
          <p class="text-muted"><strong>Roger O. Trapa</strong></p>
        </div>
        <div id="sb" class="justify-content-center flex-column align-items-center"  style="display: none;">
          <!-- code here -->
          <h5>SB MEMBERS</h5>
          <div class="container">
            asdas
          </div>  
        </div>

        <div id="agri" class="justify-content-center"  style="display: none;">
          <!-- codehere -->

        <h5>AGRICULTURE OFFICE</h5>
        </div>
        <div id="engi" class="justify-content-center"  style="display: none;">
          <!-- code here -->

         <h5>ENGINEERING</h5>
        </div>
        <div id="mpdc" class="justify-content-center"  style="display: none;">
          <!-- code here -->

          <h5>MPDC</h5>
        </div>
        <div id="dswd" class="justify-content-center"  style="display: none;">
          <!-- code here -->
         <h5>DSWD</h5>
        </div>
        <div id="budget"  class="justify-content-center" style="display: none;">
          <!-- code here -->
         <h5>BUDGET OFFICE</h5>
        </div>
        <div id="ass" class="justify-content-center"  style="display: none;">
          <!-- code -->
         <h5>ASSESORS OFFICE</h5>
        </div>
        <div id="tre" class="justify-content-center"  style="display: none;">
          <!-- code here -->
         <h5>TREASURY OFFICE</h5>
  
        </div>
        <div id="acc" class="justify-content-center"  style="display: none;">
          <!-- code here -->
         <h5>ACCOUNTING OFFICE</h5>
 
        </div>
        <div id="peso" class="justify-content-center"  style="display: none;">
          <!-- code here -->
          <h5>PESO OFFICE</h5>
 
        </div>
        <div id="rhu" class="justify-content-center"  style="display: none;">
          <!-- code here -->
          <h5>RHU</h5>
 
        </div>
    
    















</main>
<br><br><br>


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




  var m1 = [document.getElementById("mayor"),document.getElementById("vice"),document.getElementById("sb"),document.getElementById("agri"),document.getElementById("engi"),document.getElementById("mpdc"),document.getElementById("dswd"),document.getElementById("budget"),document.getElementById("ass"),document.getElementById("tre"),document.getElementById("acc"),document.getElementById("peso"),document.getElementById("rhu")];

  var b1 = [document.getElementById("mc"),document.getElementById("vm"),document.getElementById("sm"),document.getElementById("ao"),document.getElementById("e"),document.getElementById("mp"),document.getElementById("ds"),document.getElementById("bo"),document.getElementById("aso"),document.getElementById("to"),document.getElementById("aco"),document.getElementById("po"),document.getElementById("rh")];

  b1[0].onclick =function(){
    m1[0].style.display = "flex";
    m1[1].style.display = "none";
    m1[2].style.display = "none";
    m1[3].style.display = "none";
    m1[4].style.display = "none";
    m1[5].style.display = "none";
    m1[6].style.display = "none";
    m1[7].style.display = "none";
    m1[8].style.display = "none";
    m1[9].style.display = "none";m1[10].style.display = "none";m1[11].style.display = "none";m1[12].style.display = "none";
  }
  b1[1].onclick =function(){
    m1[1].style.display = "flex";
    m1[0].style.display = "none";
    m1[2].style.display = "none";
    m1[3].style.display = "none";
    m1[4].style.display = "none";
    m1[5].style.display = "none";
    m1[6].style.display = "none";
    m1[7].style.display = "none";
    m1[8].style.display = "none";
    m1[9].style.display = "none";m1[10].style.display = "none";m1[11].style.display = "none";m1[12].style.display = "none";
  }
  b1[2].onclick =function(){
    m1[2].style.display = "flex";
    m1[0].style.display = "none";
    m1[1].style.display = "none";
    m1[3].style.display = "none";
    m1[4].style.display = "none";
    m1[5].style.display = "none";
    m1[6].style.display = "none";
    m1[7].style.display = "none";
    m1[8].style.display = "none";
    m1[9].style.display = "none";m1[10].style.display = "none";m1[11].style.display = "none";m1[12].style.display = "none";
  }
  b1[3].onclick =function(){
    m1[3].style.display = "flex";
    m1[0].style.display = "none";
    m1[1].style.display = "none";
    m1[2].style.display = "none";
    m1[4].style.display = "none";
    m1[5].style.display = "none";
    m1[6].style.display = "none";
    m1[7].style.display = "none";
    m1[8].style.display = "none";
    m1[9].style.display = "none";m1[10].style.display = "none";m1[11].style.display = "none";m1[12].style.display = "none";
  }
  b1[4].onclick =function(){
    m1[4].style.display = "flex";
    m1[0].style.display = "none";
    m1[1].style.display = "none";
    m1[3].style.display = "none";
    m1[2].style.display = "none";
    m1[5].style.display = "none";
    m1[6].style.display = "none";
    m1[7].style.display = "none";
    m1[8].style.display = "none";
    m1[9].style.display = "none";m1[10].style.display = "none";m1[11].style.display = "none";m1[12].style.display = "none";
  }
  b1[5].onclick =function(){
    m1[5].style.display = "flex";
    m1[0].style.display = "none";
    m1[1].style.display = "none";
    m1[3].style.display = "none";
    m1[2].style.display = "none";
    m1[4].style.display = "none";
    m1[6].style.display = "none";
    m1[7].style.display = "none";
    m1[8].style.display = "none";
    m1[9].style.display = "none";m1[10].style.display = "none";m1[11].style.display = "none";m1[12].style.display = "none";
  }
  b1[6].onclick =function(){
    m1[6].style.display = "flex";
    m1[0].style.display = "none";
    m1[1].style.display = "none";
    m1[3].style.display = "none";
    m1[2].style.display = "none";
    m1[4].style.display = "none";
    m1[5].style.display = "none";
    m1[7].style.display = "none";
    m1[8].style.display = "none";
    m1[9].style.display = "none";m1[10].style.display = "none";m1[11].style.display = "none";m1[12].style.display = "none";
  }
   b1[7].onclick =function(){
    m1[7].style.display = "flex";
    m1[0].style.display = "none";
    m1[1].style.display = "none";
    m1[3].style.display = "none";
    m1[2].style.display = "none";
    m1[4].style.display = "none";
    m1[5].style.display = "none";
    m1[6].style.display = "none";
    m1[8].style.display = "none";
    m1[9].style.display = "none";m1[10].style.display = "none";m1[11].style.display = "none";m1[12].style.display = "none";
  }
  b1[8].onclick =function(){
    m1[8].style.display = "flex";
    m1[0].style.display = "none";
    m1[1].style.display = "none";
    m1[3].style.display = "none";
    m1[2].style.display = "none";
    m1[4].style.display = "none";
    m1[5].style.display = "none";
    m1[6].style.display = "none";
    m1[7].style.display = "none";
    m1[9].style.display = "none";m1[10].style.display = "none";m1[11].style.display = "none";m1[12].style.display = "none";
  }
  b1[9].onclick =function(){
    m1[9].style.display = "flex";
    m1[0].style.display = "none";
    m1[1].style.display = "none";
    m1[3].style.display = "none";
    m1[2].style.display = "none";
    m1[4].style.display = "none";
    m1[5].style.display = "none";
    m1[6].style.display = "none";
    m1[7].style.display = "none";
    m1[8].style.display = "none";
    m1[10].style.display = "none";
    m1[11].style.display = "none";
    m1[12].style.display = "none";
  }
  b1[10].onclick =function(){
    m1[10].style.display = "flex";
    m1[0].style.display = "none";
    m1[1].style.display = "none";
    m1[3].style.display = "none";
    m1[2].style.display = "none";
    m1[4].style.display = "none";
    m1[5].style.display = "none";
    m1[6].style.display = "none";
    m1[7].style.display = "none";
    m1[8].style.display = "none";
    m1[9].style.display = "none";
    m1[11].style.display = "none";
    m1[12].style.display = "none";
  }
  b1[11].onclick =function(){
    m1[11].style.display = "flex";
    m1[0].style.display = "none";
    m1[1].style.display = "none";
    m1[3].style.display = "none";
    m1[2].style.display = "none";
    m1[4].style.display = "none";
    m1[5].style.display = "none";
    m1[6].style.display = "none";
    m1[7].style.display = "none";
    m1[8].style.display = "none";
    m1[9].style.display = "none";
    m1[10].style.display = "none";
    m1[12].style.display = "none";
  }
  b1[12].onclick =function(){
    m1[12].style.display = "flex";
    m1[0].style.display = "none";
    m1[1].style.display = "none";
    m1[3].style.display = "none";
    m1[2].style.display = "none";
    m1[4].style.display = "none";
    m1[5].style.display = "none";
    m1[6].style.display = "none";
    m1[7].style.display = "none";
    m1[8].style.display = "none";
    m1[9].style.display = "none";
    m1[10].style.display = "none";
    m1[11].style.display = "none";
  }
    </script>
</body>
</html>