<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 14/04/2017
 * Time: 17:13
 */

if(!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["QuestionarioNome"]) || !isset($_SESSION["QuestionarioID"])) {
    if (!isset($_GET["questionarioid"])) {
        header("Location: LoginErroAluno.html");
    }
    include_once "./rules/banco.php";
    $result = $conn->query("SELECT * 
                                        FROM questionario 
                                       WHERE id = '" . $_GET["questionarioid"] . "'  LIMIT 1")->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["SouAluno"] = "ÉALUNO";
    $_SESSION["QuestionarioID"] = $result[0]["id"];
    $_SESSION["QuestionarioNome"] = $result[0]["nome"];
}

include_once "./rules/ValidaLogin.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Questionário - <?php print $_SESSION["QuestionarioNome"] ?></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/bootstrap-table.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/noty.css">
    <script src="js/jquery-3.2.0.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-table.js"></script>
    <script src="js/bootstrap-table-pt-BR.js"></script>
    <script src="js/noty.js"></script>
    <script src="js/custom.js"></script>
</head>
<body>
<div class="container-full jumbotron" style="padding-bottom: 20px">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
            <h3>Questionário - <?php print $_SESSION["QuestionarioNome"] ?></h3>
        </div>
    </div>
</div>
<?php
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table data-toggle="table"
                   data-detail-view="true"
                   data-detail-formatter="detailListaQuestoes"
                   data-url="./rules/ListaAssuntosQuestionarioResponder.php?questionarioid=<?php print $_SESSION["QuestionarioID"]; ?>">
                <thead>
                <tr>
                    <th data-field="nome" data-sortable="true">Assuntos</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="container" id="divResultado" style="display: none">
    <div class="row">
        <div class="col-md-12">
            <br>
            <br>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Resultado
                </div>
                <div class="panel-body">
                    <p id="pCorretas" style="display: none" class="text-success">Parabéns, você acertou <strong id="txtCorretas">X</strong> questões.</p>
                    <p id="pErradas" style="display: none" class="text-danger">Estude mais, você errou <strong id="txtErradas">X</strong> questões.</p>
                    <p id="pNaoRespondidas" style="display: none" class="text-warning">Preste mais atenção, você esqueceu de responder <strong id="txtNaoRespondidas">X</strong> questões.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <a href="BemVindoAluno.html" class="btn btn-lg btn-default">
                VOLTAR
            </a>
            <div class="btn btn-lg btn-primary pull-right" onclick="calculaResultado()">
                RESPONDER
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <hr>
        <div class="col-lg-12">
            <div class="col-sm-12 col-md-6">
                Feito com: <a href="getbootstrap.com">Bootstrap</a> | <a href="http://bootstrap-table.wenzhixin.net.cn/">BootstrapTable</a> | <a href="http://ned.im/noty/">Noty</a> | <a href="https://secure.php.net/">PHP</a>
            </div>
            <div class="col-sm-12 col-md-6">
                <p class="muted pull-right">© 2017 Eduardo Tortato. Universidade Federal do Paraná</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    $("[data-toggle=table]").bootstrapTable();
    function detailListaQuestoes(index, row, detail) {
        detail.load('./QuestoesResponder.php?assuntoid=' + row.id + '&questionarioid=<?php print $_SESSION["QuestionarioID"]; ?>');
    }
    function calculaResultado() {
        $.post("./rules/Resultado.php")
            .done(function (data) {
                data = $.parseJSON(data);
                $("#pCorretas").hide();
                $("#pErradas").hide();
                $("#pNaoRespondidas").hide();
                if (data.corretas > 0) {
                    $("#pCorretas").show();
                    $("#txtCorretas").html(data.corretas);
                }
                if (data.erradas > 0) {
                    $("#pErradas").show();
                    $("#txtErradas").html(data.erradas);
                }
                if (data.naoRespondidas > 0) {
                    $("#pNaoRespondidas").show();
                    $("#txtNaoRespondidas").html(data.naoRespondidas);
                }
                $("#divResultado").show();
            })
            .fail(function () {
                new Noty({
                    text: 'Ocorreu um erro calcular o resultado das suas respostas.',
                    type: 'error',
                    timeout: 4000,
                    closeWith: ['click', 'button'],
                }).show();
            });
    }
</script>