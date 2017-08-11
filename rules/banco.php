<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 10/04/2017
 * Time: 20:40
 */

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "questionario";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>