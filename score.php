<style>
    <?php include "score.css" ?>
</style>

<?php
$con = new mysqli('localhost', 'root', '', 'q&a');
if ($con->connect_error) {
  die('Failed to connect : ' . $con->connect_error);
}
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
$ans = 0;
?>
<div class="score">
  <?php
  if (isset($_POST['submit'])) {


    $userScore = 0;
    $i = 1;
    $selected = $_POST['quizcheck'];
    $q = "select * from answer";
    $query = mysqli_query($con, $q);
    while ($rows = mysqli_fetch_array($query)) {
      $userScore = $userScore + $selected[$i];
      $i++;
    }
    

    if ($userScore <= 11) {
      echo "<br><h1>Minimal depression</h1><br>";
      echo "<br> Your Score is " . $userScore."<br><br>";
      echo "<p>It is likely a temporary deterioration in mood caused by current events in your life. If symptoms persist, take this test after 7 days and compare the results for deterioration or improvement.</p>";
    } else if (($userScore >= 12) && ($userScore <= 19)) {
      echo "<br><h1>Mild depression</h1><br>";
      echo "<br> Your Score is  " . $userScore."<br><br>";
      echo "<p>The result in this range indicates the need to go to a psychologist or psychotherapist for further diagnosis. Mild depressive symptoms are treated with psychotherapy, without the need for pharmacotherapy. A psychologist or psychotherapist will refer you to a psychiatrist if necessary.</p>";
    } else if (($userScore >= 20) && ($userScore <= 25)) {
      echo "<br><h1>Moderate depression</h1><br>";
      echo "<br> Your Score is " . $userScore."<br><br>";
      echo "<p>Scoring in this range suggests taking quick action and contacting a psychologist, psychotherapist or psychiatrist. It is possible that pharmacological and antidepressant treatment will be initiated by a psychiatrist. It is important to start psychotherapy in addition to pharmacological actions. This determines the effective treatment of depression.</p>";
    } else if (($userScore >= 26) && ($userScore <= 63)) {
      echo "<br><h1>Moderate depression</h1><br>";
      echo "<br> Your Score is " . $userScore."<br><br>";
      echo "<p>It is necessary to see a psychiatrist. It is a dangerous condition for health and life, mainly when suicidal thoughts appear. Psychotherapy is more intense. In some cases, hospital treatment is necessary to prevent life-threatening conditions.</p>";
    }
  }
  ?>
  <hr>
</div>