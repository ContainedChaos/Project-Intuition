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
        $education = $_POST['updateEducation'];
        $version = $_POST['updateVersion'];

        $query = "SELECT * from tutor where email = '$email'";
    
        $qres = mysqli_query($conn, $query);
    
        if ($qres->num_rows == 1)
        {
                $update = "UPDATE tutor SET name = '$name', address = '$address', institution = '$institution', phone = '$phone', version = '$version', education = '$education' where email = '$email'";
                //$update2 = "UPDATE tutor SET password = '$password' where email = '$email' && vkey = '$vkey'";
    
                $result = mysqli_query($conn, $update);
                //$result2 = mysqli_query($conn, $update2);

                $_SESSION['name'] = $name;
                $_SESSION['address'] = $address;
                $_SESSION['institution'] = $institution;
                $_SESSION['phone'] = $phone;

                if($education == "c")
                    $_SESSION['education'] = "College";
                if($education == "u")
                    $_SESSION['education'] = "Undergraduate";
                if($education == "p")
                    $_SESSION['education'] = "Postgraduate";

                if($version == "e")
					$_SESSION['version'] = "English Medium";
				else if($version == "b")
                    $_SESSION['version']= "Bangla Medium";
                else if($version == "v")
                    $_SESSION['version']= "English Version";
            

                if ($result)
                {
                    header("Location: tutorprofile.php");
                }

                

        }
    }
    



?>