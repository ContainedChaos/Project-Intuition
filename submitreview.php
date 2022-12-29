<?php

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "intuition";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    session_start();
    $student = $_SESSION['email'];
    $tutor = $_GET['email'];

    $query = "SELECT * FROM reviews WHERE student = '$student' AND tutor = '$tutor'";
    $result = mysqli_query($conn, $query);

    if (isset($_POST['submit']))
    {
        if($result->num_rows > 0)
        {
            $review = $_POST['review'];
    
            $update = "UPDATE reviews SET review = '$review' WHERE student = '$student' AND tutor = '$tutor'";
        
            $res = mysqli_query($conn, $update);
        
            if ($res)
            {
                header("Location: reviewdone.html");
            }
        }
        else
        {
            $review = $_POST['review'];
    
            $entry = "INSERT into reviews (student, tutor, review) values ('$student', '$tutor', '$review')";
        
            $res = mysqli_query($conn, $entry);
        
            if ($res)
            {
                header("Location: reviewdone.html");
            }
        }
    }

    else
    {
        echo "error";
    }
  
?>