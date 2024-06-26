<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>
	<link rel="stylesheet" href="studentsignup.css">
</head>
<body>

<div class="wrapper">
    <div class="title">
      Student Signup
    </div>
<form action = "studentpreferencescode.php" method = "POST">
    <div class="form">


       <div class="radiobutton">
        <label class = "required">Preferred Mode</label>
        <input type="radio" id="on" name="mode" value="n" required>
        <label for="on">Online</label><br>
        <input type="radio" id="off" name="mode" value="f" required>
        <label for="off">Offline</label><br>
       </div> 

       <div class="inputfield">
        <label class = "required">Preferred Area</label>
        <input type="text" class="input" name = "area" required>
       </div>

       <div class="inputfield">
        <label class = "required">Subjects</label>
        <div class="tooltip"> ?
          <span class="tooltiptext">Subjects that you need lessons on separated by commas</span>
        </div>
        <input type="text" class="input" name = "subjects" required>
       </div>

       <div class="inputfield">
        <label>Availability</label>
        <div class="tooltip"> ?
          <span class="tooltiptext">Days that you prefer for lessons separated by commas</span>
        </div>
        <input type="text" class="input" name = "availability" required>
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

       <div class="submitbutton">
        <input type = "submit" name = "Submit" value = "Submit" ">
        <input type = "hidden" name = "email" value = "<?php if (isset($_GET['email'])){echo $_GET['email'];} ?>">
       </div>

       <a href = "signup-verify.html"><span></span>Skip</a>

       <div class = "login_link2">
        Already have an account? <a href = "login.html">Login</a> 
       </div>

       
    </div>
</div></form>
	
</body>
</html>


