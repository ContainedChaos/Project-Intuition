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
                <link rel = "stylesheet" href = "updatetutorprofile.css">
                <div class = "wrapper">
                <form method = "post" action = "updatetutorprofilecode.php">

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
                        <label class = "required">Education</label>
                        <input type="radio" id="college" name="updateEducation" value="c" required checked = "checked">
                        <label for="college">College</label><br>
                        <input type="radio" id="undergrad" name="updateEducation" value="u" required>
                        <label for="undergrad">Undergrad</label><br>
                        <input type="radio" id="postgrad" name="updateEducation" value="p" required>
                        <label for="postgrad">Postgrad</label>
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