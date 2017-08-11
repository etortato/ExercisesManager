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

if ($_POST["hdnEditaResposta"] == "" || $_POST["hdnEditaRespostaQuestao"] == "") {
    print json_encode(array('questaoid' => $_POST["hdnEditaRespostaQuestao"], 'erro' => "Parâmetros incompletos - hdnEditaResposta ou hdnEditaRespostaQuestao."), JSON_UNESCAPED_UNICODE);
} else {
    if ($_POST["txtEditaResposta"] != "") {
        if ($conn->query("SELECT 1 FROM resposta WHERE idquestao = " . $_POST["hdnEditaRespostaQuestao"] . " AND descricao = '" . $_POST["txtEditaResposta"] . "' LIMIT 1")->rowCount() == 0) {
            $conn->exec("UPDATE resposta 
                                      SET descricao = '" . $_POST["txtEditaResposta"] . "'
                                        , idprofessoredicao = " . $_SESSION["IDProfessor"] . "
                                        , dataedicao = NOW()
                                    WHERE id = " . $_POST["hdnEditaResposta"]);
            print json_encode(array('questaoid' => $_POST["hdnEditaRespostaQuestao"]));
        } else {
            if ($conn->query("SELECT 1 FROM resposta WHERE idquestao = " . $_POST["hdnEditaRespostaQuestao"] . " AND descricao = '" . $_POST["txtEditaResposta"] . "' AND id = " . $_POST["hdnEditaResposta"] . " LIMIT 1")->rowCount() == 0) {
                print json_encode(array('questaoid' => $_POST["hdnEditaRespostaQuestao"], 'erro' => "Duas respostas não podem ter nomes iguais para uma mesma questão. Favor escolher outro nome."), JSON_UNESCAPED_UNICODE);
            } else {
                print json_encode(array('questaoid' => $_POST["hdnEditaRespostaQuestao"]));
            }
        }
    } else {
        print json_encode(array('questaoid' => $_POST["hdnEditaRespostaQuestao"], 'erro' => "O nome da resposta não pode ser vazio."), JSON_UNESCAPED_UNICODE);
    }
}
?>