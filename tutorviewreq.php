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
    <div class = "wrapper">
      <div class = "banner">
          <div class = "navbar">
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="dashboardtutor.php">Dashboard</a></li>
                <li><a href="#">Search</a></li>
                <li><a href="#">Requests</a></li>
                <li><a href="#">My Profile</a></li>
                <li><a href="contact-us.html">Contact Us</a></li>
              </ul>
          </div>
      </div>
      <div class="content">
        <?php
          $query = "SELECT * FROM requests WHERE tomail = '$email' AND status = 'p'";
          $result = mysqli_query($conn, $query);

          while($row = mysqli_fetch_array($result))
          {
            $requester = $row['frommail'];

            $query2 = "SELECT * FROM student natural join studentpreferences WHERE email = '$requester'";
            $result2 = mysqli_query($conn, $query2);
            $studentinfo = mysqli_fetch_array($result2);
         ?>
                  <div class = "info">
                  <a href = "receivedstudentprofile.php?email=<?php echo $requester;?>" style="font-weight:bold; font-size:20px; text-decoration:none"><?php echo $studentinfo['name'];?></a><br>
                  <label id = "institution" style="font-weight:bold;">Institution</label> <label style="margin-left:9px; margin-right:4px; font-weight:bold;">:</label> <label> <?php echo $studentinfo['institution'];?></label><br>
                  <label id = "availability" style="font-weight:bold;">Availability</label> <label style="margin-left:5px; margin-right:4px; font-weight:bold;">:</label> <label><?php echo $studentinfo['availability'];?></label><br>
                  <label id = "subjects" style="font-weight:bold;">Subject(s)</label> <label style="margin-left:13px; margin-right:4px; font-weight:bold;">:</label> <label><?php echo $studentinfo['subjects'];?></label><br>
                  <label id = "email" style="font-weight:bold;">Email</label> <label style="margin-left:47px; margin-right:4px; font-weight:bold;">:</label> <label><?php echo $studentinfo['email'];?></label><br>
                  <div class = "inputfield">

                  <form action = "processrequest2.php?email=<?php echo $requester;?>" method = "post">
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