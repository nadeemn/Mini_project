<?php
if (isset($_POST['submit'])) {
  include_once'dbh.inc.php';
  $first = mysqli_real_escape_string($conn, $_POST['first']);
  $last = mysqli_real_escape_string($conn, $_POST['last']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

  //error handlers
  //check for empty fields
  if (empty($first) || empty($last) || empty($email) || empty($name) || empty($pwd)  ) {
    header("Location: signup.php?signup=empty");
    exit();

  } else {
        //check if input char are valid
        if ( !preg_match("/^[a-zA-A]*$/", $first) || !preg_match("/^[a-zA-A]*$/", $last) ) {
          header("Location: signup.php?signup=invalid");
          exit();
        } else {
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: signup.php?signup=email");
            exit();
          }else {
            $sql = "select * from users where user_name='$name'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              header("Location: signup.php?signup=usertaken");
              exit();
            }else {
              //hASHING THE password
              $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

              $sql = "INSERT INTO users (user_first, user_last, user_email, user_name, user_pwd) VALUES ('$first','$last','$email','$name','$hashedpwd');";
                      mysqli_query($conn, $sql);
                    header("Location: signup.php?signup=success");
                      exit();

            }
          }
        }

  }


} else {
header("Location: signup.php");
exit();
}
?>
