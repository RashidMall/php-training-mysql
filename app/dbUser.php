<?php 
// MySQL version
/* $connection = mysqli_connect('den1.mysql1.gear.host', 'users25', 'Yp4UBm15b~x!', 'users25');

if(!$connection){
    die("Database connection failed!");
} */

// PDO version
try{
    $connectionUser = new PDO('mysql:host=den1.mysql1.gear.host;dbname=users25', 'users25', 'Yp4UBm15b~x!');
}catch(PDOException $e){
    echo "Database connection failed: " . $e->getMessage;
    die();
}
?>