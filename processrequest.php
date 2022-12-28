<?php 

$sname= "localhost";
$uname= "root";
$password = "";
$db_name = "intuition";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

session_start();
$studmail = $_SESSION['email'];
$tutormail = $_GET['email'];

if (!$conn) {
	echo "Connection failed!";
}

if(isset($_POST['accept']))
{
  $update = "UPDATE requests SET status = 'a' WHERE frommail = '$tutormail' AND tomail = '$studmail'";
  $accepted = mysqli_query($conn, $update);

  $retrievemail = "SELECT * FROM tutor natural join tutorpreferences WHERE email = '$tutormail'";
  $q1 = mysqli_query($conn, $retrievemail);
  $row = mysqli_fetch_array($q1);
  $tutorid = $row['id'];
  $tutorslots = $row['slots'];

  $tutorslots--;

  $updateslots = "UPDATE tutorpreferences SET slots = '$tutorslots' WHERE id = '$tutorid'";
  $q2 = mysqli_query($conn, $updateslots);
  

  header("Location: studentviewreq.php");
}

if(isset($_POST['reject']))
{
  $update = "UPDATE requests SET status = 'r' WHERE frommail = '$tutormail' AND tomail = '$studmail'";
  $rejected = mysqli_query($conn, $update);

  header("Location: studentviewreq.php");
}

?>