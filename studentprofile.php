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
      <link rel = "stylesheet" href = "studentprofile.css">
  </head>
  <body>
      <div class = "banner">
          <div class = "navbar">
              <ul>
                  <li><a href="loggedinstudent.php">Home</a></li>
                  <li><a href="#">Dashboard</a></li>
                  <li><a href="searchfiltersstudent.html">Search</a></li>
                  <li><a href="#">My Profile</a></li>
                  <li><a href="#">Contact Us</a></li>
              </ul>
              <button>
                    <a href = "homepage.html">Logout</a>
              </button>
          </div>
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
            <label style = "margin-right: 102px;">Grade</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $_SESSION['grade'];
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
            <label style = "margin-right: 50px;">Salary Range</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $_SESSION['salaryrange'];
            ?>
          </div>
          </div>
      </div>
      <div class="content">
            <button type = "button"><a href = "updatestudentprofile.php"><span></span>Update Profile</a></button>
            <button type = "button"><a href = "updatestudentpref.php"><span></span>Update Preferences</a></button>
      </div>
  </body>
</html>