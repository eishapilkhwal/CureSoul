<?php session_start();
$mail=$_SESSION['mail'];
echo $mail;
?>
<style>
    <?php include "options.css" ?>
    <?php include "userprofile.css" ?>

</style>
<?php
$con = new mysqli('localhost', 'root', '', 'userdemo');
if ($con->connect_error) {
    die('Failed to connect : ' . $con->connect_error);
}

?>
<body>
    <!-- Header -->
    <section id="header">
        <div class="header container">
            <div class="nav-bar">
                <div class="brand">
                    <a href="index.html">
                        <h1><span>C</span>ure <span>S</span>oul</h1>
                    </a>
                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <ul>
                        <li><a href="../index.html" data-after="Home">Home</a></li>
                        <li><a href="../index.html#aboutsec" data-after="About">About</a></li>
                        <li><a href="../index.html#services" data-after="Service">Services</a></li>
                        <li><a href="../index.html#faqs" data-after="FAQ">FAQ</a></li>
                        <li><a href="../index.html#contact" data-after="Contact">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Header -->

    <!-- Content box -->
    <div class="main-box">
        <div class="image">
                <img src="img-7.png" alt="" width="40%">
        </div>

   
    <div class="data">
        <div class="form">
            <form action="#">
                <div class="row">
                    <div class="col-1">
                    <?php                    
                    $q = "select * from useraccount where email = $mail";
                    $query = mysqli_query($con, $q);
                    $rows = mysqli_fetch_array($query);

                ?>
                        <p class="heading">Full Name -</p>
                    </div>
                    <div class="col-2">
                        <input type="text" name="name" value="<?php echo $rows['username']?>">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-1">
                        <p class="heading">Registered Mail-Id-</p>
                    </div>
                    <div class="col-2">
                        <input type="email" name="email" value="<?php echo $rows['email']?>">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-1">
                        <p class="heading">Date Of Birth-</p>
                    </div>
                    <div class="col-2">
                        <input type="text" name="dob" value="<?php echo $rows['dob']?>">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-1">
                        <p class="heading">Education-</p>
                    </div>
                    <div class="col-2">
                        <input type="text" name="edu" value="">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-1">
                        <p class="heading">Working Status-</p>
                    </div>
                    <div class="col-2">
                        <input type="text" name="stat" value="">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-1">
                        <p class="heading">Interest</p>
                    </div>
                    <div class="col">
        
                        <p><input for="Music" type="radio" value="m" name="interest">Music</p>
                        
                        <p><input for="Quotes" type="radio" value="q" name="interest">Poem</p>
                        
                        <p><input for="Poems" type="radio" value="p" name="interest">Quotes</p>
                      
        
                    </div>
                </div>
            </form>
        </div>
    </div>
<!-- </div> -->

</body>

</html>