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

if (isset($_POST['save']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    //$password = md5($password);
    $confirm = $_POST['confirm'];
    //$confirm = md5($confirm);
    $vkey = $_POST['vkey'];

    $query = "SELECT * from student where email = '$email' && vkey = '$vkey'";
    $query2 = "SELECT * from tutor where email = '$email' && vkey = '$vkey'";

    $qres = mysqli_query($conn, $query);
    $qres2 = mysqli_query($conn, $query2);

    if ($qres->num_rows == 1)
    {
        if ($password == $confirm)
        {
            if (strlen($_POST['password']) > 15 || strlen($_POST['password']) < 8  || ctype_upper($_POST['password']) || ctype_lower($_POST['password']) || !preg_match("/[0-9]/", $_POST['password'])) {
                exit('Password must be between 8 and 15 characters long, contain uppercase, lowercase letters and a number!');
            }

            $update = "UPDATE student SET password = '$password' where email = '$email' && vkey = '$vkey'";
            //$update2 = "UPDATE tutor SET password = '$password' where email = '$email' && vkey = '$vkey'";

            $result = mysqli_query($conn, $update);
            //$result2 = mysqli_query($conn, $update2);

            if ($result)
            {
                header("Location: password-update.html");
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

    else if ($qres2->num_rows == 1)
    {
        if ($password == $confirm)
        {
            if (strlen($_POST['password']) > 15 || strlen($_POST['password']) < 8  || ctype_upper($_POST['password']) || ctype_lower($_POST['password']) || !preg_match("/[0-9]/", $_POST['password'])) {
                exit('Password must be between 8 and 15 characters long, contain uppercase, lowercase letters and a number!');
            }

            $update2 = "UPDATE tutor SET password = '$password' where email = '$email' && vkey = '$vkey'";
            //$update2 = "UPDATE tutor SET password = '$password' where email = '$email' && vkey = '$vkey'";

            $result2 = mysqli_query($conn, $update2);
            //$result2 = mysqli_query($conn, $update2);

            if ($result2)
            {
                header("Location: password-update.html");
            }
        }
        else
        {
            ?>
            <script>
              alert("Passwords don't match.")
            </script>
            <?php
        }
    }

}

?>


    

