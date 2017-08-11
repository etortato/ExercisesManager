<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 19/04/2017
 * Time: 19:52
 */

include_once "banco.php";

if(!isset($_SESSION)) {
    session_start();
}

print(json_encode($conn->query("SELECT *
                                               , (SELECT COUNT(1) FROM curtida c WHERE c.idquestao = q.id) AS curtidas
                                               , ISNULL((SELECT 1 
                                                           FROM curtida cc
                                                          WHERE cc.idquestao = q.id
                                                            AND cc.idprofessor = '" . $_SESSION["IDProfessor"] . "'
                                                          LIMIT 1)) AS curtiu
                                               , ISNULL((SELECT 1 
                                                           FROM resposta r 
                                                          WHERE r.correta = 1 
                                                            AND r.idquestao = q.id)) AS respondida
                                            FROM questao q 
                                           WHERE q.idassunto = " . $_GET["assuntoid"] . "
                                             AND q.descricao LIKE '%" . $_GET["txtQuestao"] . "%'
                                           ")->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE));

?>