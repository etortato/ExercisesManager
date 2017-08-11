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

if ($_POST["hdnEditaAssunto"] == "" || $_POST["hdnEditaAssuntoDisciplina"] == "") {
    print json_encode(array('disciplinaid' => $_POST["hdnEditaAssuntoDisciplina"], 'erro' => "Parâmetros incompletos - hdnEditaAssunto ou hdnEditaAssuntoDisciplina."), JSON_UNESCAPED_UNICODE);
} else {
    if ($_POST["txtEditaAssunto"] != "") {
        if ($conn->query("SELECT 1 FROM assunto WHERE iddisciplina = " . $_POST["hdnEditaAssuntoDisciplina"] . " AND nome = '" . $_POST["txtEditaAssunto"] . "' LIMIT 1")->rowCount() == 0) {
            $conn->exec("UPDATE assunto 
                                      SET nome = '" . $_POST["txtEditaAssunto"] . "'
                                        , idprofessoredicao = " . $_SESSION["IDProfessor"] . "
                                        , dataedicao = NOW()
                                    WHERE id = " . $_POST["hdnEditaAssunto"]);
            print json_encode(array('disciplinaid' => $_POST["hdnEditaAssuntoDisciplina"]));
        } else {
            if ($conn->query("SELECT 1 FROM assunto WHERE iddisciplina = " . $_POST["hdnEditaAssuntoDisciplina"] . " AND nome = '" . $_POST["txtEditaAssunto"] . "' AND id = " . $_POST["hdnEditaAssunto"] . " LIMIT 1")->rowCount() == 0) {
                print json_encode(array('disciplinaid' => $_POST["hdnEditaAssuntoDisciplina"], 'erro' => "Dois assuntos não podem ter nomes iguais para uma mesma disciplina. Favor escolher outro nome."), JSON_UNESCAPED_UNICODE);
            } else {
                print json_encode(array('disciplinaid' => $_POST["hdnEditaAssuntoDisciplina"]));
            }
        }
    } else {
        print json_encode(array('disciplinaid' => $_POST["hdnCadastraAssunto"], 'erro' => "O nome do assunto não pode ser vazio."), JSON_UNESCAPED_UNICODE);
    }
}
?>