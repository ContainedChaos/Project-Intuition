<?php
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $address = $_POST['address'];
  $grade = $_POST['grade'];
  $version = $_POST['version'];
  $institution = $_POST['institution'];
  $mode = $_POST['mode'];
  $area = $_POST['area'];
  $salaryrange = $_POST['salaryrange'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm = $_POST['confirm'];

  $regularexpression = "/^[a-zA-Z\d]+$/"


  if (!empty($name) && !empty($gender) && !empty($grade) && !empty($version) && !empty($mode) && !empty($area) && !empty($email) && !empty($password) && !empty($confirm))
  {
    if($password == $confirm)
    {
      $host = "localhost";
      $dbUsername = "root";
      $dbPassword = "";
      $dbname = "intuition";

      $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

      if (mysqli_connect_error())
      {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
      else
      {
        $SELECT = "SELECT email From student Where email = ? Limit 1";

        $INSERT= "INSERT Into student (name, gender, age, address, grade, version, institution, mode, area, salaryrange, phone, email, password) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
          exit('Email is not valid!');
        }

        if (strlen($_POST['password']) > 15 || strlen($_POST['password']) < 8) {
          exit('Password must be between 8 and 15 characters long!');
        }

        if(ctype_upper($_POST['password']) || ctype_lower($_POST['password'])) {
          exit('Password must contain a combination of uppercase letters, lowercase letters and digits!');
        }

        if($rnum==0)
        {
          $stmt->close();

          $stmt = $conn->prepare($INSERT);
          $stmt->bind_param("ssssisssssiss", $name, $gender, $age, $address, $grade, $version, $institution, $mode, $area, $salaryrange, $phone, $email, $password);
          $stmt->execute();
          echo "New record inserted!";

        }
        else {
          echo "Email in use :(";
        }
        $stmt->close();
        $conn->close();
      }
    }
    else
    {
      echo "Password fields don't match!";
    }
  }
  else
  {
    echo "All fields are required.";
    die();
  }