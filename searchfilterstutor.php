<?php
    $gender = $_POST['gender'];
    $mode = $_POST['mode'];
    $version = $_POST['version'];
  
      $host = "localhost";
      $dbUsername = "root";
      $dbPassword = "";
      $dbname = "intuition";
  
      $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  
      if (mysqli_connect_error())
      {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
?>

<!DOCTYPE html>
<html lang = "en" dir = "ltr">
    <head>
        <meta charset = "utf-8">
        <title>Search results</title>
        <link rel = "stylesheet" href = "searchresults.css">
    </head>
    <body>
        <div class = "banner">
            <div class = "navbar">
                <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Dashboard</a></li>
                  <li><a href="#">Search</a></li>
                  <li><a href="tutorprofile.php">My Profile</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>

        <div class = "wrapper">
        <div class = "title">
            <h1>Search results</h1>
           
        <div class = "content">
            
                <?php

                  $query = "SELECT * From student natural join studentpreferences Where gender = '$gender' AND version = '$version' AND mode = '$mode'";
                  $result = mysqli_query($conn, $query);

              echo "<table border = '1px'>";
              while($row = mysqli_fetch_array($result))
              {
                $name = $row['name'];
                $email = $row['email'];
                $institution = $row['institution'];
                $grade = $row['grade'];
        
                echo "<tr>";
                echo "<td> <a href = \"viewstudentprofile.php?email=$email\"> {$name} </a> </td>";
                echo "<td> {$email} </td>";
                echo "<td> {$institution} </td>";
                echo "<td> {$grade} </td>";
                echo "</tr>";
              }
              echo "</table>";
          

            if($result->num_rows == 0)
            {
              echo "No match found.";
            }
            ?>
        </div> 

        </div>
          </div>
    </body>
</html>