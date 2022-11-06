<?php

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "intuition";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if (mysqli_connect_error())
{
  die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}

if(isset($_GET['vkey']))
{
    $vkey = $_GET['vkey'];

    $query = "SELECT verified,vkey FROM tutor WHERE verified = 0 AND vkey = '$vkey' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        if($result->num_rows == 1)
        {
            $update = "UPDATE tutor SET verified = 1 WHERE vkey = '$vkey' LIMIT 1";
            if (mysqli_query($conn, $update)){
                header("Location: verified.html");
            }
            else{
                echo "Error";
            }
        }
        else{
            echo "Error";
        }
    }

    else{
        echo "Error";
    }
}

else{
    echo "Error";
}

?>