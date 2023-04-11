
<?php session_start();
 $username= $_POST['username'];
 $dob=date('Y-m-d', strtotime($_POST['dob']));
 $email=$_POST['email'];
 $password=$_POST['password'];
 $hash=password_hash($password,PASSWORD_DEFAULT);
 $gender=$_POST['gender'];
 $answer=$_POST['security_ques'];
 $_SESSION['mail']=$email;
 //connect with database
 $con=new mysqli('localhost','root','','userdemo');
 if($con->connect_error){
    die('Failed to connect : '.$con->connect_error);
 }
 else{
   if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
   $stmt=$con->prepare("insert into useraccount(username,dob,email,password,hobby,gender) 
    values(?,?,?,?,?,?)"); 
   $stmt->bind_param("ssssss",$username,$dob,$email,$hash,$answer,$gender);    
    $stmt->execute();
    header('location:options.html');
    $stmt->close();
    $con->close();
  } 
  else{
   echo '<script type="text/javascript">
   window.onload = function () { alert("Invalid Email"); } 
    </script>';
  }
    
 }
?>
