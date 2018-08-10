<?php 
// MySQL version
/* $connection = mysqli_connect('host', 'db', 'pwd', 'user');

if(!$connection){
    die("Database connection failed!");
} */

// PDO version
try{
    $connectionUser = new PDO('mysql:host=myhost.host;dbname=mydbname', 'myname', 'pwd');
}catch(PDOException $e){
    echo "Database connection failed: " . $e->getMessage;
    die();
}
?>
