
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
    <meta charset="UTF-8">
  <title>GFG User Details</title>
  <!-- CSS FOR STYLING THE PAGE -->
  <style>
    table {
      margin: 0 auto;
      font-size: large;
      border: 1px solid black;
    }

    h1 {
      text-align: center;
      color: #006600;
      font-size: xx-large;
      font-family: 'Gill Sans', 'Gill Sans MT',
      ' Calibri', 'Trebuchet MS', 'sans-serif';
    }

    td {
      background-color: #E4F5D4;
      border: 1px solid black;
    }

    th,
    td {
      font-weight: bold;
      border: 1px solid black;
      padding: 10px;
      text-align: center;
    }

    td {
      font-weight: lighter;
    }
  </style>

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <?php
        
        $host = 'localhost:3306';  
        $user = 'root';  
        $pass = ''; 
        $dbname = 'bankerdb';   
        $conn = mysqli_connect($host, $user, $pass,$dbname);  
        if(! $conn )  
        {  
        die('Could not connect: ' . mysqli_connect_error());  
        }  
        if (isset($_POST['managerlogin'])) 
        {

                $sql = "SELECT * FROM manager";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    if (
                        $_POST['email'] == $row["email"] &&
                        $_POST['password'] == $row["password"]
                    ) {
                        $_SESSION['valid'] = true;
                        $_SESSION['timeout'] = time();
                        $_SESSION['email'] = $row["email"];

            
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Logging you in ... </strong>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
                        header('Refresh: 2; URL = ManagerHome.php');
                        # mysqli_close($conn);  
                    } else {

                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Wrong Username or Password </strong>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
                    }
                }
                } else {
                echo "0 results";
                }
            
        }
      
        // Close connection
        mysqli_close($conn);
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
   
    
    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index.html" class="h2 mb-0">Bank Of Maharashtra<span class="text-primary">.</span> </a></h1>
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="index.php" class="nav-link"style="color:black;">Home</a></li>
                 <li><a href="user.php" class="nav-link"style="color:black;">User</a>
                <li><a href="employee.php" class="nav-link"style="color:black;">Bank Employee</a></li>
                <li><a href="Manager.php" class="nav-link"style="color:black;">Bank Manager</a></li>
                <li><a href="Admin.php" class="nav-link"style="color:black;">Admin</a></li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>
    <br><br><br>
    <div class="container">
    <div id="login-form  text-align: center; ">
        <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                                                                    ?>" method="post">       
          <div class="col-md-12">           
              <div class="form-group align: center; ">
                  <h2 class="">Log In.</h2>
                </div>            
              <div class="form-group col-md-5 text-center">
                  <hr />
                </div>                
       
                
                <div class="form-group">
                  <div class="input-group col-md-5 text-center">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                    <input type="email" name="email" class="form-control" placeholder="Your Manager Email" required />
                    </div>
                </div>
                
                <div class="form-group">
                  <div class="input-group col-md-5 text-center">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                    <input type="password" name="password" class="form-control" placeholder="Your Password" required />
                    </div>
                </div>                
                <div class="form-group col-md-5 text-center">
                  <hr />
                </div>                
                <div class="form-group col-md-5 text-center">
                  <button type="submit" class="btn btn-block btn-primary" name="managerlogin">Log In</button>
                </div>                
                <div class="form-group col-md-5 text-center">
                  <hr />
                </div>                
                        
            </div>     
        </form>
      </div>  
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
<html>