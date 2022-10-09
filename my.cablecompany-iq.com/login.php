<?php
session_start();
include 'dbConnection.php';
if(!isset($_POST['email'])){
?>
  <script> window.location = "wrongPassword.html";</script>
  <?php
die;
}
$name = $_POST['email'];
$passcode = $_POST['password'];
$sql = "SELECT userName, passCode FROM user WHERE userName='{$name}'AND passCode='{$passcode}'  ";
$re = mysqli_query($connerct, $sql);
$row = mysqli_fetch_assoc($re);
$returndPassCode = $row['passCode'];
$returndName = $row['userName'];
//echo $returndName;
//echo '<br>';
//echo $returndPassCode;

echo '<br>';
if ($returndPassCode === $passcode &&  $returndName === $name) {
  $_SESSION["logIn"] = true;
  //header("Location: /www/my.cablecompany-iq.com/home.php");
  ?>
  <script> window.location = "viewAccounts.php";</script>
  <?php
  echo "done";
} else {
?>
  <script> window.location = "wrongPassword.html";</script>
  <?php
}
mysqli_close($connerct);
?>