<?php
 $usermail= $_POST['usermail'];
 $password=$_POST['password'];

 //connect with database
 $con=new mysqli("localhost","root","","userdemo");
 if($con->connect_error){
    die("Failed to connect : ".$con->connect_error);
 }
 else{
     $stmt=$con->prepare("select * from useraccount where email=?");
     $stmt->bind_param("s",$usermail);
     $stmt->execute();
     $stmt_result=$stmt->get_result();
     if($stmt_result->num_rows > 0){
      $data=$stmt_result->fetch_assoc();
      $hash=$data['password'];
      $verify=password_verify($password,$hash);
      if($verify){
         header('location:options.html');
      }
         else{
            
            echo '<script type="text/javascript">
       window.onload = function () { alert("Invalid Password"); } 
        </script>';
         }
     }
     else{
         //echo "<h2>Invalid username or password.</h2>";
         echo '<script type="text/javascript">
       window.onload = function () { alert("Invalid username or password"); } 
        </script>';
     }
 }
?>