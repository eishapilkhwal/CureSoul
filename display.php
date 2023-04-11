<style>
    <?php include "quiz.css" ?>
</style>

<?php
$con = new mysqli('localhost', 'root', '', 'q&a');
if ($con->connect_error) {
    die('Failed to connect : ' . $con->connect_error);
}

?>
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
                <li><a href="index.html" data-after="Home">Home</a></li>
                <li><a href="index.html#aboutsec" data-after="About">About</a></li>
                <li><a href="index.html#services" data-after="Service">Services</a></li>
                <li><a href="index.html#faqs" data-after="FAQ">FAQ</a></li>
                <li><a href="index.html#contact" data-after="Contact">Contact Us</a></li>
            </ul>
            </div>
        </div>
        </div>
    </section>
    <!-- End Header -->
<div>
<h2>Evaluate Your Depression</h2><br>

<div class ="about">
<p>Take this research-backed test. This test is based on Aaron Temkin Beck's Depression Inventory. He is an an influential psychologist regarded as the father of cognitive therapy. This test is quick, free and you’ll get your confidential results instantly.
<br>
<br>
Use this brief 21-question online automated depression quiz to help you determine if you may need to see a mental health professional for diagnosis and treatment of depression, or for tracking your depression and 
mood on a regular basis.
<br>Have some questions? Jump to <a href="index.html#faqs" data-after="FAQ">FAQ</a> section.</p>
</div>
<div class="form">
    <form action="score.php" method="post">
        <?php
        for ($i = 1; $i <= 21; $i++) {
            $q = "select * from question where qid = $i";
            $query = mysqli_query($con, $q);
            while ($rows = mysqli_fetch_array($query)) {
        ?>
                <!-- <div> -->
                <div class="display_ques">
                    <h4><?php echo $rows['desp'] ?> </h4>
                </div>


                <?php
                $q = "select * from answer where qid = $i";
                $query = mysqli_query($con, $q);
                while ($rows = mysqli_fetch_array($query)) {
                ?>
                    <div class="display_ans">
                        <input type="radio" name="quizcheck[<?php echo $rows['qid'] ?>]" value="<?php echo $rows['value']?>" required>
                        <?php echo $rows['Desp'] ?>
                    </div>

        <?php
                }
            }
        }
        ?>
        <div class="button">
            <input type="submit" name="submit" value="submit" id="btn">
        </div>
    </form>
</div>
