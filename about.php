<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user'])!= "" ) {
  header("Location: index.php");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<title>Welcome - <?php echo $userRow['userName']; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css" type="text/css" />

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style type="text/css">
a{
  text-decoration: none;
}
  
</style>

<!-- Latest compiled and minified CSS -->
</head>
<body>
  
<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card-2 w3-top w3-large w3-animate-left w3-text-grey" style="display:none;z-index:2;width:25%;min-width:260px" id="mySidebar">
   <a href="home.php" onclick="w3_close()" class="w3-left w3-button ">PURVA Devlopers</a>
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-red w3-right w3-button">X</a>
  <a href="home.php" onclick="w3_close()" class="w3-bar-item w3-button"><span class="fa fa-home w3-bar-item w3-xlarge w3-button w3-text-blue w3-left "></span></a>
  <a  class="w3-bar-item w3-button w3-green">&nbsp;Hi<b> <?php echo $userRow['userName']; ?></b>&nbsp;</span></a>
  <img class="w3-bar-item" src="w3images/a1.jpg"  >
  <a href="project.php" onclick="w3_close()" class="w3-bar-item w3-button">Projects</a>
  <a href="about.php" onclick="w3_close()" class="w3-bar-item w3-button w3-lime">About</a>
  <a href="contact.php" onclick="w3_close()" class="w3-bar-item w3-button">Contact</a>
  <a href="logout.php?logout" class="w3-bar-item w3-button w3-text-red">&nbsp;Sign Out</a>
</nav>

<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card-2">
    <a class="w3-bar-item w3-button w3-left w3-small" onclick="w3_open()"><i class="fa fa-bars" aria-hidden="true"></i></a>
    <a href="home.php" class="w3-bar-item w3-button w3-text-lime w3-hide-small"><b>PURVA</b> Developers</a>
     <a href="home.php" class="w3-small w3-bar-item w3-text-blue w3-hide-large w3-hide-medium w3-text-lime">PURVA Developer</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
    <a href="home.php"><span class="fa fa-home w3-bar-item w3-xlarge w3-button "></span></a>
      <a href="project.php" class="w3-bar-item w3-button">Projects</a>
      <a href="about.php" class="w3-bar-item w3-button w3-lime w3-text-white">About</a>
      <a href="contact.php" class="w3-bar-item w3-button">Contact</a>
      <a  class="w3-bar-item w3-button w3-green">
     <span class="glyphicon glyphicon-user"></span>&nbsp;Hi<b> <?php echo $userRow['userName']; ?></b>&nbsp;<span class="caret"></span></a>
      <a href="logout.php?logout" class="w3-bar-item w3-button w3-text-red"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="w3images/about.jpg" alt="Architecture" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center w3-hide-small">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>ABOUT US</b></span></h1>
     <a href="#call"><span  class="fa fa-arrow-circle-o-down w3-xxlarge" aria-hidden="true"></span></a>
  </div>
</header>

<div class="w3-container w3-padding-16" style="max-width: 950px; margin: 0 auto;" id="call">
    <div class="w3-row w3-center w3-text-grey" id="call">
      
      <h1 class="w3-xxlarge w3-text-lime">About Us.</h1>
    </div>
    <hr>
     <div class="w3-row w3-center w3-padding">
      <img src="w3images/a1.jpg" alt="logo" width="200" height="200">
    </div>
   <h1 class="w3-xxlarge w3-text-white w3-center w3-padding"><span class="w3-padding w3-black w3-opacity-min"><b>PURVA</b></span> <span class="w3-hide-small w3-text-grey">Developers</span></h1>
  <h5 class="w3-opacity w3-center w3-padding w3-border w3-padding w3-text-green">Hum Banate hai Vishwas ka Gharonda.</h5>
  <div class="w3-row w3-text-grey w3-center w3-padding">
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
  </div>
 <hr>
    <div class="w3-row w3-text-grey w3-center w3-padding">
    <div class="w3-half w3-container w3-padding">
      <img src="w3images/azamgarh.jpg" width="300" height="300">
    </div>
    <div class="w3-half w3-container w3-padding">
      <p><h2>Azamgarh</h2>It is a city in the Indian state of Uttar Pradesh. It is the headquarters of Azamgarh division, which consists of Balia, Mau and Azamgarh districts. Azamgarh is situated on the bank of Tamsa River (Tons).Azamgarh, one of the easternmost districts of Uttar Pradesh, once formed a part of the ancient Kosala kingdom, except its north-eastern part. Azamgarh is also known as land of the sage Durvasa whose ashram was located in Phulpur tehsil, near the confluence of Tamsa and Majhuee rivers, 6 kilometres (3.7 mi) north of the Phulpur tehsil headquarters.</p>
    </div>
  </div>
<hr>
    <div class="w3-row  w3-text-grey w3-center">
      
      <h1 class="w3-xxlarge w3-text-lime">Owners & Members.</h1>
  
   
     
 <div class="w3-row-padding w3-grayscale">
    <div class="w3-half w3-margin-bottom">
      <img src="w3images/team2.jpg" alt="John" style="width:100%">
      <h3>Hriday Nath Pandey</h3>
      <p class="w3-opacity">CEO & Founder</p>
      <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
      <p><button onclick="document.getElementById('Con1').style.display='block'" class="w3-button w3-light-grey w3-block">contact</button></p>
    </div>
   <div class="w3-half w3-margin-bottom">
      <img src="w3images/team1.jpg" alt="Jane" style="width:100%">
      <h3>Manjeet Singh</h3>
      <p class="w3-opacity">Architect</p>
      <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
     <p><button onclick="document.getElementById('Con2').style.display='block'" class="w3-button w3-light-grey w3-block">contact</button></p>
  </div>
</div>
</div>
</div>




      <footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-opacity w3-xxlarge" style="margin:-24px">
    <a href="https://www.facebook.com/purvadevelopers/" target="_blank" style="text-decoration: none;"><i class="fa fa-facebook-official w3-hover-text-blue"></i></a>
    <a href="https://www.facebook.com/purvadevelopers/" target="_blank" style="text-decoration: none;"><i class="fa fa-instagram w3-hover-text-red"></i>
    </a>
    <a href="https://www.facebook.com/purvadevelopers/" target="_blank" style="text-decoration: none;"><i class="fa fa-whatsapp w3-hover-text-green"></i></a>
    <a href="https://www.facebook.com/purvadevelopers/" target="_blank" style="text-decoration: none;"><i class="fa fa-pinterest-p w3-hover-text-red"></i></a>
    <a href="https://www.facebook.com/purvadevelopers/" target="_blank" style="text-decoration: none;"><i class="fa fa-twitter w3-hover-text-blue"></i></a>

    <p class="w3-medium">Powered by <a href="index.php" target="_blank" class="w3-hover-text-green">Purva Devlopers pvt. Ltd.</a></p>
    <p class="w3-small">All Right Reserve &copy;<a href="index.php" target="_blank" class="w3-hover-text-green">Purva Devlopers </a></p>
    <p class="w3-small" ><a style="text-decoration: none;" href="http://www.handyhunt.in/" target="_blank">For more visit HandyHunt.in</a></p>
  </footer>



    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    

   
<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>

    
</body>
</html>
<?php ob_end_flush(); ?>


   
<!-- Contact Modal -->
<div id="Con1" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-black">
      <span onclick="document.getElementById('Con1').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>Contact</h1>
    </div>
   
    <div class="w3-container">
      <p>Personal Contact:-</p>
      <h2 class="w3-center w3-text-grey">+91 327332840</h2>
    
  </div>
</div>
</div>

<!-- Contact Modal -->
<div id="Con2" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-black">
      <span onclick="document.getElementById('Con2').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>Contact</h1>
    </div>
    <div class="w3-container">
      <p>Personal Contact:-</p>
      <h2 class="w3-center w3-text-grey">+91 327332840</h2>    
  </div>
</div>

