<!DOCTYPE html>
<html>
<head>
	<title>ekart</title>
	<link rel="stylesheet" typt="text/css" href="style.css">
	<link rel="stylesheet" typt="text/css" href="s1.css">
	
</head>
<body>

<div class="banner">
	<h1> E-kart </h1>
	</div>
	<div class ="slide-block">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="s1.css">

<body>

<div class="w3-content w3-section" style="max-width:200px">
  <img class="mySlides" src="ekart/images/new.png" style="width:100%">
  <img class="mySlides" src="ekart/images/new.png" style="width:100%">
  <img class="mySlides" src="ekart/images/new.png" style="width:100%">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
	</div>
	<center>



	<form method="post" action="login.php ">	
	<h2>Sign in</h2>
		<div class="input1">
		<label>Username</label>
		<input type="email" name="email"/>
		<label>Password</label>
		<input type="password" name="password_1"/>
		</div>
		<button type="submit" name="signin" class="btn">Sign in</button>
		<p>
		Not yet a member?  <a href="register.php">Sign up</a>
		</p>

		<div class="popup">
		<?php
if(isset($_POST["signin"]))
{
if(!empty($_POST['email']) && !empty($_POST['password_1']))
	{
    $email=$_POST['email'];
    $password_1=$_POST['password_1'];

    $con=mysqli_connect('localhost','root','') or die(mysqli_error());
    mysqli_select_db($con,'ecart') or die("cannot select DB");
    $query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND password_1 ='$password_1';");
    $numrows=mysqli_num_rows($query);
	
    if($numrows!=0)
    {

    while($row=mysqli_fetch_assoc($query))
    {
    $dbemail=$row['email'];
    $dbpassword_1=$row['password_1'];
    }

    if($email == $dbemail && $password_1 == $dbpassword_1)
    {
    session_start();
    $_SESSION['sess_user']=$email;

    /* Redirect browser */
    header("Location: main.php");
    }
    } 
	else 
	{
    echo "**Invalid username or password!**";
    }

} 
else {
    echo "**All fields are required!**";
}
}
?>
</div>
</form>
		</center>
		</body>
	</html>