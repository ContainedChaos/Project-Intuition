<?php
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $address = $_POST['address'];
  $education = $_POST['education'];
  $version = $_POST['version'];
  $institution = $_POST['institution'];
  $mode = $_POST['mode'];
  $area = $_POST['area'];
  $slots = $_POST['slots'];
  $salaryrange = $_POST['salaryrange'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = $_POST['password'];


  if (!empty($name) && !empty($gender) && !empty($education) && !empty($version) && !empty($mode) && !empty($area) && !empty($slots) && !empty($email) && !empty($password))
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
      $SELECT = "SELECT email From tutor Where email = ? Limit 1";

      $INSERT= "INSERT Into tutor (name, gender, age, address, education, version, institution, mode, area, slots, salaryrange, phone, email, password) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

      $stmt = $conn->prepare($SELECT);
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->bind_result($email);
      $stmt->store_result();
      $rnum = $stmt->num_rows;

      if($rnum==0)
      {
        $stmt->close();

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssssissssisiss", $name, $gender, $age, $address, $education, $version, $institution, $mode, $area, $slots, $salaryrange, $phone, $email, $password);
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
    echo "All fields are required.";
    die();
  }