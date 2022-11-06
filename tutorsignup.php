<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
  //$password = md5($password);
  $confirm = $_POST['confirm'];
  //$confirm = md5($confirm);
  $verified = '0';

  $regularexpression = "/^[a-zA-Z\d]+$/";

  function sendMail($email,$vkey)
  {
    require ("PHPMailer/PHPMailer.php");
    require ("PHPMailer/SMTP.php");
    require ("PHPMailer/Exception.php");

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = "true";
    $mail->SMTPSecure = "tls";
    $mail->Port = "587";
    $mail->Username = "intuitionverify@gmail.com";
    $mail->Password = "lwkctmntmeflipap";
    $mail->isHTML(true);
    $mail->Subject = "Test Mail";
    $mail->setFrom("intuitionverify@gmail.com");
    $mail->Body = "Thank you for registering. Click the link to verify your email
                   <a href='http://localhost/InTuition/verifytutor.php?email=$email&vkey=$vkey'> Verify </a>";

    $mail->addAddress($email);
    if($mail->Send()){
        return true;
    }else{
        return false;
    }
    $mail->smtpClose();
  }


  if (!empty($name) && !empty($gender) && !empty($education) && !empty($version) && !empty($mode) && !empty($area) && !empty($slots) && !empty($email) && !empty($password) && !empty($confirm))
  {
    if($password == $confirm)
    {
      $host = "localhost";
      $dbUsername = "root";
      $dbPassword = "";
      $dbname = "intuition";

      $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
      $vkey = bin2hex(random_bytes(16));

      if (mysqli_connect_error())
      {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }

      $exist = "SELECT * FROM student WHERE email = '$email'";
      $exist2 = "SELECT * FROM tutor WHERE email = '$email'";

      $query = mysqli_query($conn, $exist);
      $query2 = mysqli_query($conn, $exist2);

      if ($query->num_rows > 0 || $query2->num_rows > 0)
      {
        ?>
        <script>
          alert("Email already in use!")
        </script>
        <?php
      }

      else
      {
        $INSERT= "INSERT Into tutor (name, gender, age, address, education, version, institution, mode, area, slots, salaryrange, phone, email, password, vkey, verified) values ('$name', '$gender', '$age', '$address', '$education', '$version', '$institution', '$mode', '$area', '$slots', '$salaryrange', '$phone', '$email', '$password', '$vkey', 0)";

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
          exit('Email is not valid!');
        }

        if (strlen($_POST['password']) > 15 || strlen($_POST['password']) < 8  || ctype_upper($_POST['password']) || ctype_lower($_POST['password']) || !preg_match("/[0-9]/", $_POST['password'])) {
         exit('Password must be between 8 and 15 characters long, contain uppercase, lowercase letters and a number!');
        }

        mysqli_query($conn, $INSERT);

        if($INSERT && sendMail($email,$vkey))
        {
          header("Location: signup-verify.html");
        }

        $conn->close();
      }
    }
    else
    {
      ?>
      <script>
        alert("Passwords don't match!")
      </script>
      <?php
    }
  }
  else
  {
    ?>
    <script>
      alert("All fields required!")
    </script>
    <?php
    die();
  }