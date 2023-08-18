<?php
ob_start();
session_start();
?>
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

    <div class="container-fluid">
<?php
error_reporting(0);
?>
<?php
 
  // image upload...

          
    $host = 'localhost:3306';  
    $user = 'root';  
    $pass = ''; 
    $dbname = 'bankerdb';   
    $conn = mysqli_connect($host, $user, $pass,$dbname);  
    if(! $conn )  
    {  
    die('Could not connect: ' . mysqli_connect_error());  
    } 
     
     
      $filename = $_FILES["uploadfile"]["name"];
      $tempname = $_FILES["uploadfile"]["tmp_name"];    
      $folder = "./admin/Upload/".$filename;


      $date =  $_REQUEST['date'];
      $time = $_REQUEST['time'];
      $id =$_REQUEST['slot'];
      $name =  $_REQUEST['name'];
      $email = $_REQUEST['email'];
      $phone = $_REQUEST['phone'];
      $dob=$_REQUEST['dob'];
      $request =  $_REQUEST['exampleRadios'];
     
        //echo $savefile;
  
            // Get all the submitted data from the form
        $sql ="INSERT INTO userrequest(date,time,slot,firstname,email,phone,dateofbirth,request,filename) VALUES ('$date','$time','$id','$name','$email','$phone','$dob','$request','$filename')";
  
        // Execute query 
        mysqli_query($conn, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            echo "<div class='alert alert-success' role='alert'>
            Request Uploaded Successful Thank you ! 
            <a href='UserHome.php'> <button type='submit' class='btn btn-success'>Refresh</button></a>
            </div>";  
        }else{
            echo "<div class='alert alert-danger' role='alert'>
            Try Again Something went wrong ! 
            <a href='UserHome.php'> <button type='submit' class='btn btn-success'>Back To Uplaod</button></a>
        </div> "; 
      }

      // Query for fetch all the data of the user with id 123
        
        $sql3 = "SELECT * from slot WHERE id='$id'";
        $retval2=mysqli_query($conn, $sql3); 
        $r=0;

        if(mysqli_num_rows($retval2) > 0){  
            while($row = mysqli_fetch_assoc($retval2)){   
              
             
              $r=$row['slot']??'';




         }   }else{  echo "0 results";  
       } 
       
       $rr=$r-1;
       $sql4= "UPDATE slot SET slot='$rr' WHERE id=$id";
  
    
              if(mysqli_query($conn, $sql4)){  
              echo "<div class='alert alert-success' role='alert'>
         Slot Updated Successfully
         <a href='UserHome.php'> <button type='submit' class='btn btn-success'>Refresh</button></a>
          </div>";  
              }else{  
                  echo "<div class='alert alert-danger' role='alert'>
              Try Again Something went wrong ! 
              <a href='UserHome.php'> <button type='submit' class='btn btn-success'>Refresh</button></a>
          </div> ".mysqli_error($conn);  
              }  
     
  
?>
  </div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>