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
<style type="text/css">
  #navbar{
    opacity: 0.92;
  }
  #nav{
    opacity: 0.9;
  }
  
</style>
</head>
<body>

<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card-2" id="navbar">
    <a href="home.php" class="w3-bar-item w3-button w3-text-blue"><b>PURVA</b> Developers</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
    <a href="home.php"><span class="fa fa-home w3-bar-item w3-xlarge w3-button w3-text-blue "></span></a>
      <a href="project.php" class="w3-bar-item w3-button">Projects</a>
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
  <img class="w3-image" src="w3images/pics.jpg" alt="Architecture" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxxlarge w3-text-white w3-hide-small"><span class="w3-padding w3-black w3-opacity-min"><b>PURVA</b></span> <span class="w3-hide-small w3-text-white">Developers</span></h1>
    <h2 class="w3-xlarge w3-text-white w3-hide-small">Welcome<span class="w3-padding w3-green" id="nav"><?php echo $userRow['userName']; ?> !!!</span></h2>
  <h6 class=" w3-text-white w3-hide-medium w3-hide-large">Welcome<span class="w3-green" id="nav"><?php echo $userRow['userName']; ?> </span></h6>

    <a href="#projects"><span  class="fa fa-arrow-circle-o-down w3-xxlarge w3-hide-small" aria-hidden="true"></span></a>
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
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-xxlarge w3-text-blue">Owners and Members</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
      occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
      laboris nisi ut aliquip ex ea commodo consequat.
    </p>
  </div>

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


   
  <div class="w3-container w3-padding-32">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-jumbo w3-text-blue">Portpholio</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris uip ex ea commodo consequat. Excepteur sint
      occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
      laboris nisi ut aliquip ex ea commodo consequat.
    </p>
  </div>   

  <!-- Contact Section -->
   <div class="w3-container w3-padding-32">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 w3-text-blue w3-xxlarge ">Contact</h3>
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
  </div>
  


  

<!-- End page content -->
</div>

<!-- Google Map -->
 <div class="w3-container w3-padding-32 ">
 <h3 class="w3-border-bottom w3-border-light-grey w3-xxlarge w3-text-blue">Maps</h3>
 <img src="w3images/capture1.png" style="width:100%;height:550px;">
</div>

</div>



      <footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-opacity w3-xxlarge">
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






    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>




    
</body>
</html>





<?php ob_end_flush(); ?>