<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 19/04/2017
 * Time: 19:52
 */

include_once "banco.php";

print(json_encode($conn->query("SELECT DISTINCT a.id
                                               , a.nome
                                            FROM assunto a 
                                           INNER JOIN questao q ON q.idassunto = a.id
                                           INNER JOIN questionario_questao qq ON qq.idquestao = q.id
                                           WHERE EXISTS (SELECT 1 FROM resposta r WHERE r.idquestao = q.id AND r.correta = 1 LIMIT 1)
                                             AND qq.idquestionario = " . $_GET["questionarioid"])->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE));

?>