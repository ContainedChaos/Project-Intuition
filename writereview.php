<?php
$sname= "localhost";
$uname= "root";
$password = "";
$db_name = "intuition";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

$tutor = $_GET['email'];

if (!$conn) {
  echo "Connection failed!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width-device-width, initial-scale=1">
    <title>Review Page</title>
    <link rel = "stylesheet" type = "text/css" href = "contact-us.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <section class = "contact">
        <div class = "contact-form">
            <h1>Write your <span>Review</span></h1>
            <p>Send us your feedback here!</p>
            <form action = "submitreview.php?email=<?php echo $tutor;?>" method = "post">
                <textarea id = "" cols = "30" rows = "10" placeholder = "Your Message" name = "review" required>
                </textarea>
                <input type = "submit" name = "submit" value = "Submit" class = "btn">
            </form>
        </div>

        <div class = "contact-img">
            <img src = "imggg.png">
        </div>

    </section>

</body>
</html>