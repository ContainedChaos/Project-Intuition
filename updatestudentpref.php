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

    $row = mysqli_fetch_assoc($result);  
    $currentid = $row['id'];  

    $sql2 = "SELECT * from studentpreferences WHERE id = $currentid";
    $gotResults = mysqli_query($conn, $sql2);

    if($gotResults)
    {
        if(mysqli_num_rows($gotResults) > 0)
        {
            while($row = mysqli_fetch_array($gotResults))
            {
                //print_r($row);
                ?>
                <link rel = "stylesheet" href = "updatestudentpref.css">
                <div class = "wrapper">
                <form method = "post" action = "updatestudentprefcode.php">
                    <h2>UPDATE PREFERENCES</h2>

                    <div class="radiobutton">
                        <label class = "required">Preferred Mode</label>
                        <input type="radio" id="on" name="updateMode" value="n" required checked = "checked">
                        <label for="on">Online</label><br>
                        <input type="radio" id="off" name="updateMode" value="f" required>
                        <label for="off">Offline</label><br>
                    </div> 
                    <div class = "txt_field">
                        <label>Area</label>
                        <input type = "text" name = "updateArea" class = "form-control" value = "<?php echo $row['area']; ?>">
                    </div>
                    <div class="txt_field">
                        <label class = "required">Subjects</label>
                        <div class="tooltip"> ?
                            <span class="tooltiptext">Subjects that you need lessons on separated by commas</span>
                        </div>
                        <input type="text" class="form-control" name = "updateSubjects" required value = "<?php echo $row['subjects']; ?>">
                    </div>
                    <div class="txt_field">
                        <label>Availability</label>
                        <div class="tooltip"> ?
                            <span class="tooltiptext">Days that you prefer for lessons separated by commas</span>
                        </div>
                        <input type="text" class="form-control" name = "updateAvailability" required value = "<?php echo $row['availability']; ?>">
                    </div>
                    <div class="txt_field">
                        <label>Salary Range</label>
                        <div class="custom_select">
                            <select name = "updateSalaryrange">
                                <option selected hidden value="">--Select--</option>
                                <option value="threetofive">3000 to 5000</option>
                                <option value="fivetoeight">5000 to 8000</option>
                                <option value="eighttoten">8000 to 10000</option>
                                <option value="tentofifteen">10000 to 15000</option>
                                <option value="fifteentotwenty">15000 to 20000</option>
                            </select>
                        </div>
                    </div> 
                    <input type = "submit"  name = "update" value = "Update">
                </form>
                </div>
                <?php
            }
        }
    }



?>