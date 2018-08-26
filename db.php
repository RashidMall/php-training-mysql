<?php
// MySQL version
/* $connection = mysqli_connect('host', 'db', 'pwd', 'username');

if(!$connection){
    die("Database connection failed!");
} */

// PDO version
/* try{
    $connection = new PDO('mysql:host=den1.mysql1.gear.host;dbname=reunionisland5', 'reunionisland5', 'Gn789!4cF-rs');
}catch(PDOException $e){
    echo "Database connection failed: " . $e->getMessage;
    die();
} */

// ORM version
require_once './vendor/j4mie/idiorm/idiorm.php';

ORM::configure('mysql:host=den1.mysql1.gear.host;dbname=reunionisland5');
ORM::configure('username', 'reunionisland5');
ORM::configure('password', 'Gn789!4cF-rs');

$connection = ORM::get_db();
?>
