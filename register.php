<?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php");
 }
 include_once 'dbconnect.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
   $res = mysql_query($query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($name);
    unset($email);
    unset($pass);
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
<title>Login & Registration System</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<style type="text/css">
  #fm{
  margin-top: 60px;
}

a{
  text-decoration: none;
}

</style>
</head>
<body>


<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card-2 w3-top w3-large w3-animate-left w3-text-grey" style="display:none;z-index:2;width:25%;min-width:260px" id="mySidebar">
   <a href="home.php" onclick="w3_close()" class="w3-left w3-button ">PURVA Devlopers</a>
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-red w3-right w3-button">X</a>
  <a href="home.php" onclick="w3_close()" class="w3-bar-item w3-button"><span class="fa fa-home w3-bar-item w3-xlarge w3-button w3-text-blue w3-left "></span></a>
  <img class="w3-bar-item" src="w3images/a1.jpg"  >
  <a href="project1.php" onclick="w3_close()" class="w3-bar-item w3-button">Projects</a>
  <a href="about1.php" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
  <a href="contact1.php" onclick="w3_close()" class="w3-bar-item w3-button">Contact</a>
  <a href="login.php" onclick="w3_close()" class="w3-bar-item w3-button">login/signup</a>
</nav>


<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card-2">
    <a class="w3-bar-item w3-button w3-left w3-small" onclick="w3_open()"><i class="fa fa-bars" aria-hidden="true"></i></a>
    <a href="home.php" class="w3-text-red w3-bar-item w3-button w3-hide-small"><b>PURVA</b> Developers</a>
     <a href="home.php" class="w3-small w3-bar-item w3-hide-large w3-hide-medium w3-text-red">PURVA Developer</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
    <a href="home.php"><span class="fa fa-home w3-bar-item w3-xlarge w3-button "></span></a>
      <a href="project1.php" class="w3-bar-item w3-button">Projects</a>
      <a href="about1.php" class="w3-bar-item w3-button">About</a>
      <a href="contact1.php" class="w3-bar-item w3-button">Contact</a>
      <a href="login.php" class="w3-bar-item w3-button w3-red w3-text-white w3-red">login/signup</a>
    </div>
  </div>
</div>
<div class="w3-row">
<div class="w3-col" style="width:15%"><p></p></div>

<div class="w3-col w3-center" style="width:70%" id="fm">
 <div id="login-form "  >
    <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" >
        
         <div class="form-group">
             <h2 class="w3-jumbo w3-text-red w3-hide-small">Sign Up.</h2>
             <h2 class="w3-xxlarge w3-text-red w3-hide-large w3-hide-medium">Sign Up.</h2>
            </div>
        
        
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group w3-text-blue ">
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
     <div class="w3-padding-16">       
            <div class="form-group w3-padding " >
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input class="w3-input w3-padding-16 w3-border w3-round" type="text" name="name" class="form-control" placeholder="Enter First Name" maxlength="50" value="<?php echo $name ?>" />
                </div>
                <span class="w3-text-red"><?php echo $nameError; ?></span>
            </div>
            
              <div class="form-group w3-padding" >
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input class="w3-input w3-padding-16 w3-border w3-round" type="text" name="name1" class="form-control" placeholder="Enter last Name" maxlength="50"  />
                </div>
                <span class="w3-text-red"><?php echo $nameError; ?></span>
            </div>
            

            <div class="form-group w3-padding">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input class="w3-input w3-border w3-round w3-padding-16" type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                </div>
                <span class="w3-text-red"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group w3-padding">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input class="w3-input  w3-border w3-round w3-padding-16" type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                </div>
                <span class="w3-text-red"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <button type="submit" class="w3-button w3-border w3-border-red w3-round" name="btn-signup">Sign Up</button>
            </div>
            
            <div class="form-group">
            <hr>
            </div>
            
            <div class="w3-button w3-border w3-border-green w3-round">
             <a href="login.php" style="text-decoration: none;">Sign in Here...</a>
            </div>
         <hr />
        </div>
   </div>
    </form>
   </div> 
    </div>


<div class="w3-col" style="width:15%"><p></p></div>
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





