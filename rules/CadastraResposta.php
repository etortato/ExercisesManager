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

if ($_POST["hdnCadastraResposta"] == "") {
    print json_encode(array('erro' => "Parâmetros incompletos - hdnCadastraResposta."), JSON_UNESCAPED_UNICODE);
} else {
    if ($_POST["txtCadastroResposta"] != "") {
        if ($conn->query("SELECT 1 FROM resposta WHERE idquestao = " . $_POST["hdnCadastraResposta"] . " AND descricao = '" . $_POST["txtCadastroResposta"] . "' LIMIT 1")->rowCount() == 0) {
            $conn->exec("INSERT INTO resposta 
                                        ( descricao
                                        , idquestao
                                        , idprofessorcadastro
                                        , datacadastro ) 
                                   VALUES 
                                        ('" . $_POST["txtCadastroResposta"] . "'
                                        , " . $_POST["hdnCadastraResposta"] . "
                                        , " . $_SESSION["IDProfessor"] . "
                                        , NOW() )");
            print json_encode(array('questaoid' => $_POST["hdnCadastraResposta"]));
        } else {
            print json_encode(array('questaoid' => $_POST["hdnCadastraResposta"], 'erro' => "Duas respostas não podem ter textos iguais para uma mesma questão. Favor informar outro texto."), JSON_UNESCAPED_UNICODE);
        }
    } else {
        json_encode(array('questaoid' => $_POST["hdnCadastraResposta"], 'erro' => "O texto da resposta não pode ser vazio."), JSON_UNESCAPED_UNICODE);
    }
}
?>