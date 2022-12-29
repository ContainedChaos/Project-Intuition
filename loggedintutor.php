<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="home.css"/>

    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  </head>
  <body>
  <header>
          <a href="#" class="logo">InTuition</a>
            <div class="bx bx-menu" id="menu-icon"></div>

            <ul class="navbar">
              <li><a href="loggedintutor.php">Home</a></li>
              <li><a href="dashboardtutor.php">Dashboard</a></li>
              <li><a href="findstudents.php">Find Students</a></li>
              <li><a href="tutorviewreq.php">Requests</a></li>
              <li><a href="tutorprofile.php">My Profile</a></li>
              <li><a href="contact-us.html">Contact Us</a></li>
              <li><a href="home.html">Logout</a></li>
            </ul>
        </header>

    <section class="medu-container" id="home">
      <div class="home-text">
        <h2 style="font-size:40px; margin-top:250px; margin-left: 190px; margin-bottom: 150px;">Welcome, <br>
        <p style="font-size:70px; margin-left:0px;">
        <?php
            session_start();
            echo $_SESSION['name'];
        ?>  
        </p>  
        </h2>
      </div>
    </section>

    <section class="about" id="about">
      <div class="about-img">
        <img src="bulb.png">
      </div>

      <div class="about-text">
        <span>About Us</span>
        <h2>Finding tuitions has never been easier</h2>
        <p>We are here to put an end to your tuition troubles. Get the perfect tuitions without breaking a sweat. Our search filters make it seem 
          as though every tuition is custom-made, just for you!</p>
      </div>
    </section>

    <section class="menu" id="menu">
      <div class="heading">
        <h2>Our Reach</h2>
      </div>

      <div class="menu-container">
        <div class="box">
          <div class="box-img">
            <img src="click.png">
          </div>
          <h2>22528</h2>
          <span>Visitors</span>
        </div>

        <div class="box">
          <div class="box-img">
            <img src="tutor.png">
          </div>
          <h2>7837</h2>
          <span>Tutors</span>
        </div>

        <div class="box">
          <div class="box-img">
            <img src="student.png">
          </div>
          <h2>11973</h2>
          <span>Students</span>
        </div>
      </div>
    </section>

    <section class="services" id="services">
      <div class="heading2">
        <span>Services</span>
        <h2>What we offer</h2>
      </div>

      <div class="service-container">
        <div class="s-box">
          <img src="filter.png">
          <h3>Custom Filters</h3>
          <p>Apply filters <br>as you like
          </p>
        </div>

        <div class="s-box">
          <img src="tuition.png">
          <h3>Hire Tutors</h3>
          <p>Variety of tutors <br>to choose from
          </p>
        </div>

        <div class="s-box">
          <img src="backpack.png">
          <h3>Find Students</h3>
          <p>Look for students who<br> match your schedule
          </p>
        </div>
      </div>
    </section>

    <section class="cta">
      <h2>We support tutors and students<br>everyday</h2>
      <a href="#" class="btn">Back to Top</a>
    </section>
  </body>
</html>