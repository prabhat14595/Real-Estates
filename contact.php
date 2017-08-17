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
   <a href="home.php" onclick="w3_close()" class="w3-left w3-button w3-text-blue">PURVA Devlopers</a>
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-red w3-right w3-button">X</a>
  <a href="home.php" onclick="w3_close()" class="w3-bar-item w3-button"><span class="fa fa-home w3-bar-item w3-xlarge w3-button w3-left "></span></a>
  <a  class="w3-bar-item w3-button w3-green">&nbsp;Hi<b> <?php echo $userRow['userName']; ?></b>&nbsp;</span></a>
  <img class="w3-bar-item" src="w3images/a1.jpg"  >
  <a href="project.php" onclick="w3_close()" class="w3-bar-item w3-button">Projects</a>
  <a href="about.php" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
  <a href="contact.php" onclick="w3_close()" class="w3-bar-item w3-button w3-blue">Contact</a>
  <a href="logout.php?logout" class="w3-bar-item w3-button w3-text-red">&nbsp;Sign Out</a>
</nav>

<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card-2">
    <a class="w3-bar-item w3-button w3-left w3-small" onclick="w3_open()"><i class="fa fa-bars" aria-hidden="true"></i></a>
    <a href="home.php" class="w3-bar-item w3-button w3-text-blue w3-hide-small"><b>PURVA</b> Developers</a>
     <a href="home.php" class="w3-small w3-bar-item w3-text-blue w3-hide-large w3-hide-medium">PURVA Developer</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
    <a href="home.php"><span class="fa fa-home w3-bar-item w3-xlarge w3-button "></span></a>
      <a href="project.php" class="w3-bar-item w3-button">Projects</a>
      <a href="about.php" class="w3-bar-item w3-button">About</a>
      <a href="contact.php" class="w3-bar-item w3-button w3-blue w3-text-white">Contact</a>
      <a  class="w3-bar-item w3-button w3-green">
     <span class="glyphicon glyphicon-user"></span>&nbsp;Hi<b> <?php echo $userRow['userName']; ?></b>&nbsp;<span class="caret"></span></a>
      <a href="logout.php?logout" class="w3-bar-item w3-button w3-text-red"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a>
    </div>
  </div>
</div>




<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="w3images/Contact.jpg" alt="Architecture" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center w3-hide-small">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Contact Us</b></span></h1>
     <a href="#call"><span  class="fa fa-arrow-circle-o-down w3-xxlarge" aria-hidden="true"></span></a>
  </div>
</header>


<div class="w3-container w3-padding" style="max-width: 950px; margin: 0 auto;" id="call">
    <div class="w3-row w3-center w3-text-grey" >
      <h2><span class="w3-text-blue w3-hide-small">Please login to get personal contact mobile no of members.</span></h2>
      <b>Call US At-</b>
      <h1 class="w3-jumbo w3-hide-small w3-text-blue">+91-94 158 35985</h1>
      <h5 class=" w3-hide-large w3-text-blue w3-hide-medium">+91-94 158 35985</h5>
    </div>
    <hr>
  <div class="w3-row w3-text-grey w3-center">
    <div class="w3-half">
      <h3><i class="fa fa-phone w3-text-lime" aria-hidden="true"> </i>   Phone No -</h3>
    </div>
    <div class="w3-half">
      <h4>+91-94 152 60025</h4>
    </div>
  </div>
 <hr> 
   <div class="w3-row  w3-text-grey w3-center">
    <div class="w3-half ">
      <h3><i class="fa fa-whatsapp w3-text-green" aria-hidden="true"></i>
 Whats app at -</h3>
    </div>
    <div class="w3-half">
      <h4>+91-94 153 70172</h4>
    </div>
  </div>
<hr>

    <div class="w3-row w3-text-grey w3-center">
    <div class="w3-half ">
      <h3><i class="fa fa-envelope-o w3-text-red" aria-hidden="true"></i> E-mail Us at -</h3>
    </div>
    <div class="w3-half ">
      <h3>purvadevelopers@gmail.com</h3>
    </div>
  </div>
<hr>
    
    <div class="w3-row w3-text-grey w3-center">
    <div class="w3-half ">
      <h3><i class="fa fa-facebook-official w3-text-blue" aria-hidden="true"></i>
Facebook link-</h3>
    </div>
    <div class="w3-half">
      <h4>www.facebook.com/purvadevelopers/</h4>
    </div>
  </div>
  <hr>
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
  <!-- End footer -->
  </footer>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>



    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>









