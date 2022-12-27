<?php

  $sname= "localhost";
  $uname= "root";
  $password = "";
  
  $db_name = "intuition";
  
  $conn = mysqli_connect($sname, $uname, $password, $db_name);

  $email = $_GET['email'];

  if (!$conn) {
    echo "Connection failed!";
  }
  else{
    $query = "SELECT * From student natural join studentpreferences Where email = '$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if($row['gender'] == "f")
      $gender = "Female";
    else if($row['gender'] == "m")
      $gender = "Male";
    else if($row['gender'] == "o")
      $gender = "Other";

    if($row['version'] == "e")
      $version = "English Medium";
    else if($row['version'] == "b")
      $version = "Bangla Medium";
    else if($row['version'] == "v")
      $version = "English Version";

    if($row['mode'] == "n")
      $mode = "Online";
    else if($row['mode'] == "f")
      $mode = "Offline";

    if($row['salaryrange'] == "threetofive")
      $salaryrange = "3000 to 5000";
    else if($row['salaryrange'] == "fivetoeight")
      $salaryrange = "5000 to 8000";
    else if($row['salaryrange'] == "eighttoten")
      $salaryrange = "8000 to 10000";
    else if($row['salaryrange'] == "tentofifteen")
      $salaryrange = "10000 to 15000";
    else if($row['salaryrange'] == "fifteentotwenty")
      $salaryrange = "15000 to 20000";
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
              echo $row['name'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 87px;">Gender</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $gender;
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 95px;">Phone</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $row['phone'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 102px;">Email</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $row['email'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 115px;">Age</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $row['age'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 83px;">Address</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $row['address'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 102px;">Grade</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $row['grade'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 92px;">Version</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $version;
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 73px;">Institution</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $row['institution'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 34px;">Preferred Mode</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $mode;
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 41px;">Preferred Area</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $row['area'];
            ?>
          </div>
          <div class = "attribute">
            <label style = "margin-right: 50px;">Salary Range</label>
            <label style = "margin-right: 10px;">:</label>
            <?php
              echo $salaryrange;
            ?>
          </div>
          </div>
      </div>
  </body>
</html>