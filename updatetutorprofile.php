<?php
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "intuition";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    session_start();
    $currentuser = $_SESSION['email'];
    $sql = "SELECT * FROM tutor WHERE email = '$currentuser'";

    $gotResults = mysqli_query($conn, $sql);

    if($gotResults)
    {
        if(mysqli_num_rows($gotResults) > 0)
        {
            while($row = mysqli_fetch_array($gotResults))
            {
                //print_r($row);
                ?>
                <div class = "center">
                <form method = "post" action = "updatetutorprofilecode.php">

                    <div class = "txt_field">
                        <input type = "text" name = "updateName" class = "form-control" value = "<?php echo $row['name']; ?>">
                    </div>
                    <div class = "txt_field">
                        <input type = "text" name = "updateAddress" class = "form-control" value = "<?php echo $row['address']; ?>">
                    </div>
                    <div class = "txt_field">
                        <input type = "text" name = "updateInstitution" class = "form-control" value = "<?php echo $row['institution']; ?>">
                    </div>
                    <div class = "txt_field">
                        <input type = "text" name = "updatePhone" class = "form-control" value = "<?php echo $row['phone']; ?>">
                    </div>
                    <input type = "submit"  name = "update" value = "Update">
                    <input type = "hidden" name = "email" value = "<?php echo $row['email']; ?>">
                </form>
                </div>
                <?php
            }
        }
    }



?>