<?php 
// MySQL version
/* $connection = mysqli_connect('den1.mysql1.gear.host', 'reunionisland5', 'Gn789!4cF-rs', 'reunionisland5');

if(!$connection){
    die("Database connection failed!");
} */

// PDO version
try{
    $connection = new PDO('mysql:host=den1.mysql1.gear.host;dbname=reunionisland5', 'reunionisland5', 'Gn789!4cF-rs');
}catch(PDOException $e){
    echo "Database connection failed: " . $e->getMessage;
    die();
}
?>