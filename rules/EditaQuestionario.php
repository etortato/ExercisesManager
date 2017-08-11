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

if ($_POST["hdnEditaQuestionario"] == "" || $_POST["hdnEditaQuestionarioDisciplina"] == "") {
    print json_encode(array('disciplinaid' => $_POST["hdnEditaQuestionarioDisciplina"], 'erro' => "Parâmetros incompletos - hdnEditaQuestionario ou hdnEditaQuestionarioDisciplina."), JSON_UNESCAPED_UNICODE);
} else {
    if ($_POST["txtEditaQuestionario"] != "") {
        if ($conn->query("SELECT 1 FROM questionario WHERE iddisciplina = " . $_POST["hdnEditaQuestionarioDisciplina"] . " AND nome = '" . $_POST["txtEditaQuestionario"] . "' LIMIT 1")->rowCount() == 0) {
            $conn->exec("UPDATE questionario 
                                      SET nome = '" . $_POST["txtEditaQuestionario"] . "'
                                        , idprofessoredicao = " . $_SESSION["IDProfessor"] . "
                                        , dataedicao = NOW()
                                    WHERE id = " . $_POST["hdnEditaQuestionario"]);
            print json_encode(array('disciplinaid' => $_POST["hdnEditaQuestionarioDisciplina"]));
        } else {
            if ($conn->query("SELECT 1 FROM questionario WHERE iddisciplina = " . $_POST["hdnEditaQuestionarioDisciplina"] . " AND nome = '" . $_POST["txtEditaQuestionario"] . "' AND id = " . $_POST["hdnEditaQuestionario"] . " LIMIT 1")->rowCount() == 0) {
                print json_encode(array('disciplinaid' => $_POST["hdnEditaQuestionarioDisciplina"], 'erro' => "Dois questionários não podem ter nomes iguais para uma mesma disciplina. Favor escolher outro nome."), JSON_UNESCAPED_UNICODE);
            } else {
                print json_encode(array('disciplinaid' => $_POST["hdnEditaQuestionarioDisciplina"]));
            }
        }
    } else {
        print json_encode(array('disciplinaid' => $_POST["hdnEditaQuestionarioDisciplina"], 'erro' => "O nome do questionário não pode ser vazio."), JSON_UNESCAPED_UNICODE);
    }
}
?>