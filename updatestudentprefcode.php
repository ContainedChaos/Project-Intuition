<?php
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "intuition";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    session_start();
    $currentemail = $_SESSION['email'];
    $sql = "SELECT * FROM student WHERE email = '$currentemail'";
    $result = mysqli_query($conn, $sql);

    while($row = $result->fetch_assoc())
    {
        $currentid = $row['id'];
    }

    if (isset($_POST['update']))
    {
        $mode = $_POST['updateMode'];
        $area = $_POST['updateArea'];
        $salaryrange = $_POST['updateSalaryrange'];
    
        $query = "SELECT * from studentpreferences where id = $currentid";
    
        $qres = mysqli_query($conn, $query);
    
        if ($qres->num_rows == 1)
        {
                $update = "UPDATE studentpreferences SET mode = '$mode', area = '$area', salaryrange = '$salaryrange' where id = $currentid";
                //$update2 = "UPDATE tutor SET password = '$password' where email = '$email' && vkey = '$vkey'";
    
                $result = mysqli_query($conn, $update);
                //$result2 = mysqli_query($conn, $update2);

                $_SESSION['mode'] = $mode;
                $_SESSION['area'] = $area;
                $_SESSION['salaryrange'] = $salaryrange;

                if ($result)
                {
                    header("Location: studentprofile.php");
                }

                

        }
    }
    



?>