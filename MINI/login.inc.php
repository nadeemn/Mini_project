<?php

session_start();
if (isset($_POST['submit'])){
  include 'dbh.inc.php';

  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

  if(empty($name) ||empty($pwd)){
    header("Location: index.php?index=empty");
    exit();
  }else
  {
	  $admin="SELECT * FROM tourism_admin WHERE username='$name' AND password='$pwd'";
      $x=mysqli_query($conn,$admin);
      $result_x=mysqli_num_rows($x);
	  if($result_x == 1)
	  {

		  header("Location: admin.php");
	  }

  else {
    $sql = "SELECT * FROM users WHERE user_name='$name'";
    $result=mysqli_query($conn,$sql);
    $resultCheck=mysqli_num_rows($result);
    if ($resultCheck < 1) {
      header("Location: index.php?index=usernotvalid");
      exit();
    }else {
      if($row=mysqli_fetch_assoc($result)){
        $hashedPwdheck=password_verify($pwd,$row['user_pwd']);
        if ($hashedPwdheck == false) {
            header("Location: index.php?index=password error");
            exit();
        }elseif ($hashedPwdheck == true) {
          $_SESSION['u_id'] =  $row['user_id'];
          $_SESSION['u_first'] =  $row['user_first'];
          $_SESSION['u_last'] =  $row['user_last'];
          $_SESSION['u_email'] =  $row['user_email'];
          $_SESSION['u_name'] =  $row['user_name'];
          header("Location: index.php?index=loginsuccess");
          exit();
        }
      }

    }
  }
}
} else {
  header("Location: index.php?index=error");
  exit();
}?>
