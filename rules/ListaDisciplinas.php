<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 19/04/2017
 * Time: 19:52
 */

include_once "banco.php";

print(json_encode($conn->query("SELECT * 
                                            FROM disciplina d 
                                           WHERE d.idcurso = " . $_GET["cursoid"] . "
                                             AND d.nome LIKE '%" . $_GET["txtDisciplina"] . "%'
                                             AND ('" . $_GET["txtAssunto"] . "' = '' OR EXISTS(SELECT 1 
                                                                                                 FROM assunto a
                                                                                                WHERE a.iddisciplina = d.id 
                                                                                                  AND a.nome LIKE '%" . $_GET["txtAssunto"] . "%'
                                                                                                LIMIT 1))
                                             AND ('" . $_GET["txtQuestao"] . "' = '' OR EXISTS(SELECT 1 
                                                                                                 FROM assunto a
                                                                                                INNER JOIN questao q ON q.idassunto = a.id
                                                                                                WHERE a.iddisciplina = d.id 
                                                                                                  AND q.descricao LIKE '%" . $_GET["txtQuestao"] . "%'
                                                                                                LIMIT 1))
                                             AND ('" . $_GET["txtQuestionario"] . "' = '' OR EXISTS(SELECT 1 
                                                                                                      FROM questionario q
                                                                                                     WHERE q.iddisciplina = d.id 
                                                                                                       AND q.nome LIKE '%" . $_GET["txtQuestionario"] . "%'
                                                                                                     LIMIT 1))
                                             ")->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE));

?>