<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 19/04/2017
 * Time: 19:52
 */

include_once "banco.php";

print(json_encode($conn->query("SELECT * 
                                            FROM questionario q 
                                           WHERE q.iddisciplina = " . $_GET["disciplinaid"] . "
                                             AND q.nome LIKE '%" . $_GET["txtQuestionario"] . "%'
                                             AND ('" . $_GET["txtAssunto"] . "' = '' OR EXISTS(SELECT 1 
                                                                                                 FROM questionario_questao qq
                                                                                                INNER JOIN questao qu ON qu.id = qq.idquestao
                                                                                                INNER JOIN assunto a ON a.id = qu.idassunto
                                                                                                WHERE qq.idquestionario = q.id 
                                                                                                  AND a.nome LIKE '%" . $_GET["txtAssunto"] . "%'
                                                                                                LIMIT 1))
                                             AND ('" . $_GET["txtQuestao"] . "' = '' OR EXISTS(SELECT 1 
                                                                                                 FROM questionario_questao qq
                                                                                                INNER JOIN questao qu ON qu.id = qq.idquestao
                                                                                                WHERE qq.idquestionario = q.id 
                                                                                                  AND qu.descricao LIKE '%" . $_GET["txtQuestao"] . "%'
                                                                                                LIMIT 1))
                                          ")->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE));
?>