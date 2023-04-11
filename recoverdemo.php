<?php
$answer=$_POST['hobby'];
$email=$_POST['email'];
$con=new mysqli('localhost','root','','userdemo');
if($con->connect_error){
   die('Failed to connect : '.$con->connect_error);
}
else{ 
     $stmt=$con->prepare("select * from useraccount where email=?");
     $stmt->bind_param("s",$email);
     $stmt->execute();
     $stmt_result=$stmt->get_result();
     if($stmt_result->num_rows > 0){
         $data=$stmt_result->fetch_assoc();
         if($data['hobby'] === $answer){
            header('location:reset.html');
         }
         else{
            echo "<h2>Invalid username or password.</h2>";
         }
     }
     else{
         echo "<h2>Invalid username or password.</h2>";
         
     }
}
?>
