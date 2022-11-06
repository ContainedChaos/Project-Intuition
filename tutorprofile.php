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
  </head>
  <body>
      <div class = "banner">
          <div class = "navbar">
              <ul>
                  <li><a href="loggedintutor.php">Home</a></li>
                  <li><a href="#">Dashboard</a></li>
                  <li><a href="#">Search</a></li>
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
      </div>
  </body>
</html>