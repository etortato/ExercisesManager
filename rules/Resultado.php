<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 20/04/2017
 * Time: 18:39
 */
include_once "banco.php";

if(!isset($_SESSION)) {
    session_start();
}

$Respostas = $conn->query("SELECT q.id AS questaoid
                                          , r.id AS respostaid
                                       FROM resposta r
                                      INNER JOIN questao q ON q.id = r.idquestao
                                      INNER JOIN questionario_questao qq ON qq.idquestao = q.id
                                      WHERE r.correta
                                        AND qq.idquestionario = " . $_SESSION["QuestionarioID"])->fetchAll(PDO::FETCH_ASSOC);
$corretas = 0;
$erradas = 0;
$naoRespondida = 0;
foreach ($Respostas as $r) {
    if (isset($_SESSION["Respostas"][$r["questaoid"]])) {
        if($_SESSION["Respostas"][$r["questaoid"]] == $r["respostaid"]) {
            $corretas = $corretas + 1;
        } else {
            $erradas = $erradas + 1;
        }
    } else {
        $naoRespondida = $naoRespondida + 1;
    }
}
print(json_encode(Array("corretas" => $corretas, "erradas" => $erradas, "naoRespondidas" => $naoRespondida)));
?>