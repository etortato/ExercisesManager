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
       data-tipo="ListaAssuntos"
       data-disciplina-id="<?php print $_GET["disciplinaid"]; ?>"
       data-url="./rules/ListaAssuntos.php?disciplinaid=<?php print $_GET["disciplinaid"]; ?>"
       data-query-params="queryParamsAssuntos"
       data-detail-view="true"
       data-detail-formatter="detailListaQuestao">
    <thead>
    <tr>
        <th data-field="nome" data-sortable="true">Assuntos</th>
        <th data-width="80px" data-align="center" data-cell-style="formatterCelulaAcoes"
            data-formatter="formatterAssuntos" data-events="eventsAssuntos">Ações
        </th>
    </tr>
    </thead>
</table>
<script type="text/javascript">
    $("[data-tipo=ListaAssuntos][data-disciplina-id=<?php print $_GET["disciplinaid"]; ?>]").bootstrapTable();
    function queryParamsAssuntos(params) {
        object = {};
        object.txtAssunto = $("#txtAssunto").val();
        object.txtQuestao = $("#txtQuestao").val();
        if (params != undefined) {
            object.order = params.order;
            object.limit = params.limit;
            object.offset = params.offset;
            object.sort = params.sort;
        }
        return object;
    }
    function detailListaQuestao(index, row, detail) {
        detail.load('./Questoes.php?assuntoid=' + row.id);
    }
    function formatterAssuntos(value, row, index) {
        return '<i title="Deletar Assunto" class="deletaAssunto link-pointer glyphicon glyphicon-trash"></i>' +
            '<i data-toggle="modal" title="Editar Assunto" class="link-pointer ml5 glyphicon glyphicon-edit" data-target="#dialogEditaAssunto" data-assunto-id="' + row.id + '" data-assunto-nome="' + row.nome + '" data-assunto-disciplina="' + row.iddisciplina + '"></i>' +
            '<i data-toggle="modal" title="Adicionar Questão" class="link-pointer ml5 glyphicon glyphicon-plus" data-target="#dialogCadastraQuestao" data-assunto-id="' + row.id + '"></i>';
    }
    window.eventsAssuntos = {
        'click .deletaAssunto': function (e, value, row, index) {
            if (confirm("Ao deletar um assunto você apagará também todos os registros relacionados a ele. Você tem certeza que gostaria de fazer isso?"))
                $.ajax({
                    url: "./rules/DeletaAssunto.php",
                    method: "POST",
                    data: {assuntoid: row.id},
                })
                    .done(function () {
                        $("[data-tipo=ListaAssuntos][data-disciplina-id=<?php print $_GET["disciplinaid"]; ?>]").bootstrapTable('refresh');
                        new Noty({
                            text: 'Assunto deletado!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    })
                    .fail(function () {
                        new Noty({
                            text: 'Ocorreu um erro ao tentar deletar o assunto.',
                            type: 'error',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    });
        }
    }
</script>
