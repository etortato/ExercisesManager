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

$result = $conn->query("SELECT * 
                                    FROM professor 
                                   WHERE login = '" . $_POST["txtLogin"] . "' 
                                     AND senha = '" . $_POST["txtSenha"] . "' LIMIT 1")->fetchAll(PDO::FETCH_ASSOC);

if (count($result) > 0) {
    $_SESSION["SouProfessor"] = "ÉPROFESSOR";
    $_SESSION["LoginProfessor"] = $_POST["txtLogin"];
    $_SESSION["IDProfessor"] = $result[0]["id"];
    header("Location: ../ListaQuestoes.php");
} else {
    header("Location: ../LoginErroProfessor.html");
    die();
}
?>