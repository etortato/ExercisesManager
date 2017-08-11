<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 19/04/2017
 * Time: 19:52
 */

include_once "banco.php";

print(json_encode($conn->query("SELECT id
                                               , descricao
                                               , idquestao
                                            FROM resposta 
                                           WHERE idquestao = " . $_GET["questaoid"])->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE));
?>