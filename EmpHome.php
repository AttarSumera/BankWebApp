
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

    <style type="text/css">
    body {
        margin: 0;
        padding: 0;
    }

    body,
    html {
        height: 100%;
    }

    .md-calendar-booking .mbsc-calendar-text {
        text-align: center;
    }
    
    .md-calendar-booking .booking-datetime .mbsc-datepicker-tab-calendar {
        flex: 1 1 0;
        min-width: 200px;
    }
    
    .md-calendar-booking .mbsc-timegrid-item {
        margin-top: 1.5em;
        margin-bottom: 1.5em;
    }
    
    .md-calendar-booking .mbsc-timegrid-container {
        top: 30px;
    }
    .app-time {
  border: 1px solid #fff;
  padding: 20px 30px;
  box-shadow: 2px 4px 10px 0px #c7cacce3;
}

.option-input {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  top: 5px;
  right: 0;
  bottom: 0;
  left: 40px;
  height: 20px;
  width: 20px;
  transition: all 0.15s ease-out 0s;
  background: #fff;
  border: 1px solid #999;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 0.5rem;
  outline: none;
  position: relative;
  z-index: 1000;
}
.option-input:hover {
  background: #e5e7eb;
}
.option-input:checked {
  border: 1px solid #fff;
}
.option-input:checked::before {
  color: #d9486d;
  height: 40px;
  width: 40px;
  position: absolute;
  content: "✔";
  display: inline-block;
  font-size: 12px;
  left: 4px;
  line-height: 20px;
}
.option-input:checked::after {
  -webkit-animation: click-wave 0.65s;
  -moz-animation: click-wave 0.65s;
  animation: click-wave 0.65s;
  background: #40e0d0;
  content: "";
  display: block;
  position: relative;
  z-index: 100;
}

.option-input.radio {
  border-radius: 50%;
}
.option-input.radio::after {
  border-radius: 50%;
}
.app-check {
  display: flex;
}
.app-border {
  border: 1px solid #ece9e9;
  border-radius: 7px;
  padding: 5px 7px 5px 9px;
  padding-left: 40px;
  min-height: 30px;
}

.option-input.radio:checked + .app-border {
  background: #d9486d;
}
.option-input.radio:disabled,
.option-input.radio:disabled + .app-border {
  cursor: not-allowed;
  opacity: 0.6;
}
.app-label {
  position: relative;
  top: 5px;
  margin-right: 10px;
}

    </style>
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <!----->
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

$sql = "SELECT * FROM userrequest";
$retval=mysqli_query($conn, $sql);

if (isset($_POST['response'])) 
        {

          $responses= $_REQUEST['responses'];

          $id = $_REQUEST['id'];
          $note =$_REQUEST['note'];
        
  
          $sql2 = "UPDATE userrequest SET response='$responses',note='$note' WHERE id=$id";
  
    
              if(mysqli_query($conn, $sql2)){  
              echo "<div class='alert alert-success' role='alert'>
         Response Successfully
         <a href='EmpHome.php'> <button type='submit' class='btn btn-success'>Refresh</button></a>
          </div>";  
              }else{  
                  echo "<div class='alert alert-danger' role='alert'>
              Try Again Something went wrong ! 
              <a href='EmpHome.php'> <button type='submit' class='btn btn-success'>Refresh</button></a>
          </div> ".mysqli_error($conn);  
              }  
            
        }



$conn->close();

?>
<!----->
  
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

            <h3 class="h" style="margin-top: 12px;color:cornsilk">Employee | Home</h3>

        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

      

            <a class="nav-link" href = "logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
           
        </div>
    </nav>


<!--->
    <!---->
    <div class="container-fluid mt-2 table-responsive">
        <table class="table table-bordered ">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Slot</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Date Of Birth</th>
                    <th scope="col">Request</th>
                    <th scope="col">Files Uploaded</th>
                    <th scope="col">Give Response</th>
                </tr>
            </thead>
            <tbody>
        <?php
            if(mysqli_num_rows($retval) > 0){  
                while($row = mysqli_fetch_assoc($retval)){   
            ?>
            <tr>
            <td><?php echo $row['id']??''; ?></td>
            <td><?php echo $row['date']??''; ?></td>
            <td><?php echo $row['time']??''; ?></td>
            <td><?php echo $row['slot']??''; ?></td>
            <td><?php echo $row['firstname']??''; ?></td>
            <td><?php echo $row['email']??''; ?></td>
            <td><?php echo $row['phone']??''; ?></td>
            <td><?php echo $row['dateofbirth']??''; ?></td>
            <td><?php echo $row['request']??''; ?></td>
            <td><a href="./admin/Upload/<?php echo $row['filename']??''; ?>" download>View User Documents</a></td>
            <td>
            <button type="button" data-toggle="modal" data-target="#exampleModal"  class="btn btn-outline-success" data-whatever="<?php echo $row['id']??''; ?>" >Action</button></td>
            </td>
        
            </tr>
            <?php  }   }else{  echo "0 results";  
           }   
            ?>
           
            </tbody>
            </table>
      
        </div>
    <!---->

       <!--Star Rating-->
       <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Give Response</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                                                                    ?>" method="post">
               
                <input type="text" hidden id="mad" name="id">
                     
                   
                     
                        <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Response:</label>
                                <select class="form-control" name="responses" id="exampleFormControlSelect1">
                               
                                <option value="solve">Solve</option>
                                <option value="unsolve">unSolve</option>
                                <option value="Pending">Pending</option>
                            
                                </select>
                            </div>

                            <div class="form-group">
            <label class="form-check-label" for="exampleRadios2">
    Note
    </label>
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
              <input type="text" name="note" class="form-control" placeholder="Enter Note " required />
                </div>
            </div>
                     
                      
                        <button type="submit" class="btn btn-primary" name="response">Send Response</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
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

  <script src="code.js"></script>

</body>
</html>