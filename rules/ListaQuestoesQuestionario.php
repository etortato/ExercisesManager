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

print(json_encode($conn->query("SELECT q.id
                                               , q.descricao AS questaoDescricao
                                               , a.nome AS assuntoNome
                                               , (SELECT COUNT(1) FROM curtida c WHERE c.idquestao = q.id) AS curtidas
                                               , ISNULL((SELECT 1 
                                                           FROM resposta r 
                                                          WHERE r.correta = 1 
                                                            AND r.idquestao = q.id)) AS respondida
                                            FROM questao q 
                                           INNER JOIN assunto a ON a.id = q.idassunto
                                           INNER JOIN questionario_questao qq ON qq.idquestao = q.id 
                                           WHERE ('%" . $_GET["txtQuestao"] . "%' = '' OR q.descricao LIKE '%" . $_GET["txtQuestao"] . "%')
                                             AND qq.idquestionario = " . $_GET["questionarioid"]
                                           )->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE));

?>