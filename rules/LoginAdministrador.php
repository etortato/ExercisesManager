<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 10/04/2017
 * Time: 20:35
 */

include_once "banco.php";

if(!isset($_SESSION)) {
    session_start();
} else {
    session_destroy();
    session_start();
}

if ($_POST["txtSenha"] == "123456") {
    $_SESSION["SouAdministrador"] = "ÉADMINISTRADOR";
    header("Location: ../Administrar.php");
} else {
    header("Location: ../LoginErroAdministrador.html");
    die();
}
?>