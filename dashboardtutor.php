<?php

  $sname= "localhost";
  $uname= "root";
  $password = "";
  
  $db_name = "intuition";
  
  $conn = mysqli_connect($sname, $uname, $password, $db_name);

  session_start();
  $email = $_SESSION['email'];

  if (!$conn) {
    echo "Connection failed!";
  }
  else
  {
    $queryfirst = "SELECT * FROM requests WHERE tomail = '$email' AND status = 'a'";
    $querysecond = "SELECT * FROM requests WHERE frommail = '$email' AND status = 'a'";
    $resultfirst = mysqli_query($conn, $queryfirst);
    $resultsecond = mysqli_query($conn, $querysecond);
  }

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
        if($resultfirst)
        {
          while($row = mysqli_fetch_array($resultfirst))
          {
            $studmail1 = $row['frommail'];
            $queryy = "SELECT * FROM student natural join studentpreferences WHERE email = '$studmail1'";
            $resultt = mysqli_query($conn, $queryy);
            $studinfo1 = mysqli_fetch_array($resultt);
            
            ?>
            <div class = "info">
            <a href = "receivedstudentprofile.php?email=<?php echo $studmail1;?>" style="font-weight:bold; font-size:20px; text-decoration:none"><?php echo $studinfo1['name'];?></a><br>
            <label id = "institution" style="font-weight:bold;">Institution</label> <label style="margin-left:9px; margin-right:4px; font-weight:bold;">:</label> <label> <?php echo $studinfo1['institution'];?></label><br>
            <label id = "availability" style="font-weight:bold;">Availability</label> <label style="margin-left:5px; margin-right:4px; font-weight:bold;">:</label> <label><?php echo $studinfo1['availability'];?></label><br>
            <label id = "subjects" style="font-weight:bold;">Subject(s)</label> <label style="margin-left:13px; margin-right:4px; font-weight:bold;">:</label> <label><?php echo $studinfo1['subjects'];?></label><br>
            <label id = "email" style="font-weight:bold;">Email</label> <label style="margin-left:47px; margin-right:4px; font-weight:bold;">:</label> <label><?php echo $studinfo1['email'];?></label><br>
            <?php
          }
        }
        ?>
        <?php
        if($resultsecond)
        {
          while($row = mysqli_fetch_array($resultsecond))
          {
            $studmail2 = $row['frommail'];
            $queryyy = "SELECT * FROM student natural join studentpreferences WHERE email = '$studmail2'";
            $resulttt = mysqli_query($conn, $queryyy);
            $studinfo2 = mysqli_fetch_array($resulttt);
            
            ?>
            <div class = "info">
            <a href = "receivedstudentprofile.php?email=<?php echo $studmail2;?>" style="font-weight:bold; font-size:20px; text-decoration:none"><?php echo $studinfo2['name'];?></a><br>
            <label id = "institution" style="font-weight:bold;">Institution</label> <label style="margin-left:9px; margin-right:4px; font-weight:bold;">:</label> <label> <?php echo $studinfo2['institution'];?></label><br>
            <label id = "availability" style="font-weight:bold;">Availability</label> <label style="margin-left:5px; margin-right:4px; font-weight:bold;">:</label> <label><?php echo $studinfo2['availability'];?></label><br>
            <label id = "subjects" style="font-weight:bold;">Subject(s)</label> <label style="margin-left:13px; margin-right:4px; font-weight:bold;">:</label> <label><?php echo $studinfo2['subjects'];?></label><br>
            <label id = "email" style="font-weight:bold;">Email</label> <label style="margin-left:47px; margin-right:4px; font-weight:bold;">:</label> <label><?php echo $studinfo2['email'];?></label><br>
            <?php
          }
        }
        ?>
      </div>
        </div>
  </body>

</html>