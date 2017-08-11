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
       data-tipo="ListaQuestionarios"
       data-disciplina-id="<?php print $_GET["disciplinaid"]; ?>"
       data-url="./rules/ListaQuestionarios.php?disciplinaid=<?php print $_GET["disciplinaid"]; ?>"
       data-query-params="queryParamsQuestionarios"
       data-detail-view="true"
       data-detail-formatter="detailListaQuestoesQuestionario">
    <thead>
    <tr>
        <th data-field="id" data-width="100px" data-align="center" data-sortable="true"
            data-title-tooltip="Este é o identificador que deverá ser distribuído aos alunos.">Identificador
        </th>
        <th data-field="nome" data-sortable="true">Questionários</th>
        <th data-width="80px" data-align="center" data-cell-style="formatterCelulaAcoes"
            data-formatter="formatterQuestionarios" data-events="eventsQuestionarios">Ações
        </th>
    </tr>
    </thead>
</table>
<script type="text/javascript">
    $("[data-tipo=ListaQuestionarios][data-disciplina-id=<?php print $_GET["disciplinaid"]; ?>]").bootstrapTable();
    function queryParamsQuestionarios(params) {
        object = {};
        object.txtAssunto = $("#txtAssunto").val();
        object.txtQuestionario = $("#txtQuestionario").val();
        object.txtQuestao = $("#txtQuestao").val();
        if (params != undefined) {
            object.order = params.order;
            object.limit = params.limit;
            object.offset = params.offset;
            object.sort = params.sort;
        }
        return object;
    }
    function detailListaQuestoesQuestionario(index, row, detail) {
        detail.load('./QuestoesQuestionario.php?questionarioid=' + row.id);
    }
    function formatterQuestionarios(value, row, index) {
        ret = '<i title="Deletar Questionario" class="deletaQuestionario link-pointer glyphicon glyphicon-trash"></i>';
        ret = ret + '<i data-toggle="modal" title="Editar Questionario" class="link-pointer ml5 glyphicon glyphicon-edit" data-target="#dialogEditaQuestionario" data-questionario-id="' + row.id + '" data-questionario-nome="' + row.nome + '" data-questionario-disciplina="' + row.iddisciplina + '"></i>';
        ret = ret + '<i data-toggle="modal" title="Incluir Questão" class="link-pointer ml5 glyphicon glyphicon-plus" data-target="#dialogIncluirQuestao" data-questionario-id="' + row.id + '" data-questionario-disciplina="' + row.iddisciplina + '"></i>';
        return ret;
    }
    window.eventsQuestionarios = {
        'click .deletaQuestionario': function (e, value, row, index) {
            if (confirm("Ao deletar um questionário você apagará também todos os registros relacionados a ele. Você tem certeza que gostaria de fazer isso?"))
                $.ajax({
                    url: "./rules/DeletaQuestionario.php",
                    method: "POST",
                    data: {questionarioid: row.id},
                })
                    .done(function () {
                        $("[data-tipo=ListaQuestionarios][data-disciplina-id=<?php print $_GET["disciplinaid"]; ?>]").bootstrapTable('refresh');
                        new Noty({
                            text: 'Questionário deletado!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    })
                    .fail(function () {
                        new Noty({
                            text: 'Ocorreu um erro ao tentar deletar o questionário.',
                            type: 'error',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    });
        }
    }
</script>
