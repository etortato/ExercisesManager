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

$conn->exec("DELETE c
                         FROM curtida c
                        INNER JOIN professor p ON p.id = c.idprofessor
                        WHERE c.idquestao = " . $_POST["questaoid"] . "
                          AND p.login = '" . $_SESSION["LoginProfessor"] . "'");
?>