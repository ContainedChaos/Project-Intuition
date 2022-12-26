<?php
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "intuition";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    session_start();

    if (isset($_POST['update']))
    {
        $name = $_POST['updateName'];
        $address = $_POST['updateAddress'];
        $institution = $_POST['updateInstitution'];
        $email = $_POST['email'];
        $phone = $_POST['updatePhone'];
        $version = $_POST['updateVersion'];
        $grade = $_POST['updateGrade'];
    
        $query = "SELECT * from student where email = '$email'";
    
        $qres = mysqli_query($conn, $query);
    
        if ($qres->num_rows == 1)
        {
                $update = "UPDATE student SET name = '$name', address = '$address', institution = '$institution', phone = '$phone', grade = '$grade', version = '$version' where email = '$email'";
                //$update2 = "UPDATE tutor SET password = '$password' where email = '$email' && vkey = '$vkey'";
    
                $result = mysqli_query($conn, $update);
                //$result2 = mysqli_query($conn, $update2);

                $_SESSION['name'] = $name;
                $_SESSION['address'] = $address;
                $_SESSION['institution'] = $institution;
                $_SESSION['phone'] = $phone;
                $_SESSION['grade'] = $grade;
                $_SESSION['version'] = $version;

                if ($result)
                {
                    header("Location: studentprofile.php");
                }

                

        }
    }