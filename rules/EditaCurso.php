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
if ($_POST["txtEditaCurso"] != "")
    //Se não é zero e não existe ninguém com o mesmo nome então atualiza
    if ($conn->query("SELECT 1 FROM curso WHERE nome = '" . $_POST["txtEditaCurso"] . "' LIMIT 1")->rowCount() == 0)
        $conn->exec("UPDATE curso 
                                  SET nome ='" . $_POST["txtEditaCurso"] . "'
                                    , idprofessoredicao = " . $_SESSION["IDProfessor"] . "
                                    , dataedicao = NOW()
                                WHERE id = " . $_POST["hdnEditaCurso"]);
    //Se existe com o mesmo nome e não é igual ao que está sendo editado então dá erro pois não pode existir dois com o mesmo nome
    else
        if ($conn->query("SELECT 1 FROM curso WHERE nome = '" . $_POST["txtEditaCurso"] . "' AND id = " . $_POST["hdnEditaCurso"] . " LIMIT 1")->rowCount() == 0)
            print json_encode(array('erro' => "Dois cursos não podem ter nomes iguais. Favor escolher outro nome."), JSON_UNESCAPED_UNICODE);
?>