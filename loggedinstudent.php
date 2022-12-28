
<html>
    <head>
        <title>
          Project Intuition
        </title>
        <link rel = "stylesheet" href = "loggedinstudent.css">
    </head>
    <body>
        <div class = "banner">
            <div class = "navbar">
                <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Dashboard</a></li>
                  <li><a href="searchfiltersstudent.html">Search</a></li>
                  <li><a href="studentviewreq.php">Requests</a></li>
                  <li><a href="studentprofile.php">My Profile</a></li>
                  <li><a href="contact-us.html">Contact Us</a></li>
                </ul>
                <button>
                    <a href = "homepage.html">Logout</a>
                </button>
            </div>
        </div>
        <div class="content">
            <h1>Welcome,</h1>
            <p style="font-size:35px;">
                <?php
                    session_start();
                    echo $_SESSION['name'];
                ?>
            </p>
        </div>
    </body>
  
  </html>