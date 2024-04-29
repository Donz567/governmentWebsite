<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Municipality of Oslob | About Us</title>
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
            <a class="nav-link active"  style="color:#CFD2CF;" href="about.php">About Us</a>
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
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="container d-flex align-items-center justify-content-center text-center h-100">
          <div class="text-white">
            <h1 class="mb-3">About Oslob</h1>
            
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
      <h4 class="text-center"><strong>About Us</strong></h4>
      <div class="row">
        <div class="col-md-8 gx-5 mb-4">
          <br><br>
          <p><strong>History</strong></p>
          <p class="text-muted">
            

                The town of Oslob lies in the southeastern coast of the province of Cebu and runs 117 kilometers from Cebu City, the provincial capital. From Cebu City to the south, it is the eleventh municipality along the east coast of the province. Facing Bohol Strait the east, it is bounded by Ginatilan in the northwest, Samboan in the southwest, Santander in the south, and Boljoon in the north. Sitting next to Cebu’s southernmost town of Santander, Oslob faces the island of Mindanao, home to Muslim raiders(called Moros) against whom the town had fought long and bloody battles.
                  <br><br>

          Oslob, is a fourth-class municipality belonging to the Second Congressional District of the province of Cebu. It is composed of twenty-one coastal and upland barangay’s, which form the Local administrative units of the municipality. Roland L. Guaren, is the 25th  mayor, counting from Meliton Rendon, who served as Oslob’s presidente municipal from 1988 to 1907. Of the town twenty-one barangays, sixteen of these, including Poblacion, are scattered along the coast on the town’s eastern flank, while the rest are tossed up in the hinterlands on the town’s western border.
          <br><br>
          </p>
          <p><strong>Oslob Festivals</strong></p>
          <br>
          <p>
           Across the country, particularly in Cebu Province, there has been a surge of festivals. In Cebu, Governor Garcia’s cultural tourism program Suroy Suroy Sugbo, has helped the promotion of festivals in all the towns. At present, each town of the province of Cebu has at least one festival. These festivals hug the limelight during the Sinulog, the Philippines biggest cultural celebration.
          <br><br>
          A festival is supposed to be a communal celebration established by custom which commemorates important historical or cultural events or recreates cherished folkways, Similarly, almost all festivals Cebu claim some historical and cultural basis for their existence. 
          <br><br>
          Oslob has a curious story for its two festivals,namely , Sadsad sa Oslob and Toslob.Historically, Sadsad sa Oslob was an offspring of the song “ Dayang-dayang “ which was very popular in 1996. Former Oslob mayor Emelito Abines, then Poblacion barangay captain, initiated as streetdance competition using the song as part of the celebration of the feast of San Roque. The staging of the Dayang-dayang street-dance, which was later given the name sadsad,(an old Cebuano term of the ‘dance’), was very successful. Inspired by the success, Capt. Abines commissioned Manny Lapingcao to compose a jingle in place of the already outdated Dayang-dayang. The said jingle became the official song of succeeding annual streetdance contest.When Emelito became mayor, Sadsad became the official festival of the town. In time, Oslob joined the Sinulog parade and dance competition under the banner Sadsad sa Oslob.
          <br><br>
          In 2008, Mayor Guaren replaced Sadsad sa Oslob with another festival which he allegedly conceptualized, the Toslob Festival, which was purportedly  based on a popular account pertaining to the origin of the name Oslob. According to this account, the town’s name Oslob comes from the word toslob is reference to the native couple’s act of dipping cooked bananas into a bowl filled with salt.
          <br><br>
          </p>
          <p><strong>Economy</strong></p>
          <br>
          <p>
          Oslobanons have always been farmers and fishermen , Fishing is the main livelihood of the most families of the sixteen barangays that are scatthered along the coast. However, some of these families do not rely on the fishing alone since others who own lands or act as tenants in the uplands also plant corn and others crops.
          <br><br>
          The Rural Bank of Oslob, which was established in 1977, is the first and only bank in town. The town has mall , convenience store, public market, drug stores, general merchandise stores, and gas stations.
          <br><br>
          Contributing to the current economy , are tourists spots of the town. In 1974, Oslob hugged the limelight as the worlds attention was focused on simulation is land, which became the country’s first marine sanctuary through the efforts of Siliman University. Among the famous attractions of the Oslob are the Mainit Spring, the Cuartel( unfinished Spanish military barracks) and the Baluartes(Kings Watch towers).Calle aragones and Calle eternidad(Calle Campo Santo), the oldest streets in Oslob ; a number of Spanish houses; some 40 caves; several fine beaches that dot the shorelines; and the sadsad festival.
                 </p>
        </div>
        <div class="col-md-4 gx-5 mb-4">
          <br><br>

        <div class="geomap flex-column justify-content-center">
          <p><strong>Geographical Map</strong></p>
          <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62960.654667190305!2d123.36512651083619!3d9.505170844507512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33ab9fc3ba1584b3%3A0xcb54005bbcc85855!2sOslob%2C%20Cebu!5e0!3m2!1sen!2sph!4v1657105556917!5m2!1sen!2sph" width="320" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <hr class="my-5 d-flex justify-content-center" >
        <div class="d-flex flex-column text-center  justify-content-center" style="margin-top: 90px;">
          
          <div class="d-flex justify-content-center">
            <img src="img/mayor.jpg" alt="" style="width: 13rem;height: 13rem;border-radius: 50%;box-shadow: 0 0 20px #888;">
            
          </div>
        <p style="margin-top: 30px;"><strong>Atty. Ronald Guaren</strong></p>
        <p style="font-size: 12px;font-weight: bold;">Municipality Mayor</p>
            
        </div>

        <center><hr class="my-5" /></center>
        <dl class="row d-flex justify-content-center">
        <dt class="col-sm-3"><i class="fas fa-envelope" style="font-size: 2rem;"></i></dt>
        <dd class="col-sm-9" style="font-size: 1rem;">oslob.cebu.gov@gmail.com</dd>
        
        <dt class="col-sm-3"><i class="fas fa-map-marker-alt" style="font-size: 2rem;"></i></dt>
        <dd class="col-sm-9" style="font-size: 1rem;">Poblacion,Oslob,Cebu,Philippines 6025</dd>
        <div id="latest"></div>
      </dl>
            
            <hr class="my-5">
            <h5 class="titleSlant" style="position: relative;display: inline-block;padding: .5em 3em .5em  .5em;-webkit-clip-path: polygon(0 0, 100% 0%, 80% 100%, 0% 100%);clip-path: polygon(0 0, 100% 0%, 80% 100%, 0% 100%);background-color:#610C63;color:#fff;">LATEST POST:</h5>
            <div class="news" style="background-color: #FCF8E8;box-shadow:2px 5px 10px 0 gray;padding:2rem;max-height: 50%;">

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

           echo '<div class="out-pagination d-flex flex-wrap">';
           echo '<p>Page Number:&nbsp;&nbsp</p>';

           for($page_number = 1; $page_number<= $total_pages; $page_number++) {  

              echo '<a class="pagination" href = "about.php?page=' . $page_number . '#latest">&nbsp;' . $page_number . '&nbsp; </a>';  

          }   

          echo '</div>';
           ?>


        


       </div>
      </div>
      
    </div>

</main>
<br><br><br>


<!--Footer-->
  <footer class="bg-light text-lg-start">
    

    <hr class="m-0" />

    <?php include("footer.php"); ?>

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