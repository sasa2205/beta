<?php
 
require('../../config/db_connection.php');

   $email = $_POST['email'];
   $password = $_POST['passwd'];
   $enc_pass = md5($password);

   //echo "correo_electronico: " . $email;
   //echo "<br>contraseña: " . $password;
   //echo "<br> enc. password: " . $enc_pass;


   $query = "INSERT INTO users (email, password)
       VALUES ('$email','$enc_pass');
   ";

  $result = pg_query ($conn, $query);
   if ($result) {
      echo "registration succesful!";
   } else {
      echo "registration failed!";
   }
   pg_close($conn);

?> 