<?php
  /* 
  PostgresSQL Database connection
  Developer : samuel
*/
$servername = "localhost" ;   //127.0.0.1
$username   = "postgres";
$password   = "unicesmag";
$dbname     = "beta";
$port       = "5432";

$data_connection = "
   host     =  $servername
   port     =  $port 
   dbname   =  $dbname 
   user     =  $username 
   password =  $password
";

$conn = pg_connect($data_connection);

if (!$conn){
    die ("connection failed: ". preg_last_error());
}else {
   echo "Connected successfully";  //This will print if connection is successful.  For production, you may want to redirect to an error page.  This is just for demonstration purposes.  Always check your database connection status before proceeding.  You can also log this information in your application logs.  Good luck!  :)  }
}

pg_close($conn);

?> 
