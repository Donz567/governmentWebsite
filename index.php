<?php
  include ('db_connection.php');

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Municipality of Oslob | Updates</title>
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
        height: 110vh;
        
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
      .activea{
        color:black;
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
      .containers {
        position: relative;
        width: 100%;
      }

      .image {
        display: block;
        width: 100%;
        height: auto;
      }

      .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #008CBA;
        overflow: hidden;
        width: 100%;
        height: 0;
        transition: .5s ease;
      }

      .containers:hover .overlay {
        height: 100%;
      }

      .texts {
        color: white;
        font-size: 15px;
        position: absolute;
        display: flex;
        flex-wrap: wrap;
        
        
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
      
      .navbar-nav{
        font-size: 16px;
      }
    </style>
<body>
  <!-- arrow up -->
<a href="#introCarousel">
    <div  class="asss aarrowup">
     <i class="fa fa-arrow-circle-up"></i>
    </div>
  </a>
  <!--Main Navigation-->
  <header>
    

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-scroll text-dark">
    <div class="container">
      <a class="navbar-brand lows" href="#!" style="font-size: 20px;"></a> 
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page"  style="color:#CFD2CF;" href="index.php">News</a>
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
          <div class="text-white" style="display: flex;align-items: center;font-stretch: inherit;flex-wrap: wrap;justify-content: center;">
            <img src="img/logo.png" alt="oslob logo" style="width: 170px;height: 170px;margin-right: 10px;"><span class="logo-title" style="font-size: 3.5rem;display: flex;flex-direction: column;line-height: 45px;"><span style="display: flex;flex-direction: column;line-height: 35px;"><span class="sub-title" style="font-size: 1.3rem;letter-spacing: 5px;">REPUBLIC OF THE PHILIPPINES</span><span class="sub-title" style="font-size: 1.3rem;letter-spacing: 5px;"><u>PROVINCE OF CEBU</u></span></span><span class="main-title" style="letter-spacing: 2px;font-weight: 400px;">Municipality of Oslob</span></span>
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
       <br>
        <h3 class=""><strong>MUNICIPAL UPDATES</strong></h3>
        <br><br>
      <div class="row">

        <div class="col-md-9 gx-5 mb-4 d-flex flex-column">
          



          <!--Section: Content-->
          <?php
             $limit = 5;  
            $getQuery = "SELECT * FROM newsupdates  WHERE status='active' ORDER BY dateTime DESC";
            $result = mysqli_query($con, $getQuery);      
            $total_rows = mysqli_num_rows($result); 
             $total_pages = ceil ($total_rows / $limit); 

             if (!isset ($_GET['pages']) ) {  

                  $page_number = 1;  

              } else {  

                  $page_number = $_GET['pages'];  

              }    

              $initial_page = ($page_number-1) * $limit;  
              $getQuery = "SELECT * FROM newsupdates  WHERE status='active' ORDER BY dateTime DESC LIMIT " . $initial_page . ',' . $limit;  
              $result = mysqli_query($con,$getQuery);
              
            while($res = mysqli_fetch_array($result))
            {
             


           ?>
            <section>
              <div class="row">
                
                <div class="col-md-4 gx-5 mb-4">
                  <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
                    <img src="<?php echo $res['img']; ?>" class="img-fluid" />
                    <a href="#!" class="tooltip-test" title="Tooltip">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                  </div>
                  
                </div>      

                <div class="col-md-8 gx-5 mb-4" style="transition: all 1s ease;">
                  <h5><strong><?php echo $res['title']; ?></strong></h5>
                  <p class="text-muted">
                    <?php echo $res['description']; ?>
                    </p>
                    <a href="<?php echo $res['link']; ?>" target="_blank">
                    <button type="button" class="btn btn-outline-info" data-mdb-ripple-color="dark">Visit Source</button></a>
                    <figure class="text-end">
                      <figcaption class="blockquote-footer">
                        <cite title="Source Title"><i class="far fa-clock"></i>&nbsp;<?php date_default_timezone_set("Asia/Manila"); echo date("F j, Y  g:i a",strtotime($res['dateTime'])); ?></cite>
                      </figcaption>
                    </figure>
                </div>
                  
                  
              </div>
              
              
            </section>
             <hr class="my-5" />
             
           <?php  } 

           echo '<div class="out-pagination" style="flex-wrap:wrap;width:100%;">';
           echo '<p>Page Number:&nbsp;&nbsp</p>';
           for($page_number = 1; $page_number<= $total_pages; $page_number++) {  

              echo '<a class="pagination" href = "index.php?pages=' . $page_number . '">' . $page_number . ' </a>';  

          }   

          echo '</div>';
           ?>
            
            <!--Section END -->
           
            




        </div>
        <div class="col-md-3 gx-5 mb-4 d-flex flex-column">
          <center>
            <h4 style="background-color: blue;color:white">JOB HIRING</h4>
          </center>
          <?php 
            include 'db_connection.php';
            $dateToday = date("Y-m-d");
            $query = mysqli_query($con,"SELECT * FROM jobhiring WHERE status='active'");

            if(mysqli_num_rows($query) > 0)
            {
              while($res=mysqli_fetch_array($query))
              {



           ?>
           <div class="containers">
            <img src="<?php echo $res['img']; ?>" class="image">
            <div class="overlay" style="padding:1rem;">
              <div class="texts"><h5 style="text-align: center;width: auto;"><?php echo $res['jobtitle']; ?></h5></div>
              <?php echo '<p class="text-truncate" style="margin-top:6rem;color:white;">'.$res['jobdescription'].'</p>'; ?>
              <a href="<?php echo $res['link']; ?>" target="_blank">
                    <button type="button" class="btn btn-primary" data-mdb-ripple-color="dark">Visit Source</button></a>
            </div>
          </div>
          <br>
         <?php }
         }else{
          echo "<h5>No Job available</h5>";
         } ?>
          

          <hr class="my-5">

          <div class="geomap flex-column justify-content-center">
          <p><strong>Geographical Map</strong></p>
          <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62960.654667190305!2d123.36512651083619!3d9.505170844507512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33ab9fc3ba1584b3%3A0xcb54005bbcc85855!2sOslob%2C%20Cebu!5e0!3m2!1sen!2sph!4v1657105556917!5m2!1sen!2sph" width="250" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        
          <hr class="my-5">
          <a class="weatherwidget-io" href="https://forecast7.com/en/9d56123d42/oslob/" data-label_1="OSLOB" data-label_2="WEATHER" data-theme="original" >OSLOB WEATHER</a>
          <script>
          !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
          </script>
          <hr class="my-5">

          <div class="covidcase" >
            <section>
              <h2>COVID CASES</h2>
        <div class="row">
          
              <div class="card bg-warning text-white">
                <div class="card-body">
                  <div class="d-flex justify-content-between p-md-1">
                    <div class="d-flex flex-row">
                      <div class="align-self-center">
                        <h3><?php 
                        include "db_connection.php";

                        $query = mysqli_query($con,"SELECT * FROM activecases");
                        $tt = 0;
                        while($res=mysqli_fetch_assoc($query))
                        {
                            $tt = $tt + $res['activeCase'];
                        }

                        echo $tt;
                         ?></h3>
                      
                        <p class="mb-0">Active Cases</p>
                      </div>
                    </div>
                    <div class="align-self-center">
                      <i class="fas fa-user-check text-white fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div>
            
            
              <div class="card bg-primary text-white">
                <div class="card-body">
                  <div class="d-flex justify-content-between p-md-1">
                    <div class="d-flex flex-row">
                      <div class="align-self-center">
                        <h3><?php 
                        include "db_connection.php";

                        $query = mysqli_query($con,"SELECT * FROM covidanddenguecases");
                        $tt = 0;
                        while($res=mysqli_fetch_assoc($query))
                        {
                            $tt = $tt + $res['brgy_covidcases'];
                        }

                        echo $tt;
                         ?></h3>
                      
                        <p class="mb-0">Total Cases</p>
                      </div>
                    </div>
                    <div class="align-self-center">
                      <i class="fas fa-user-check text-white fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div>
            
              <div class="card bg-danger text-white">
                <div class="card-body">
                  <div class="d-flex justify-content-between p-md-1">
                    <div class="d-flex flex-row">
                      <div class="align-self-center">
                        <h3><?php 
                        include "db_connection.php";

                        $query = mysqli_query($con,"SELECT * FROM covidanddenguecases");
                        $tt = 0;
                        while($res=mysqli_fetch_assoc($query))
                        {
                            $tt = $tt + $res['brgy_deathcases'];
                        }

                        echo $tt;
                         ?></h3>
                      
                      
                        
                        <p class="mb-0">Death</p>
                      </div>
                    </div>
                    <div class="align-self-center">
                      <i class="fas fa-frown text-white fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div>
            
              <div class="card bg-success text-white">
                <div class="card-body">
                  <div class="d-flex justify-content-between p-md-1">
                    <div class="d-flex flex-row">
                      <div class="align-self-center">
                       <h3 class="text-white"><?php 
                        include "db_connection.php";

                        $query = mysqli_query($con,"SELECT * FROM covidanddenguecases");
                        $tt = 0;
                        while($res=mysqli_fetch_assoc($query))
                        {
                            $tt = $tt + $res['brgy_recovered'];
                        }

                        echo $tt;
                         ?></h3>
                          <p class="mb-0">Recovered</p>
                      </div>
                    </div>
                    <div class="align-self-center">
                      <i class="fas fa-laugh-beam text-white fa-2x"></i>
                    </div>
                  </div>
                </div>
             
             
          </div>
          
      </section>
          </div>
        
      </div>
      
    </div>
  </div>
</main>
<br><br><br>


<!--Footer-->
  <footer class="bg-light text-lg-start">
    

    <hr class="m-0" />

    <div class="text-center py-4 align-items-center" style="background:none;">
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
      
     
      var arrow = document.querySelector('.asss');
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

// this is for the arrow up
window.addEventListener('scroll',function(){
      if(window.pageYOffset > 800){
        arrow.classList.add('showarrow');
      }else{
        arrow.classList.remove('showarrow');
      }
    });
    



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


    let slideIndex = 0;
    showSlides();

    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" actives", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " actives";
      setTimeout(showSlides, 4000); // Change image every 2 seconds
    }

    

    </script>
</body>
</html>