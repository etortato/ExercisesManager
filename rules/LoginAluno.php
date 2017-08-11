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
                                    FROM questionario 
                                   WHERE id = '" . $_POST["txtQuestionario"] . "'  LIMIT 1")->fetchAll(PDO::FETCH_ASSOC);

if (count($result) > 0) {
    $_SESSION["SouAluno"] = "ÉALUNO";
    $_SESSION["QuestionarioID"] = $result[0]["id"];
    $_SESSION["QuestionarioNome"] = $result[0]["nome"];
    header("Location: ../Responder.php");
} else {
    header("Location: ../LoginErroAluno.html");
    die();
}
?>