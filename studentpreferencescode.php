<?php

$mode = $_POST['mode'];
$area = $_POST['area'];
$salaryrange = $_POST['salaryrange'];

if(!empty($mode) && !empty($area))
{

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "intuition";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if (mysqli_connect_error())
{
  die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}


if(isset($_POST['email']))
{
    $email = $_POST['email'];

    $query = "SELECT id FROM student WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row=mysqli_fetch_array($result);
    $id = $row["id"];


    if($result)
    {
        if($result->num_rows == 1)
        {
            $query2 = "INSERT INTO studentpreferences (id, mode, area, salaryrange) values ('$id', '$mode', '$area', '$salaryrange')";
            if (mysqli_query($conn, $query2)){
                header("Location: login.html");
            }
            else{
                echo "Error 1";
            }
        }
        else{
            echo "Error 2";
        }
    }

    else{
        echo "Error 3";
    }
}

else{
    echo "Error 4";
}

}
else{
    echo "MAIN ERROR";
}

?>
