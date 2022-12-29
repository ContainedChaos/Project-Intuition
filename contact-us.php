<?php
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "intuition";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
    
        $entry = "INSERT into messages (name, email, subject, message) values ('$name', '$email', '$subject', '$message')";
    
        $res = mysqli_query($conn, $entry);
    
        if ($res)
        {
            header("Location: messagesubmitted.html");
        }
    }

    else
    {
        echo "error";
    }
    

?>
