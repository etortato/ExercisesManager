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
       data-tipo="ListaDisciplinas"
       data-curso-id="<?php print $_GET["cursoid"]; ?>"
       data-url="./rules/ListaDisciplinas.php?cursoid=<?php print $_GET["cursoid"]; ?>"
       data-query-params="queryParamsDisciplinas"
       data-detail-view="true"
       data-detail-formatter="detailListaAssunto">
    <thead>
    <tr>
        <th data-field="nome" data-sortable="true">Disciplinas</th>
        <th data-width="80px" data-align="center" data-cell-style="formatterCelulaAcoes"
            data-formatter="formatterDisciplinas" data-events="eventsDisciplinas">Ações
        </th>
    </tr>
    </thead>
</table>
<script type="text/javascript">
    $("[data-tipo=ListaDisciplinas][data-curso-id=<?php print $_GET["cursoid"]; ?>]").bootstrapTable();
    function queryParamsDisciplinas(params) {
        object = {};
        object.txtAssunto = $("#txtAssunto").val();
        object.txtDisciplina = $("#txtDisciplina").val();
        object.txtQuestao = $("#txtQuestao").val();
        if ($("#txtQuestionario").length != 0)
            object.txtQuestionario = $("#txtQuestionario").val();
        else
            object.txtQuestionario = "";
        if (params != undefined) {
            object.order = params.order;
            object.limit = params.limit;
            object.offset = params.offset;
            object.sort = params.sort;
        }
        return object;
    }
    function detailListaAssunto(index, row, detail) {
        if ($("#hdnListaQuestionario").length != 0)
            detailListaQuestionario(index, row, detail);
        else
            detail.load('./Assuntos.php?disciplinaid=' + row.id);
    }
    function detailListaQuestionario(index, row, detail) {
        detail.load('./Questionarios.php?disciplinaid=' + row.id);
    }
    function formatterDisciplinas(value, row, index) {
        ret = '<i title="Deletar Disciplina" class="deletaDisciplina link-pointer glyphicon glyphicon-trash"></i>';
        ret = ret + '<i data-toggle="modal" title="Editar Disciplina" class="link-pointer ml5 glyphicon glyphicon-edit" data-target="#dialogEditaDisciplina" data-disciplina-id="' + row.id + '" data-disciplina-nome="' + row.nome + '" data-disciplina-curso="' + row.idcurso + '"></i>';
        if ($("#hdnListaQuestionario").length != 0)
            ret = ret + '<i data-toggle="modal" title="Adicionar Questionário" class="link-pointer ml5 glyphicon glyphicon-plus" data-target="#dialogCadastraQuestionario" data-disciplina-id="' + row.id + '"></i>';
        else
            ret = ret + '<i data-toggle="modal" title="Adicionar Assunto" class="link-pointer ml5 glyphicon glyphicon-plus" data-target="#dialogCadastraAssunto" data-disciplina-id="' + row.id + '"></i>';
        return ret;
    }
    window.eventsDisciplinas = {
        'click .deletaDisciplina': function (e, value, row, index) {
            if (confirm("Ao deletar uma disciplina você apagará também todos os registros relacionados a ela. Você tem certeza que gostaria de fazer isso?"))
                $.ajax({
                    url: "./rules/DeletaDisciplina.php",
                    method: "POST",
                    data: {diciplinaid: row.id},
                })
                    .done(function () {
                        $("[data-tipo=ListaDisciplinas][data-curso-id=<?php print $_GET["cursoid"]; ?>]").bootstrapTable('refresh');
                        new Noty({
                            text: 'Disciplina deletada!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    })
                    .fail(function () {
                        new Noty({
                            text: 'Ocorreu um erro ao tentar deletar a disciplina.',
                            type: 'error',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    });
        }
    }
</script>
