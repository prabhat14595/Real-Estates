<?php
 ob_start();
 session_start();

 include_once 'dbconnect.php';

 $error = false;

 if ( isset($_POST['SEND']) ) {
  
  // clean user inputs to prevent sql injections
  $name1 = trim($_POST['Name1']);
  $name1 = strip_tags($name1);
  $name1 = htmlspecialchars($name1);
  
  $email1 = trim($_POST['Email1']);
  $email1 = strip_tags($email1);
  $email1 = htmlspecialchars($email1);
  
  $sub = trim($_POST['Subject1']);
  $sub = strip_tags($sub);
  $sub = htmlspecialchars($sub);


  $com = trim($_POST['Comment1']);
  $com = strip_tags($com);
  $com = htmlspecialchars($com);
  

  
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO users1(uname,umail,usub,ucomment) VALUES('$name1','$email1','$sub','$com')";
   $res = mysql_query($query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered. We will reply you ASAP.";
    unset($name);
    unset($email);
    unset($sub);
    unset($com);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
    
  }
  
  
 }
?>

<!DOCTYPE html>
<html>
<title>Home Purva devlopers</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<style type="text/css">
  #navbar{
    opacity: 0.9;
  }
  a{
    text-decoration: none;
  }
</style>
<body>

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card-2 w3-top w3-large w3-animate-left w3-text-grey" style="display:none;z-index:2;width:25%;min-width:260px" id="mySidebar">
   <a href="home.php" onclick="w3_close()" class="w3-left w3-button w3-text-blue">PURVA Devlopers</a>
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-red w3-right w3-button">X</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button"><span class="fa fa-home w3-bar-item w3-xlarge w3-button w3-text-blue w3-left "></span></a>
  <img class="w3-bar-item" src="w3images/a1.jpg"  >
  <a href="project1.php" onclick="w3_close()" class="w3-bar-item w3-button">Projects</a>
  <a href="about1.php" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
  <a href="contact1.php" onclick="w3_close()" class="w3-bar-item w3-button">Contact</a>
  <a href="login.php" onclick="w3_close()" class="w3-bar-item w3-button">login/signup</a>
</nav>


<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card-2 " id="navbar">
    <a class="w3-bar-item w3-button w3-left w3-small" onclick="w3_open()"><i class="fa fa-bars" aria-hidden="true"></i></a>
    <a href="home.php" class="w3-bar-item w3-button w3-text-blue w3-hide-small"><b>PURVA</b> Developers</a>
    <a href="home.php" class="w3-small w3-bar-item w3-text-blue w3-hide-large w3-hide-medium">PURVA Developer</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="home.php"><span class="fa fa-home w3-bar-item w3-xlarge w3-button w3-text-blue "></span></a>
      <a href="project1.php" class="w3-bar-item w3-button">Projects</a>
      <a href="about1.php" class="w3-bar-item w3-button">About</a>
      <a href="contact1.php" class="w3-bar-item w3-button">Contact</a>
     <a href="login.php" class="w3-bar-item w3-button ">login/signup</a>
    </div>
  </div>
</div>


<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="w3images/pics2.jpg" alt="Architecture" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center w3-hide-small">
    <h1 class="w3-xxxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>PURVA</b></span> <span class="w3-hide-small w3-text-white">Developers</span></h1>
    <h5 class="w3-text-white">Please LOGIN to get more features.</h5>
    <a href="#projects"><span  class="fa fa-arrow-circle-o-down w3-xxlarge" aria-hidden="true"></span></a>
  </div>
  
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:950px">

  <!-- Project Section -->
  <div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-xxlarge w3-text-blue">What We Do</h3>
  </div>

  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Summer House</div>
        <img src="w3images/house5.jpg" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Brick House</div>
        <img src="w3images/house2.jpg" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Renovated</div>
        <img src="w3images/house3.jpg" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Barn House</div>
        <img src="w3images/house4.jpg" alt="House" style="width:100%">
      </div>
    </div>
  </div>

  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Summer House</div>
        <img src="w3images/house2.jpg" alt="House" style="width:99%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Brick House</div>
        <img src="w3images/house5.jpg" alt="House" style="width:99%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Renovated</div>
        <img src="w3images/house4.jpg" alt="House" style="width:99%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Barn House</div>
        <img src="w3images/house3.jpg" alt="House" style="width:99%">
      </div>
    </div>
  </div>

  <!-- About Section -->
  <div class="w3-container w3-padding-32" id="about">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-xxlarge w3-text-blue">Portpholio</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
      occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
      laboris nisi ut aliquip ex ea commodo consequat.
    </p>
  </div>

  
  <!-- Contact Section -->
  <div class="w3-container w3-padding-32" id="contact">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-xxlarge w3-text-blue">Massage Us</h3>
    <p>Lets get in touch and talk about your and our next project.</p>
    <form method="POST"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
       <b class="w3-text-green w3-padding-16 "> <?php echo $errMSG; ?></b>
      <input class="w3-input" type="text" placeholder="Name" required name="Name1">
      <input class="w3-input w3-section" type="text" placeholder="Email" required name="Email1"> 
      <input class="w3-input w3-section" type="text" placeholder="Subject" required name="Subject1">
      <input class="w3-input w3-section" type="text" placeholder="Comment" required name="Comment1">
      <button class="w3-button w3-black w3-section" type="submit" name="SEND">
        <i class="fa fa-paper-plane"></i> SEND MESSAGE
      </button>
    </form>
  
  
<!-- End page content -->
</div>

<!-- Google Map -->
<div class="w3-container w3-padding-32 ">
<h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-xxlarge w3-text-blue">Maps</h3>

</div>
<img class="w3-hide-small" src="w3images/capture1.png" alt="map" style="width:100%;height:550px;">
<img class="w3-hide-large w3-hide-medium" src="w3images/cap1.png"  alt="maps" style="width: 95%">
</div>
<!-- Footer -->


<footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-opacity w3-xxlarge" >
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

</body>
</html>



 <?php ob_end_flush(); ?>