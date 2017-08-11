<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 12/04/2017
 * Time: 21:18
 */

if(!isset($_SESSION))
    session_start();

if ((!isset($_SESSION["SouProfessor"]) ||  $_SESSION["SouProfessor"] != "ÉPROFESSOR")
    &&
    (!isset($_SESSION["SouAluno"]) || $_SESSION["SouAluno"] != "ÉALUNO")
    &&
    (!isset($_SESSION["SouAdministrador"]) || $_SESSION["SouAdministrador"] != "ÉADMINISTRADOR")) {
    header("Location: /questionario/SemAcesso.html");
    die();
}
?>