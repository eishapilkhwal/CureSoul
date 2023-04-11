<?php
    $email=$_POST['email'];
    $new_password=$_POST['new_password'];
    $confirm_password=$_POST['confirm_password'];

    //connect with database
 $con=new mysqli("localhost","root","","userdemo");
 if($con->connect_error){
    die("Failed to connect : ".$con->connect_error);
 }
 else{
    if($new_password===$confirm_password){
    $hash=password_hash($new_password,PASSWORD_DEFAULT);    
    $stmt=$con->prepare("update useraccount set password=? where email=?");
    $stmt->bind_param("ss",$hash,$email);
    $stmt->execute();
    if($stmt){
        header('Location:login.html');
        }
    else{
        echo '<script>Enter Valid Email.</script>';
    }

    }
    else{
        //echo "<h2>Confirm password and new password should match.</h2>";
        echo '<script type="text/javascript">
       window.onload = function () { alert("Confirm password and new password should match."); } 
        </script>';
    }
    $stmt->close();
   $con->close();
 }
?>
