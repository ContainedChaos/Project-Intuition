<?php
session_start(); 

$sname= "localhost";
$uname= "root";
$password = "";

$db_name = "intuition";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

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

    $mail->Body = "Here is the link to reset your password. 
                   <a href='http://localhost/InTuition/password-reset.php?email=$email&vkey=$vkey'> Click here </a>";

    $mail->addAddress($email);

    if($mail->Send()){
        return true;
    }else{
        return false;
    }

    $mail->smtpClose();
  }

  $vkey = bin2hex(random_bytes(16));

  $email = $_POST['email'];

  if (isset($email))
  {
    $update = "UPDATE student SET vkey = '$vkey' where email = '$email'";
    $update2 = "UPDATE tutor SET vkey = '$vkey' where email = '$email'";

    $result = mysqli_query($conn, $update);
    $result2 = mysqli_query($conn, $update2);

    if ($result == 1 && sendMail($email, $vkey))
    {
      header("Location: reset-link-sent.html");
    }
    else if ($result2 == 1 && sendMail($email, $vkey))
    {
      header("Location: reset-link-sent.html");
    }
    else
    {
        echo "Error";
    }
  }
  else
  {
    echo "Error";
  }



?>