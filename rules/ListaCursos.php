<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 17/04/2017
 * Time: 22:45
 */

include_once "banco.php";

print(json_encode($conn->query("SELECT * 
                                            FROM curso c
                                           WHERE c.nome LIKE '%" . $_GET["txtCurso"] . "%'
                                             AND ('" . $_GET["txtDisciplina"] . "' = '' OR EXISTS(SELECT 1 
                                                                                                      FROM disciplina d 
                                                                                                     WHERE d.idcurso = c.id 
                                                                                                       AND d.nome LIKE '%" . $_GET["txtDisciplina"] . "%'
                                                                                                     LIMIT 1)) 
                                             AND ('" . $_GET["txtAssunto"] . "' = '' OR EXISTS(SELECT 1 
                                                                                                   FROM disciplina d 
                                                                                                  INNER JOIN assunto a ON a.iddisciplina = d.id
                                                                                                  WHERE d.idcurso = c.id 
                                                                                                    AND a.nome LIKE '%" . $_GET["txtAssunto"] . "%'
                                                                                                  LIMIT 1))
                                             AND ('" . $_GET["txtQuestao"] . "' = '' OR EXISTS(SELECT 1 
                                                                                                   FROM disciplina d 
                                                                                                  INNER JOIN assunto a ON a.iddisciplina = d.id
                                                                                                  INNER JOIN questao q ON q.idassunto = a.id
                                                                                                  WHERE d.idcurso = c.id 
                                                                                                    AND q.descricao LIKE '%" . $_GET["txtQuestao"] . "%'
                                                                                                  LIMIT 1))
                                             AND ('" . $_GET["txtQuestionario"] . "' = '' OR EXISTS(SELECT 1 
                                                                                                      FROM disciplina d 
                                                                                                     INNER JOIN questionario q ON q.iddisciplina = d.id
                                                                                                     WHERE d.idcurso = c.id 
                                                                                                       AND q.nome LIKE '%" . $_GET["txtQuestionario"] . "%'
                                                                                                     LIMIT 1))
                                             ")->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE));

?>