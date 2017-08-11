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

if ($_POST["hdnCadastraAssunto"] == "") {
    print json_encode(array('erro' => "Parâmetros incompletos - hdnCadastraAssunto."), JSON_UNESCAPED_UNICODE);
} else {
    if ($_POST["txtCadastroAssunto"] != "") {
        if ($conn->query("SELECT 1 FROM assunto WHERE iddisciplina = " . $_POST["hdnCadastraAssunto"] . " AND nome = '" . $_POST["txtCadastroAssunto"] . "' LIMIT 1")->rowCount() == 0) {
            $conn->exec("INSERT INTO assunto 
                                        ( nome
                                        , iddisciplina
                                        , idprofessorcadastro
                                        , datacadastro ) 
                                   VALUES 
                                        ( '" . $_POST["txtCadastroAssunto"] . "'
                                        , " . $_POST["hdnCadastraAssunto"] . "
                                        , " . $_SESSION["IDProfessor"] . "
                                        , NOW() )");
            print json_encode(array('disciplinaid' => $_POST["hdnCadastraAssunto"]));
        } else {
            print json_encode(array('disciplinaid' => $_POST["hdnCadastraAssunto"], 'erro' => "Dois assuntos não podem ter nomes iguais para uma mesma disciplina. Favor escolher outro nome."), JSON_UNESCAPED_UNICODE);
        }
    } else {
        json_encode(array('disciplinaid' => $_POST["hdnCadastraAssunto"], 'erro' => "O nome do assunto não pode ser vazio."), JSON_UNESCAPED_UNICODE);
    }
}
?>