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
?>

<!DOCTYPE html>
<html lang = "en" dir = "ltr">
    <head>
        <meta charset = "utf-8">
        <title>Find Students</title>
        <link rel = "stylesheet" href = "findstudents.css">
    </head>
    <body>
    <header>
          <a href="#" class="logo">InTuition</a>
            <div class="bx bx-menu" id="menu-icon"></div>

            <ul class="navbar">
              <li><a href="loggedintutor.php">Home</a></li>
              <li><a href="dashboardtutor.php">Dashboard</a></li>
              <li><a href="findstudents.php">Find Students</a></li>
              <li><a href="tutorviewreq.php">Requests</a></li>
              <li><a href="tutorprofile.php">My Profile</a></li>
              <li><a href="contact-us.html">Contact Us</a></li>
              <li><a href="home.html">Logout</a></li>
            </ul>
        </header>

        <div class = "wrapper">
        <div class = "title">
            <h1>All students</h1>
            <button style="margin-left:600px;"><a href = "searchfiltersstudent.html"><span></span>Add Filters</a></button>
       </div>
        <div class = "content">
            <?php

              $query = "SELECT * From student natural join studentpreferences";
              $result = mysqli_query($conn, $query);

              if($result->num_rows == 0)
              {
                echo "No match found.";
              }

              while ($row = mysqli_fetch_array($result))
              {
              $email = $row['email'];
              ?>
              <div class = "info"><a href = "viewstudentprofile.php?email=<?php echo $email;?>" style="font-weight:bold; font-size:20px; text-decoration:none"><?php echo $row['name'];?></a><br>
              <label id = "institution" style="font-weight:bold;">Institution</label> <label style="margin-left:9px; margin-right:4px; font-weight:bold;">:</label> <label> <?php echo $row['institution'];?></label><br>
              <label id = "availability" style="font-weight:bold;">Availability</label> <label style="margin-left:5px; margin-right:4px; font-weight:bold;">:</label> <label><?php echo $row['availability'];?></label><br>
              <label id = "subjects" style="font-weight:bold;">Subject(s)</label> <label style="margin-left:13px; margin-right:4px; font-weight:bold;">:</label> <label><?php echo $row['subjects'];?></label><br>
              <label id = "email" style="font-weight:bold;">Email</label> <label style="margin-left:47px; margin-right:4px; font-weight:bold;">:</label> <label><?php echo $row['email'];?></label>
              </div>
              <?php 
              }  
              ?>
        </div> 
        </div>
    </body>
</html>