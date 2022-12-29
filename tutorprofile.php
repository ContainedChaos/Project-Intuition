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
      <title>
        Project Intuition
      </title>
      <link rel = "stylesheet" href = "tutorprofile.css">
      <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  </head>
  <body>
      <div class = "banner">
        <header>
          <a href="#" class="logo">InTuition</a>
            <div class="bx bx-menu" id="menu-icon"></div>

            <ul class="navbar">
              <li><a href="#">Home</a></li>
              <li><a href="dashboardstudent.php">Dashboard</a></li>
              <li><a href="searchfiltersstudent.html">Find Students</a></li>
              <li><a href="studentviewreq.php">Requests</a></li>
              <li><a href="studentprofile.php">My Profile</a></li>
              <li><a href="contact-us.html">Contact Us</a></li>
              <li><a href="login.html">Logout</a></li>
            </ul>
        </header>
          <div class = "wrapper">
        
          <div class = "name">
            <label style = "margin-right: 99px;">Name</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              session_start();
              echo $_SESSION['name'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 87px;">Gender</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $_SESSION['gender'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 95px;">Phone</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $_SESSION['phone'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 102px;">Email</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $_SESSION['email'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 115px;">Age</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $_SESSION['age'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 83px;">Address</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $_SESSION['address'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 70px;">Education</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $_SESSION['education'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 92px;">Version</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $_SESSION['version'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 73px;">Institution</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $_SESSION['institution'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 34px;">Preferred Mode</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $_SESSION['mode'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 41px;">Preferred Area</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $_SESSION['area'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 74px;">Subject(s)</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $_SESSION['subjects'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 66px;">Availability</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $_SESSION['availability'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 113px;">Slots</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $_SESSION['slots'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 50px;">Salary Range</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $_SESSION['salaryrange'];
            ?>
          </div>
          </div>
          <div class="content">
            <button type = "button"><a href = "updatetutorprofile.php"><span></span>Update Profile</a></button>
            <button type = "button"><a href = "updatetutorpref.php"><span></span>Update Preferences</a></button>
          </div>
      </div>
  </body>
</html>