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

if ($_POST["hdnEditaDisciplina"] == "" || $_POST["hdnEditaDisciplinaCurso"] == "") {
    print json_encode(array('cursoid' => $_POST["hdnEditaDisciplinaCurso"], 'erro' => "Parâmetros incompletos - hdnEditaDisciplina ou hdnEditaDisciplinaCurso."), JSON_UNESCAPED_UNICODE);
} else {
    if ($_POST["txtEditaDisciplina"] != "") {
        if ($conn->query("SELECT 1 FROM disciplina WHERE idcurso = " . $_POST["hdnEditaDisciplinaCurso"] . " AND nome = '" . $_POST["txtEditaDisciplina"] . "' LIMIT 1")->rowCount() == 0) {
            $conn->exec("UPDATE disciplina 
                                      SET nome = '" . $_POST["txtEditaDisciplina"] . "'
                                        , idprofessoredicao = " . $_SESSION["IDProfessor"] . "
                                        , dataedicao = NOW()
                                    WHERE id = " . $_POST["hdnEditaDisciplina"]);
            print json_encode(array('cursoid' => $_POST["hdnEditaDisciplinaCurso"]));
        } else {
            if ($conn->query("SELECT 1 FROM disciplina WHERE idcurso = " . $_POST["hdnEditaDisciplinaCurso"] . " AND nome = '" . $_POST["txtEditaDisciplina"] . "' AND id = " . $_POST["hdnEditaDisciplina"] . " LIMIT 1")->rowCount() == 0) {
                print json_encode(array('cursoid' => $_POST["hdnEditaDisciplinaCurso"], 'erro' => "Duas disciplinas não podem ter nomes iguais para um mesmo curso. Favor escolher outro nome."), JSON_UNESCAPED_UNICODE);
            } else {
                print json_encode(array('cursoid' => $_POST["hdnEditaDisciplinaCurso"]));
            }
        }
    } else {
        print json_encode(array('cursoid' => $_POST["hdnCadastraDisciplina"], 'erro' => "O nome da disciplina não pode ser vazio."), JSON_UNESCAPED_UNICODE);
    }
}
?>