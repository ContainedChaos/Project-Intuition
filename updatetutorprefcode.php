<?php
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "intuition";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    session_start();
    $currentemail = $_SESSION['email'];
    $sql = "SELECT * FROM tutor WHERE email = '$currentemail'";
    $result = mysqli_query($conn, $sql);

    while($row = $result->fetch_assoc())
    {
        $currentid = $row['id'];
    }

    if (isset($_POST['update']))
    {
        $mode = $_POST['updateMode'];
        $area = $_POST['updateArea'];
        $subjects = $_POST['updateSubjects'];
        $availability = $_POST['updateAvailability'];
        $slots = $_POST['updateSlots'];
        $salaryrange = $_POST['updateSalaryrange'];
    
        $query = "SELECT * from tutorpreferences where id = $currentid";
    
        $qres = mysqli_query($conn, $query);
    
        if ($qres->num_rows == 1)
        {
                $update = "UPDATE tutorpreferences SET mode = '$mode', area = '$area', subjects = '$subjects', availability = '$availability', slots = '$slots', salaryrange = '$salaryrange' where id = $currentid";
                //$update2 = "UPDATE tutor SET password = '$password' where email = '$email' && vkey = '$vkey'";
    
                $result = mysqli_query($conn, $update);
                //$result2 = mysqli_query($conn, $update2);

                if($mode == "n")
                    $_SESSION['mode'] = "Online";
                else if($mode == "f")
                    $_SESSION['mode'] = "Offline";

                $_SESSION['area'] = $area;
                $_SESSION['subjects'] = $subjects;
                $_SESSION['availability'] = $availability;
                $_SESSION['slots'] = $slots;
                
                if($salaryrange == "threetofive")
                    $_SESSION['salaryrange'] = "3000 to 5000";
                else if($salaryrange == "fivetoeight")
                    $_SESSION['salaryrange'] = "5000 to 8000";
                else if($salaryrange == "eighttoten")
                    $_SESSION['salaryrange'] = "8000 to 10000";
                else if($salaryrange == "tentofifteen")
                    $_SESSION['salaryrange'] = "10000 to 15000";
                else if($salaryrange == "fifteentotwenty")
                    $_SESSION['salaryrange'] = "15000 to 20000";

                if ($result)
                {
                    header("Location: tutorprofile.php");
                }

                

        }
    }
    



?>