<?php
 //DB cpnnetion
require('../../config/db_connection.php');
// Get data from register form
   $email = $_POST['email'];
   $password = $_POST['passwd'];
   //encrypt password with md5 hashing algorithm
   $enc_pass = md5($password);
   //Query to inseet data into users table
   $query = "SELECT * FROM users WHERE email = '$email'";
   $result = pg_query($conn,$query);
   $row = pg_fetch_assoc($result);
   if ($row) {
      echo "<script>alert('email already exists!')</script>";
      header ('refresh:0;   url=http://127.0.0.1/beta/api/src/register_form.html');
      exit();
      }

   $query = "INSERT INTO users (email, password)   
       VALUES ('$email','$enc_pass');
   ";
//Execute query
  $result = pg_query ($conn, $query);

   if ($result) {
      echo "<script>alert('registation successful')</script>";
      header ('refresh:0;   url=http://127.0.0.1/beta/api/src/login_form.html');
   } else {
      echo "registration failed!";
   }
   pg_close($conn);

?> 