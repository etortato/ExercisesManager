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

//Se o campo passado é zero então não faz nada
if ($_POST["txtEditaProfessorNome"] != "" && $_POST["txtEditaProfessorSenha"] != "" && $_POST["txtEditaProfessorLogin"] != "")
    //Se não é zero e não existe ninguém com o mesmo nome então atualiza
    if ($conn->query("SELECT 1 FROM professor WHERE login = '" . $_POST["txtEditaProfessorLogin"] . "' LIMIT 1")->rowCount() == 0)
        $conn->exec("UPDATE professor 
                                  SET nome ='" . $_POST["txtEditaProfessorNome"] . "'
                                    , login ='" . $_POST["txtEditaProfessorLogin"] . "'
                                    , senha ='" . $_POST["txtEditaProfessorSenha"] . "'
                                WHERE id = " . $_POST["hdnEditaProfessor"]);
    //Se existe com o mesmo nome e não é igual ao que está sendo editado então dá erro pois não pode existir dois com o mesmo nome
    else
        if ($conn->query("SELECT 1 FROM professor WHERE nome = '" . $_POST["txtEditaProfessorLogin"] . "' AND id = " . $_POST["hdnEditaProfessor"] . " LIMIT 1")->rowCount() == 0)
            print json_encode(array('erro' => "Dois professores não podem ter logins iguais. Favor escolher outro login."), JSON_UNESCAPED_UNICODE);
?>