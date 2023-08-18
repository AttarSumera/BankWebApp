
<!doctype html>
<html lang="en">
  <head>
    <title>Bank Of Maharashtra</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
    <style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
</style>

    <script>
        // Ignore this in your implementation
        window.isMbscDemo = true;
    </script>
</head>
 
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <?php

//for sql connection
$host = 'localhost:3306';  
$user = 'root';  
$pass = ''; 
$dbname = 'bankerdb';   
$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(! $conn )  
{  
die('Could not connect: ' . mysqli_connect_error());  
}   

$sql = "SELECT * FROM slot";
$retval=mysqli_query($conn, $sql);  
$retval1=mysqli_query($conn, $sql); 
$retval2=mysqli_query($conn, $sql); 
$conn->close();

?>
  
   <div id="overlayer"></div>
  

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <!--Navbar--->
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class='logo-holder logo-3 mr-3'>

            <h3 class="h" style="margin-top: 12px;color:cornsilk">User | Home</h3>

        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

      

            <a class="nav-link" href = "logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
        </div>
    </nav>

    <!--Navbar End--->

    <div class="container p-5">
        <form method="POST" action="Action.php" enctype="multipart/form-data" class="p-5 bg-white">
        <h1> User Request Form</h1>


        <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Date Available</label>
                                <select class="form-control" name="date" id="exampleFormControlSelect1">
                                <?php
            if(mysqli_num_rows($retval) > 0){  
                while($row = mysqli_fetch_assoc($retval)){   
            ?>
                                <option value="<?php echo $row['date']??''; ?>"><?php echo $row['date']??''; ?></option>
                                <?php  }   }else{  echo "0 results";  
           }   
            ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Time Available</label>
                                <select class="form-control" name="time" id="exampleFormControlSelect1">
                                <?php
            if(mysqli_num_rows($retval1) > 0){  
                while($row = mysqli_fetch_assoc($retval1)){   
            ?>
                                <option value="<?php echo $row['time']??''; ?> - <?php echo $row['time2']??''; ?>"><?php echo $row['time']??''; ?> - <?php echo $row['time2']??''; ?></option>
                                <?php  }   }else{  echo "0 results";  
           }   
            ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Slot Available at Time You Selected</label>
                                <select class="form-control" name="slot" id="exampleFormControlSelect1">
                                <?php
                                if(mysqli_num_rows($retval2) > 0){  
                while($row = mysqli_fetch_assoc($retval2)){   
            ?>                  
                                <option value="<?php echo $row['id']??''; ?>"> <?php echo $row['time']??''; ?> - <?php echo $row['time2']??''; ?> SLOT REMAIN - > <?php echo $row['slot']??''; ?></option>
                                <?php  }   }else{  echo "0 results";  
           }   
            ?>
                                </select>
                            </div>


      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Phone Number</label>
        <input type="number" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Date Of Birth</label>
        <input type="date" name="dob" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      
      </div>
      <br><br>
      <div >
      Select The Query Type:
      </div>
      <div class="form-check">
      
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Linking Mobile Number With Aadhar Card">
      <label class="form-check-label" for="exampleRadios2">
      Linking Mobile Number With Aadhar Card
      </label>
    </div>

        <div class="form-check">
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Updating In Pan Card">
      <label class="form-check-label" for="exampleRadios2">
      Updating In Pan Card
      </label>
    </div>

      <div class="form-check">
    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Updating In Aadhar Card">
    <label class="form-check-label" for="exampleRadios2">
    Updating In Aadhar Card
    </label>
  </div>

  <br><br>

    
      <div class="form-group">Documents Required:
    <p>1.A self-attested copy of your Aadhar card.<br>
    <strong>Note :No Need to Upload any Aadhar card</strong><br>
     2.Proof of Identity: (Any one of) PAN Card/Ration Card/Voter ID/Passport/Driving License, etc. <br>
      3.Proof of Address: (Any one of) Passport/Voter ID/Driving License/Ration Card/Utility Bill/Bank Passbook, etc. <br>
      4.Proof of Date of Birth: (Any one of) Passport/Birth Certificate/PAN Card, etc<br>
      <strong>Note : Please Upload Only PDF file. Combine All Documents in single PDF</strong>
      <br>
      <input placeholder="Documents" id="uploadfile" accept="application/pdf" name="uploadfile" type="file"></p>
    
  </div>
     
    
  <br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
   
    

  <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-5">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>The Internet banking portal of our bank, enables its retail banking customers to operate their accounts from anywhere anytime, removing the restrictions imposed by geography and time. It's a platform that enables the customers to carry out their banking activities from their desktop, aided by the power and convenience of the Internet..</p>
              </div>
              <div class="col-md-3 ml-auto">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#about-section" class="smoothscroll">Home</a></li>
                  <li><a href="#about-section" class="smoothscroll">User Login</a></li>
                  <li><a href="#about-section" class="smoothscroll">Admin Login</a></li>
                  <li><a href="#services-section" class="smoothscroll">Manager Login</a></li>
                  <li><a href="#contact-section" class="smoothscroll">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-md-3 footer-social">
                <h2 class="footer-heading mb-4">Follow Us</h2>
                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
              </div>
            </div>
          </div>
       
        </div>
        <div class="row pt-5 mt-1 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p class="copyright"><small>
              Developed By : Team Jarvis</small></p>
        
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  </div> <!-- .site-wrap -->

<script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>


  <script src="js/main.js"></script>

</body>
</html>