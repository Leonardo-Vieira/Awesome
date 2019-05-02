<?php
include 'dbh.php';

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password2 = mysqli_real_escape_string($conn, $_POST['password2']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

if (!empty($username) && !empty($password) && !empty($password2) && !empty($email)){
    //echo "preenche-o tudo ";
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
       // echo "entro no email ";
        $sql = "SELECT * FROM users WHERE user_email='".trim($email)."'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $row = mysqli_fetch_assoc($result);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {

            echo "email";
        } else {
           // echo "ver agora a pass ";
            if($password == $password2) {
               // echo "entro na pass ";
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $hashedPassword2 = password_hash($password2, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users (user_name, user_password, user_password2, user_email) VALUES ('$username', '$hashedPassword', '$hashedPassword2', '$email')";

                mysqli_query($conn, $sql);
                echo "1";
                
              } else {
                
                echo "password";
            }
        }
    } else {
        
        echo "email";
    }
} else {
    
    echo "0";
  }
//die();
?>