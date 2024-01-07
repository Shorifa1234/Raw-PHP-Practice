<?php 
$servename = 'localhost';
$username = 'root';
$password = '';

try {
    $con = new PDO("mysql:host=$servename;dbname=test", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'connected';
} catch(PDOException $e) {
    echo '<br>' . $e->getMessage();
}
?>