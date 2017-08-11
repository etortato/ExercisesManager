<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 20/04/2017
 * Time: 18:39
 */
include_once "banco.php";

if(!isset($_SESSION)) {
    session_start();
}

$_SESSION["Respostas"][$_POST["questaoid"]] = $_POST["respostaid"];

?>