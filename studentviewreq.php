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

  session_start();
  $email = $_SESSION['email'];
?>

<html>
  <head>
      <title>
        Project Intuition
      </title>
      <link rel = "stylesheet" href = "studentviewreq.css">
  </head>
  <body>
        <header>
          <a href="#" class="logo">InTuition</a>
            <div class="bx bx-menu" id="menu-icon"></div>

            <ul class="navbar">
              <li><a href="loggedinstudent.php">Home</a></li>
              <li><a href="dashboardstudent.php">Dashboard</a></li>
              <li><a href="hireatutor.php">Hire a Tutor</a></li>
              <li><a href="studentviewreq.php">Requests</a></li>
              <li><a href="studentprofile.php">My Profile</a></li>
              <li><a href="contact-us.html">Contact Us</a></li>
              <li><a href="home.html">Logout</a></li>
            </ul>
        </header>
    <div class = "wrapper">
      <div class="content">
      <h1>Your Requests</h1>
        <?php
          $query = "SELECT * FROM requests WHERE tomail = '$email' AND status = 'p'";
          $result = mysqli_query($conn, $query);

          while($row = mysqli_fetch_array($result))
          {
            $requester = $row['frommail'];

            $query2 = "SELECT * FROM tutor natural join tutorpreferences WHERE email = '$requester'";
            $result2 = mysqli_query($conn, $query2);
            $tutorinfo = mysqli_fetch_array($result2);
         ?>
                  <div class = "info">
                  <a href = "receivedtutorprofile.php?email=<?php echo $requester;?>" style="font-weight:bold; font-size:20px; text-decoration:none"><?php echo $tutorinfo['name'];?></a><br>
                  <label id = "institution" style="font-weight:bold;">Institution</label> <label style="margin-left:9px; margin-right:4px; font-weight:bold;">:</label> <label> <?php echo $tutorinfo['institution'];?></label><br>
                  <label id = "availability" style="font-weight:bold;">Availability</label> <label style="margin-left:5px; margin-right:4px; font-weight:bold;">:</label> <label><?php echo $tutorinfo['availability'];?></label><br>
                  <label id = "subjects" style="font-weight:bold;">Subject(s)</label> <label style="margin-left:13px; margin-right:4px; font-weight:bold;">:</label> <label><?php echo $tutorinfo['subjects'];?></label><br>
                  <label id = "email" style="font-weight:bold;">Email</label> <label style="margin-left:47px; margin-right:4px; font-weight:bold;">:</label> <label><?php echo $tutorinfo['email'];?></label><br>
                  <div class = "inputfield">

                  <form action = "processrequest.php?email=<?php echo $requester;?>" method = "post">
                  <input type = "submit" value = "Accept" class = "btn" name = "accept">
                  <input type = "submit" value = "Reject" class = "btn" name = "reject">
                  </form>
                  </div>
          <?php  
          }
        ?>
      </div>
    </div>
  </body>

</html>