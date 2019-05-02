<?php
session_start();
include 'dbh.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM users WHERE user_email='".trim($email)."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$resultCheck = mysqli_num_rows($result);
$hashedPasswordCheck = password_verify($password, $row['user_password']);

  if($resultCheck == 1){
      if($hashedPasswordCheck == 1){

        $_SESSION['u_id'] = $row['user_id'];
        $_SESSION['u_username'] = $row['user_name'];
        $_SESSION['u_password'] = $row['user_password'];
        $_SESSION['u_password2'] = $row['user_password2'];
        $_SESSION['u_email'] = $row['user_email'];

        echo "1";
    } else {
        echo "0";
    }
} else {
    echo "0";
}
?>