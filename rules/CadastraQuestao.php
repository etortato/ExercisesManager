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

if ($_POST["hdnCadastraQuestao"] == "") {
    print json_encode(array('erro' => "Parâmetros incompletos - hdnCadastraQuestao."), JSON_UNESCAPED_UNICODE);
} else {
    if ($_POST["txtCadastroQuestao"] != "") {
        if ($conn->query("SELECT 1 FROM questao WHERE idassunto = " . $_POST["hdnCadastraQuestao"] . " AND descricao = '" . $_POST["txtCadastroQuestao"] . "' LIMIT 1")->rowCount() == 0) {
            $conn->exec("INSERT INTO questao 
                                        ( descricao
                                        , idassunto 
                                        , idprofessorcadastro
                                        , datacadastro) 
                                   VALUES 
                                        ( '" . $_POST["txtCadastroQuestao"] . "'
                                        , " . $_POST["hdnCadastraQuestao"] . "
                                        , " . $_SESSION["IDProfessor"] . "
                                        , NOW() )");
            print json_encode(array('assuntoid' => $_POST["hdnCadastraQuestao"]));
        } else {
            print json_encode(array('assuntoid' => $_POST["hdnCadastraQuestao"], 'erro' => "Duas questões não podem ter textos iguais para um mesmo assunto. Favor informar outro texto."), JSON_UNESCAPED_UNICODE);
        }
    } else {
        json_encode(array('assuntoid' => $_POST["hdnCadastraQuestao"], 'erro' => "O texto da questão não pode ser vazio."), JSON_UNESCAPED_UNICODE);
    }
}
?>