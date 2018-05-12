<?php
session_start();
 ?>
<!DOCTYPE html>
<!html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
    <nav>
        <div class="main-wrapper">
          <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="hotel.php">Hotels</a></li>
              <li><a href="hosp.php">Hospitality</a></li>
              <li><a href="things.php">Things to do</a></li>

            </ul>
</div>




          <div class="nav-login">
            <?php
            if (isset($_SESSION['u_id'])) {
              echo '<a href="signout.php">Log Out</a>';
            } else{
            echo '<form action="login.inc.php" method="POST" >
              <input type="text" name="name" placeholder="Username/Email id">
              <input type="password" name="pwd" placeholder="Password">
              <button type="submit" name="submit">Login</button>
            </form>
            <a href="signup.php">Sign up</a>';
          }
            ?>
          </div>





        <div class="dropdown">
          <button class="dropbtn">●●●</button>
          <div class="dropdown-content">
            <a href="contact.php">CONTACT US</a>
            <a href="feedback.php"> FEEDBACK</a>
          </div>
      </div>

      </nav>

</header>
</body>
