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

if ($_POST["hdnCadastraDisciplina"] == "") {
    print json_encode(array('erro' => "Parâmetros incompletos - hdnCadastraDisciplina."), JSON_UNESCAPED_UNICODE);
} else {
    if ($_POST["txtCadastroDisciplina"] != "") {
        if ($conn->query("SELECT 1 FROM disciplina WHERE idcurso = " . $_POST["hdnCadastraDisciplina"] . " AND nome = '" . $_POST["txtCadastroDisciplina"] . "' LIMIT 1")->rowCount() == 0) {
            $conn->exec("INSERT INTO disciplina 
                                        ( nome
                                        , idcurso
                                        , idprofessorcadastro
                                        , datacadastro ) 
                                   VALUES 
                                        ( '" . $_POST["txtCadastroDisciplina"] . "'
                                        , " . $_POST["hdnCadastraDisciplina"] . "
                                        , " . $_SESSION["IDProfessor"] . "
                                        , NOW() )");
            print json_encode(array('cursoid' => $_POST["hdnCadastraDisciplina"]));
        } else {
            print json_encode(array('cursoid' => $_POST["hdnCadastraDisciplina"], 'erro' => "Duas disciplinas não podem ter nomes iguais para um mesmo curso. Favor escolher outro nome."), JSON_UNESCAPED_UNICODE);
        }
    } else {
        json_encode(array('cursoid' => $_POST["hdnCadastraDisciplina"], 'erro' => "O nome da disciplina não pode ser vazio."), JSON_UNESCAPED_UNICODE);
    }
}
?>