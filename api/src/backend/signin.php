<?php
//DB connetion
require('../../config/db_connection.php');
//Get data from login form
$email = $_POST['email'];
$password = $_POST['passwd'];
//encrypt password with md5 
$enc_pass = md5($password);
//query
$query = "select
            *
        from 
            users 
        where 
            email= '$email'and 
            password = '$enc_pass'
        ";
$result = pg_query($conn, $query);
$row = pg_fetch_assoc($result);

if ($row){
    header('refresh:0;  url = http://127.0.0.1/beta/api/src/home.php');
}else{
    echo "<script>alert('Invalid email or password!')</script>";
    header ('refresh:0; url = http://127.0.0.1/beta/api/src/login_form.html');
}

pg_close($conn);

?>