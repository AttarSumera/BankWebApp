<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Bank Of Maharashtra</title>
  </head>
  <body>

  <div class="container text-center mt-2">
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
            
        $fnm= $_REQUEST['firstname'];
        $lnm = $_REQUEST['lastname'];
        $email=  $_REQUEST['email'];
        $subject = $_REQUEST['subject'];
        $message=  $_REQUEST['message'];
  
    
            
        // Performing insert query execution
       
        $sql = "INSERT INTO contactus(fnm,lnm,email,subject,message) VALUES ('$fnm','$lnm','$email','$subject','$message')";  

	  
            if(mysqli_query($conn, $sql)){  
            echo "<div class='alert alert-success' role='alert'>
       Contact Successfully
       <a href='index.php'> <button type='submit' class='btn btn-success'>Return</button></a>
        </div>".mysqli_error($conn);  
            }else{  
                echo "<div class='alert alert-danger' role='alert'>
            Try Again Something went wrong ! 
            <a href='index.php'> <button type='submit' class='btn btn-success'>Return</button></a>
        </div> ".mysqli_error($conn);  
            }  
            
        // Close connection
        mysqli_close($conn);
        ?>
  </div>


  
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

  
  </body>
</html>
