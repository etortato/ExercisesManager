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

if ($_POST["txtCadastroCurso"] != "")
    if ($conn->query("SELECT 1 FROM curso WHERE nome = '" . $_POST["txtCadastroCurso"] . "' LIMIT 1")->rowCount() == 0)
        $conn->exec("INSERT INTO curso 
                                    ( nome
                                    , idprofessorcadastro
                                    , datacadastro ) 
                               VALUES 
                                    ( '" . $_POST["txtCadastroCurso"] . "'
                                    , " . $_SESSION["IDProfessor"] . "
                                    , NOW() )");
    else
        print json_encode(array('erro' => "Dois cursos não podem ter nomes iguais. Favor escolher outro nome."), JSON_UNESCAPED_UNICODE);
?>