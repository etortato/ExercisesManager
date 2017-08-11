<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 24/04/2017
 * Time: 21:10
 */

include_once "banco.php";

if(!isset($_SESSION)) {
    session_start();
}

if ($_POST["hdnCadastraQuestionario"] == "") {
    print json_encode(array('erro' => "Parâmetros incompletos - hdnCadastraQuestionario."), JSON_UNESCAPED_UNICODE);
} else {
    if ($_POST["txtCadastroQuestionario"] != "") {
        if ($conn->query("SELECT 1 FROM questionario WHERE iddisciplina = " . $_POST["hdnCadastraQuestionario"] . " AND nome = '" . $_POST["txtCadastroQuestionario"] . "' LIMIT 1")->rowCount() == 0) {
            $conn->exec("INSERT INTO questionario 
                                        ( nome
                                        , iddisciplina
                                        , idprofessorcadastro
                                        , datacadastro ) 
                                   VALUES 
                                        ('" . $_POST["txtCadastroQuestionario"] . "'
                                        , " . $_POST["hdnCadastraQuestionario"] . "
                                        , " . $_SESSION["IDProfessor"] . "
                                        , NOW() )");
            print json_encode(array('disciplinaid' => $_POST["hdnCadastraQuestionario"]));
        } else {
            print json_encode(array('disciplinaid' => $_POST["hdnCadastraQuestionario"], 'erro' => "Dois questionários não podem ter nomes iguais para uma mesma disciplina. Favor informar outro texto."), JSON_UNESCAPED_UNICODE);
        }
    } else {
        json_encode(array('disciplinaid' => $_POST["hdnCadastraQuestionario"], 'erro' => "O nome do questionário não pode ser vazio."), JSON_UNESCAPED_UNICODE);
    }
}
?>