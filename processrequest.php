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

  header("Location: studentviewreq.php");
}

if(isset($_POST['reject']))
{
  $update = "UPDATE requests SET status = 'r' WHERE frommail = '$tutormail' AND tomail = '$studmail'";
  $rejected = mysqli_query($conn, $update);

  header("Location: studentviewreq.php");
}

?>