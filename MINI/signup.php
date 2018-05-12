<?php
include_once'header.php';
 ?>
 <style>
 body{
   background-image: url("../image/im.jpg");
 }
 </style>
<section class="main-container">

<div class="main-wrapper">
  <h2>Signup</h2>
  <form class="signup-form" action="signup.inc.php" method="POST">
    <input type="text" name="first" placeholder="First Name" required>
    <input type="text" name="last" placeholder="Last Name" required>
    <input type="text" name="email" placeholder="E-Mail" required>
    <input type="text" name="name" placeholder="Username" required>
    <input type="password" name="pwd" placeholder="Password" required>
    <button type="submit" name="submit">Sign Up</button>
  </form>

</div>
</section>
<?php
include_once'footer.php';
 ?>
