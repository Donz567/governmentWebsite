<?php
  include ('db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Municipality of Oslob | Covid Cases</title>
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
        background-image: url("img/healthbanner.jpg");
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
            <a class="nav-link" href="government.php">Government</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"    href="transparency.php">Transparency</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  style="color:#CFD2CF;"  href="covidcases.php">Health Bulletin</a>
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
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
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
 <div class="datetoday text-end mb-5 me-5" id="date" style="font-weight: bold;"><?php  date_default_timezone_set("Asia/Manila"); echo date("F j, Y  g:i a");
?></div>

    <div class="container">
      <h3 class="mb-5">Covid Cases</h3>
      <section>
        <div class="row">
          <div class="col-xl-3 col-md-12 mb-4">
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
                      <i class="fas fa-user-check text-white fa-3x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-12 mb-4">
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
                      <i class="fas fa-user-check text-white fa-3x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-12 mb-4">
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
                      <i class="fas fa-frown text-white fa-3x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-12 mb-4">
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
                      <i class="fas fa-laugh-beam text-white fa-3x"></i>
                    </div>
                  </div>
                </div>
              </div>
             
          </div>
          
      </section>


      <!-- bargraph -->
      <br><br><br>
        <canvas id="myChart" style="width:100%;max-width:100%"></canvas>

    
        <hr class="my-5">

        <h3 class="mb-5">Dengue Cases</h3>
        <div class="row">
          <div class="col-xl-6 col-md-12 mb-4">
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
                            $tt = $tt + $res['brgy_denguecases'];
                        }

                        echo $tt;
                         ?></h3>
                      
                        <p class="mb-0">Total Cases</p>
                      </div>
                    </div>
                    <div class="align-self-center">
                      <i class="fas fa-user-check text-white fa-3x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-md-12 mb-4">
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
                            $tt = $tt + $res['brgy_denguedeath'];
                        }

                        echo $tt;
                         ?></h3>
                      
                      
                        
                        <p class="mb-0">Death</p>
                      </div>
                    </div>
                    <div class="align-self-center">
                      <i class="fas fa-frown text-white fa-3x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>


        <section class="mb-4">
        <div class="card">
          <div class="card-header py-3">
            <h5 class="mb-0 text-center"><strong>Dengue Cases Line Graph</strong></h5>
          </div>
          <div class="card-body">
            <div class="chart-container" style="position: relative; height:40vh; width:80vw">
              <canvas class="my-4 w-100" id="myCharts" height="380" ></canvas>
            </div>
          </div>
        </div>
      </section>
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
  <script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script src="lightbox/lightbox.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
     
    <script>
      
 
  
     var xValues = ["Alo","Bangcogon","Bonbon","Calumpang","Cañang","Canangcaan","Cansaloay","Can-ukban","Daanlungsod","Gawi","Hagdan","Lagunde","Looc","Luka","Mainit","Manlum","Nueva Caceres","Poblacion","Pungtod","Tan-awan","Tumalog"];
     <?php 

        include "db_connection.php";

        $activeCasesArr = array();
        $i=0;
        $query = mysqli_query($con,"SELECT * FROM covidanddenguecases");
        while($res=mysqli_fetch_assoc($query))
        {
          $activeCasesArr[$i] = $res['brgy_covidcases'];

          $i++;
        }

        echo 'var yValues= ['.$activeCasesArr[0].','. $activeCasesArr[1].','.$activeCasesArr[2].','. $activeCasesArr[3].','. $activeCasesArr[4].','.$activeCasesArr[5].','.$activeCasesArr[6].','. $activeCasesArr[7].','. $activeCasesArr[8].','. $activeCasesArr[9].','.$activeCasesArr[10].','.$activeCasesArr[11].','. $activeCasesArr[12].','.$activeCasesArr[13].','. $activeCasesArr[14].','.$activeCasesArr[15].','.$activeCasesArr[16].','.$activeCasesArr[17].','.$activeCasesArr[18].','.$activeCasesArr[19].','.$activeCasesArr[20].'];'
        ?>

var barColors = ["red", "green","blue","orange","brown","blue","orange","red", "green","blue","orange","brown","blue","orange","red", "green","blue","orange","brown","blue","orange","red"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
 options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Covid Cases Oslob Barangays"
    }
  }
}); 
     
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


    // Graph
var ctx = document.getElementById("myCharts");

var myChart = new Chart(ctx, {
  type: "line",
  data: {
    labels: ["Alo","Bangcogon","Bonbon","Calumpang","Cañang","Canangcaan","Cansaloay","Can-ukban","Daanlungsod","Gawi","Hagdan","Lagunde","Looc","Luka","Mainit","Manlum","Nueva Caceres","Poblacion","Pungtod","Tan-awan","Tumalog"],
    datasets: [
      {
        <?php 

        include "db_connection.php";

        $activeCasesArr = array();
        $i=0;
        $query = mysqli_query($con,"SELECT * FROM covidanddenguecases");
        while($res=mysqli_fetch_assoc($query))
        {
          $activeCasesArr[$i] = $res['brgy_denguecases'];

          $i++;
        }
         
        echo 'data: ['.$activeCasesArr[0].','. $activeCasesArr[1].','.$activeCasesArr[2].','. $activeCasesArr[3].','. $activeCasesArr[4].','.$activeCasesArr[5].','.$activeCasesArr[6].','. $activeCasesArr[7].','. $activeCasesArr[8].','. $activeCasesArr[9].','.$activeCasesArr[10].','.$activeCasesArr[11].','. $activeCasesArr[12].','.$activeCasesArr[13].','. $activeCasesArr[14].','.$activeCasesArr[15].','.$activeCasesArr[16].','.$activeCasesArr[17].','.$activeCasesArr[18].','.$activeCasesArr[19].','.$activeCasesArr[20].'],'
        ?>
        lineTension: 0,
        backgroundColor: "transparent",
        borderColor: "#007bff",
        borderWidth: 4,
        pointBackgroundColor: "#007bff",
      },
    ],
  },
  options: {
    scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: false,
          },
        },
      ],
    },
    legend: {
      display: false,
    },
  },
});

    </script>
</body>
</html>