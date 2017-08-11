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

$conn->exec("INSERT INTO curtida 
                            ( idquestao
                            , idprofessor 
                            , datacadastro) 
                       VALUES
                            ( " . $_POST["questaoid"] . "
                            , " . $_SESSION["IDProfessor"] . "
                            , NOW() )");

?>