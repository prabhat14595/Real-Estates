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

<!-- Latest compiled and minified CSS -->
</head>
<body>

<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card-2">
    <a href="home.php" class="w3-bar-item w3-button w3-text-grey"><b>PURVA</b> Developers</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
    <a href="home.php"><span class="fa fa-home w3-bar-item w3-xlarge w3-button "></span></a>
      <a href="project.php" class="active w3-bar-item w3-button w3-text-white w3-grey">Projects</a>
      <a href="about.php" class="w3-bar-item w3-button">About</a>
      <a href="contact.php" class="w3-bar-item w3-button">Contact</a>
      <a  class="w3-bar-item w3-button w3-green">
     <span class="glyphicon glyphicon-user"></span>&nbsp;Hi<b> <?php echo $userRow['userName']; ?></b>&nbsp;<span class="caret"></span></a>
      <a href="logout.php?logout" class="w3-bar-item w3-button w3-text-red"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a>
    </div>
  </div>
</div>


<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="w3images/projects.jpg" alt="Architecture" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center w3-hide-small">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Our Projects</b></span></h1>
    <a href="#call"><span  class="fa fa-arrow-circle-o-down w3-xxlarge" aria-hidden="true"></span></a>

  </div>
 
</header>


<div class="w3-container w3-padding-16" style="max-width: 950px; margin: 0 auto;" id="call">
 <div class="w3-row w3-center w3-text-grey" id="call">
      <h1 class="w3-xxlarge">Our new Projects</h1>
    </div>
    
    <div class="w3-row w3-center">
      <img src="w3images/p1.png" width="600px" height="400px" >
    </div>
    <div class="w3-row w3-center">
       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
      
    </div>
  <hr>
<div class="w3-row w3-center w3-text-grey w3-padding-32" >
      <h1 class="w3-xxlarge">Project <span class="w3-grey w3-text-white w3-padding w3-border w3-border-blue">MAHAVAN</span></h1>
    </div>
    <div class="w3-row">
    <div class="w3-half w3-padding w3-center">
      <img  src="w3images/p1.png" width="300px" height="300px" >
    </div>
    <div class="w3-half w3-center w3-padding-16">
       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
    </div>
    </div>
  <hr>
   
<div class="w3-row w3-center w3-text-grey w3-padding-32" >
      <h1 class="w3-xxlarge">Project <span class="w3-grey w3-text-white w3-padding w3-border w3-border-blue">RAMAJI PURAM</span></h1>
    </div>
    <div class="w3-row">
    <div class="w3-half w3-center w3-padding-16">
       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
    </div>
    <div class="w3-half w3-padding w3-center">
      <img  src="w3images/p1.png" width="300px" height="300px" >
    </div>
    </div>
  <hr>


  <div class="w3-row w3-center w3-text-grey w3-padding-32" >
      <h1 class="w3-xxlarge">Upcoming <span class="w3-grey w3-text-white w3-padding w3-border w3-border-blue">Projects</span></h1>
    </div>
    <div class="w3-row">
    <div class="w3-half w3-padding w3-center">
      <img  src="w3images/p1.png" width="300px" height="300px" >
    </div>
    <div class="w3-half w3-center w3-padding-16">
       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
    </div>
    </div>
  <hr>
   
    <div class="w3-row w3-text-grey w3-center">
    <div class="w3-half ">
      <h2>E-mail Us at-</h2>
    </div>
    <div class="w3-half ">
      <h3>purvadevelopers@gmail.com</h3>
    </div>
  </div>
<hr>
    <div class="w3-row  w3-text-grey w3-center">
    <div class="w3-half ">
      <h2>Call Us at-</h2>
    </div>
    <div class="w3-half">
      <h3>+91 88 886 7765</h3>
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



    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>


