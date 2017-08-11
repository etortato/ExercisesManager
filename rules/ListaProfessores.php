<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 17/04/2017
 * Time: 22:45
 */

include_once "banco.php";

print(json_encode($conn->query("SELECT * FROM professor")->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE));

?>