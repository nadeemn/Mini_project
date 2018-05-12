<?php
if (isset($_POST['button']))
{
  include_once 'dbh.inc.php';

	$username=$_POST["na"];
	$email=$_POST["num"];
	$mobile=$_POST["rate"];
	$password=$_POST["fback"];
	if(empty($username) || empty($email) || empty($mobile) || empty($password))
	{
		header("Location: feedback.html?var=fail");
	}else{


	$sql="INSERT INTO hello
	VALUES ('$username','$email','$mobile','$password')";
		mysqli_query($conn, $sql);
                    header("Location: index.php?insert=success");
                      exit();
	}
}
?>
