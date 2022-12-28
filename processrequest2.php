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

  header("Location: tutorviewreq.php");
}

if(isset($_POST['reject']))
{
  $update = "UPDATE requests SET status = 'r' WHERE frommail = '$studmail' AND tomail = '$tutormail'";
  $rejected = mysqli_query($conn, $update);

  header("Location: tutorviewreq.php");
}

?>