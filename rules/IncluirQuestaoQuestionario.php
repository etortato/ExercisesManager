<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 24/04/2017
 * Time: 21:10
 */

include_once "banco.php";

if (!isset($_SESSION)) {
    session_start();
}

if ($_POST["questaoid"] == "" || $_POST["questionarioid"] == "") {
    print json_encode(array('erro' => "Parâmetros incompletos - questaoid - questionarioid."), JSON_UNESCAPED_UNICODE);
} else {
    if ($conn->query("SELECT 1 FROM questionario_questao WHERE idquestao = " . $_POST["questaoid"] . " AND idquestionario = '" . $_POST["questionarioid"] . "' LIMIT 1")->rowCount() == 0) {
        $conn->exec("INSERT INTO questionario_questao 
                                        ( idquestao
                                        , idquestionario
                                        , idprofessorcadastro
                                        , datacadastro ) 
                                   VALUES 
                                        ('" . $_POST["questaoid"] . "'
                                        , " . $_POST["questionarioid"] . "
                                        , " . $_SESSION["IDProfessor"] . "
                                        , NOW() )");
        print json_encode(array('questionarioid' => $_POST["questionarioid"]));
    } else {
        print json_encode(array('erro' => "Uma questão não pode ser inserida duas vezes no mesmo questionário."), JSON_UNESCAPED_UNICODE);
    }
}
?>