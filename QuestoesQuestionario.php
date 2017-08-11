<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 19/04/2017
 * Time: 19:45
 */

include_once "rules/ValidaLogin.php";
?>
<table data-toggle="table"
       data-tipo="ListaQuestoesQuestionario"
       data-questionario-id="<?php print $_GET["questionarioid"]; ?>"
       data-url="./rules/ListaQuestoesQuestionario.php?questionarioid=<?php print $_GET["questionarioid"]; ?>"
       data-query-params="queryParamsQuestoesQuestionario">
    <thead>
    <tr>
        <th data-field="assuntoNome" data-sortable="true">Assuntos</th>
        <th data-field="questaoDescricao" data-sortable="true">Questões</th>
        <th data-width="100px" data-align="center" data-field="curtidas" data-sortable="true">Curtidas</th>
        <th data-width="80px" data-align="center" data-sortable="true" data-formatter="formatterQuestoesQuestionarioRespondidas">
            Respondida
        </th>
        <th data-width="100px" data-align="center" data-cell-style="formatterCelulaAcoes"
            data-formatter="formatterQuestoesQuestionario" data-events="eventsQuestoes">Ações
        </th>
    </tr>
    </thead>
</table>
<script type="text/javascript">
    $("[data-tipo=ListaQuestoesQuestionario][data-questionario-id=<?php print $_GET["questionarioid"]; ?>]").bootstrapTable();
    function queryParamsQuestoesQuestionario(params) {
        object = {};
        object.txtQuestao = $("#txtQuestao").val();
        object.questionarioid = <?php print $_GET["questionarioid"]; ?>;
        if (params != undefined) {
            object.order = params.order;
            object.limit = params.limit;
            object.offset = params.offset;
            object.sort = params.sort;
        }
        return object;
    }
    function formatterQuestoesQuestionarioRespondidas(value, row, index) {
        if (row.respondida == 0)
            return '<i title="Questão respondida!" class="glyphicon glyphicon-ok"></i>';
        else
            return '<i title="Essa questão ainda não foi respondida!" class="glyphicon glyphicon-asterisk"></i>';
    }
    function formatterQuestoesQuestionario(value, row, index) {
        return '<i title="Remover Questão do Questionário" class="removeQuestaoQuestionario link-pointer glyphicon glyphicon-minus"></i>';
    }
    window.eventsQuestoes = {
        'click .removeQuestaoQuestionario': function (e, value, row, index) {
                $.ajax({
                    url: "./rules/RemoveQuestaoQuestionario.php",
                    method: "POST",
                    data: {
                        questaoid: row.id,
                        questionarioid: <?php print $_GET["questionarioid"]; ?>
                    },
                })
                    .done(function () {
                        $("[data-tipo=ListaQuestoesQuestionario][data-questionario-id=<?php print $_GET["questionarioid"]; ?>]").bootstrapTable('refresh');
                        new Noty({
                            text: 'Questão deletada!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    })
                    .fail(function () {
                        new Noty({
                            text: 'Ocorreu um erro ao tentar deletar a questão.',
                            type: 'error',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    });
        }
    }
</script>
