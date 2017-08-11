<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 19/04/2017
 * Time: 19:52
 */

include_once "banco.php";

print(json_encode($conn->query("SELECT * 
                                            FROM assunto a 
                                           WHERE a.iddisciplina = " . $_GET["disciplinaid"] . "
                                             AND a.nome LIKE '%" . $_GET["txtAssunto"] . "%'
                                             AND ('" . $_GET["txtQuestao"] . "' = '' OR EXISTS(SELECT 1 
                                                                                                 FROM questao q
                                                                                                WHERE q.idassunto = a.id 
                                                                                                  AND q.descricao LIKE '%" . $_GET["txtQuestao"] . "%'
                                                                                                LIMIT 1))
                                             ")->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE));

?>