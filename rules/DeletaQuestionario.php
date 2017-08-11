<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 20/04/2017
 * Time: 18:39
 */
include_once "banco.php";

$conn->exec("DELETE FROM questionario WHERE id = " . $_POST["questionarioid"]);

?>