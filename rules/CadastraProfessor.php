<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 23/04/2017
 * Time: 18:26
 */

include_once "banco.php";

if ($_POST["txtCadastroProfessorNome"] != "" && $_POST["txtCadastroProfessorSenha"] != "" && $_POST["txtCadastroProfessorLogin"] != "") {
    if ($conn->query("SELECT 1 FROM professor WHERE login = '" . $_POST["txtCadastroProfessorLogin"] . "' LIMIT 1")->rowCount() == 0) {
        $conn->exec("INSERT INTO professor 
                                    ( nome
                                    , login
                                    , senha
                                    , datacadastro ) 
                               VALUES 
                                    ( '" . $_POST["txtCadastroProfessorNome"] . "'
                                    , '" . $_POST["txtCadastroProfessorLogin"] . "'
                                    , '" . $_POST["txtCadastroProfessorSenha"] . "'
                                    , NOW() )");
    } else {
        print json_encode(array('erro' => "Dois professores não podem ter logins iguais. Favor escolher outro login."), JSON_UNESCAPED_UNICODE);
    }
}
?>