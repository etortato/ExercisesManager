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

print(json_encode($conn->query("SELECT q.id AS questaoid
                                               , " . $_GET["hdnIncluirQuestaoQuestionario"] . " AS questionarioid
                                               , q.descricao AS questaoDescricao
                                               , a.nome AS assuntoNome
                                               , (SELECT COUNT(1) FROM curtida c WHERE c.idquestao = q.id) AS curtidas
                                               , ISNULL((SELECT 1 
                                                           FROM resposta r 
                                                          WHERE r.correta = 1 
                                                            AND r.idquestao = q.id)) AS respondida
                                            FROM questao q 
                                           INNER JOIN assunto a ON a.id = q.idassunto
                                            LEFT JOIN questionario_questao qq ON qq.idquestionario = " . $_GET["hdnIncluirQuestaoQuestionario"] . " AND qq.idquestao = q.id 
                                           WHERE ('%" . $_GET["txtIncluirQuestaoAssunto"] . "%' = '' OR a.nome LIKE '%" . $_GET["txtIncluirQuestaoAssunto"] . "%')
                                             AND ('%" . $_GET["txtIncluirQuestaoQuestao"] . "%' = '' OR q.descricao LIKE '%" . $_GET["txtIncluirQuestaoQuestao"] . "%')
                                             AND qq.id IS NULL
                                             AND a.iddisciplina = " . $_GET["hdnIncluirQuestaoDisciplina"]
                                           )->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE));

?>