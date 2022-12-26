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

    $row = $result->fetch_assoc();
    $currentid = $row['id'];

    $sql2 = "SELECT * from tutorpreferences WHERE id = $currentid";
    $gotResults = mysqli_query($conn, $sql2);

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
                    <div class = "txt_field">
                        <label>Slots</label>
                        <input type = "text" name = "updateSlots" class = "form-control" value = "<?php echo $row['slots']; ?>">
                    </div>
                    <div class="inputfield">
                        <label>Salary Range</label>
                        <div class="custom_select">
                            <select name = "salaryrange">
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
                    <input type = "hidden" name = "id" value = "<?php echo $currentid; ?>">
                </form>
                </div>
                <?php
            }
        }
    }



?>