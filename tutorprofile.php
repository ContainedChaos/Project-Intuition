<?php
  $sname= "localhost";
  $uname= "root";
  $password = "";
  
  $db_name = "intuition";
  
  $conn = mysqli_connect($sname, $uname, $password, $db_name);
  
  if (!$conn) {
    echo "Connection failed!";
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="tutorprofile.css"/>

    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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

    <section class="home" id="home">
    <div class = "wrapper" style="background-color:#555555; padding:30px; border-radius:20px; height: 500px; margin-top:100px;">
        
        <div class = "name" style ="margin-bottom: 5px;">
          <label style = "margin-right: 99px; font-weight:bold;">Name</label>
          <label style = "margin-right: 10px;">:</label>
          <?php
            session_start();
            echo $_SESSION['name'];
          ?>
        </div>
        <div class = "attribute" style ="margin-bottom: 5px;">
          <label style = "margin-right: 88px; font-weight:bold;">Gender</label>
          <label style = "margin-right: 10px;">:</label>
          <?php
            echo $_SESSION['gender'];
          ?>
        </div>
        <div class = "attribute" style ="margin-bottom: 5px;">
          <label style = "margin-right: 97px; font-weight:bold;">Phone</label>
          <label style = "margin-right: 10px;">:</label>
          <?php
            echo $_SESSION['phone'];
          ?>
        </div>
        <div class = "attribute" style ="margin-bottom: 5px;">
          <label style = "margin-right: 103px; font-weight:bold;">Email</label>
          <label style = "margin-right: 10px;">:</label>
          <?php
            echo $_SESSION['email'];
          ?>
        </div>
        <div class = "attribute" style ="margin-bottom: 5px;">
          <label style = "margin-right: 116px; font-weight:bold;">Age</label>
          <label style = "margin-right: 10px;">:</label>
          <?php
            echo $_SESSION['age'];
          ?>
        </div>
        <div class = "attribute" style ="margin-bottom: 5px;">
          <label style = "margin-right: 81px; font-weight:bold;">Address</label>
          <label style = "margin-right: 10px;">:</label>
          <?php
            echo $_SESSION['address'];
          ?>
        </div>
        <div class = "attribute" style ="margin-bottom: 5px;">
          <label style = "margin-right: 66px; font-weight:bold;">Education</label>
          <label style = "margin-right: 10px;">:</label>
          <?php
            echo $_SESSION['education'];
          ?>
        </div>
        <div class = "attribute" style ="margin-bottom: 5px;">
          <label style = "margin-right: 86px; font-weight:bold;">Version</label>
          <label style = "margin-right: 10px;">:</label>
          <?php
            echo $_SESSION['version'];
          ?>
        </div>
        <div class = "attribute" style ="margin-bottom: 5px;">
          <label style = "margin-right: 65px; font-weight:bold;">Institution</label>
          <label style = "margin-right: 10px;">:</label>
          <?php
            echo $_SESSION['institution'];
          ?>
        </div>
        <div class = "attribute" style ="margin-bottom: 5px;">
          <label style = "margin-right: 25px; font-weight:bold;">Preferred Mode</label>
          <label style = "margin-right: 10px;">:</label>
          <?php
            echo $_SESSION['mode'];
          ?>
        </div>
        <div class = "attribute" style ="margin-bottom: 5px;">
          <label style = "margin-right: 32px; font-weight:bold;">Preferred Area</label>
          <label style = "margin-right: 10px;">:</label>
          <?php
            echo $_SESSION['area'];
          ?>
        </div>
        <div class = "attribute" style ="margin-bottom: 5px;">
          <label style = "margin-right: 65px; font-weight:bold;">Subject(s)</label>
          <label style = "margin-right: 10px;">:</label>
          <?php
            echo $_SESSION['subjects'];
          ?>
        </div>
        <div class = "attribute" style ="margin-bottom: 5px;">
          <label style = "margin-right: 57px; font-weight:bold;">Availability</label>
          <label style = "margin-right: 10px;">:</label>
          <?php
            echo $_SESSION['availability'];
          ?>
        </div>
        <div class = "attribute" style ="margin-bottom: 5px;">
          <label style = "margin-right: 111px; font-weight:bold;">Slots</label>
          <label style = "margin-right: 10px;">:</label>
          <?php
            echo $_SESSION['slots'];
          ?>
        </div>
        <div class = "attribute">
          <label style = "margin-right: 42px; font-weight:bold;">Salary Range</label>
          <label style = "margin-right: 10px;">:</label>
          <?php
            echo $_SESSION['salaryrange'];
          ?>
        </div>
        </div>

        <div class="content">
            <button type = "button" style="padding: 10px 50px;"><a href = "updatetutorprofile.php"><span></span>Update Profile</a></button><br>
            <button type = "button"><a href = "updatetutorpref.php"><span></span>Update Preferences</a></button>
          </div>
    </section>

    
  </body>
</html>