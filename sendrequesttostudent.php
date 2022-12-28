<?php

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "intuition";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

$tomail = $_POST['email'];

session_start();
$frommail = $_SESSION['email']; 

if (mysqli_connect_error())
{
  die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}


    $query = "INSERT INTO requests (frommail, tomail, status) values ('$frommail', '$tomail', 'p')";
    $result = mysqli_query($conn, $query);
  
    if($result)
    {
        echo "Request sent successfully!";
    }
    else{
        echo "Error";
    }

?>
