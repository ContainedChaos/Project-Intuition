<?php 
session_start(); 

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "intuition";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$password = validate($_POST['password']);

	if (empty($email)) {
		header("Location: process.php?error=Email is required");
	    exit();
	}else if(empty($password)){
        header("Location: process.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM student WHERE email='$email' AND password='$password'";
        $sql2 = "SELECT * FROM tutor WHERE email='$email' AND password='$password'";
		
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $password) {
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['name'] = $row['name'];
            	echo "Logged in as student";
		        exit();
            }else{
				echo "Incorrect credentials";
		        exit();
			}
        }else if (mysqli_num_rows($result2) === 1) {
			$row = mysqli_fetch_assoc($result2);
            if ($row['email'] === $email && $row['password'] === $password) {
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['name'] = $row['name'];
            	echo "Logged in as tutor";
		        exit();
            }else{
				echo "Incorrect credentials";
		        exit();
			}
		}else{
			echo "Incorrect credentials blah";
	        exit();
		}
	}
	
}else{
	echo "Login failed";
	exit();
}

?>