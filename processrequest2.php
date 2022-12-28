<?php 

$sname= "localhost";
$uname= "root";
$password = "";
$db_name = "intuition";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

session_start();
$tutormail = $_SESSION['email'];
$studmail = $_GET['email'];

if (!$conn) {
	echo "Connection failed!";
}

if(isset($_POST['accept']))
{
  $update = "UPDATE requests SET status = 'a' WHERE frommail = '$studmail' AND tomail = '$tutormail'";
  $accepted = mysqli_query($conn, $update);

  $retrievemail = "SELECT * FROM tutor natural join tutorpreferences WHERE email = '$tutormail'";
  $q1 = mysqli_query($conn, $retrievemail);
  $row = mysqli_fetch_array($q1);
  $tutorid = $row['id'];
  $tutorslots = $row['slots'];

  $tutorslots--;

  $updateslots = "UPDATE tutorpreferences SET slots = '$tutorslots' WHERE id = '$tutorid'";
  $q2 = mysqli_query($conn, $updateslots);

  header("Location: tutorviewreq.php");
}

if(isset($_POST['reject']))
{
  $update = "UPDATE requests SET status = 'r' WHERE frommail = '$studmail' AND tomail = '$tutormail'";
  $rejected = mysqli_query($conn, $update);

  header("Location: tutorviewreq.php");
}

?>