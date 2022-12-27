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
                  <li><a href="studentprofile.php">My Profile</a></li>
                  <li><a href="contact-us.html">Contact Us</a></li>
                </ul>
                <button>
                  <a href = "homepage.html">Logout</a>
                </button>
            </div>
        </div>

        <div class = "wrapper">
        <div class = "title">
            <h1>Search results</h1>
       </div>
        <div class = "content">
            
                <?php

                  $query = "SELECT * From tutor natural join tutorpreferences Where gender = '$gender' AND version = '$version' AND mode = '$mode'";
                  $result = mysqli_query($conn, $query);

                  if($result->num_rows == 0)
                  {
                    echo "No match found.";
                  }

                  while ($row = mysqli_fetch_array($result))
                  {
                  $email = $row['email'];
                  ?>
                  <div class = "info"><a href = "viewtutorprofile.php?email=<?php echo $email;?>"><?php echo $row['name'];?></a><br>
                  <label id = "email">Email:</label> <label><?php echo $row['email'];?></label><br>
                  <label id = "institution">Institution:</label> <label> <?php echo $row['institution'];?></label><br>
                  <label id = "phone">Phone:</label> <label> <?php echo $row['phone'];?></label>
                  </div>
                  <?php 
                  }  
                  ?>
        </div> 
        </div>
    </body>
</html>