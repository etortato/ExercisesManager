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

$conn->exec("UPDATE resposta SET correta = 0 WHERE idquestao = " . $_POST["questaoid"]);
$conn->exec("UPDATE resposta 
                          SET correta = 1
                            , idprofessoredicao = " . $_SESSION["IDProfessor"] . "
                            , dataedicao = NOW()
                        WHERE id = " . $_POST["respostaid"]);

?>