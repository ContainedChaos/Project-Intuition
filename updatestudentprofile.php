<?php
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "intuition";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    session_start();
    $currentuser = $_SESSION['email'];
    $sql = "SELECT * FROM student WHERE email = '$currentuser'";
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
                <form method = "post" action = "updatestudentprofilecode.php">

                    <div class = "txt_field">
                        <label>Name</label>
                        <input type = "text" name = "updateName" class = "form-control" value = "<?php echo $row['name']; ?>">
                    </div>
                    <div class = "txt_field">
                        <label>Address</label>
                        <input type = "text" name = "updateAddress" class = "form-control" value = "<?php echo $row['address']; ?>">
                    </div>
                    <div class = "txt_field">
                        <label>Institution</label>
                        <input type = "text" name = "updateInstitution" class = "form-control" value = "<?php echo $row['institution']; ?>">
                    </div>
                    <div class = "txt_field">
                        <label>Phone</label>
                        <input type = "text" name = "updatePhone" class = "form-control" value = "<?php echo $row['phone']; ?>">
                    </div>
                    <div class="txt_field">
                        <label>Grade</label>
                        <input type="text" class="form-control" name = "updateGrade" value = "<?php echo $row['grade']; ?>">
                    </div> 
                    <div class="txt_field">
                        <label class = "required">Version</label>
                        <input type="radio" id="ev" name="updateVersion" value="v" required checked = "checked">
                        <label for="ev">English Version</label><br>
                        <input type="radio" id="em" name="updateVersion" value="e" required>
                        <label for="em">English Medium</label><br>
                        <input type="radio" id="bm" name="updateVersion" value="b" required>
                        <label for="bm">Bangla Medium</label>
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