<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: home.php");
  exit;
 }
 
 $error = false;
 
 if( isset($_POST['btn-login']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }
  
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $pass); // password hashing using SHA256 for incripting the passs

  
   $res=mysql_query("SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
   $row=mysql_fetch_array($res);
   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['userPass']==$password ) {
    $_SESSION['user'] = $row['userId'];
    header("Location: home.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
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

<title>Login & Registration System</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<!--alwaye be use this style -->
<style type="text/css">
a{
  text-decoration: none;
}  
#fm{
  margin-top: 60px;
}



</style>


</head>
<body>


<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card-2 w3-top w3-large w3-animate-left w3-text-grey" style="display:none;z-index:2;width:25%;min-width:260px" id="mySidebar">
   <a href="home.php" onclick="w3_close()" class="w3-left w3-button w3-text-green">PURVA Devlopers</a>
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-red w3-right w3-button">X</a>
  <a href="home.php" onclick="w3_close()" class="w3-bar-item w3-button"><span class="fa fa-home w3-bar-item w3-xlarge w3-button w3-left "></span></a>
  <img class="w3-bar-item" src="w3images/a1.jpg"  >
  <a href="project1.php" onclick="w3_close()" class="w3-bar-item w3-button">Projects</a>
  <a href="about1.php" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
  <a href="contact1.php" onclick="w3_close()" class="w3-bar-item w3-button">Contact</a>
  <a href="login.php" onclick="w3_close()" class="w3-bar-item w3-button w3-green">login/signup</a>
</nav>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card-2">
   <a class="w3-bar-item w3-button w3-left w3-small" onclick="w3_open()"><i class="fa fa-bars" aria-hidden="true"></i></a>
    <a href="home.php" class="w3-text-green w3-bar-item w3-button w3-hide-small "><b>PURVA</b> Developers</a>
     <a href="home.php" class="w3-small w3-bar-item w3-hide-large w3-hide-medium w3-text-green">PURVA Developer</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
    <a href="home.php"><span class="fa fa-home w3-bar-item w3-xlarge w3-button "></span></a>
      <a href="project1.php" class="w3-bar-item w3-button">Projects</a>
      <a href="about1.php" class="w3-bar-item w3-button">About</a>
      <a href="contact1.php" class="w3-bar-item w3-button">Contact</a>
      <a href="login.php" class="w3-bar-item w3-text-white w3-button w3-border w3-green">login/signup</a>
    </div>
  </div>
</div>>
            
             
        <div class="w3-row" id="fm">
    <div class="w3-col" style="width:20%"><p></p></div>
    

    <div class="w3-col" style="width:60%">    

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
          <div class="w3-center" >
             <div>
             <h2 class="w3-center w3-content w3-jumbo w3-text-green w3-hide-small">Sign In.</h2>
             <h2 class="w3-center w3-content w3-xxlarge w3-text-green w3-hide-large w3-hide-medium">Sign In.</h2>
            </div>

      <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div >
             <div class="w3-text-red"> <!--alert danger-->
    <span class="glyphicon glyphicon-info-sign "></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>

   <div class="w3-padding-16 w3-content">
             <div>
              
             <input  type="email" name="email" class="w3-input w3-padding-16 w3-border w3-round" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" / >
                </div>
                <span class="w3-text-red"><?php echo $emailError; ?></span>
            </div>
            
            <div >
             <div class="w3-content">
                
             <input class="w3-input w3-padding-16 w3-border w3-round " type="password" name="pass" placeholder="Your Password" maxlength="15" />
                </div>
                <span class="w3-text-red"><?php echo $passError; ?></span>
            </div>
            
            <div >
             <hr />
            </div>
            
            <div>
             <button type="submit" class="w3-border w3-border-green w3-round w3-button" name="btn-login">Sign In</button>
            </div>
            
            <div >
             <hr />
            </div>
            
            <div class="w3-button w3-border w3-border-red w3-center w3-round">
             <a href="register.php" style="text-decoration: none;">Sign Up Here...</a>
             
            </div>

         <hr />
        </div>
   
    </form>






       </div>
    <div class="w3-col" style="width:20%"><p></p></div>
</div>
</div>
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