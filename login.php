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

$email = $_POST['email'];
$password = $_POST['password'];
//$password = md5($password);


if (isset($email) && isset($password)) {

		$sql = "SELECT * FROM student WHERE email = '$email'";
        $sql2 = "SELECT * FROM tutor WHERE email ='$email'";
		
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);

		if ($result->num_rows == 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['verified'] == 1 && password_verify($password, $row['password'])) {
							$_SESSION['email'] = $row['email'];
            	$_SESSION['password'] = $row['password'];
					    $_SESSION['name'] = $row['name'];
							$_SESSION['age'] = $row['age'];
							$_SESSION['address'] = $row['address'];

							if($row['gender'] == "f")
								$_SESSION['gender'] = "Female";
							else if($row['gender'] == "m")
								$_SESSION['gender'] = "Male";
							else if($row['gender'] == "o")
								$_SESSION['gender'] = "Other";

							$_SESSION['phone'] = $row['phone'];
							$_SESSION['grade'] = $row['grade'];
							
							if($row['version'] == "e")
								$_SESSION['version'] = "English Medium";
							else if($row['version'] == "b")
								$_SESSION['version']= "Bangla Medium";
							else if($row['version'] == "v")
								$_SESSION['version']= "English Version";

							$_SESSION['institution'] = $row['institution'];
							
							if($row['mode'] == "n")
								$_SESSION['mode'] = "Online";
							else if($row['mode'] == "f")
								$_SESSION['mode'] = "Offline";

							$_SESSION['area'] = $row['area'];
							
							if($row['salaryrange'] == "threetofive")
								$_SESSION['salaryrange'] = "3000 to 5000";
							else if($row['salaryrange'] == "fivetoeight")
								$_SESSION['salaryrange'] = "5000 to 8000";
							else if($row['salaryrange'] == "eighttoten")
								$_SESSION['salaryrange'] = "8000 to 10000";
							else if($row['salaryrange'] == "tentofifteen")
								$_SESSION['salaryrange'] = "10000 to 15000";
							else if($row['salaryrange'] == "fifteentotwenty")
								$_SESSION['salaryrange'] = "15000 to 20000";

            	header("Location: loggedinstudent.php");
		        exit();
            }else{
				header("Location: not-verified.html");
		        exit();
			}
		}
	
    else if ($result2->num_rows == 1) {
			$row = mysqli_fetch_assoc($result2);
            if ($row['verified'] == 1 && password_verify($password, $row['password'])) {
							$_SESSION['email'] = $row['email'];
							$_SESSION['password'] = $row['password'];
            	$_SESSION['name'] = $row['name'];
							$_SESSION['age'] = $row['age'];
							$_SESSION['address'] = $row['address'];

							if($row['gender'] == "f")
								$_SESSION['gender'] = "Female";
							else if($row['gender'] == "m")
								$_SESSION['gender'] = "Male";
							else if($row['gender'] == "o")
								$_SESSION['gender'] = "Other";

							$_SESSION['phone'] = $row['phone'];
							
							if($row['education'] == "c")
								$_SESSION['education'] = "College";
							if($row['education'] == "u")
								$_SESSION['education'] = "Undergraduate";
							if($row['education'] == "p")
								$_SESSION['education'] = "Postgraduate";
							
							if($row['version'] == "e")
								$_SESSION['version'] = "English Medium";
							else if($row['version'] == "b")
								$_SESSION['version']= "Bangla Medium";
							else if($row['version'] == "v")
								$_SESSION['version']= "English Version";

							$_SESSION['institution'] = $row['institution'];
							
							if($row['mode'] == "n")
								$_SESSION['mode'] = "Online";
							else if($row['mode'] == "f")
								$_SESSION['mode'] = "Offline";

							$_SESSION['area'] = $row['area'];
							$_SESSION['slots'] = $row['slots'];
							
							if($row['salaryrange'] == "threetofive")
								$_SESSION['salaryrange'] = "3000 to 5000";
							else if($row['salaryrange'] == "fivetoeight")
								$_SESSION['salaryrange'] = "5000 to 8000";
							else if($row['salaryrange'] == "eighttoten")
								$_SESSION['salaryrange'] = "8000 to 10000";
							else if($row['salaryrange'] == "tentofifteen")
								$_SESSION['salaryrange'] = "10000 to 15000";
							else if($row['salaryrange'] == "fifteentotwenty")
								$_SESSION['salaryrange'] = "15000 to 20000";

            	header("Location: loggedintutor.php");
		        exit();
            }else{
				header("Location: not-verified.html");
		        exit();
			}
	}
	
else{
	?>
	<script>
	  alert("Invalid email or password.")
	</script>
	<?php
	exit();
}
}
?>