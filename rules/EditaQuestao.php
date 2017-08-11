<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 23/04/2017
 * Time: 18:26
 */

include_once "banco.php";

if(!isset($_SESSION)) {
    session_start();
}

if ($_POST["hdnEditaQuestao"] == "" || $_POST["hdnEditaQuestaoAssunto"] == "") {
    print json_encode(array('assuntoid' => $_POST["hdnEditaQuestaoAssunto"], 'erro' => "Parâmetros incompletos - hdnEditaQuestao ou hdnEditaQuestaoAssunto."), JSON_UNESCAPED_UNICODE);
} else {
    if ($_POST["txtEditaQuestao"] != "") {
        if ($conn->query("SELECT 1 FROM questao WHERE idassunto = " . $_POST["hdnEditaQuestaoAssunto"] . " AND descricao = '" . $_POST["txtEditaQuestao"] . "' LIMIT 1")->rowCount() == 0) {
            $conn->exec("UPDATE questao 
                                      SET descricao = '" . $_POST["txtEditaQuestao"] . "'
                                        , idprofessoredicao = " . $_SESSION["IDProfessor"] . "
                                        , dataedicao = NOW()
                                    WHERE id = " . $_POST["hdnEditaQuestao"]);
            print json_encode(array('assuntoid' => $_POST["hdnEditaQuestaoAssunto"]));
        } else {
            if ($conn->query("SELECT 1 FROM questao WHERE idassunto = " . $_POST["hdnEditaQuestaoAssunto"] . " AND descricao = '" . $_POST["txtEditaQuestao"] . "' AND id = " . $_POST["hdnEditaQuestao"] . " LIMIT 1")->rowCount() == 0) {
                print json_encode(array('assuntoid' => $_POST["hdnEditaQuestaoAssunto"], 'erro' => "Duas questões não podem ter nomes iguais para um mesmo assunto. Favor escolher outro nome."), JSON_UNESCAPED_UNICODE);
            } else {
                print json_encode(array('assuntoid' => $_POST["hdnEditaQuestaoAssunto"]));
            }
        }
    } else {
        print json_encode(array('assuntoid' => $_POST["hdnEditaQuestaoAssunto"], 'erro' => "O nome da questão não pode ser vazio."), JSON_UNESCAPED_UNICODE);
    }
}
?>